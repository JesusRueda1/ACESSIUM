<div class="modal fade" id="formularioCrear" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agregar Perfil</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                {{-- formulario --}}
                <form action="{{ route('GuardarPerfil') }}" method="POST" name="form-data"
                    class="row needs-validation" novalidate>
                    @csrf
                    <div class="col-6">
                        <label for="tbl_perfil_tbl_tipo_identificacions_id" class="form-label">Tipo de
                            identificación</label>
                        <select name="tbl_perfil_tbl_tipo_identificacions_id"
                            id="tbl_perfil_tbl_tipo_identificacions_id" class="form-select"
                            aria-label="Default select example" required>
                            <option value=""></option>
                            @foreach ($tipoI as $list)
                                <option value="{{ $list->id }}">{{ $list->tbl_tipo_identificacions_nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="tbl_perfil_idenficacion" class="form-label">Nº Identificacion</label>
                        <input type="number" class="form-control" id="tbl_perfil_idenficacion"
                            name="tbl_perfil_idenficacion" required pattern="[0-9]+">
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-md-12">
                        <label for="tbl_perfil_nombres" class="form-label">Nombres</label>
                        <input type="text" class="form-control" id="tbl_perfil_nombres"
                            name="tbl_perfil_nombres" required onkeypress="return SoloLetras(event);" maxlength="30">
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-md-12">
                        <label for="tbl_perfil_apellidos" class="form-label">Apellidos</label>
                        <input type="text" class="form-control" id="tbl_perfil_apellidos"
                            name="tbl_perfil_apellidos" required onkeypress="return SoloLetras(event);">
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-md-12">
                        <label for="email" class="form-label">Correo</label>
                        <input type="email" class="form-control" id="email"
                            name="email" required>
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-md-6">
                        <label for="tbl_perfil_ciudad_Residencia" class="form-label">Ciudad de Residencia</label>
                        <input type="text" class="form-control" id="tbl_perfil_ciudad_Residencia"
                            name="tbl_perfil_ciudad_Residencia" onkeypress="return SoloLetras(event);">
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-md-6">
                        <label for="tbl_perfil_direccion" class="form-label">Dirección</label>
                        <input type="text" class="form-control" id="tbl_perfil_direccion"
                            name="tbl_perfil_direccion">
                        <div class="valid-feedback"></div>
                    </div>

                    <div class="col-md-6">
                        <label for="tbl_perfil_celular" class="form-label">Celular</label>
                        <input type="number" class="form-control" id="tbl_perfil_celular"
                            name="tbl_perfil_celular" pattern="[0-9]+">
                        <div class="invalid-feedback">Completa los datos</div>
                    </div>
                    <div class="col-6">
                        <label for="tbl_perfil_sexo" class="form-label">Sexo</label>
                        <select name="tbl_perfil_sexo" id="tbl_perfil_sexo"
                            class="form-select" aria-label="Default select example">
                            <option value=""></option>
                            <option value="Masculino">Masculino</option>
                            <option value="Femenino">Femenino</option>
                            <option value="Prefiero no decirlo">Prefiero no decirlo</option>
                        </select><br>
                    </div>
                    <div class="col-4">
                        <label for="tbl_perfil_vacuna" class="form-label">Vacuna Covid-19</label>
                        <select name="tbl_perfil_vacuna" id="tbl_perfil_vacuna"
                            class="form-select" aria-label="Default select example">
                            <option value=""></option>
                            <option value="Si">Si</option>
                            <option value="No">No</option>
                        </select><br>
                    </div>
                    <div class="col-4">
                        <label for="tbl_perfil_RH" class="form-label">RH</label>
                        <select name="tbl_perfil_RH" id="tbl_perfil_RH"
                            class="form-select" aria-label="Default select example">
                            <option value=""></option>
                            <option value="A+">A+</option>
                            <option value="A-">A-</option>
                            <option value="B+">B+</option>
                            <option value="B-">B-</option>
                            <option value="AB+">AB+</option>
                            <option value="AB-">AB-</option>
                            <option value="O+">O+</option>
                            <option value="O-">O-</option>
                        </select><br>
                    </div>
                    <div class="col-4">
                        <label for="tbl_perfil_Estado_civil" class="form-label">Estado Civil</label>
                        <select name="tbl_perfil_Estado_civil" id="tbl_perfil_Estado_civil"
                            class="form-select" aria-label="Default select example">
                            <option value=""></option>
                            <option value="Soltero/a">Soltero/a</option>
                            <option value="Casado/a">Casado/a</option>
                            <option value="Union libre">Union Libre</option>
                        </select><br>
                    </div>
                    <div class="col-6">
                        <label for="tbl_perfil_tbl_tipo_personals_id" class="form-label">Tipo de Personal</label>
                        <select name="tbl_perfil_tbl_tipo_personals_id" id="tbl_perfil_tbl_tipo_personals_id"
                            class="form-select" aria-label="Default select example" required>
                            <option value=""></option>
                            @foreach ($tipoP as $list)
                                <option value="{{ $list->id }}">{{ $list->tbl_tipo_personals_nombre }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Selecciones un campo</div>
                    </div>

                    <div class="col-6">
                        <label for="roles" class="form-label">Rol</label>
                        <select name="roles" id="roles"
                            class="form-select" aria-label="Default select example" required>
                            <option value=""></option>
                            @foreach ($roles as $list)
                                <option value="{{$list->name}}">{{ $list->name }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Selecciones un campo</div>
                    </div>
                    <div class="col-6">
                        <label for="tbl_perfil_estado" class="form-label">Estado</label>
                        <select name="tbl_perfil_estado" id="tbl_perfil_estado"
                            class="form-select" aria-label="Default select example">
                            <option value="Activo">Activo</option>
                            <option value="Inactivo">Inactivo</option>
                            <option value="Bloqueado">Bloqueado</option>
                        </select><br>
                    </div>

                    <div class="col-6">
                        <label for="tbl_perfil_tbl_fichas_id" class="form-label">Ficha</label>
                        <select name="tbl_perfil_tbl_fichas_id" id="tbl_perfil_tbl_fichas_id"
                            class="form-select" aria-label="Default select example">
                            <option value=""></option>
                            @foreach ($fichas as $list)
                                <option value="{{ $list->id }}">{{ $list->tbl_fichas_codigo }} -
                                    {{ $list->tbl_fichas_grupo }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Selecciones un campo</div>
                        <br>
                    </div>

                    <div class="col-6">
                        <label for="tbl_perfil_tbl_centros_id" class="form-label">Centros</label>
                        <select name="tbl_perfil_tbl_centros_id" id="tbl_perfil_tbl_centros_id"
                            class="form-select" aria-label="Default select example" required>
                            <option value=""></option>
                            @foreach ($centros as $list)
                                <option value="{{ $list->id }}">{{ $list->tbl_centros_nombre }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Selecciones un campo</div>
                        <br>
                    </div>

                    <div class="col-6">
                        <label for="tbl_perfil_tbl_sedes_id" class="form-label">Sedes</label>
                        <select name="tbl_perfil_tbl_sedes_id" id="tbl_perfil_tbl_sedes_id"
                            class="form-select" aria-label="Default select example">
                            <option value=""></option>

                        </select>
                        <br>
                    </div>

                    <div class="col-12">
                        <label for="tbl_perfil_tbl_coordinacion_id" class="form-label">Coordinacion</label>
                        <select name="tbl_perfil_tbl_coordinacion_id" id="tbl_perfil_tbl_coordinacion_id"
                            class="form-select" aria-label="Default select example" required>
                            <option value=""></option>
                            @foreach ($coordinaciones as $list)
                                <option value="{{ $list->id }}">{{ $list->tbl_coordinacions_nombre }}</option>
                            @endforeach
                        </select>
                        <div class="invalid-feedback">Selecciones un campo</div>
                        <br>
                    </div>


                    {{-- botones --}}
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button type="submit" class="btn btn-success col-3">Guardar</button>

                    </div>
                    {{-- fin botones --}}


                </form>
                {{-- fin formulario --}}


            </div>
        </div>
    </div>
</div>
