<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_coordinacion extends Model
{
    protected $fillable = [
        'tbl_coordinacions_codigo',
        'tbl_coordinacions_nombre',
        'tbl_coordinacions_coordinador',
        'tbl_coordinacions_tbl_centros_id',
     ];
    use HasFactory;

    public function tbl_centros(){
        return $this->belongsTo(tbl_centro::class, 'id');
    }

    public function tbl_sedes(){
        return $this->hasMany(tbl_sede::class, 'id');
    }

    public function tbl_fichas(){
        return $this->hasMany(tbl_ficha::class, 'id');
    }

    public function tbl_perfils(){
        return $this->hasMany(tbl_perfil::class, 'id');
    }

    public function centros()
    {
        return $this->hasOne('App\Models\tbl_centro','id','tbl_coordinacions_tbl_centros_id');
    }
    public function regional()
    {
        return $this->hasOne('App\Models\tbl_regional','id','tbl_coordinacions_tbl_centros_id');
    }
}
