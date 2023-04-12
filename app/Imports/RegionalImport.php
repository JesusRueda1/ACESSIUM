<?php

namespace App\Imports;

use App\Models\tbl_regional;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
  
class RegionalImport implements ToModel, WithHeadingRow
{

    public function model(array $row)
    {
        return new tbl_regional([
           'tbl_regionals_codigo'      => $row['codigo'],
           'tbl_regionals_nombre'       => $row['nombre'],
           'tbl_regionals_director'     =>$row['director'],
        ]);
    }
}
