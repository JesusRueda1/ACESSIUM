<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion shadow-lg mb-5 bg-body rounded" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">

                @can('ver-dash')
                    <a class="nav-link" href="/dashboard">
                        <div class="sb-nav-link-icon"><i class='bx bxs-pie-chart-alt-2'></i></div>
                        Dashboard
                    </a>

                    {{-- <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts">
                        <div class="sb-nav-link-icon"><i class='bx bxs-calendar-check'></i></div>
                        Registros
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link" href="/RFyC">Funcionarios y contratistas</a>
                            <a class="nav-link" href="/RS">Servicios</a>
                            <a class="nav-link" href="/RA">Aprendices</a>
                            <a class="nav-link" href="/RG">General</a>
                        </nav>
                    </div> --}}
                @endcan

                @can('ver-users')
                    <div class="sb-sidenav-menu-heading">Usuarios</div>
                    <a class="nav-link" href="/user">
                        <div class="sb-nav-link-icon"><i class='bx bxs-user-account'></i></div>
                        Gestionar Usuarios
                    </a>

                    <a class="nav-link" href="/roles">
                        <div class="sb-nav-link-icon"><i class='bx bxs-user-detail'></i></div>
                        Gestionar Roles
                    </a>
                    <a class="nav-link" href="/perfil">
                        <div class="sb-nav-link-icon"><i class='bx bxs-user-account'></i></div>
                        Gestionar Perfiles
                    </a>
                    <a class="nav-link" href="/imagenes">
                        <div class="sb-nav-link-icon"><i class='bx bx-image'></i></div>
                        Imagenes
                    </a>
                @endcan



           
                <div class="sb-sidenav-menu-heading">Perfiles</div>
                <a class="nav-link" href="/perfiles">
                    <div class="sb-nav-link-icon"><i class="fas fa-user-graduate"></i></div>
                    Perfil
                </a>
                <a class="nav-link" href="/carnet">
                    <div class="sb-nav-link-icon"><i class='bx bxs-user-badge'></i></div>
                    Carnet
                </a>
              


                @can('ver-config')
                    <div class="sb-sidenav-menu-heading">Configuracion</div>
                @endcan
                @can('ver-regionales')
                    <a class="nav-link" href="/regional">
                        <div class="sb-nav-link-icon"><i class="fas fa-globe"></i></div>
                        Regionales
                    </a>
                @endcan
                @can('ver-centros')
                    <a class="nav-link" href="/centro">
                        <div class="sb-nav-link-icon"><i class='bx bx-buildings'></i></div>
                        Centros
                    </a>
                @endcan
                @can('ver-coordinaciones')
                    <a class="nav-link" href="/coordinacion">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Coordinaciones
                    </a>
                @endcan
                @can('ver-sedes')
                    <a class="nav-link" href="/sede">
                        <div class="sb-nav-link-icon"><i class='bx bxs-school'></i></div>
                        Sedes
                    </a>
                @endcan
                @can('ver-tipop')
                    <a class="nav-link" href="/tipoP">
                        <div class="sb-nav-link-icon"><i class='bx bxs-user-badge'></i></div>
                        Tipo de Personal
                    </a>
                @endcan
                @can('ver-tipoi')
                    <a class="nav-link" href="/tipoI">
                        <div class="sb-nav-link-icon"><i class="fas fa-id-card"></i></div>
                        Tipo de Identificacion
                    </a>
                @endcan
                @can('ver-programa')
                    <a class="nav-link" href="/programa">
                        <div class="sb-nav-link-icon"><i class="fas fa-graduation-cap"></i></div>
                        Programas
                    </a>
                @endcan
                @can('ver-fichas')
                    <a class="nav-link" href="/ficha">
                        <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                        Fichas
                    </a>
                @endcan

                @can('ver-movimientos')
                    <div class="sb-sidenav-menu-heading">Movimientos</div>
                    <a class="nav-link" href="/movimientos">
                        <div class="sb-nav-link-icon"><i class='bx bxs-door-open'></i></div>
                        Movimientos
                    </a>
                @endcan
            </div>
        </div>
      {{--   <div class="sb-sidenav-footer ">
            <div class="small">Rol:</div>
            @if (!empty(Auth::user()->getRoleNames()))
                @foreach (Auth::user()->getRoleNames() as $rolNombre)
                    <span>{{ $rolNombre }}</span>
                @endforeach
            @endif
        </div> --}}
    </nav>
</div>
