@extends('layouts.auth_app')

@section('title')
    Coordinacion
@endsection

@section('content')
<br><br>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Import Excel</div>
                <div class="card-body">
                   <form action="{{route('tbl_coordinacion/Importar')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <input type="file" name="documento"/>
                            <button type="submit" class="btn btn-primary">Import</button>
                        </div>
                    </button>
                   </form>
                   <a type="submit" class="btn btn-success" href="{{route('indexCoordinacion')}}"">Atras</a>
            </div>
        </div>
    </div>
</div>
@endsection
