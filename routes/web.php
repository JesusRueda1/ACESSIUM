<?php
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Http\Controllers\TblRegionalController;
use App\Http\Controllers\TblCentroController;
use App\Http\Controllers\TblCoordinacionController;
use App\Http\Controllers\TblSedeController;
use App\Http\Controllers\TblPerfilController;
use App\Http\Controllers\TblTipoPersonalController;
use App\Http\Controllers\TblTipoIdentificacionController;
use App\Http\Controllers\TblProgramaController;
use App\Http\Controllers\TblFichaController;
use App\Http\Controllers\UseableController;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RolController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TblImagenController;
use App\Http\Controllers\RegistrosController;

use App\Http\Controllers\MovimientosController;
use App\Http\Controllers\ApiController;

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('auth.Login');
});

Route::get('/carnet', function () {
    return view('Perfil.carnet');
})->middleware('auth'); 
/* Route::get('/carnet', [TblPerfilController::class, 'index'])->name('carnet'); */

Route::get('dashboard', function () {
    return view('dashboard');
})->middleware('auth');

Route::get('/perfiles', function () {
    return view('Perfil.index');
})->middleware('auth');


Route::put('/usuario/update/perfil/{id}', [UserController::class, 'contraseña_update'])->name('UpdateContraseña');

/* AJAX */
Route::post('/getSedes', [TblPerfilController::class, 'getSedes'])->name('getSedes');
Route::get('/getperfiles', [ApiController::class, 'getPerfiles'])->name('getperfiles');


/* Registros Dashboard */
Route::get('/RFyC', [RegistrosController::class, 'indexFyC'])->name('indexFyC');


/* Login y Register */
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

/* Crud Roles */
Route::get('/roles', [RolController::class, 'index'])->name('indexRol');
Route::get('/rol/create', [RolController::class, 'create'])->name('GuardarRol');
Route::post('/rol/create', [RolController::class, 'store'])->name('StoreRol');
Route::delete('/roles/delete/{id}', [RolController::class, 'destroy'])->name('BorrarRol');
Route::get('/roles/update/{id}', [RolController::class, 'edit'])->name('EditarRol');
Route::patch('/roles/update/{id}', [RolController::class, 'update'])->name('UpdateRol');

/* Crud Regional */
Route::get('/regional', [TblRegionalController::class, 'index'])->name('indexRegional');
Route::post('/regional', [TblRegionalController::class, 'create'])->name('GuardarRegional');
Route::delete('/regional/delete/{id}', [TblRegionalController::class, 'destroy'])->name('BorrarRegional');
Route::put('/regional/update/{id}', [TblRegionalController::class, 'update'])->name('EditarRegional');
Route::get('tblregional/export/', [TblRegionalController::class, 'export'])->name('Regional/Exportar'); //exportar
Route::post('/regional/import', 'App\Http\Controllers\TblRegionalController@import')->name('Regional/Importar');
Route::view('Regional/import', 'Regional/import')->name('regional/Import');
/* Crud Centro */
Route::get('/centro', [TblCentroController::class, 'index'])->name('indexCentro');
Route::post('/centro', [TblCentroController::class, 'create'])->name('GuardarCentro');
Route::delete('/centro/delete/{id}', [TblCentroController::class, 'destroy'])->name('BorrarCentro');
Route::put('/centro/update/{id}', [TblCentroController::class, 'update'])->name('EditarCentro');
Route::post('/tbl_centro/import', 'App\Http\Controllers\TblCentroController@import')->name('tbl_centro/Importar');
Route::view('centro/import', 'centro/import')->name('Centro/Import');
Route::get('centro/export/', [tblCentroController::class, 'export'])->name('Centro/Export'); //exportar
/* Crud Users */
Route::get('/user', [UserController::class, 'index'])->name('indexUser');
Route::get('/user/create', [UserController::class, 'create'])->name('GuardarUser');
Route::post('/user/create', [UserController::class, 'store'])->name('StoreUser');
Route::delete('/user/delete/{id}', [UserController::class, 'destroy'])->name('BorrarUser');
Route::get('/user/update/{id}', [UserController::class, 'edit'])->name('EditarUser');
Route::patch('/user/update/{id}', [UserController::class, 'update'])->name('UpdateUser');
Route::get('user/export/', [UserController::class, 'export'])->name('Users/Exportar'); //exportar

/* Crud Coordinacion */
Route::get('/coordinacion', [TblCoordinacionController::class, 'index'])->name('indexCoordinacion');
Route::post('/coordinacion', [TblCoordinacionController::class, 'create'])->name('GuardarCoordinacion');
Route::delete('/coordinacion/delete/{id}', [TblCoordinacionController::class, 'destroy'])->name('BorrarCoordinacion');
Route::put('/coordinacion/update/{id}', [TblCoordinacionController::class, 'update'])->name('EditarCoordinacion');
Route::get('coordinacion/export/', [TblCoordinacionController::class, 'export'])->name('Coordinacion/Exportar'); //exportar
Route::post('/coordinacion/import', 'App\Http\Controllers\TblCoordinacionController@import')->name('tbl_coordinacion/Importar');
Route::view('Coordiacion/import', 'Coordinacion/import')->name('Coordinacion/Import'); //vistaCoordinacion/Import
/* Crud Sede */
Route::get('/sede', [TblSedeController::class, 'index'])->name('indexSede');
Route::post('/sede', [TblSedeController::class, 'create'])->name('GuardarSede');
Route::delete('/sede/delete/{id}', [TblSedeController::class, 'destroy'])->name('BorrarSede');
Route::put('/sede/update/{id}', [TblSedeController::class, 'update'])->name('EditarSede');

/* Crud Perfil */
Route::get('/perfil', [TblPerfilController::class, 'index'])->name('indexPerfil');
Route::post('/perfil', [TblPerfilController::class, 'create'])->name('GuardarPerfil');
Route::delete('/perfil/delete/{id}', [TblPerfilController::class, 'destroy'])->name('BorrarPerfil');
Route::put('/perfil/update/{id}', [TblPerfilController::class, 'update'])->name('EditarPerfil');
Route::put('/perfil/actualizar/{id}', [TblPerfilController::class, 'updateperfil'])->name('ActualizarPerfil');
Route::post('/importar', [TblPerfilController::class, 'importperfil'])->name('Importar.perfiles'); //importar
Route::get('tblperfil/export/', [TblPerfilController::class, 'export'])->name('Perfiles/Exportar'); //exportar

/* Crud Tipo Personal */
Route::get('/tipoP', [TblTipoPersonalController::class, 'index'])->name('indexTipoP');
Route::post('/tipoP', [TblTipoPersonalController::class, 'create'])->name('GuardarTipoP');
Route::delete('/tipoP/delete/{id}', [TblTipoPersonalController::class, 'destroy'])->name('BorrarTipoP');
Route::put('/tipoP/update/{id}', [TblTipoPersonalController::class, 'update'])->name('EditarTipoP');

/* Crud Tipo Identificacion */
Route::get('/tipoI', [TblTipoIdentificacionController::class, 'index'])->name('indexTipoI');
Route::post('/tipoI', [TblTipoIdentificacionController::class, 'create'])->name('GuardarTipoI');
Route::delete('/tipoI/delete/{id}', [TblTipoIdentificacionController::class, 'destroy'])->name('BorrarTipoI');
Route::put('/tipoI/update/{id}', [TblTipoIdentificacionController::class, 'update'])->name('EditarTipoI');

/* Crud Programa */
Route::get('/programa', [TblProgramaController::class, 'index'])->name('indexPrograma');
Route::post('/programa', [TblProgramaController::class, 'create'])->name('GuardarPrograma');
Route::delete('/programa/delete/{id}', [TblProgramaController::class, 'destroy'])->name('BorrarPrograma');
Route::put('/programa/update/{id}', [TblProgramaController::class, 'update'])->name('EditarPrograma');

/* Crud Ficha */
Route::get('/ficha', [TblFichaController::class, 'index'])->name('indexFicha');
Route::post('/ficha', [TblFichaController::class, 'create'])->name('GuardarFicha');
Route::delete('/ficha/delete/{id}', [TblFichaController::class, 'destroy'])->name('BorrarFicha');
Route::put('/ficha/update/{id}', [TblFichaController::class, 'update'])->name('EditarFicha');
Route::post('/ficha/import', 'App\Http\Controllers\TblFichaController@import')->name('Ficha/Importar');
Route::view('Fichas/import', 'Fichas/import')->name('Fichas/Import'); //vista

/* Movimientos */
Route::get('/movimientos', [MovimientosController::class, 'index'])->name('indexMovimientos');
Route::post('/movimientos', [MovimientosController::class, 'create'])->name('GuardarMovimientos');

/* imagenes */
Route::get('/imagenes', [TblImagenController::class, 'index'])->name('indexImagenes');
Route::post('/imagenes', [TblImagenController::class, 'create'])->name('GuardarFoto');
Route::put('/imagenes/update/{id}', [TblImagenController::class, 'edit'])->name('EditarImagen');
Route::delete('/imagenes/delete/{id}', [TblImagenController::class, 'destroy'])->name('BorrarImagen');
