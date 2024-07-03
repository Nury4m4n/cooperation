<div class="d-flex justify-content-between align-items-center bg-light fixed-top" style="height: 70px; z-index: 1;">
    <ul class="nav">
        <!-- Tambahkan item jika diperlukan -->
    </ul>

    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Active</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">Link</a>
        </li>
    </ul>

    <ul class="nav">
        <li class="nav-item dropdown">
            @auth
                <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button"
                    aria-expanded="false">Welcome back, {{ auth()->user()->name }}</a>
                <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Dashboard</a></li>
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




<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">N-COOP</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="/">
                <i class='bx bx-home-heart'></i>
                <span class="links_name">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="{{ route('customer.index') }}">
                <i class='bx bx-user'></i>
                <span class="links_name">Nasabah</span>
            </a>
        </li>
        <li>
            <a href="{{ route('mandatory-saving.index') }}">
                <i class='bx bx-credit-card-front'></i>
                <span class="links_name">Simpanan Wajib</span>
            </a>
        </li>
        {{-- <li class="profile">
                <div class="profile-details">
                    <img src="profile.jpg" alt="profileImg">
                    <div class="name_job">
                        <div class="name">Prem Shahi</div>
                        <div class="job">Web designer</div>
                    </div>
                </div>
                <i class='bx bx-log-out' id="log_out"></i>
            </li> --}}

    </ul>
</div>

<script>
    let sidebar = document.querySelector(".sidebar");
    let closeBtn = document.querySelector("#btn");

    closeBtn.addEventListener("click", () => {
        sidebar.classList.toggle("open");
        menuBtnChange();
    });



    function menuBtnChange() {
        if (sidebar.classList.contains("open")) {
            closeBtn.classList.replace("bx-menu", "bx-menu-alt-right");
        } else {
            closeBtn.classList.replace("bx-menu-alt-right", "bx-menu");
        }
    }
</script>
</body>

</html>
