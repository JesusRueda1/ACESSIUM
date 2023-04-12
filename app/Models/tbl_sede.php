<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_sede extends Model
{
    use HasFactory;

    public function tbl_coordinacions(){
        return $this->belongsTo(tbl_coordinacion::class, 'tbl_sedes_tbl_coordinacions_id');
    }

    public function tbl_centros(){
        return $this->belongsTo(tbl_centro::class, 'tbl_sedes_tbl_centros_id');
    }

    public function tbl_perfils(){
        return $this->hasMany(tbl_perfil::class, 'id');
    }

}
