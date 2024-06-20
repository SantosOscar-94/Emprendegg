<?php

namespace App\Http\Controllers;



use App\Models\Cuentas;
use Illuminate\Http\Request;

class CuentasController extends Controller
{
    public function index()
    {
      
        return view('admin.cuentas.home' );
    }

   
    public function save(Request $request)
    {
        if(!$request->ajax())
        {
            echo json_encode([
                'status'    => false,
                'msg'       => 'Intente de nuevo',
                'type'      => 'warning'
            ]);
            return;
        }
   
        $nombre_ban         = trim($request->input('nombre_ban'));
        $moneda              = trim($request->input('moneda'));
        $num_cuenta         = trim($request->input('num_cuenta'));
        $cci               = trim($request->input('cci'));
       
        $nombre_ban1         = trim($request->input('nombre_ban1'));
        $moneda1             = trim($request->input('moneda1'));
        $num_cuenta1         = trim($request->input('num_cuenta1'));
        $cci1               = trim($request->input('cci1'));

        $nombre_ban2         = trim($request->input('nombre_ban2'));
        $moneda2             = trim($request->input('moneda2'));
        $num_cuenta2        = trim($request->input('num_cuenta2'));
        $cci2              = trim($request->input('cci2'));

        $nombre_ban3        = trim($request->input('nombre_ban3'));
        $moneda3             = trim($request->input('moneda3'));
        $num_cuenta3         = trim($request->input('num_cuenta3'));
        $cci3               = trim($request->input('cci3'));

        Cuentas::insert([
            

            'nombre_ban'         => mb_strtoupper($nombre_ban),
            'moneda'            => mb_strtoupper($moneda),
            'num_cuenta'         => mb_strtoupper($num_cuenta),
            'cci'               => mb_strtoupper($cci),

            'nombre_ban1'         => mb_strtoupper($nombre_ban1),
            'moneda1'            => mb_strtoupper($moneda1),
            'num_cuenta1'         => mb_strtoupper($num_cuenta1),
            'cci1'               => mb_strtoupper($cci1),

            'nombre_ban2'         => mb_strtoupper($nombre_ban2),
            'moneda2'            => mb_strtoupper($moneda2),
            'num_cuenta2'         => mb_strtoupper($num_cuenta2),
            'cci2'               => mb_strtoupper($cci2),

            'nombre_ban3'         => mb_strtoupper($nombre_ban3),
            'moneda3'            => mb_strtoupper($moneda3),
            'num_cuenta3'         => mb_strtoupper($num_cuenta3),
            'cci3'               => mb_strtoupper($cci3)
        ]);

        echo json_encode([
            'status'    => true,
            'msg'       => 'Registro insertado correctamente',
            'type'      => 'success'
        ]);
    }

}