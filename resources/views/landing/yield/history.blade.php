@extends('landing.template')

@section('isi')

<div class="container">
    <div class="container" style="margin-top: 10px;">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{asset('/')}}">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page"><strong>History</strong></li>
            </ol>
        </nav>
    </div>


    <div class="row">
        <div class="col">
            <a href="#" class="btn btn-primary"><i class="fas fa-arrow-left"></i></a>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Tanggal Pesan</th>
                                <th scope="col">Kode Pemesanan</th>
                                <th scope="col">Pesanan</th>
                                <th scope="col">Status</th>
                                <th scope="col">Total Harga</th>
                            </tr>
                        </thead>

                        @foreach($pesanan as $pesan)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{$pesan->created_at}}</td>
                            <td>{{$pesan->kode_pemesanan}}</td>


                            <td>
                                <?php $detail = App\Models\Detailpesanan::where('pesanan_id', $pesan->id)->get(); ?>

                                @foreach($detail as $det)
                                <img src="{{url('storage/',$det->product->image)}}" class="img-fluid rounded" width="100px" alt="...">
                                {{$det->product->name_product}}
                                @endforeach
                            </td>

                            <td>
                                @if ($pesan->status == 1)
                                <span class="badge bg-warning" style="font-size: 12px;"><i class="fas fa-history"></i>Pending</span>
                                @elseif ($pesan->status == 2)
                                <span class="badge bg-primary" style="font-size: 12px;"><i class="fas fa-check"></i>Lunas</span>
                                @elseif ($pesan->status == 3)
                                <span class="badge bg-success" style="font-size: 12px;"><i class="fas fa-times"></i>Terkirim</span>
                                @endif
                            </td>
                            <td><strong>Rp. {{number_format($pesan->total_harga + $pesan->kode_unik)}}</strong></td>
                        </tr>
                        @endforeach

                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-4">

        <div class="col">
            <div class="card shadow py-3 px-3">
                <div class="card-body">
                    <p>Untuk konfirmasi pembayaran silahkan hubungi admin melalui : </p>
                    <div class="media">
                        <img class="img-fluid rounded" src="{{asset('landing/icon/wa.png')}}" alt="Logo WhatsApp" width="70px">
                        <div class="media-body mt-2">
                            <h5 class="mt-0">WhatsApp</h5>
                            +62 821-9117-0349 <br>
                            <div class="mt-2">
                                <a target="_blank" href="https://api.whatsapp.com/send?phone=6282191170349" class="btn btn-success btn-sm">Hubungi Admin di WhatsApp</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col">
            <div class="card shadow py-3 px-3">
                <div class="card-body">
                    <p>Untuk konfirmasi pembayaran silahkan hubungi admin melalui : </p>
                    <div class="media">
                        <img class="img-fluid rounded" src="{{asset('landing/icon/telegram.png')}}" alt="Bank BRI" width="40px">
                        <div class="media-body mt-2">
                            <h5 class="mt-0">Telegram</h5>
                            +62 821-9117-0349 <br>
                            <div class="mt-2">
                                <a target="_blank" href="https://t.me/fbrynryn" class="btn btn-success btn-sm">Hubungi Admin di Telegram</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <div class="row mt-5">
        <div class="col">
            <div class="shadow alert alert-success" role="alert">
                <h6><strong>*Saat konfirmasi silahkan lampirkan :</strong></h6>
                <p><strong>1. Struk bukti transfer diikuti dengan kode unik pada total harga</strong></p>
            </div>
        </div>
    </div>
</div>

@endsection