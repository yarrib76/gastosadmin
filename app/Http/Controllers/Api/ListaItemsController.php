<?php

namespace GastosAdmin\Http\Controllers\Api;

use GastosAdmin\Models\Items;
use GastosAdmin\Http\Requests;
use GastosAdmin\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Response;

class ListaItemsController extends Controller
{
    public function query(){
      //  $listaItems = Items::all();
      //  $listaItems = $this->totalesPorItems($listaItems);
        $listaItemsTotal = new Items();
        return Response::json($listaItemsTotal->itemsTotal());
    }

}
