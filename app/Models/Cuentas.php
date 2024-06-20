<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cuentas extends Model
{
    use HasFactory;
    protected $table        = 'cuentas';
    protected $primaryKey   = 'id';

    protected $fillable     =
    [
        'nombre_ban'.
        'moneda',
        'num_cuenta',
        'cci',

        'nombre_ban1'.
        'moneda1',
        'num_cuenta1',
        'cci1',

        'nombre_ban2'.
        'moneda2',
        'num_cuenta2',
        'cci2',

        'nombre_ban3'.
        'moneda3',
        'num_cuenta3',
        'cci3',
    ];
}
