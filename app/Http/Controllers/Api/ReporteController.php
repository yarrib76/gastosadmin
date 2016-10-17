<?php

namespace GastosAdmin\Http\Controllers\Api;

use GastosAdmin\Models\RegistroGastos;
use Illuminate\Http\Request;

use GastosAdmin\Http\Requests;
use GastosAdmin\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ReporteController extends Controller
{
    public function query(){
        $gastos = RegistroGastos::all()->load('items');
        $gastos = $this->formateoDatos($gastos);
        return Response::json($gastos);
    }

    public function queryMenAnual(){
        $anio = Input::get('anio');
        $anio = '2016';
        $mesesPagos = [];
        $gastos = RegistroGastos::selectRaw('DATE_FORMAT(fecha, "%m-%Y") AS Month,sum(importe) as sum, fecha')
            ->where('fecha', '>=' , $anio . '/01/01')
            ->where('fecha', '<=', $anio . '/12/31')
            ->groupBy('month')
            ->get();
        $mesesPagos = $this->initMesesPagos($mesesPagos);
        $mesesPagos = $this->obtengoSumPorMeses($gastos,$mesesPagos);
        return $mesesPagos;
    }
    private function formateoDatos($gastos)
    {
        $respuesta = [];
        $x = 0;
        foreach ($gastos as $gasto){
            $respuesta[$x] = ['id' => $gasto->id,'item' => $gasto['items']->nombre,
                'importe' => $gasto->importe, 'observaciones' => $gasto->observaciones,
                'fecha' => date('d-m-Y',strtotime($gasto->fecha))];
            $x++;
        }
        return $respuesta;
    }

    private function obtengoSumPorMeses($gastos,$mesesPagos){
        $totalAnual = 0;
        foreach ($gastos as $gasto){
            $mes = date('m',strtotime($gasto['fecha']));
            switch ($mes) {
                Case 1:
                    $mesesPagos[1] = ['Total' => $gasto['sum']];
                    $totalAnual = $totalAnual + $gasto['sum'];
                    break;
                Case 2:
                    $mesesPagos[2] = ['Total' => $gasto['sum']];
                    $totalAnual = $totalAnual + $gasto['sum'];
                    break;
                Case 3:
                    $mesesPagos[3] = ['Total' => $gasto['sum']];
                    $totalAnual = $totalAnual + $gasto['sum'];
                    break;
                Case 4:
                    $mesesPagos[4] = ['Total' => $gasto['sum']];
                    $totalAnual = $totalAnual + $gasto['sum'];
                    break;
                Case 5:
                    $mesesPagos[5] = ['Total' => $gasto['sum']];
                    $totalAnual = $totalAnual + $gasto['sum'];
                    break;
                Case 6:
                    $mesesPagos[6] = ['Total' => $gasto['sum']];
                    $totalAnual = $totalAnual + $gasto['sum'];
                    break;
                Case 7:
                    $mesesPagos[7] = ['Total' => $gasto['sum']];
                    $totalAnual = $totalAnual + $gasto['sum'];
                    break;
                Case 8:
                    $mesesPagos[8] = ['Total' => $gasto['sum']];
                    $totalAnual = $totalAnual + $gasto['sum'];
                    break;
                Case 9:
                    $mesesPagos[9] = ['Total' => $gasto['sum']];
                    $totalAnual = $totalAnual + $gasto['sum'];
                    break;
                Case 10:
                    $mesesPagos[10] = ['Total' => $gasto['sum']];
                    $totalAnual = $totalAnual + $gasto['sum'];
                    break;
                Case 11:
                    $mesesPagos[11] = ['Total' => $gasto['sum']];
                    $totalAnual = $totalAnual + $gasto['sum'];
                    break;
                Case 12:
                    $mesesPagos[12] = ['Total' => $gasto['sum']];
                    $totalAnual = $totalAnual + $gasto['sum'];
                    break;
            }
        }
        $mesesPagos[13] = ['TotalAnual' => $totalAnual];
        return $mesesPagos;
    }

    private function initMesesPagos($mesesPagos)
    {
        for ($i = 1; $i <= 12; $i++ ){
            $mesesPagos[$i] = ['Total' => 0];
        }
        return $mesesPagos;
    }

}
