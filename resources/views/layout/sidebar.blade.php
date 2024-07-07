<div class="sidebar">
    <div class="logo-details">
        <div class="logo_name">N-COOP</div>
        <i class='bx bx-menu' id="btn"></i>
    </div>
    <ul class="nav-list">

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
        @can('admin')
            <li>
                <a href="{{ route('admin-customer.index') }}">
                    <i class='bx bx-user'></i>
                    <span class="links_name">Nasabah</span>
                </a>
            </li>
            <li>
                <a href="{{ route('admin-my-saving.index') }}">
                    <i class='bx bxs-bank'></i>
                    <span class="links_name">Tabungan </span>
                </a>
            </li>

            <li>
                <a href="{{ route('admin-mandatory-saving.index') }}">
                    <i class='bx bx-credit-card-front'></i>
                    <span class="links_name">Simpanan Wajib</span>
                </a>
            </li>
        @endcan


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
