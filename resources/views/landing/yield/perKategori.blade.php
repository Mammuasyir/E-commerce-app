@extends('landing.template')

@section('isi')


<div class="container">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><strong>{{$title}}</strong></li>
            </ol>
        </nav>
    </div>

<div class=" container mb-5 mt-5 ">
        @foreach($product as $pro)
        <div class="col-md-3">
            <div class="card text-center" style="width: 15rem;">
                <img src="{{url('storage/',$pro->image)}}" class="card-img-top img-thumbnail" alt="...">
                <div class="card-body">
                    <strong class="card-title">{{$pro->name_product}}</strong>
                    <!-- <p class="card-text">Men's Philadelphia 76ers Allen Iverson Mitchell & Ness Black 2000-01 Hardwood Classics Swingman Jersey</p> -->
                    <div class="row">
                        <a href="{{route('landing.detail', $pro->slug)}}" class="btn btn-primary mt-3">Detail</a>
                        <a href="#" class="btn btn-dark mt-1">Buy Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

@endsection