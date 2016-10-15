<?php

use gastosadmin\Models\Items;
use Illuminate\Database\Seeder;

class ItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('items')->delete();
        $this->crearItems();
    }

    private function crearItems()
    {
        Items::create([
            'nombre' => 'Supermercado'
        ]);
        Items::create([
            'nombre' => 'Impuestos'
        ]);
        Items::create([
            'nombre' => 'Deportes'
        ]);
        Items::create([
            'nombre' => 'Escuela'
        ]);
        Items::create([
            'nombre' => 'Particular'
        ]);
        Items::create([
            'nombre' => 'Remis'
        ]);
        Items::create([
            'nombre' => 'Sube'
        ]);
        Items::create([
            'nombre' => 'Limpieza'
        ]);
        Items::create([
            'nombre' => 'Seguros'
        ]);
        Items::create([
            'nombre' => 'Entretenimiento'
        ]);
        Items::create([
            'nombre' => 'Otros'
        ]);
    }
}
