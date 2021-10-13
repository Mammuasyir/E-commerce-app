@extends('user.template')

@section('content')

<div class="content">
	<div class="page-inner">
		<div class="page-header">
			<h4 class="page-title">{{$title}}</h4>
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
					<a href="#">{{$title}} </a>
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
								@foreach($product as $product)
								<tr role="product" class="odd">
									<td>{{$i++}}</td>
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
									<td><img src="{{url('storage/',$product->image)}}" alt="..." style="max-width: 100px;" class="img-thumbnail" alt=""></td>
									<td>
										<div class="form-button-action">
										<form action="{{route('product.destroy', $product->id) }}" method="POST">

											<a href="{{route('product.edit', $product->id)}}" data-toggle="tooltip" class="btn btn-link btn-primary btn-lg" data-original-title="Edit Task">
												<i class="fa fa-edit"></i>
											</a>
											
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
</div>
</div>

@endsection