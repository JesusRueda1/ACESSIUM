<?php

namespace App\Exports;

use App\Models\tbl_centro;
use Maatwebsite\Excel\Concerns\FromCollection;

class tbl_centroExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return tbl_centro::all();
    }
}
