<?php

namespace App\Http\Controllers;

use App\Models\tbl_imagen;
use App\Models\tbl_perfil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class TblImagenController extends Controller
{
    public function userfk(){
        $email = Auth::user()->email;
        $user = User::where('email', '=', $email)->firstOrFail();
        $name = $user->name;
        $ide = $user->id; 
        $perfile = tbl_perfil::where('tbl_perfil_nombres', '=', $name)->firstOrFail();
    }

    public function index(){

        $total = tbl_imagen::all()->count();
        $imagenes = tbl_imagen::all();
        return view('imagenes.index', compact('total', 'imagenes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(request $request)
    {
    

        $request->validate([
            'path' => 'required',
            'tbl_imagen_tbl_perfil_id' => 'required'
        ]);

        return DB::transaction(function () use ($request){
            $datos = $request->except('_token');

        $perfil = tbl_perfil::find($request->get('tbl_imagen_tbl_perfil_id')); 
        

            if($request->hasFile('path')){
                if($perfil->tbl_imagens != null){
                    Storage::disk('images')->delete($perfil->tbl_imagens->path);
                    $perfil->tbl_imagens->delete();
                    $datos['path'] = $request->file('path')->store('users', 'images');
                    tbl_imagen::insert($datos);
                    return redirect()->back()->with('vlimagen', '¡Imagen editada con exito');
                }
                else
                {
                    $datos['path'] = $request->file('path')->store('users', 'images');
                    tbl_imagen::insert($datos);
                    return redirect()->back()->with('vlimagen', '¡Imagen guardada con exito');
                }
            }
            else
            {
                dd('error');
            }

        }, 5);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tbl_imagen  $tbl_imagen
     * @return \Illuminate\Http\Response
     */
    public function show(tbl_imagen $tbl_imagen)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tbl_imagen  $tbl_imagen
     * @return \Illuminate\Http\Response
     */
    public function edit(tbl_imagen $tbl_imagen)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tbl_imagen  $tbl_imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tbl_imagen $tbl_imagen)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tbl_imagen  $tbl_imagen
     * @return \Illuminate\Http\Response
     */
    public function destroy($tbl_imagen)
    {

    }
}
