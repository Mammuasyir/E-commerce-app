<header>
    <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light ">
        <div class="container">
            <a href="/" aria-current="page"> <img class="img-fluid ms-1" src="{{asset('landing/img/index.png')}}" style="width: 3rem;"> </a>
            <a class="navbar-brand" href="/">Insect Store</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <li class="nav-item">

                        <a class="nav-link active" aria-current="page" href="{{route('allproduct')}}">All Product</a>

                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            Kategori
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                
                            </li>

                        </ul>
                    </li>
                </ul>

                <div class="d-flex">
                    @guest
                    <a class="nav-link active anchor" aria-current="page" href="{{route('search.all')}}"><i class="fas fa-search"></i> Cari</a>
                    <a href="{{route('login')}}" class="btn btn-outline-warning me-2" type="submit">Login</a>
                    <a href="{{route('register')}}" class="btn btn-outline-success" type="submit">Sign Up</a>
                    @else
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <a class="nav-link active anchor" aria-current="page" href="{{route('search.all')}}"><i class="fas fa-search"></i> Cari</a>

                        <li class="nav-item dropdown ms-3">
                        <a class="nav-link active anchor ms-3" aria-current="page" href="{{route('landing.history')}}"><i class="fas fa-history"></i> History</a>
                        </li>

                        <li class="nav-item dropdown ms-3">
                        <a class="nav-link active anchor ms-3" aria-current="page" href="{{route('landing.cart')}}">
                            @if($jumlah !== 0)
                                <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">{{$jumlah}}</span>
                                @endif
                                <i class="fas fa-shopping-cart"></i> Keranjang
                        </a>
                        </li>

                        <li class="nav-item dropdown ms-3">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                {{ Auth::user()->name }}
                            </a>
                            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <li><a class="dropdown-item" href="{{route('profile.index')}}">profile</a></li>
                                <li><a class="dropdown-item" href="#">Another action</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li>
                                    <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    @endguest
                </div>
            </div>
        </div>
    </nav>
</header>