<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_ficha extends Model
{
    use HasFactory;
    protected $fillable = [
        'tbl_fichas_codigo',
        'tbl_fichas_grupo',
        'tbl_fichas_tbl_programas_id',
        'tbl_fichas_tbl_coordinacions',
     ];
    public function tbl_programas(){
        return $this->belongsTo(tbl_programa::class, 'tbl_fichas_tbl_programas_id');
    }

    public function tbl_coordinacions(){
        return $this->belongsTo(tbl_coordinacion::class, 'tbl_fichas_tbl_coordinacions');
    }

    public function tbl_perfils(){
        return $this->hasMany(tbl_perfil::class, 'id');
    }

}
