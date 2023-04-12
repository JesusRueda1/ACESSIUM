<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_tipo_identificacion extends Model
{
    use HasFactory;

    public function tbl_perfils(){
        return $this->hasMany(tbl_perfil::class, 'id');
    }

}
