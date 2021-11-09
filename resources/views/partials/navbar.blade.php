<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">

        <img src="/img/healthy.png" alt="logo Dora" width="50" height="50">

        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link active " href="/">DoRa</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $title == 'Home' ? 'active' : '' }}" href="/">Home</a>
            </li>
            <li class="nav-item">
                {{-- <a class="nav-link {{ $title == 'DaftarDonor' ? 'active' : '' }}" href="/daftardonor">Daftar
                    Donor</a> --}}
                <a class="nav-link" href="/donor/create">Daftar Donor</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/lihatdonor">Lihat Donor</a>
            </li>
        </ul>

        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link {{ $title == 'Login' ? 'active' : '' }}" href="/login"><i
                        class="bi bi-box-arrow-in-right"></i> Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $title == 'Register' ? 'active' : '' }}" href="/register"> <i
                        class="bi bi-check-square"></i> Register</a>
            </li>
        </ul>

    </div>
</nav>
