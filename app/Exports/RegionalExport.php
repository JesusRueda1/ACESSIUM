<?php

namespace App\Exports;

use App\Models\tbl_regional;
use Maatwebsite\Excel\Concerns\FromCollection;

class RegionalExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return tbl_regional::all();
    }
}
