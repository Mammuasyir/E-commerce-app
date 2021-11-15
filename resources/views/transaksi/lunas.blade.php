@extends('user.template')

@section('content')

<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">Transaksi</h4>
			<ul class="breadcrumbs">
				<li class="nav-home">
					<a href="#">
						<i class="flaticon-home"></i>
					</a>
				</li>
				<li class="separator">
					<i class="flaticon-right-arrow"></i>
				</li>
				<li class="nav-item">
					<a href="#">Transaksi User </a>
				</li>
			</ul>
		</div>


		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
				</div>
				<div class="card-body" style="margin-top: 15px;">

					<form class="form" method="get" action="{{ route('transaksi.search') }}">
						<div class="form-group w-100 mb-3">
							<label for="search" class="d-block mr-2">Pencarian</label>
							<input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
							<button type="submit" class="btn btn-primary mb-1">Cari</button>
						</div>
					</form>
					@if($massage = Session::get('success'))
					<div class="alert alert-success" role="alert">
						{{$massage}}
					</div>
					@endif


					<div class="table-responsive">
						<table id="add-row" class="display table table-striped table-hover">
							<thead>
								<tr>
                                <th scope="col">No</th>
                                <th scope="col">Kode unik</th>
                                <th scope="col">Kode Pemesanan</th>
                                <th scope="col">Total Harga</th>
                                <th scope="col">Nama Member</th>
                                <th scope="col">Status</th>
                                <th style="width: 10%">Action</th>
								</tr>
							</thead>

							<tbody>
								@foreach($pesanan as $pe)
								<tr role="product" class="odd">
									<td>{{$i++}}</td>
									<td class="">{{$pe->kode_unik}}</td>
									<td class="">{{$pe->kode_pemesanan}}</td>
									<td class="sorting_1">Rp. {{number_format($pe->total_harga + $pe->kode_unik)}}</td>
                                    <td class="">{{$pe->user->name}} / {{$pe->user->username}}</td>
									<td>
                                    @if ($pe->status == 1)
                                <span class="badge bg-warning" style="font-size: 12px;"><i class="fas fa-history"></i>Pending</span>
                                @elseif ($pe->status == 2)
                                <span class="badge bg-primary" style="font-size: 12px;"><i class="fas fa-check"></i>Lunas</span>
                                @elseif ($pe->status == 3)
                                <span class="badge bg-success" style="font-size: 12px;"><i class="fas fa-times"></i>Terkirim</span>
                                @endif
									</td>
									<td>
										<div class="form-button-action">
											
	
                                        <button class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-original-title="Edit" data-target="#addRowModal3">
							<i class="fa fa-edit"></i>
						</button>

                                                @include('transaksi.edit-pending')

												<form action="#" method="POST">
												@csrf
												@method('DELETE')
												<button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove">
													<i class="fa fa-times"></i>
												</button>

											</form>
										</div>
									</td>
								</tr>
								@endforeach
							</tbody>
						</table> 
				</div>
			</div>
		</div>
		
	</div>
	
</div>



@endsection