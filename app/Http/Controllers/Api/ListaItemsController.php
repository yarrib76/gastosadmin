<?php

namespace GastosAdmin\Http\Controllers\Api;

use GastosAdmin\Models\Items;
use GastosAdmin\Http\Requests;
use GastosAdmin\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;

class ListaItemsController extends Controller
{
    public function query(){
      //  $listaItems = Items::all();
      //  $listaItems = $this->totalesPorItems($listaItems);
        $listaItemsTotal = new Items();
        $anio = Input::get('anio');
        $mes = Input::get('mes');
        $call = Input::get('call');
        if ($call == "full"){
            return Response::json($listaItemsTotal->itemsTotalAnioMes($anio,$mes));
        } 
        return Response::json($listaItemsTotal->itemsTotal());
    }

}
