<nav class="navbar navbar-expand-lg navbar-dark bg-danger">
    <div class="container">

        <a class="navbar-brand fs-3" href="/">
            <img src="/img/healthy.jpeg" alt="logo Dora" width="50" height="50">
            &nbsp
            DoRa
        </a>

        <ul class="navbar-nav">
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
            <li class="nav-item">
                <a class="nav-link {{ $title == 'Login' ? 'active' : '' }}" href="/login">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ $title == 'Register' ? 'active' : '' }}" href="/register">Register</a>
            </li>
        </ul>

    </div>
</nav>
