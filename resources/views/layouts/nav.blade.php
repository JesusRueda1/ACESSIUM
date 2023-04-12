<link href="https://fonts.googleapis.com/css2?family=Josefin+Sans:wght@100;300;400&display=swap" rel="stylesheet">
<nav class="sb-topnav navbar navbar-expand navbar-dark bg-sena-g">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="home">ACCESUM</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 me-4 me-lg-0" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>
    <!-- Navbar Search-->
    <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
    </form>
    <!-- Navbar-->

    <ul class="navbar-nav ms-auto ms-md-0 me-3 me-lg-4">

        <li class="nav-item dropdown">

            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre><i
                    class="fas fa-user fa-fw"></i>

                @if (Auth::user()->tbl_perfils != null)
                    {{ Auth::user()->tbl_perfils->tbl_perfil_nombres }}
                @else
                    {{ Auth::user()->name }}
                @endif
                <br>
                @if (!empty(Auth::user()->getRoleNames()))
                    @foreach (Auth::user()->getRoleNames() as $rolNombre)
                        <span>{{ $rolNombre }}</span>
                    @endforeach
                @endif


            </a>


            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <i class='bx bx-log-out'></i>
                    {{ __('Salir') }}
                </a>


                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </li>
    </ul>

</nav>
{{-- <div class="sb-sidenav-footer ">
    <div class="small">Rol:</div>
    @if (!empty(Auth::user()->getRoleNames()))
        @foreach (Auth::user()->getRoleNames() as $rolNombre)
            <span>{{ $rolNombre }}</span>
        @endforeach
    @endif
</div> --}}
