<?php

namespace App\Exports;

use App\Models\tbl_coordinacion;
use Maatwebsite\Excel\Concerns\FromCollection;

class tbl_coordinacionExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return tbl_coordinacion::all();
    }
}
