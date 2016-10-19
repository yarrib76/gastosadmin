<?php

namespace GastosAdmin\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Items extends Model
{
    protected $table = 'items';
    protected $fillable = ['nombre'];

    public function gastos(){
        return $this->belongsTo('GastosAdmin\Models\RegistroGastos', 'id');
    }

    public function itemsTotal(){
        return DB::select('SELECT item_id as id, items.nombre, sum(importe) as Total FROM gastosadmin.registro_gastos inner join gastosadmin.items
        on item_id = items.id group by items.nombre;');
    }
}
