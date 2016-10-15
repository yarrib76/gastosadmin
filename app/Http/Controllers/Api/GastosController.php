<?php

namespace GastosAdmin\Http\Controllers\Api;

use GastosAdmin\Models\RegistroGastos;
use GastosAdmin\Http\Requests;
use GastosAdmin\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class GastosController extends Controller
{
    public function create(){
        RegistroGastos::create([
            'item_id' => Input::get('item_id'),
            'importe' => Input::get('importe'),
            'observaciones' => Input::get('observaciones')
        ]);
    }

    public function delete(){
        $gastos = RegistroGastos::find(Input::get('id'));
        $gastos->delete();
    }
}
