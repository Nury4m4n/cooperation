{{-- <div class="d-flex justify-content-end align-items-center bg-light fixed-top" style="height: 70px; z-index: 1;">
    <ul class="nav">
        <li class="nav-item dropdown">
            @auth
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                    aria-expanded="false">Welcome back, {{ auth()->user()->name }}</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Dashboard</a></li>
                    <li>
                        <hr class="dropdown-divider">
                    </li>
                    <li>

                        <form action="/logout" method="post">
                            @csrf
                            <button class="dropdown-item" type="submit">Logout</button>
                        </form>
                    </li>
                </ul>
            @else
                <a class="nav-link" href="/login">Login</a>
            @endauth
        </li>
    </ul>
</div>
--}}


<div class="d-flex justify-content-end align-items-center bg-light fixed-top px-5" style="height: 70px; z-index: 1;">
    <div class="btn-group ">
        <a href=""class=" dropdown-toggle text-dark text-decoration-none " data-bs-toggle="dropdown"
            data-bs-display="static" aria-expanded="false">

            @auth
                Welcome back, {{ auth()->user()->name }}
            </a>
            </button>
            <ul class="dropdown-menu dropdown-menu-lg-end">
                <li><button class="dropdown-item" type="button">Action</button></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="dropdown-item " type="submit"><i class='bx bx-log-out-circle'></i> Logout</button>
                    </form>
                </li>
                {{-- @else
                <li>
                    <a href="/login" class="dropdown-item" type="button">Login</a>
                </li> --}}
            @endauth
        </ul>
    </div>
</div>
