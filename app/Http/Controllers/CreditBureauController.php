<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use Illuminate\Http\Request;
use App\Models\CreditBureau;
use Datatables;
use DB;
use App\Models\Message;

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
}
