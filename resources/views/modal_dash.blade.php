<div class="modal" id="modalfuncionario" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Funcionarios activos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tablefuncionarios" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th style="display: none">#</th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($funcionarios as $f)
                            <tr>
                                <td style="display: none">{{ $f->id }}</td>
                                <td>{{ $f->tbl_perfil_idenficacion }}</td>
                                <td>{{ $f->tbl_perfil_nombres }}</td>
                                <td>{{ $f->tbl_perfil_apellidos }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalcontratistas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Contratistas activos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tablecontratistas" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th style="display: none">#</th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($contratistas as $c)
                            <tr>
                                <td style="display: none">{{ $c->id }}</td>
                                <td>{{ $c->tbl_perfil_idenficacion }}</td>
                                <td>{{ $c->tbl_perfil_nombres }}</td>
                                <td>{{ $c->tbl_perfil_apellidos }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalservicios" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Agentes de servicios activos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tableservicios" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th style="display: none">#</th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($servicios as $s)
                            <tr>
                                <td style="display: none">{{ $s->id }}</td>
                                <td>{{ $s->tbl_perfil_idenficacion }}</td>
                                <td>{{ $s->tbl_perfil_nombres }}</td>
                                <td>{{ $s->tbl_perfil_apellidos }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalporteros" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Porteros activos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tableporteros" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th style="display: none">#</th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($porteros as $p)
                            <tr>
                                <td style="display: none">{{ $p->id }}</td>
                                <td>{{ $p->tbl_perfil_idenficacion }}</td>
                                <td>{{ $p->tbl_perfil_nombres }}</td>
                                <td>{{ $p->tbl_perfil_apellidos }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalaprendices" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Aprendices activos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tablesaprendices" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th style="display: none">#</th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th>Ficha</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($aprendices as $a)
                            <tr>
                                <td style="display: none">{{ $a->id }}</td>
                                <td>{{ $a->tbl_perfil_idenficacion }}</td>
                                <td>{{ $a->tbl_perfil_nombres }}</td>
                                <td>{{ $a->tbl_perfil_apellidos }}</td>
                                <td>{{ $a->tbl_fichas->tbl_fichas_codigo }} -
                                    {{ $a->tbl_fichas->tbl_fichas_grupo }}
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modalvisitantes" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Visitantes activos</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table id="tablevisitantes" class="table table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th style="display: none">#</th>
                            <th>Documento</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($visitantes as $v)
                            <tr>
                                <td style="display: none">{{ $v->id }}</td>
                                <td>{{ $v->tbl_perfil_idenficacion }}</td>
                                <td>{{ $v->tbl_perfil_nombres }}</td>
                                <td>{{ $v->tbl_perfil_apellidos }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script>
    $(document).ready(function() {
        $('#tablefuncionarios').DataTable();
        $('#tablecontratistas').DataTable();
        $('#tableservicios').DataTable();
        $('#tableporteros').DataTable();
        $('#tablesaprendices').DataTable();
        $('#tablevisitantes').DataTable();
    });
</script>
