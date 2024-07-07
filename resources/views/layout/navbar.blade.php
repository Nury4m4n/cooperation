<div class="d-flex justify-content-end align-items-center bg-light fixed-top px-5" style="height: 70px; z-index: 1;">
    <div class="btn-group">
        <a href="#" class="dropdown-toggle text-dark text-decoration-none" data-bs-toggle="dropdown"
            data-bs-display="static" aria-expanded="false">
            @auth
                <span class="badge rounded-pill bg-dark text-light text-decoration-none">
                    <i class='bx bxs-user-circle ' style='color:#ffffff'></i> Welcome back,
                    {{ auth()->user()->name }}
                </span>

            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                {{-- <li><button class="dropdown-item" type="button">Action</button></li>
                <li> --}}
                <hr class="dropdown-divider">
                </li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit"><i class='bx bx-log-out-circle'></i> Logout</button>
                    </form>
                </li>

            @endauth
        </ul>
    </div>
</div>
