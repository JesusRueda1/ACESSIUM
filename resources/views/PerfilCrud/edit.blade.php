<div class="modal fade" id="EditPerfil{{ $list->id }}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="">
                <h6 class="modal-title" style="color: #fff; text-align: center;">
                    Actualizar Información
                </h6>
            </div>


            <form method="POST" action="{{ route('EditarPerfil', $list->id) }}">
                @csrf
                @method('PUT')

                <div class="modal-body" id="cont_modal">
                    <div class="row">
                        @csrf
                        <div class="col-6">
                            <label for="tbl_perfil_tbl_tipo_identificacions_id" class="form-label">Tipo de
                                identificación</label>
                            <select name="tbl_perfil_tbl_tipo_identificacions_id"
                                id="tbl_perfil_tbl_tipo_identificacions_id" class="form-select">
                                <option value= "{{ $list->tbl_tipo_identificacions->id  ?? ''}}">
                                    {{ $list->tbl_tipo_identificacions->tbl_tipo_identificacions_nombre ?? '' }}</option>
                                @foreach ($tipoI as $ti)
                                    <option value="{{ $ti->id }}">{{ $ti->tbl_tipo_identificacions_nombre ?? '' }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-6">
                            <label for="tbl_perfil_idenficacion" class="form-label">Nº Identificacion</label>
                            <input type="number" class="form-control" id="tbl_perfil_idenficacion"
                                name="tbl_perfil_idenficacion" required pattern="[0-9]+"
                                value="{{ $list->tbl_perfil_idenficacion }}">
                            <div class="invalid-feedback">Completa los datos</div>
                        </div>
                        <div class="col-md-12">
                            <label for="tbl_perfil_nombres" class="form-label">Nombres</label>
                            <input type="text" class="form-control" id="tbl_perfil_nombres" name="tbl_perfil_nombres"
                                required onkeypress="return SoloLetras(event);" value="{{ $list->tbl_perfil_nombres }}">
                            <div class="invalid-feedback">Completa los datos</div>
                        </div>
                        <div class="col-md-12">
                            <label for="tbl_perfil_apellidos" class="form-label">Apellidos</label>
                            <input type="text" class="form-control" id="tbl_perfil_apellidos"
                                name="tbl_perfil_apellidos" required onkeypress="return SoloLetras(event);"
                                value="{{ $list->tbl_perfil_apellidos }}">
                        </div>
                        <div class="col-md-6">
                            <label for="tbl_perfil_celular" class="form-label">Celular</label>
                            <input type="number" class="form-control" id="tbl_perfil_celular" name="tbl_perfil_celular"
                                pattern="[0-9]+" value="{{ $list->tbl_perfil_celular }}">
                            <div class="invalid-feedback">Completa los datos</div>
                        </div>
                        <div class="col-md-6">
                            <label for="tbl_perfil_ciudad_Residencia" class="form-label">Ciudad de Residencia</label>
                            <input type="text" class="form-control" id="tbl_perfil_ciudad_Residencia"
                                name="tbl_perfil_ciudad_Residencia" onkeypress="return SoloLetras(event);"
                                value="{{ $list->tbl_perfil_ciudad_residencia }}">
                            <div class="invalid-feedback">Completa los datos</div>
                        </div>
                        <div class="col-md-6">
                            <label for="tbl_perfil_direccion" class="form-label">Dirección</label>
                            <input type="text" class="form-control" id="tbl_perfil_direccion"
                                name="tbl_perfil_direccion" value="{{ $list->tbl_perfil_direccion }}">
                            <div class="valid-feedback"></div>
                        </div>
                        <div class="col-6">
                            <label for="tbl_perfil_vacuna" class="form-label">Vacuna contra covid</label>
                            <select name="tbl_perfil_vacuna" id="tbl_perfil_vacuna" class="form-select"
                                aria-label="Default select example">
                                <option value="{{ $list->tbl_perfil_vacuna }}">{{ $list->tbl_perfil_vacuna }}</option>
                                <option value="Si">Si</option>
                                <option value="No">No</option>
                            </select><br>
                        </div>
                        <div class="col-3">
                            <label for="tbl_perfil_RH" class="form-label">RH</label>
                            <select name="tbl_perfil_RH" id="tbl_perfil_RH" class="form-select"
                                aria-label="Default select example">
                                <option value="{{ $list->tbl_perfil_RH }}">{{ $list->tbl_perfil_RH }}</option>
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
                            <select name="tbl_perfil_Estado_civil" id="tbl_perfil_Estado_civil" class="form-select"
                                aria-label="Default select example">
                                <option value="{{ $list->tbl_perfil_estado_civil }}">
                                    {{ $list->tbl_perfil_estado_civil }}</option>
                                <option value="Soltero/a">Soltero/a</option>
                                <option value="Casado/a">Casado/a</option>
                                <option value="Union libre">Union Libre</option>
                            </select><br>
                        </div>
                        <div class="col-4">
                            <label for="tbl_perfil_estado" class="form-label">Estado</label>
                            <select name="tbl_perfil_estado" id="tbl_perfil_estado" class="form-select"
                                aria-label="Default select example">
                                <option value="{{ $list->tbl_perfil_estado }}">{{ $list->tbl_perfil_estado }}
                                </option>
                                <option value="Activo">Activo</option>
                                <option value="Inactivo">Inactivo</option>
                                <option value="Bloqueado">Bloqueado</option>
                            </select><br>
                        </div>
                        <div class="col-6">
                            <label for="tbl_perfil_sexo" class="form-label">Sexo</label>
                            <select name="tbl_perfil_sexo" id="tbl_perfil_sexo" class="form-select"
                                aria-label="Default select example">
                                <option value="{{ $list->tbl_perfil_sexo }}">{{ $list->tbl_perfil_sexo }}</option>
                                <option value="Masculino">Masculino</option>
                                <option value="Femenino">Femenino</option>
                                <option value="Prefiero no decirlo">Prefiero no decirlo</option>
                            </select><br>
                        </div>
                        <div class="col-6">
                            <label for="tbl_perfil_tbl_fichas_id" class="form-label">Ficha</label>
                            <select name="tbl_perfil_tbl_fichas_id" id="tbl_perfil_tbl_fichas_id" class="form-select"
                                aria-label="Default select example">
                                @if ($list->tbl_perfil_tbl_fichas_id != null)
                                    <option value="{{ $list->tbl_fichas->id }}">
                                        {{ $list->tbl_fichas->tbl_fichas_codigo }} -
                                        {{ $list->tbl_fichas->tbl_fichas_grupo }}</option>
                                @endif
                                @foreach ($fichas as $list2)
                                    <option value="{{ $list2->id }}">{{ $list2->tbl_fichas_codigo }} -
                                        {{ $list2->tbl_fichas_grupo }}</option>
                                @endforeach
                            </select><br>
                        </div>
                        <div class="col-6">
                            <label for="tbl_perfil_tbl_tipo_personals_id" class="form-label">Tipo de
                                Personal</label>
                            <select name="tbl_perfil_tbl_tipo_personals_id" id="tbl_perfil_tbl_tipo_personals_id"
                                class="form-select" aria-label="Default select example" required>
                                @if ($list->tbl_perfil_tbl_tipo_personals_id != null)
                                    <option value="{{ $list->tbl_tipo_personals->id }}">
                                        {{ $list->tbl_tipo_personals->tbl_tipo_personals_nombre }}</option>
                                @endif
                                @foreach ($tipoP as $list3)
                                    <option value="{{ $list3->id }}">{{ $list3->tbl_tipo_personals_nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="tbl_perfil_tbl_centros_id" class="form-label">Centros</label>
                            <select name="tbl_perfil_tbl_centros_id" id="tbl_perfil_tbl_centros_id"
                                class="form-select" aria-label="Default select example" required>
                                @if ($list->tbl_perfil_tbl_centros_id != null)
                                    <option value="{{ $list->tbl_centros->id }}">
                                        {{ $list->tbl_centros->tbl_centros_nombre }}
                                    </option>
                                @endif
                                @foreach ($centros as $list)
                                    <option value="{{ $list->id }}">{{ $list->tbl_centros_nombre }}</option>
                                @endforeach
                            </select>
                            <br>
                        </div>

                        <div class="col-12">
                            <label for="tbl_perfil_tbl_coordinacion_id" class="form-label">Coordinacion</label>
                            <select name="tbl_perfil_tbl_coordinacion_id" id="tbl_perfil_tbl_coordinacion_id"
                                class="form-select" aria-label="Default select example" required>
                                <option value=""></option>
                                @foreach ($coordinaciones as $list)
                                    <option value="{{ $list->id }}">{{ $list->tbl_coordinacions_nombre }}
                                    </option>
                                @endforeach
                            </select>
                            <br>
                        </div>

                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button type="button" class="btn btn-secondary col-3"
                                data-bs-dismiss="modal">Cancelar</button>
                            <button type="submit" class="btn btn-success col-3">Guardar</button>
                        </div>
                    </div>
            </form>

        </div>
    </div>
</div>
