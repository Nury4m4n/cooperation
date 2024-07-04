<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">N-COOP</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">
        <li>
            <a href="{{ route('customer.home') }}">
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
