<?php

namespace App\Exports;

use App\Models\tbl_perfil;
use Maatwebsite\Excel\Concerns\FromCollection;

class PerfilesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return tbl_perfil::all();
    }
}
