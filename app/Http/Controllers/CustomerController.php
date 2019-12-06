<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\Credit;
use App\Models\Address;
use App\Models\Card;
use App\Http\Requests\StoreCustomers;
use App\Http\Requests\UpdateCustomers;
use App\Models\Payment;
use DataTables;
use Auth;
use DB;

use Illuminate\Support\Collection as Collection;

class CustomerController extends Controller
{

    public function index(Request $request)
    {
        if ($request->ajax()) {
            return datatables(Customer::all())
                ->addColumn('name', function ($row) {
                    $td = '<td>' . $row->name . ' ' . $row->first_last_name . '  ' . $row->second_last_name . ' </td>';
                    return $td;
                })
                ->addColumn('action', function ($row) {
                    $btn = '<a href="/clientes/editar/' . $row->id . '" data-id="' . $row->id . '" class="btn btn-warning" style="margin-right:20px">' .
                        "<i class='fa fa-edit'></i>"
                        . '</a>';
                    $btn = $btn . '<a href="/clientes/registrar/direcciones/' . $row->id . '" data-id="' . $row->id . '" class="btn btn-danger" style="margin-right:20px">' .
                        "<i class='fa fa-plus'></i>"
                        . '</a>';

                    $btn = $btn . '<a href="/clientes/detalles/' . $row->id . '" data-id="' . $row->id . '" class="btn btn-info" style="margin-right:20px">' .
                        "<i class='fa fa-list'></i>"
                        . '</a>';

                    return $btn;
                })
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        $btn = '<a data-id="' . $row->id . '" class="btn btn-success delete" data-target="' . $row->status . '">' .
                            "<i class='fa fa-check'></i>"
                            . '</a>';
                    } else {
                        $btn = '<a data-id="' . $row->id . '" class="btn btn-danger delete">' .
                            "<i class='fa fa-close'></i>"
                            . '</a>';
                    }

                    return $btn;
                })
                ->rawColumns(['name', 'action', 'status'])
                ->toJson();
        }
        return view('customers.index');
    }

    public function create()
    {
        return view('customers.create');
    }

    public function store(StoreCustomers $request)
    {
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->role_id = 2;
        $user->save();

        $customer = new Customer();
        $customer->user_id = $user->id;
        $customer->name = $request->get('name_customer');
        $customer->first_last_name = $request->get('first_last_name');
        $customer->second_last_name = $request->get('second_last_name');
        $customer->curp = $request->get('curp');
        $customer->rfc = $request->get('rfc');
        $customer->birthdate = $request->get('birthdate');
        $customer->phone = $request->get('phone');
        $customer->save();
        return redirect()->route('clientes.index');
    }


    public function show($id)
    {
        $customer = Customer::find($id);
        $address = $customer->address()->get();
        return view('customers.detail', compact('address', 'customer'));
    }

    public function edit($id)
    {
        $customer = Customer::find($id);
        $user = User::find($customer->user_id);
        return view('customers.edit', compact('customer', 'user', 'id'));
    }

    public function update(UpdateCustomers $request, $id)
    {
        $customer = Customer::find($id);
        $customer->name = $request->get('name_customer');
        $customer->first_last_name = $request->get('first_last_name');
        $customer->second_last_name = $request->get('second_last_name');
        $customer->curp = $request->get('curp');
        $customer->rfc = $request->get('rfc');
        $customer->birthdate = $request->get('birthdate');
        $customer->phone = $request->get('phone');
        $customer->save();
        return redirect()->route('clientes.index');
    }

    public function destroy($id)
    {
        $customer = Customer::find($id);
        $customer->status = !$customer->status;
        $customer->save();
        return response()->json([
            'success' => 'customer deleted',
            'status' => $customer->status
        ]);
    }

    public function searchClient(Request $request)
    {
        if ($request->get('value') != null) {
            $customer = Customer::whereDoesntHave('creditBureau')->get();
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

    public function getCardsByCustomer()
    {
        $user = Auth::user()->id;
        $customer = Customer::where('user_id', $user)->get();
        $cards = DB::table('customers as cu')
            ->join('cards as t', 'cu.id', '=', 't.customer_id')
            ->select('t.card_number', 't.card', 't.card_type', 't.expiration_date', 't.status')
            ->get();
        return $cards;
    }

    public function tarjetasView()
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $cards = Card::where('customer_id', $customer->id)->get();
        return view('customer-view.cards', compact('cards'));
    }

    public function creditosView()
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $credits = DB::table('credits')->join('places', 'credits.place_id', '=', 'places.id')
            ->select('places.name', 'credits.credit_type', 'credits.description', 'credits.status', 'credits.behavior')
            ->where('credits.customer_id', $customer->id)
            ->get();

        return view('customer-view.credits', compact('credits'));
    }

    public function prestamosView()
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $loans = DB::table('credits')->join('places', 'credits.place_id', '=', 'places.id')->join('loans', 'credits.id', '=', 'loans.credit_id')
            ->select('loans.id as loan_id', 'places.name', 'credits.credit_type', 'credits.description', 'loans.years_to_pay', 'loans.payment_type', 'loans.interest_rate', 'loans.loan_amount', 'loans.total_amount_to_pay', 'loans.loan_date')
            ->where('credits.customer_id', $customer->id)
            ->get();

        return view('customer-view.loans', compact('loans'));
    }

    public function buroView()
    {
        $customer = Customer::where('user_id', Auth::user()->id)->first();
        $buro = DB::table('credits')
            ->join('places', 'places.id', '=', 'credits.place_id')
            ->join('credit_bureaus', 'credit_bureaus.credit_id', '=', 'credits.id')
            ->select('places.name', 'credit_bureaus.register_date', 'credits.description')
            ->where('credit_bureaus.customer_id', $customer->id)
            ->get();

        return view('customer-view.credit-bureau', compact('buro'));
    }

    public function pagosView($id)
    {
        $payments = Payment::where('loan_id', '=', $id)->get();
        return view('customer-view.payments', compact('payments'));
    }
}
