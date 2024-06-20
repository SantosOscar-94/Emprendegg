<?php

namespace App\Imports;

use App\Models\Product;
use App\Models\StockProduct;
use App\Models\Warehouse;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProductImport implements ToModel, WithHeadingRow
{
    /**
    * @param Collection $collection
    */
    public function model(array $row)
    {
        $product                = Product::updateOrCreate([
            'codigo_interno'    => $row['codigo_interno']
        ], [
            'codigo_sunat'      => '00000000',
            'codigo_interno'    => $row['codigo_interno'],
            'codigo_barras'     => $row['codigo_barras'],
            'descripcion'       => mb_strtoupper($row['descripcion']),
            'marca'             => mb_strtoupper($row['marca']),
            'presentacion'      => mb_strtoupper($row['presentacion']),
            'idunidad'          => 61,
            'idcodigo_igv'      => 10, // 1 o 10
            'igv'               => 0, // 0 o 18
            'precio_compra'     => $row['precio_compra'],
            'precio_venta'      => $row['precio_venta'],
            'impuesto'          => 0, // 0 o 1
            'fecha_vencimiento' => !empty($row['fecha_vencimiento']) ? \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row['fecha_vencimiento']) : NULL,
            'opcion'            => ($row['tipo_producto'] == 'producto') ? 1 : 2
        ]); 

        $warehouses             = Warehouse::get();
        $stocks                 = explode(';', $row['stock']);

        foreach($warehouses as $i => $store)
        {
            StockProduct::updateOrCreate([
                'idalmacen'     => $store['id'],
                'idproducto'    => $product->id
            ],[
                'idproducto'    => $product->id,
                'idalmacen'     => $store['id'],
                'cantidad'      => $stocks[$i]
            ]);
        }
    }
}
