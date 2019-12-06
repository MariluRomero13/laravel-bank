<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loan;
use Carbon\Carbon;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collection = Collect([]);
        $tipo_pagar = 1; //1-mesual //2-quincenal
        $interes = 5;
        $prestamo = 100000;
        $year = 25;
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

            $collection->push([
                'num_pago' => $n, 'Fecha_pago' => Carbon::now()->addMonths($n), 'cuota' => $cuota, 'amortización' => $AMORTIZACION, 'intereses' => $INTERESES, 'pendiente' => $PENDIENTE
            ]);
        }

        return $collection;
    }

    function pmt($interest, $months, $loan)
    {
        $months = $months;
        $interest = $interest / 1200;
        $amount = $interest * -$loan * pow((1 + $interest), $months) / (1 - pow((1 + $interest), $months));
        return number_format($amount, 2);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    public function calcular($prestamo, $t_pago, $interes, $years){
        $collection = Collect([]);
        $tipo_pagar = $t_pago;
        $interes = $interes;
        $prestamo = $prestamo;
        $years = $years;
        $tipo = (0.01 * $interes) / 12;
        if ($tipo_pagar == 1) {
            $num_pagos = 12 * $years;
        } else {
            $num_pagos = 24 * $years;
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

            $collection->push([
                'num_pago' => $n, 'fecha_pago' => Carbon::now()->addMonths($n), 'cuota' => $cuota, 'amortización' => $AMORTIZACION, 'intereses' => $INTERESES, 'pendiente' => $PENDIENTE
            ]);
        }
        
        return view('prestamos.tabla', compact('collection'));
    }

    public function showLoansView(){
        return view('prestamos.calcular');
    }

    public function tablaAmortizacion(){
        return view('prestamos.tabla');
    }

    public function exportPDF()
    { }
}
