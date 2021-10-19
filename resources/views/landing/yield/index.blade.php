@extends('landing.template')

@section('isi')

@include('landing.include.carousel')

<section class="container mt-5 mb-5">
            <h3 class="d-flex justify-content-between">
                <strong>Insect</strong>
                <a href="#" class="btn btn-primary">View All</a>
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