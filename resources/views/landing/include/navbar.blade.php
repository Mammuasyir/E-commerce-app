

<header>
        <nav class="navbar navbar-expand-lg navbar-light fixed-top bg-light ">
            <div class="container">
                <a href="#" aria-current="page"> <img class="img-fluid ms-1" src="{{asset('landing/img/index.png')}}" style="width: 3rem;"> </a>
                <a class="navbar-brand" href="#">Insect Store</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        
                    </ul>
                    <div class="d-flex">
                        <a href="{{url('/login')}}" class="btn btn-outline-warning me-2" type="submit">Login</a>
                        <a href="{{url('/register')}}" class="btn btn-outline-success" type="submit">Daftar</a>
                    </div>
                </div>
            </div>
        </nav>
    </header>