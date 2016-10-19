<?php

namespace GastosAdmin\Models;

use Illuminate\Database\Eloquent\Model;

class RegistroGastos extends Model
{
    protected $table = 'registro_gastos';
    protected $fillable = ['importe','observaciones', 'fecha', 'item_id'];

    public function items(){
        return $this->belongsTo('GastosAdmin\Models\Items', 'item_id');
    }

}
