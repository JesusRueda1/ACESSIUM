 <!---msj de registro fallido -->
 @error('tbl_centros_codigo')
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong> {{$message}} </strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 @enderror

 @error('tbl_centros_nombre')
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong> {{$message}} </strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 @enderror

 @error('tbl_centros_subdirector')
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong> {{$message}} </strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 @enderror

 @error('tbl_centros_tbl_regionals_id')
 <div class="alert alert-danger alert-dismissible fade show" role="alert">
     <strong> {{$message}} </strong>
     <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
 </div>
 @enderror
