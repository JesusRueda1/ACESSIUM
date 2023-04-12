<?php

namespace App\Imports;

use App\Models\tbl_coordinacion;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class tbl_coordinacionImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new tbl_coordinacion([
            'tbl_coordinacions_codigo'      => $row['codigo_coordinacion'],
            'tbl_coordinacions_nombre'       => $row['nombre_coordinacion'],
            'tbl_coordinacions_coordinador'     =>$row['coordinador'],
            'tbl_coordinacions_tbl_centros_id'     =>$row['centro'],
         ]);
    }
}
