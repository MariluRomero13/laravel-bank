<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreCards;
use App\Models\Card;
use App\Models\Customer;
use DataTables;
use DB;

class CardController extends Controller
{
    // 1 credito, 2 debito
    public function index(Request $request){
        $cards = DB::table('cards as c')
            ->join('customers as cu', 'cu.id', '=', 'c.customer_id')
            ->select(
                DB::raw(' CONCAT(cu.name ," ", cu.first_last_name ," ", cu.second_last_name) as customer'),
                'c.card_number as id',
                'c.card',
                'c.card_type',
                'c.expiration_date',
                'c.status'
            );
        
        if($request->ajax()){
            return datatables($cards)
                ->addColumn('card', function($row){
                    if($row->card == 1){
                        $td = '<td>Credito</td>';
                    } else{
                        $td = '<td>Debito</td>';
                    }
                    return $td;
                })
                ->addColumn('card_type', function($row){
                    switch($row->card_type){
                        case 1:
                            $td = '<td>MasterCard</td>';
                            break;
                        case 2:     
                            $td = '<td>Visa</td>';
                            break;
                        case 3: 
                            $td = '<td>American Express</td>';
                            break;
                        case 4: 
                            $td = '<td>Carnet</td>';
                            break;
                    }
                    return $td;
                    
                })
                ->addColumn('status', function ($row) {
                    if ($row->status) {
                        $btn = '<a data-id="' . $row->id . '" class="btn btn-success delete" data-target="' . $row->status . '">' .
                            "<i class='fa fa-check'></i>"
                            . '</a>';
                    } else {
                        $btn = '<a data-id="' . $row->id . '" class="btn btn-danger delete" data-target="' . $row->status . '">' .
                            "<i class='fa fa-close'></i>"
                            . '</a>';
                    }

                    return $btn;
                })
                ->rawColumns(['card', 'card_type', 'status'])
                ->toJson();
                
        }
        return view('cards.index');
    }

    public function create(){
        $customers = Customer::all();
        return view('cards.create', compact('customers'));
    }

    public function store(StoreCards $request){
        $n1 = rand(); 
        $n2 = rand(); 
        $n = $n1.$n2;
        
        $card = new Card();
        $customer = Customer::find($request->get('customer_id'));
        $card->card_number = $n;
        $card->card = $request->get('card');
        $card->expiration_date = $request->get('expiration_date');
        $card->card_type = $request->get('card_type');
        $customer->card()->save($card);
        return redirect()->route('tarjetas.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        $card = Card::find($id);
        $card->status = !$card->status;
        $card->save();
        return response()->json([
            'success' => 'card deleted',
            'status' => $card->status
        ]);
    }
}
