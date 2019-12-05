<?php

/*
 * Taken from
 * https://github.com/laravel/framework/blob/5.3/src/Illuminate/Auth/Console/stubs/make/controllers/HomeController.stub
 */

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use Auth;
use App\Models\Address;
use App\Models\Card;
use App\Models\Credit;
use App\Models\Customer;
use App\Models\Loan;

/**
 * Class HomeController
 * @package App\Http\Controllers
 */
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Response
     */
    public function index()
    {
        $user = Auth::user()->role_id;
        if ($user == 2) {
            $customer = Customer::where('user_id', Auth::user()->id)->first();
            $loans = Loan::where('customer_id', '=', $customer->id)->count();
            $cards =  Card::where('customer_id', '=', $customer->id)->count();
            $credits =  Credit::where('customer_id', '=', $customer->id)->count();
            $adresses = Address::where('customer_id', $customer->id)->get();
            return view('vendor.adminlte.home', compact('cards', 'credits', 'loans', 'customer', 'adresses'));
        } else {
            $customers = Customer::count();
            $loans = Loan::count();
            $credits = Credit::count();
            $cards = Card::count();
            return view('adminlte::home', compact('customers', 'loans', 'credits', 'cards'));
        }
    }
}
