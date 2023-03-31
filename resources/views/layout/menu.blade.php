<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
           with font-awesome or any other icon font library -->
        {{-- <li class="nav-item">
            <a href="{{ url('layout/home') }}" class="nav-link">
                <i class="nav-icon fas fa-home"></i>
                <p>
                    Beranda

                </p>
            </a>
        </li> --}}

        <li class="nav-item">
            <a href="{{ url('mobil/index') }}" class="nav-link">
                <i class="nav-icon fas fa-car-side"></i>
                <p>
                    Data Mobil

                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{ url('pelanggan/datapelanggan') }}" class="nav-link">
                <i class="nav-icon fas fa-user"></i>
                <p>
                    Data Pelanggan

                </p>
            </a>
        </li>


        <li class="nav-item">
            <a href="{{ url('/peminjaman/datapeminjaman') }}" class="nav-link">
                <i class="nav-icon fas fa-cart-arrow-down"></i>
                <p>
                    Transaksi

                </p>
            </a>
        </li>

        {{-- <li class="nav-item">
            <a href="{{ url('mobil/index') }}" class="nav-link">
                <i class="nav-icon fas fa-cash-register"></i>
                <p>
                    Pembayaran

                </p>
            </a>
        </li> --}}

        {{-- <li class="nav-item">
            <a href="{{ url('mobil/index') }}" class="nav-link">
                <i class="nav-icon fas fa-car"></i>
                <p>
                    Pengembalian Mobil

                </p>
            </a>
        </li> --}}

        {{-- <li class="nav-item">
            <a href="{{ url('mobil/laporan') }}" class="nav-link">
                <i class="nav-icon fas fa-file"></i>
                <p>
                    Laporan

                </p>
            </a>
        </li> --}}

        <li class="nav-item">
            <a href="{{ url('logout') }}" class="nav-link">
                <i class="fas fa-arrow-alt-circle-left"></i>
                <p>
                    Logout

                </p>
            </a>
        </li>
    </ul>
</nav>
