@extends ('landing.template')

@section('isi')



<div class="container" style="margin-top: 10px;">
    <div>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">Details</li>
            </ol>
        </nav>
    </div>

    <div style="margin-top: -10px;">
        <div class="alert alert-success" role="alert">
            Berhasil Menambahkan Produk!
        </div>
    </div>
    <div class="row mt-4">

        <div class="col md-6">
            <div class="card">
                <div class="card-body text-center">
                    <img src="{{url('storage/',$products->image)}}" class="img-fluid" alt="...">
                </div>
            </div>
        </div>
        <div class="col md-6">
            <h3>
                <strong>{{$products->name_product}}</strong>
            </h3>
            <h4>Rp. {{number_format($products->Price) }}
                @if ($products->status == '1')
                <span class="badge bg-success" style="font-size: 12px;"><i class="fas fa-check"></i>Tersedia</span>
                @else
                <span class="badge bg-danger" style="font-size: 12px;"><i class="fas fa-times"></i>Kosong</span>
                @endif
            </h4>

            <div class="row">
                <div class="col">
                    <form action="{{route('landing.tambahcart')}}" method="post">
                        @csrf

                        <input type="hidden" value="{{$products->id}}" name="id">
                        <input type="hidden" value="{{$products->name_product}}" name="name_product">
                        <input type="hidden" value="{{$products->Price}}" name="Price">

                        <table class="table" style="border-top-style: hidden">
                            <tbody>
                                <tr>
                                    <th>Kategori</th>
                                    <td>:</td>
                                    <td colspan="3">{{$products->kategori->nama_kategori}}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Berat</th>
                                    <td>:</td>
                                    <td colspan="3">{{$products->weight}}</td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Jumlah</th>
                                    <td>:</td>
                                    <td colspan="3">
                                        <input required class="form-control" name="jumlah" style="width: 100%;">
                                    </td>
                                    <td></td>
                                </tr>
                                <tr>
                                    <th>Catatan</th>
                                    <td>:</td>
                                    <td colspan="3">
                                        <textarea class="form-control" name="catatan" id="" placeholder="Opsional" rows="4"></textarea>
                                    </td>
                                    <td></td>
                                </tr>
                            </tbody>
                        </table>
                        @guest
                        <div class="text-center mt-4"><a href="{{route('login')}}">Login</a> Dulu ya kak<br> Sebelum tambah ke Keranjang</div>
                        @else
                        @if ($products->status == 1)
                        <button class="btn btn-dark btn-block" type="submit" style="width: 100%;"><i class="fas fa-shopping-cart"></i>&nbsp; Keranjang</button>
                        @else
                        <button disabled class="btn btn-dark btn-block" type="button" style="width: 100%;"><i class="fas fa-times"></i>tidak tersedia</button>
                        @endif
                        @endguest
                    </form>
                </div>
            </div>

        </div>

    </div>
</div>
@endsection