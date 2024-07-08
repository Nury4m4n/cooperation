<div class="d-flex justify-content-end align-items-center bg-light fixed-top px-5" style="height: 70px; z-index: 1;">
    <div class="btn-group">
        @auth
            <a href="#" class="dropdown-toggle text-dark text-decoration-none" data-bs-toggle="dropdown"
                aria-expanded="false">
                <span class="badge rounded-pill bg-dark text-light text-decoration-none">
                    <i class='bx bxs-user-circle' style='color:#ffffff'></i> Welcome back,
                    {{ auth()->user()->name }}
                </span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end">
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <form action="/logout" method="post">
                        @csrf
                        <button class="dropdown-item" type="submit"><i class='bx bx-log-out-circle'></i> Logout</button>
                    </form>
                </li>
            </ul>
        @else
            <a href="#" class="btn btn-outline-dark">Login</a>
        @endauth
    </div>
</div>
