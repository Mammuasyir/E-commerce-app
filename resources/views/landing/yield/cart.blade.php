@extends ('landing.template')

@section('isi')
<div class="container">
    <div class="container" style="margin-top: 10px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><strong>Keranjang</strong></li>
            </ol>
        </nav>
    </div>

    @if(Session::get('Success'))
    <div class="container" style="margin-top: -10px;">
        <div class="alert alert-danger" role="alert">
            {{Session::get('Success')}}
        </div>
    </div>
    @endif

    <div class="container">
        <div class="row mt-4">
            <div class="col">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Gambar</td>
                            <td>Nama Produk</td>
                            <td>Catatan</td>
                            <td>Jumlah</td>
                            <td>Harga</td>
                            <td>Total Harga</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>

                        @forelse($details as $detail)
                        <tr>
                            <td>{{$i++}}</td>
                            <td><img src="{{url('storage/', $detail->product->image)}}" class="img-fluid" width="100" alt="..."></td>
                            <td>{{$detail->product->name_product}}</td>
                            <td>{{$detail->catatan}}</td>
                            <td>{{$detail->jumlah_pesanan}}</td>
                            <td>Rp. {{number_format($detail->product->Price)}}</td>
                            <td><strong>Rp. {{number_format($detail->Price)}}</strong> </td>

                            <td>
                                <form action="{{route('landing.delete', $detail->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn">
                                        <i class="fas fa-trash text-danger" style="cursor: pointer;"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="3">Data Kosong</td>
                        </tr>
                        @endforelse

                        @if(!empty($pesanan))
                        <tr>
                            <td colspan="6" style="text-align:right;"><strong> Harga: </strong></td>
                            <td style="text-align:right;"><strong>Rp. {{number_format($pesanan->total_harga)}}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="6" style="text-align:right;"><strong>Kode Unik: </strong></td>
                            <td style="text-align:right;"><strong>Rp. {{number_format($pesanan->kode_unik)}}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="6" style="text-align:right;"><strong> Bayar Keseluruhan:</strong> </td>
                            <td style="text-align:right;"><strong>Rp. {{number_format($pesanan->total_harga + $pesanan->kode_unik)}}</strong></td>
                        </tr>
                        <tr>
                            <td colspan="6"></td>
                            <td style="text-align:right;">
                                <div class="d-grid gap-2 d-md-block">
                                    <a href="{{route('landing.checkout')}}" class="btn btn-primary" type="button"><i class="fas fa-trash" __cpp="1"></i>Bayar Woi</a>
                                </div>
                            </td>
                        </tr>
                        @endif

                    </tbody>
                    </thead>
                </table>

            </div>
        </div>
    </div>
</div>
@endsection