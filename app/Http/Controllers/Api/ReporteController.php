<?php

namespace GastosAdmin\Http\Controllers\Api;

use GastosAdmin\Models\RegistroGastos;
use Illuminate\Http\Request;

use GastosAdmin\Http\Requests;
use GastosAdmin\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class ReporteController extends Controller
{
    public function query(){
        $gastos = RegistroGastos::all()->load('items');
        $gastos = $this->formateoDatos($gastos);
        return Response::json($gastos);
    }

    private function formateoDatos($gastos)
    {
        $respuesta = [];
        $x = 0;
        foreach ($gastos as $gasto){
            $respuesta[$x] = ['id' => $gasto->id,'item' => $gasto['items']->nombre,
                'importe' => $gasto->importe, 'observaciones' => $gasto->observaciones,
                'fecha' => date('d-m-Y',strtotime($gasto->created_at))];
            $x++;
        }
        return $respuesta;
    }
}
