@extends('landing.template')

@section('isi')

@include('landing.include.carousel')

<section class="container mt-4">
    <h3><strong>Berdasarkan Kategori</strong></h3>
    <div class="row mt-4">
        @foreach($kategory as $kat)
        <div class="col">
            <a style="text-decoration:none; color: blueviolet;" href="{{route('landing.kategori', $kat->slug)}}">
                <div class="card shadow">
                    <div class="card-body text-center">
                        {{$kat->nama_kategori}}
                    </div>
                </div>
            </a>
        </div>
        @endforeach
    </div>
</section>

<section class="container mt-5 mb-5">
    <h3 class="d-flex justify-content-between">
        <strong> New Product </strong>
        <a href="#" class="btn btn-primary">View All</a>
    </h3>

    <div class="row">
        @foreach ($products as $up)
        <div class="col-md-3" style="padding-top: 25px !important;">
            <div class="card text-center" style="width: 16rem !important;">
                <img src="{{url('storage/',$up->image)}}" class="card-img-top img-thumbnail" alt="...">
                <div class="card-body">
                    <h5><strong class="card-title">{{$up->name_product}}</strong></h5>
                    <h5 class="card-title">Rp.{{number_format($up->Price)}}</h5>
                    <!-- <p class="card-text">Men's Philadelphia 76ers Allen Iverson Mitchell & Ness Black 2000-01 Hardwood Classics Swingman Jersey</p> -->
                    <div class="row">
                        <a href="{{route('landing.detail',$up->slug)}}" class="btn btn-primary mt-3">Detail</a>
                        <a href="#" class="btn btn-primary mt-1">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</section>


@endsection