<?php

namespace App\Http\Controllers;

use App\Models\Address;
use App\Models\Credit;
use Illuminate\Http\Request;
use App\Models\CreditBureau;
use Datatables;
use DB;
use App\Models\Message;
use App\Models\Customer;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Collection as Collection;

class CreditBureauController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $buro = DB::table('credit_bureaus as cb')
            ->join('customers as cu', 'cu.id', '=', 'cb.customer_id')
            ->join('credits as cr', 'cr.id', '=', 'cb.credit_id')
            ->join('places as p', 'p.id', '=', 'cr.place_id')
            ->select(
                'cb.id as buro_id',
                DB::raw(' CONCAT(cu.name ," ", cu.first_last_name ," ", cu.second_last_name) as customer'),
                'p.name as place',
                'cb.register_date'
            );
        if ($request->ajax()) {

            return datatables()
                ->query($buro)
                ->addColumn('messages', function ($row) {
                    $btn = '<a href="/buro-credito-mensajes/' . $row->buro_id . '" class="btn btn-success" style="margin-right:20px">' .
                        "<i class='fa fa-envelope-square'></i>"
                        . '</a>';
                    $btn = $btn . '<a href="/buro-credito-reportes/' . $row->buro_id . '" class="btn btn-info">' .
                        "<i class='fa fa-list-ol'></i>"
                        . '</a>';
                    return $btn;
                })
                ->addColumn('delete', function ($row) {
                    $btn = '<a href="/buro-destroy/' . $row->buro_id . '" class="btn btn-danger">' .
                        "<i class='fa fa-remove'></i>"
                        . '</a>';
                    return $btn;
                })
                ->rawColumns(['messages', 'delete'])
                ->toJson();
        }
        return view('buro.index');
    }

    public function destroy($id)
    {
        $buro = CreditBureau::find($id);
        $credito = Credit::find($buro->credit_id);
        $buro->delete();
        $credito->behavior = 2;
        $credito->save();
        return view('buro.index');
    }

    public function messageView($id)
    {
        $buro = CreditBureau::find($id);
        return view('buro.messages', compact('buro'));
    }

    public function reportView($id)
    {
        $messages = Message::where('credit_bureaus_id', '=', $id)->get();
        return view('buro.report', compact('messages'));
    }

    public function addMessages(Request $request)
    {
        $buro = CreditBureau::find($request->get('buro_id'));
        $message = new Message();
        $message->message = $request->get('message');
        $message->credit_bureaus_id = $buro->id;
        $message->save();
        return redirect()->route('buro-credito.index');
    }

    public function searchClientView(Request $request)
    {
        return view('buro.reports.search-client');
    }

    public function searchBuroCustomer(Request $request)
    {
        if ($request->get('value') != null) {
            $customer = Customer::whereHas('creditBureau')->get();
            $customers = [];
            for ($i = 0; $i < $customer->count(); $i++) {
                $customers[$i] = [
                    'id' => $customer[$i]->id, 'name' => $customer[$i]->name . ' ' . $customer[$i]->first_last_name . ' ' . $customer[$i]->second_last_name,
                    'rfc' => $customer[$i]->rfc, 'curp' => $customer[$i]->curp, 'birthdate' => $customer[$i]->birthdate
                ];
            }
            $customers = Collection::make($customers);
            switch ($request->get('option')) {
                case 1:
                    $c = $customers->where('name', $request->get('value'));
                    break;
                case 2:
                    $c = $customers->where('rfc', $request->get('value'));
                    break;
                case 3:
                    $c = $customers->where('curp', $request->get('value'));
                    break;
                case 4:
                    $c = $customers->where('birthdate', $request->get('value'));
                    break;
            }
            $aux = $c->keys();
            $new = Collection::make($c[$aux[0]]);
            $creditos = DB::table('places as p')
                ->join('credits as c', 'p.id', '=', 'c.place_id')
                ->select('c.id', 'p.name')
                ->where('c.customer_id', '=', $new->get('id'))
                ->get();
        } else {
            return ['status' => 0];
        }

        if ($c->count() > 0) {
            if ($creditos->count() > 0) {
                return ["customer" => $new, "status" => 1, "creditos" => $creditos];
            } else {
                return ["customer" => $new, "status" => 1, "creditos" => 0];
            }
        } else {
            return ["status" => 2];
        }
    }

    public function generateReport($id)
    {
        $customer = Customer::find($id);
        $addresses = Address::where('customer_id', '=', $customer->id)->get();
        $credits = DB::table('credit_bureaus as cb')
            ->join('customers as cu', 'cu.id', '=', 'cb.customer_id')
            ->join('credits as cr', 'cr.id', '=', 'cb.credit_id')
            ->join('places as p', 'p.id', '=', 'cr.place_id')
            ->select(
                'p.id as code',
                'p.name as place',
                'cr.credit_type',
                'cr.description',
                'cb.register_date'
            )->where('cu.id', '=', $customer->id)->get();

        $messages = DB::table('credit_bureaus as cb')
            ->join('customers as cu', 'cu.id', '=', 'cb.customer_id')
            ->join('credits as cr', 'cr.id', '=', 'cb.credit_id')
            ->join('messages as m', 'm.credit_bureaus_id', '=', 'cb.id')
            ->select('m.message')
            ->where('cu.id', '=', $customer->id)->get();
        return view('buro.reports.generate-report', compact('customer', 'addresses', 'credits', 'messages'));
    }

    public function exportPDF($id)
    {
        $customer = Customer::find($id);
        $addresses = Address::where('customer_id', '=', $customer->id)->get();
        $credits = DB::table('credit_bureaus as cb')
            ->join('customers as cu', 'cu.id', '=', 'cb.customer_id')
            ->join('credits as cr', 'cr.id', '=', 'cb.credit_id')
            ->join('places as p', 'p.id', '=', 'cr.place_id')
            ->select(
                'p.id as code',
                'p.name as place',
                'cr.credit_type',
                'cr.description',
                'cb.register_date'
            )->where('cu.id', '=', $customer->id)->get();

        $messages = DB::table('credit_bureaus as cb')
            ->join('customers as cu', 'cu.id', '=', 'cb.customer_id')
            ->join('credits as cr', 'cr.id', '=', 'cb.credit_id')
            ->join('messages as m', 'm.credit_bureaus_id', '=', 'cb.id')
            ->select('m.message')
            ->where('cu.id', '=', $customer->id)->get();

        $pdf = PDF::loadView('pdf.print', compact('customer', 'addresses', 'credits', 'messages'));
        return $pdf->download('reporte.pdf');
    }
}
