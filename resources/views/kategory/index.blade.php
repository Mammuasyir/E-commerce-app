@extends('user.template')

@section('content')

<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">List product</h4>
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
					<a href="#">List product </a>
				</li>
			</ul>
		</div>


		<div class="col-md-12">
			<div class="card">
				<div class="card-header">
				</div>
				<div class="card-body" style="margin-top: 15px;">
					<div class="d-flex align-items-center">
						<h4 class="card-title">Add Kategori</h4>


						<!-- <a href="{{route('product.create')}}" class="btn btn-primary btn-round ml-auto">Add Kategori
							<i class="fa fa-plus"></i></a> -->
						<button class="btn btn-primary btn-round ml-auto" data-toggle="modal" data-target="#addRowModal">
							<i class="fa fa-plus"></i>
							Add Kategori
						</button>
					</div>
				</div>
				<div class="card-body">
				</div>

				<form class="form" method="get" action="{{ route('search') }}">
					<div class="form-group w-100 mb-3">
						<label for="search" class="d-block mr-2">Pencarian</label>
						<input type="text" name="search" class="form-control w-50 d-inline " id="search" placeholder="Masukkan keyword">
						<button type="submit" class="btn btn-primary mb-1 ">Cari</button>
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
								<th>Id</th>
								<th>Nama Kategori</th>
								<th style="width: 10%">Action</th>
							</tr>
						</thead>
						<tbody>
							@forelse($kategory as $ba)
							<tr>
								<td>{{$ba->id}}</td>
								<td class="">{{$ba->nama_kategori}}</td>
								<td>
									<div class="form-button-action">

										<!-- <a href="{{route('kategory.edit', $ba->id)}}" data-toggle="tooltip" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
											<i class="fa fa-edit"></i>
										</a> -->
										<button class="btn btn-link btn-primary btn-lg" data-toggle="modal" data-original-title="Edit" data-target="#addRowModal1{{$ba->id}}">
							<i class="fa fa-edit"></i>
						</button>

						@include('kategory.edit')


										<form action="{{route('kategory.destroy', $ba->id)}}" method="POST">
											@csrf
											@method('DELETE')
											<button type="submit" data-toggle="tooltip" title="" class="btn btn-link btn-danger" data-original-title="Remove" onclick="return confirm('Hapus Data {{$ba->nama_kategori}} ?')">
												<i class="fa fa-times"></i>
											</button>
										</form>
										
										<button data-target="#delKategori{{$ba->id}}" data-toggle="modal" title="Delete" class="btn btn-link btn-danger" data-original-title="Remove" >
												<i class="fa fa-times">withmodal</i>
											</button>

									
									@include('kategory.delete-kategori')

									</div>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="3" class="text-center">Data tidak ditemukan</td>
							</tr>

							

							@endforelse
						</tbody>
					</table>
					<div class="row">
						<div class="col-sm-12 col-md-5">
							<div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">
								Showing &nbsp; <strong>{{ $kategory->firstItem() }}</strong> &nbsp;
								to &nbsp; <strong>{{ $kategory->lastItem() }}</strong> &nbsp;
								of &nbsp; <strong>{{ $kategory->total() }}</strong> &nbsp; entries
							</div>
						</div>
						<div class="col-sm-12 col-md-7">
							<div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
								{{ $kategory->links('pagination::bootstrap-4') }}
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<!-- Modal -->
<div class="modal fade" id="addRowModal" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header no-bd">
				<h5 class="modal-title">
					<span class="fw-mediumbold">
						New</span>
					<span class="fw-light">
						Category
					</span>
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<form method="POST" action="{{route('kategori.add')}}" role="form">
				@csrf
				<div class="modal-body">
					<div class="row">
						<div class="col-sm-12">
							<div class="form-group form-group-default">
								<label>Nama Kategori</label>
								<input id="kategori" name="nama_kategori" type="text" class="form-control" placeholder="fill name">
							</div>
						</div>
					</div>
				</div>
				<div class="modal-footer no-bd">
					<button type="submit" id="addRowButton" class="btn btn-primary">Add</button>
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>



@endsection