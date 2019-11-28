<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Customer;
use App\Http\Requests\StoreAddress;
use App\Http\Requests\UpdateAddress;

class AddressController extends Controller
{
    public function index()
    {
        //
    }

    public function create($id){
        $customer = Customer::find($id);
        return view('address.create', compact('customer'));
    }

    public function store(StoreAddress $request)
    {
        $address = new Address();
        $customer = Customer::find($request->get('customer_id'));
        $address->customer_id = $customer->id;
        $address->street = $request->get('street');
        $address->external_number = $request->get('external_number');
        $address->internal_number = $request->get('internal_number');
        $address->between_streets = $request->get('between_streets');
        $address->postal_code = $request->get('postal_code');
        $address->neighborhood = $request->get('neighborhood');
        $address->country = $request->get('country');
        $address->state = $request->get('state');
        $address->city = $request->get('city');
        $customer->address()->save($address);

        return redirect()->route('clientes.index');
    }


    public function show($id)
    {
        //
    }


    public function edit($id){
        $address = Address::find($id);
        return view('address.edit', compact('address', 'id'));
    }

  
    public function update(UpdateAddress $request, $id)
    {
        $customer = Customer::find($request->get('customer_id'));
        $address = Address::find($id);
        $address->street = $request->get('street');
        $address->external_number = $request->get('external_number');
        $address->internal_number = $request->get('internal_number');
        $address->between_streets = $request->get('between_streets');
        $address->postal_code = $request->get('postal_code');
        $address->neighborhood = $request->get('neighborhood');
        $address->country = $request->get('country');
        $address->state = $request->get('state');
        $address->city = $request->get('city');
        $customer->address()->save($address);

        return redirect()->route('clientes.index');
    }

    public function destroy($id)
    {
        //
    }
}
