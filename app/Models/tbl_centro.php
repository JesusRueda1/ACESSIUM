<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_centro extends Model
{
    use HasFactory;
    protected $fillable = [
       'tbl_centros_codigo',
       'tbl_centros_nombre',
       'tbl_centros_subdirector',
       'tbl_centros_tbl_regionals_id',
    ];

    public function tbl_regionals(){
            return $this->belongsTo(tbl_regional::class, 'tbl_centros_tbl_regionals_id');
    }

    public function tbl_coordinacions(){
            return $this->hasMany(tbl_coordinacion::class, 'tbl_coordinacions_tbl_centros_id');
    }

    public function tbl_perfils(){
        return $this->belongsTo(tbl_perfil::class, 'id');
    }

    public function tbl_sedes(){
        return $this->hasMany(tbl_sede::class, 'id');
    }

    public function regional()
    {
        return $this->hasOne('App\Models\tbl_regional','id','tbl_centros_tbl_regionals_id');
    }

}
