    <div id="layoutSidenav_nav">
        <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
            <div class="sb-sidenav-menu">
                <div class="nav">
                    <div class="sb-sidenav-menu-heading">Menu</div>
                    <a class="nav-link" href="/dashboard">
                        <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                        Dashboard
                    </a>

                    <a class="nav-link" href="/buku">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        Buku
                    </a>
                    <a class="nav-link" href="/peminjaman">
                        <div class="sb-nav-link-icon"><i class="fas fa-clipboard"></i></div>
                        Peminjaman
                    </a>
                    <a class="nav-link" href="/pengaturan">
                        <div class="sb-nav-link-icon"><i class="fas fa-gear"></i></div>
                        Pengaturan
                    </a>
                    <a class="nav-link" href="/logout">
                        <div class="sb-nav-link-icon"><i class="fas fa-right-from-bracket"></i></div>
                        Logout
                    </a>
                </div>
            </div>
            <div class="sb-sidenav-footer">
    @if(Auth::check())
        <div class="small">Logged in as: {{ Auth::user()->user_nama}}</div>
    @else
        <div class="small">You are not logged in</div>
    @endif
</div>
        </nav>
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function () {
        const links = document.querySelectorAll('.nav-link');
        const currentPath = window.location.pathname;

        links.forEach(link => {
            if (link.getAttribute('href') === currentPath) {
                link.classList.add('active');
            }
        });
    });
</script>

