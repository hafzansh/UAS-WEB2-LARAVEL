<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-light" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Data Master</div>
                <a class="nav-link" href="{{route('home')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Dashboard
                </a>
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseLayouts"
                    aria-expanded="false" aria-controls="collapseLayouts">
                    <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                    Data Buku
                    <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                    <nav class="sb-sidenav-menu-nested nav">
                        <a class="nav-link" href="{{route('books.index')}}">Master Buku</a>
                        <a class="nav-link" href="{{route('transaction.create')}}">Peminjaman</a>
                        <a class="nav-link" href="{{route('transaction.index')}}">Pengembalian</a>
                        <a class="nav-link" href="{{route('history')}}">Riwayat Transaksi</a>
                    </nav>
                </div>

                <div class="sb-sidenav-menu-heading">Manajemen Pengguna</div>
                <a class="nav-link" href="{{route('members.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-address-book"></i></div>
                    Anggota
                </a>
                <a class="nav-link" href="{{ route('users.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-user"></i></div>
                    User
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{auth::User()->name}}
        </div>
    </nav>
</div>