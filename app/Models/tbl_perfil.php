<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_perfil extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tbl_perfil_tbl_tipo_identificacions_id',
        'tbl_perfil_idenficacion',
        'tbl_perfil_nombres',
        'tbl_perfil_apellidos',
        'tbl_perfil_celular',
        'tbl_perfil_ciudad_Residencia',
        'tbl_perfil_direccion',
        'tbl_perfil_vacuna',
        'tbl_perfil_RH',
        'tbl_perfil_estado_civil',
        'tbl_perfil_sexo',
        'tbl_perfil_estado',
        'tbl_perfil_tbl_coordinacion_id',
        'tbl_perfil_tbl_fichas_id',
        'tbl_perfil_tbl_tipo_personals_id',
        'tbl_perfil_tbl_centros_id',
        'tbl_perfil_user_id',
    ];


    public function tbl_tipo_identificacions(){
        return $this->belongsTo(tbl_tipo_identificacion::class, 'tbl_perfil_tbl_tipo_identificacions_id');
    }

    public function tbl_tipo_personals(){
        return $this->belongsTo(tbl_tipo_personal::class, 'tbl_perfil_tbl_tipo_personals_id');
    }

    public function tbl_centros(){
        return $this->belongsTo(tbl_centro::class, 'tbl_perfil_tbl_centros_id');
    }

    public function tbl_fichas(){
        return $this->belongsTo(tbl_ficha::class, 'tbl_perfil_tbl_fichas_id');
    }

    public function tbl_coordinacions(){
        return $this->belongsTo(tbl_coordinacion::class, 'tbl_perfil_tbl_coordinacion_id');
    }

    public function users(){
        return $this->belongsTo(user::class, 'id');
    }

    public function tbl_imagens(){
        return $this->hasOne(tbl_imagen::class, 'tbl_imagen_tbl_perfil_id');
    }

    public function tbl_sedes(){
        return $this->belongsTo(tbl_sede::class, 'tbl_perfil_tbl_sedes_id');
    }

    public function coordinacion()
    {
        return $this->hasOne('App\Models\tbl_coordinacion','id','tbl_perfil_tbl_coordinacion_id');
    }

}
