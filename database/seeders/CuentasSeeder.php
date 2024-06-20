<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CuentasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cuentas =
        [
            [
                'nombre_ban'    =>'BCP', 
                'moneda'        =>'SOLES', 
                'num_cuenta'    =>'191-147878787-52', 
                'cci'           =>'192011-147878787-5278', 

                'nombre_ban1'   =>'SCOTIBANK', 
                'moneda1'       =>'SOLES', 
                'num_cuenta1'   =>'191-147878787-52', 
                'cci1'          =>'192011-147878787-5278', 

                'nombre_ban2'   =>'BCP', 
                'moneda2'       => 'DOLARES', 
                'num_cuenta2'   =>'191-147878787-52', 
                'cci2'          =>'192011-147878787-5278', 

                'nombre_ban3'   =>'CONTINENTAL', 
                'moneda3'       =>'DOLARES', 
                'num_cuenta3'   =>'191-147878787-52', 
                'cci3'          =>'192011-147878787-5278'
            ]
        ];

        foreach($cuentas as $cuenta)
        {
            $new_cuenta     = new \App\Models\Cuentas();
            foreach($cuenta as $k => $value)
            {
                $new_cuenta->{$k} = $value;
            }

            $new_cuenta->save();
        }
    }
}
