<!---msjs de aprendiz valido-->
<style>
    .perfilinput22 {
        width: 80%;
        border: 0;
        outline: 0px;
        border-bottom: 1px solid rgb(3, 3, 3);
        background: transparent;
        outline: none;
        border-radius: 4px;
        margin-top: 20px;
        margin-bottom: 30px;
        display: flex;
        text-align: center;

    }

    .conteni {
        text-align: center;
        margin: 24px 0 12px 0;
        float: left;
    }

    img.avatar {
        margin-top: 20px;
        width: 60%;
        border-radius: 50%;
    }

    .card-body12 {
        Width: 80%;
        height: 100%;
        color: #1f5c00;
        align-items: center;

    }
</style>

<div class="alert fade show " role="alert" align="center" style="display: none;" name="Divmovimiento" id="Divmovimiento">

    <div class="row card-body12  shadow-lg p-3 mb-5 bg-body rounded col-md-2 ">
        <div class="row align-items-star">
            <!--COLUMNA 1 -->
            <div>
                <h1 style="color: red; display: none;" name="h1salida">SE REGISTRO UNA SALIDA</h1>
                <h1 style="color: green; display: none;" name="h1entrada">SE REGISTRO UNA ENTRADA</h1>
            </div>
            <!--COLUMNA 1-->
            <div class="col">
                <div class="col-lg-12 col-md-12">
                    <label for="" class=" form-label">Tipo de documento</label>
                    <input type="text" class="  perfilinput22 " id="tbl_perfil_tbl_tipo_identificacions_id"
                        value="" disabled>

                </div>
                <div class="col-lg-12 col-md-12">
                    <label for="validationCustom01" class="form-label">Nombres</label>
                    <input type="text" class="  perfilinput22  " id="tbl_perfil_nombres" value="" autocomplete
                        disabled>

                </div>
                <div class="col-lg-12 col-md-12">
                    <label for="" class="form-label">T. de personal</label>
                    <input type="text" class="  perfilinput22  " id="tbl_perfil_tbl_tipo_personals_id" value=""
                        disabled>

                </div>
                <div class="col-lg-12 col-md-12">
                    <label for="" class="form-label">Programa</label>
                    <input type="text" class=" perfilinput22 " id="programa" value="" placeholder="" disabled>
                </div>

                <div class="col-lg-12 col-md-12">
                    <label for="" class="form-label">Ficha</label>
                    <input type="text" class="  perfilinput22  " id="tbl_perfil_tbl_fichas_id"
                        name="tbl_perfil_tbl_fichas_id" value="" disabled>
                </div>

            </div>

            <!--COLUMNA 2 -->
            <div class="col">
                <div class="col-lg-12 col-md-12">
                    <label for="validationCustom02" class="form-label">Nº de identificación</label>
                    <input type="text" class="  perfilinput22  " id="tbl_perfil_idenficacion" value=""
                        disabled>
                </div>
                <div class="col-lg-12 col-md-12">
                    <label for="validationCustom02" class="form-label">Apellidos</label>
                    <input type="text" class="  perfilinput22  " id="tbl_perfil_apellidos" value=""
                        autocomplete disabled>
                </div>
                {{-- <div class="col-lg-12 col-md-12">
                                <label for="" class="form-label">Coordinacion</label>
                                @php
                                    $coordinacion = $list->tbl_sedes->tbl_coordinacions;
                                    $nombre = $coordinacion['tbl_coordinacions_nombre'];
                                @endphp
                                    <input type="text" class="  perfilinput22  " id="" size="70"
                                        value="{{ $nombre }}" disabled>
                            </div> --}}

                <div class="col-lg-12 col-md-12">
                    <label for="" class="form-label">Centro</label>
                    <input type="text" class=" perfilinput22 " id="tbl_perfil_tbl_centros_id" value=""
                        disabled>
                </div>
                <div class="col-lg-12 col-md-12">
                    <label for="" class="form-label">Regional</label>
                    <input type="text" class="  perfilinput22 " id="regional" size="70" value=""
                        disabled>

                </div>
            </div>


            <!--COLUMNA 3 -->
            <div class="col">
                <div class="clearfix">
                    <div class="col-lg-12 col-md-12">
                        <img id="avatar" class="img-responsive avatar" src="" alt="">
                    </div>
                    <br><br><br>
                    <h1 class="text-center" name=""></h1>
                </div>
            </div>
        </div>
    </div>
</div>

<!---msjs de fallida-->
<div class="alert fade show " role="alert" align="center" style="display: none;" name="Divmovimiento_no"
    id="Divmovimiento_no">
    <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong> ¡Usuario no encontrado! </strong>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
</div>
