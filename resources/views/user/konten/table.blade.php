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
					<div class="row">
						<div class="col-md-12">
<div class="card">
								<div class="card-header">
									<div class="card-title">Table</div>
								</div>
								<div class="card-body">
									<div class="card-sub">									
										TABLE
									</div>
									<table class="table mt-3">
										<thead>
											<tr>
											<th scope="col">PHOTO</th>
												<th scope="col">NO</th>
												<th scope="col">ID</th>
												<th scope="col">NAME</th>
												<th scope="col">USERNAME</th>
												<th scope="col">EMAIL</th>
												<th scope="col">ADDRESS</th>
												<th scope="col">SINCE</th>
												

											</tr>

										</thead>
										<tbody>
											@foreach($user as $user)
											<tr>
											<td><img src="{{url('storage', $user->image)}}" alt="..." class="avatar-img rounded-circle" style="width: 100px !important; height: 100px !important;"></td>
												<td>{{$i++}}</td>
												<td>{{$user->id}}</td>
												<td>{{$user->name}}</td>
												<td>{{$user->username}}</td>
												<td>{{$user->email}}</td>
												<td>{{$user->address}}</td>
												<td>{{$user->created_at}}</td>
												
											</tr>
											@endforeach
										</tbody>
									</table>
								</div>
							</div>

@endsection