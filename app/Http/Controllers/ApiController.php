<?php

namespace App\Http\Controllers;

use App\Models\tbl_aprendiz;
use Illuminate\Http\Request;

class ApiController extends Controller
{

    public function show($id){

        $valid = tbl_aprendiz::where('tbl_aprendiz_identificacion', $id)->count();

        if($valid>0){
            $datos = "true";

        }else{
            $datos = "nada";
        }

        return response()->json($datos);
    }



}
