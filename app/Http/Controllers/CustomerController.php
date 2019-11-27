<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\User;
use App\Models\Address;
use App\Http\Requests\StoreCustomers;
use App\Http\Requests\UpdateCustomers;
use DataTables;

class CustomerController extends Controller
{

    public function index(Request $request){
        if($request->ajax()){
            return datatables(Customer::all())
            ->addColumn('action', function ($row) {
                $btn = '<a href="/clientes/editar/' . $row->id . '" data-id="' . $row->id . '" class="btn btn-warning" style="margin-right:20px">' .
                    "<i class='fa fa-edit'></i>"
                    . '</a>';
                $btn = $btn.'<a href="/clientes/registrar/direcciones/' . $row->id . '" data-id="' . $row->id . '" class="btn btn-danger" style="margin-right:20px">' .
                "<i class='fa fa-plus'></i>"
                . '</a>';

                $btn = $btn.'<a href="/clientes/detalles/' . $row->id . '" data-id="' . $row->id . '" class="btn btn-info" style="margin-right:20px">' .
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
            ->rawColumns(['action', 'status'])
            ->toJson();
        }
        return view('customers.index');
            
    }

    public function create(){
        return view('customers.create');
    }

    public function store(StoreCustomers $request){
        $user = new User();
        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = bcrypt($request->get('password'));
        $user->role_id = 2;
        $user->save();
        
        //$u = User::find($user->id);
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
        //$u->customer()->save($customer);
        return redirect()->route('clientes.index');        
    }

 
    public function show($id){
        $customer = Customer::find($id);
        $address = $customer->address()->get();
        return view('customers.detail', compact('address'));
    }

    public function edit($id){
        $customer = Customer::find($id);
        $user = User::find($customer->user_id);
        return view('customers.edit', compact('customer', 'user','id'));
    }

    public function update(UpdateCustomers $request, $id){
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
   
    public function destroy($id){
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
            switch ($request->get('option')) {
                case 1:
                    $c = $customer->where('name', $request->get('value'));
                    break;
                case 2:
                    $c = $customer->where('rfc', $request->get('value'));
                    break;
                case 3:
                    $c = $customer->where('curp', $request->get('value'));
                    break;
                case 4:
                    $c = $customer->where('birthdate', $request->get('value'));
                    break;
            }
        } else {
            return ['status' => 0];
        }

        if ($c->count() > 0) {
            return ["customer" => $c, "status" => 1];
        } else {
            return ["status" => 2];
        }
    }
}
