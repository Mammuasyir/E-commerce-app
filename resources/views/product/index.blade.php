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
						<h4 class="card-title">Add Product</h4>


						<a href="{{route('product.create')}}" class="btn btn-primary btn-round ml-auto">Add product
							<i class="fa fa-plus"></i></a>
					</div>

					<form class="form" method="get" action="{{ route('search') }}">
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
									<th>No</th>
									<th>name_product</th>
									<th>Price</th>
									<th>status</th>
									<th>quantity</th>
									<th>weight</th>
									<th>image</th>
									<th style="width: 10%">Action</th>
								</tr>
							</thead>
							<tfoot>

							</tfoot>
							<tbody>
								@foreach($products as $product)
								<tr role="product" class="odd">
									<td>{{$product->id}}</td>
									<td class="">{{$product->name_product}}</td>
									<td class="sorting_1">Rp. {{ number_format($product->Price)}}</td>
									<td>
										@if($product->status == 1)
										Tersedia
										@else
										Kosong
										@endif
									</td>
									<td>{{$product->quantity}}</td>
									<td>{{$product->weight}}</td>
									<td><img src="{{url('storage/',$product->image)}}" style="max-width: 100px;" class="img-thumbnail" alt=""></td>
									<td>
										<div class="form-button-action">
											
	
												<a href="{{route('product.edit', $product->id)}}" data-toggle="tooltip" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
													<i class="fa fa-edit"></i>
												</a>

												<form action="{{route('product.destroy', $product->id) }}" method="POST">
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
						<div class="row">
                                <div class="col-sm-12 col-md-5">
                                    <div class="dataTables_info" id="add-row_info" role="status" aria-live="polite">
                                        Showing &nbsp; <strong>{{ $products->firstItem() }}</strong> &nbsp;
                                        to &nbsp; <strong>{{ $products->lastItem() }}</strong> &nbsp;
                                        of &nbsp; <strong>{{ $products->total() }}</strong> &nbsp; entries
                                    </div>
                                </div>
                                <div class="col-sm-12 col-md-7">
                                    <div class="dataTables_paginate paging_simple_numbers" id="add-row_paginate">
                                        {{ $products->links('pagination::bootstrap-4') }}
                                    </div>
                                </div>
                            </div>
				</div>
			</div>
		</div>
		
	</div>
	
</div>



@endsection