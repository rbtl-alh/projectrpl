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
                <a class="nav-link" href="/donor">Lihat Donor</a>
            </li>
        </ul>

        {{-- <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                <a class="nav-link" href="/logout">
                    <i class="bi bi-person-check"></i>
                    <i class="bi bi-box-arrow-right"></i> 
                    @method('post')
                    @csrf
                    Logout
                </a>
            </li>
        </ul> --}}
        <ul class="navbar-nav ms-auto">
            <li class="nav-item">
                {{-- nama user --}}
                <a class="nav-link" href="">{{ $user->name }}</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="https://s3.eu-central-1.amazonaws.com/bootstrapbaymisc/blog/24_days_bootstrap/fox.jpg" width="40" height="40" class="rounded-circle">
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="user/{{ $user->id }}">Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li>
                        <a class="dropdown-item" href="/logout">
                            <i class="bi bi-box-arrow-right"></i> 
                            @method('post')
                            @csrf
                            Logout
                        </a>
                    </li>                    
                </ul>
            </li>
        
        </ul>

    </div>
</nav>
