<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_imagen extends Model
{
    use HasFactory;

    public function tbl_perfils(){
        return $this->belongsTo(tbl_perfil::class, 'tbl_imagen_tbl_perfil_id');
    }

}
