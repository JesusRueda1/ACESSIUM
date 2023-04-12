<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tbl_programa extends Model
{
    use HasFactory;

    public function tbl_fichas(){
        return $this->hasMany(tbl_ficha::class, 'id');
    }
}
