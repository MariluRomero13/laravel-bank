<?php

namespace App\Http\Controllers;

use App\Models\Credit;
use App\Models\Customer;
use Illuminate\Http\Request;
use App\Models\Loan;
use App\Models\Payment;
use Carbon\Carbon;
use DB;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $loans = DB::table('loans as l')
            ->join('customers as cu', 'cu.id', '=', 'l.customer_id')
            ->join('credits as c', 'c.id', '=', 'l.credit_id')
            ->join('places as p', 'p.id', '=', 'c.place_id')
            ->select(
                DB::raw(' CONCAT(cu.name ," ", cu.first_last_name ," ", cu.second_last_name) as customer'),
                'l.id as loan_id',
                'p.name as place',
                'l.years_to_pay',
                'l.payment_type',
                'l.interest_rate',
                'l.loan_amount',
                'l.total_amount_to_pay',
                'l.loan_date'
            );
        if ($request->ajax()) {

            return datatables()
                ->query($loans)
                ->addColumn('payment_type', function ($row) {
                    if ($row->payment_type == 1) {
                        $td = '<td>' . "Mensual" . '</td>';
                    } else {
                        $td = '<td>' . "Quincenal" . '</td>';
                    }
                    return $td;
                })
                ->addColumn('detalles', function ($row) {
                    $btn = '<a data-id="' . $row->loan_id . '" class="btn btn-info" href="/detalles-pagos/' . $row->loan_id . '">' .
                        "<i class='fa  fa-list'></i>"
                        . '</a>';
                    return $btn;
                })
                ->rawColumns(['payment_type', 'detalles'])
                ->toJson();
        }
        return view('prestamos.index');
    }

    function pmt($interest, $months, $loan)
    {
        $months = $months;
        $interest = $interest / 1200;
        $amount = $interest * -$loan * pow((1 + $interest), $months) / (1 - pow((1 + $interest), $months));
        return number_format($amount, 2, '.', '');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prestamos.create');
    }

    public function store(Request $request)
    {
        $calculo = $this->calcular(
            $request->get('payment_type'),
            $request->get('interest'),
            $request->get('loan_amount'),
            $request->get('years_to_pay')
        );
        $pagos = collect($calculo[0]);
        $loan = new Loan();
        $customer = Customer::find($request->get('customer_id'));
        $credit = Credit::find($request->get('credit_id'));
        $loan->customer_id = $customer->id;
        $loan->credit_id = $credit->id;
        $loan->years_to_pay = $request->get('years_to_pay');
        $loan->payment_type = $request->get('payment_type');
        $loan->interest_rate = $request->get('interest');
        $loan->loan_amount = $request->get('loan_amount');
        $loan->total_amount_to_pay = $calculo[1];
        $loan->loan_date = Carbon::now()->toDateString();
        $loan->save();
        $last_id = $loan->id;

        $pagos = collect($calculo[0])->map(function ($c) {
            return (object) $c;
        });

        for ($i = 0; $i < $pagos->count(); $i++) {
            $pago = new Payment();
            $pago->loan_id = $last_id;
            $pago->payment_number = $pagos[$i]->num_pago;
            $pago->payment_date = Carbon::parse($pagos[$i]->fecha)->format('Y/m/d');
            $pago->amount_to_pay = $pagos[$i]->cuota;
            $pago->interest = $pagos[$i]->interes;
            $pago->amortized_capital = $pagos[$i]->amortizacion;
            $pago->final_capital = $pagos[$i]->pendiente;
            $pago->save();
        }

        return view('pretsamos.index');
    }

    public function showLoansView()
    { }

    public function exportPDF()
    { }

    public function calcular($payment_type, $i, $loan_amount, $years_to_pay)
    {
        $amortizacion = Collect([]);
        $tipo_pagar = $payment_type;
        $interes = $i;
        $prestamo = $loan_amount;
        $year = $years_to_pay;
        $tipo = (0.01 * $interes) / 12;
        if ($tipo_pagar) {
            $num_pagos = 12 * $year;
        } else {
            $num_pagos = 24 * $year;
        }
        $cuota = $this->pmt($interes, $num_pagos, $prestamo);
        $INTERESES = 0;
        $TINTERESES = 0;
        $AMORTIZACION = 0;
        $TAMORTIZACION = 0;
        $TCUOTAS = 0;
        $PENDIENTE = $prestamo;

        for ($n = 0; $n <= $num_pagos; $n++) {
            $INTERESES = round($PENDIENTE * $tipo, 2);
            $TINTERESES += $INTERESES;
            $AMORTIZACION = round($cuota - $INTERESES, 2);
            $TAMORTIZACION += $AMORTIZACION;
            $PENDIENTE -= $AMORTIZACION;
            $TCUOTAS += $cuota;

            $amortizacion->push([
                'num_pago' => $n, 'fecha' => Carbon::now()->addMonths($n), 'cuota' => $cuota, 'amortizacion' => $AMORTIZACION, 'interes' => $INTERESES, 'pendiente' => $PENDIENTE
            ]);
        }
        $total_pagar = $cuota * $num_pagos;
        return [$amortizacion, $total_pagar];
    }

    public function detallesPagos($id)
    {
        $pagos = Payment::where('loan_id', '=', $id)->get();
        return view('prestamos.detalles_pagos', compact('pagos'));
    }
}
