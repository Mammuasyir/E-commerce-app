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
                <h3>{{$products->name_product}}</h3>
                <h4>{{$products->Price}}</h4>
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Jenis</th>
                            <td colspan="2">Makanan</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Berat</th>
                            <td colspan="2">{{$products->weight}}</td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Jumlah</th>
                            <td colspan="2"> 
                                <input type="number">
                            </td>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Catatan</th>
                            <td colspan="2">
                                <input>
                            </td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
                <div class="d-grid gap-2">
                    <a href="#" class="btn btn-primary" type="button" > Keranjang</a>
                </div>
            </div>
            
        </div>
</div>
@endsection