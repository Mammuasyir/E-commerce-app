<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="blue">
				
				<a href="{{url('/')}}" class="logo">
					<img src="{{asset('atlantis/assets/img/logo.svg')}}" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
			<!-- End Logo Header -->

			<!-- Navbar Header -->
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="blue2">
				
				<div class="container-fluid">
					<div class="collapse" id="search-nav">
						<form class="navbar-left navbar-form nav-search mr-md-3">
							<div class="input-group">
								<div class="input-group-prepend">
									<button type="submit" class="btn btn-search pr-1">
										<i class="fa fa-search search-icon"></i>
									</button>
								</div>
								<input type="text" placeholder="Search ..." class="form-control">
							</div>
						</form>
					</div>
					<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
						<li class="nav-item toggle-nav-search hidden-caret">
							<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
								<i class="fa fa-search"></i>
							</a>
						</li>
						<li class="nav-item dropdown hidden-caret">
							<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
								<div class="avatar-sm">
								@if (Auth::user()->name =='')
							<img src="https://ui-avatars.com/api/?name={{Auth::user()->username}}" alt="..." class="avatar-img rounded-circle">
							@elseif (Auth::user()->name != '')
							<img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" alt="..." class="avatar-img rounded-circle">
							@endif
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg">
											@if (Auth::user()->name =='')
							<img src="https://ui-avatars.com/api/?name={{Auth::user()->username}}" alt="..." class="avatar-img rounded-circle">
							@elseif (Auth::user()->name != '')
							<img src="https://ui-avatars.com/api/?name={{Auth::user()->name}}" alt="..." class="avatar-img rounded-circle">
							@endif</div>
											<div class="u-text">
												<h4>{{Auth::user()->name}}</h4>
												<p class="text-muted">{{Auth::user()->email}}</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="myprofile.html">My Profile</a>
										<a class="dropdown-item" href="{{route('profile.edit', Auth::user()->username)}}">Edit Profile</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">Pengaturan Akun</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{route('logout')}}"
										onclick="event.preventDefault();
										document.getElementById('logout-form').submit();">
										{{ __('Keluar') }}
									</a>
									<form id="logout-form" action="{{route('logout') }}" method="POST" class="d-none">
										@csrf
									</form>

									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>