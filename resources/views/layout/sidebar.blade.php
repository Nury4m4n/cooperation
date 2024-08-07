<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">N-COOP</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
        @can('admin')
            {{-- <li> --}}
            {{-- <a href="{{ route('customer.index') }}"> --}}
            {{-- <i class='bx bx-home-circle'></i> --}}
            {{-- <span class="links_name">Home</span> --}}
            {{-- </a> --}}
            {{-- </li> --}}
            {{-- <li class="dropdown"> --}}
            {{-- <a href="#"> --}}
            {{-- <i class='bx bxs-shield-alt-2'></i> --}}
            {{-- <span class="links_name">Admin Menu</span> --}}
            {{-- <span class="links_name"> --}}
            </span><!-- tambahkan ikon panah di sini -->
            </a>
            {{-- <ul class="dropdown-menu"> --}}
            {{-- <li><a href="{{ route('admin-role.index') }}">Kelola Role</a></li> --}}
            {{-- <li><a href="{{ route('admin-customer.index') }}">Kelola Nasabah</a></li> --}}
            {{-- <li><a href="{{ route('admin-my-saving.index') }}">Kelola Tabungan</a></li> --}}
            {{-- <li><a href="{{ route('admin-mandatory-saving.index') }}">Kelola Simpanan</a></li> --}}
            {{-- <li><a href="{{ route('admin-my-loans.index') }}">Kelola Pinjaman</a></li> --}}
            {{-- </ul> --}}
            <li>
                <a href="{{ route('admin-role.index') }}">
                    <i class='bx bxs-shield-alt-2'></i>
                    <span class="links_name">Kelola Role</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin-customer.index') }} ">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Kelola Nasabah</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin-my-saving.index') }}">
                    <i class='bx bxs-bank'></i>
                    <span class="links_name">Kelola Tabungan </span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin-mandatory-saving.index') }}">
                    <i class='bx bx-credit-card-front'></i>
                    <span class="links_name">Kelola Simpanan Wajib</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin-my-loans.index') }}">
                    <i class='bx bx-money-withdraw'></i>
                    <span class="links_name">Kelola Pinjaman </span>
                </a>

            </li>
        @endcan
        @can('user')
            <li>
                <a href="{{ route('customer.index') }}">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Nasabah</span>
                </a>
            </li>
            <li>
                <a href="{{ route('my-saving.index') }}">
                    <i class='bx bxs-bank'></i>
                    <span class="links_name">Tabungan </span>
                </a>
            </li>
            <li>
                <a href="{{ route('mandatory-saving.index') }}">
                    <i class='bx bx-credit-card-front'></i>
                    <span class="links_name">Simpanan Wajib</span>
                </a>
            </li>
            <li>
                <a href="{{ route('my-loan.index') }}">
                    <i class='bx bx-money-withdraw'></i>
                    <span class="links_name">Pinjaman Ku</span>
                </a>
            </li>
        @endcan

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

    document.querySelectorAll('.dropdown > a').forEach(menu => {
        menu.addEventListener('click', (e) => {
            e.preventDefault();
            const parent = menu.parentElement;
            parent.classList.toggle('open');
        });
    });
</script>
</body>

</html>
