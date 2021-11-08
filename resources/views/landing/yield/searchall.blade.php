@extends('landing.template')

@section('isi')


<div class="container">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{asset('/kategori/{slug}')}}">Kategori</a></li>
            <li class="breadcrumb-item active" aria-current="page"><strong>{{$title}}</strong></li>
        </ol>
    </nav>
</div>

<section class="container mt-3 d-flex justify-content-center">
<form class="form" method="get" action="{{ route('search.all') }}">
    <div class="input-group mb-3" style="width: 500px;">
        <input value="{{$keyword}}" type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Cari apa beb">
        <button type="submit" class="btn btn-primary mb-1">Cari</button>
    </div>
</form>
</section>


<section class="container mt-5 mb-5">
    <h3 class="d-flex justify-content-between">
        <strong> All Product </strong>
    </h3>

    <div class="row mt-3">
        @foreach($products as $up)
        <div class="col-md-3">
            <div class="card text-center" style="width: 15rem;">
                <img src="{{url('storage/',$up->image)}}" class="card-img-top img-thumbnail" alt="...">
                <div class="card-body">
                    <strong class="card-title">{{$up->name_product}}</strong>
                    <!-- <p class="card-text">Men's Philadelphia 76ers Allen Iverson Mitchell & Ness Black 2000-01 Hardwood Classics Swingman Jersey</p> -->
                    <div class="row">
                        <a href="{{route('landing.detail', $up->slug)}}" class="btn btn-primary mt-3">Detail</a>
                        <a href="#" class="btn btn-dark mt-1">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>

@endsection