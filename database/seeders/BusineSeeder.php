<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class BusineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $businesses =
        [
            [
                'ruc'               => '10753330459',
                'razon_social'      => 'Oscar Esliban De Los Santos Shapiama',
                'direccion'         => ' A.H. ARRIBA PERU -CAL. 37 ,Mz 9 Lote 9  , 	SAN JUAN DE LURIGANCHO',
                'codigo_pais'       => 'PE',
                'ubigeo'            => '150101',
                'telefono'          => '', 
                'url_api'           => 'https://test.mytems.cloud/', 
                'email_accounting'  => 'oscarsistemas0000@gmail.com',
                'urbanizacion'      => '',
                'local'             => '',
                'nombre_comercial'  => 'Oscar Santos',
                'usuario_sunat'     => 'HEYDI010',
                'clave_sunat'       => 'Heydi0102',
                'clave_certificado' => 'Alva123456',
                'certificado'       => '10753330459.pfx',
                'servidor_sunat'    => 3,
                'pago'              => 1
            ]
        ];

        foreach($businesses as $business)
        {
            $new_business = new \App\Models\Business();
            foreach($business as $k => $value)
            {
                $new_business->{$k} = $value;
            }

            $new_business->save();
        }
    }
}
