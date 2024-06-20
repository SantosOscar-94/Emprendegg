<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class WarehouseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $warehouses =
        [
            [
                'descripcion'           => 'Tienda Principal'
            ],
            [
                'descripcion'           => 'Tienda 02'
            ],
            [
                'descripcion'           => 'Tienda 03'
            ],
        ];

        foreach($warehouses as $store)
        {
            $new_store     = new \App\Models\Warehouse();
            foreach($store as $k => $value)
            {
                $new_store->{$k} = $value;
            }
            $new_store->save();
        }
    }
}
