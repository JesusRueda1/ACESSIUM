<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class tbl_regional extends Model
{
    use HasFactory;

    protected $fillable = [
        'tbl_regionals_codigo',
        'tbl_regionals_nombre',
        'tbl_regionals_director'
    ];

    public function tbl_centros(){
        return $this->hasMany(tbl_centros::class, 'id');
    }

    public function users(){
        return $this->morphToMany(users::class, 'model', 'useables');
    }

}
