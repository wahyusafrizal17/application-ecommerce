<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Atlantis Bootstrap 4 Admin Dashboard</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{ asset('assets/img/icon.ico') }}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="{{ asset('assets/js/plugin/webfont/webfont.min.js') }}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['/assets/css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/atlantis2.css') }}">
	<link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">
</head>
<?php
	$pengaturan = App\Models\Setting::find(1);
?>
<body>
	<div class="wrapper horizontal-layout-2">
		
		<div class="main-header" data-background-color="light-blue2">
			<div class="nav-top">
				<div class="container d-flex flex-row">
					<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<i class="icon-menu"></i>
						</span>
					</button>
					<button class="topbar-toggler more"><i class="icon-options-vertical"></i></button>
					<!-- Logo Header -->
					<a href="/" class="logo d-flex align-items-center" style="text-decoration: none">
						<h5 class="card-title text-white">{{ $pengaturan->nama_sekolah }}</h5>
					</a>
					<!-- End Logo Header -->

					<!-- Navbar Header -->
					<nav class="navbar navbar-header navbar-expand-lg p-0">

						<div class="container-fluid p-0">
							<div class="collapse" id="search-nav">
								<form action="" method="POST" class="navbar-left navbar-form nav-search ml-md-3">
									@csrf
									<div class="input-group">
										<div class="input-group-prepend">
											<button type="submit" class="btn btn-search pr-1">
												<i class="fa fa-search search-icon"></i>
											</button>
										</div>
										<input type="text" name="search" placeholder="Search ..." class="form-control">
									</div>
								</form>
							</div>
							<ul class="navbar-nav topbar-nav ml-md-auto align-items-center">
								<li class="nav-item toggle-nav-search hidden-caret">
									<a class="nav-link" data-toggle="collapse" href="#search-nav" role="button" aria-expanded="false" aria-controls="search-nav">
										<i class="fa fa-search"></i>
									</a>
								</li>
								{{-- <li class="nav-item dropdown hidden-caret">
									<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-comment"></i>
										<span class="notification">{{ count(count_messages()) }}</span>
									</a>
									<ul class="dropdown-menu messages-notif-box animated fadeIn" aria-labelledby="messageDropdown">
										<li>
											<div class="dropdown-title d-flex justify-content-between align-items-center">
												Messages 									
												<a href="#" class="small">Mark all as read</a>
											</div>
										</li>
										<li>
											<div class="message-notif-scroll scrollbar-outer">
												<div class="notif-center">
													<a href="#">
														<div class="notif-img"> 
															<img src="../assets/img/jm_denis.jpg" alt="Img Profile">
														</div>
														<div class="notif-content">
															<span class="subject">Jimmy Denis</span>
															<span class="block">
																How are you ?
															</span>
															<span class="time">5 minutes ago</span> 
														</div>
													</a>
													<a href="#">
														<div class="notif-img"> 
															<img src="../assets/img/chadengle.jpg" alt="Img Profile">
														</div>
														<div class="notif-content">
															<span class="subject">Chad</span>
															<span class="block">
																Ok, Thanks !
															</span>
															<span class="time">12 minutes ago</span> 
														</div>
													</a>
													<a href="#">
														<div class="notif-img"> 
															<img src="../assets/img/mlane.jpg" alt="Img Profile">
														</div>
														<div class="notif-content">
															<span class="subject">Jhon Doe</span>
															<span class="block">
																Ready for the meeting today...
															</span>
															<span class="time">12 minutes ago</span> 
														</div>
													</a>
													<a href="#">
														<div class="notif-img"> 
															<img src="../assets/img/talha.jpg" alt="Img Profile">
														</div>
														<div class="notif-content">
															<span class="subject">Talha</span>
															<span class="block">
																Hi, Apa Kabar ?
															</span>
															<span class="time">17 minutes ago</span> 
														</div>
													</a>
												</div>
											</div>
										</li>
										<li>
											<a class="see-all" href="javascript:void(0);">See all messages<i class="fa fa-angle-right"></i> </a>
										</li>
									</ul>
								</li> --}}
								<li class="nav-item dropdown hidden-caret">
									<a class="nav-link dropdown-toggle" href="#" id="messageDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-comment"></i>
										<span class="notification">{{ count(count_messages()) }}</span>
									</a>
									<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="messageDropdown">
										<li>
											<div class="dropdown-title">Kamu memilik {{ count(count_messages()) }} pesan</div>
										</li>
										<li>
											<div class="notif-scroll scrollbar-outer">
												<div class="notif-center">
													@foreach(count_messages() as $row)
													<a href="#">
														<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
														<div class="notif-content">
															<span class="block">
																Pesan baru dari {{ $row->name }}
															</span>
															<span class="time">{{ cek_minute($row->created_at) }} menit yang lalu</span> 
														</div>
													</a>
													@endforeach
												</div>
											</div>
										</li>
										{{-- <li>
											<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
										</li> --}}
									</ul>
								</li>
								<li class="nav-item dropdown hidden-caret">
									<a class="nav-link dropdown-toggle" href="#" id="notifDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="fa fa-bell"></i>
										<span class="notification">{{ count(count_order_by_status('DIPROSES')) }}</span>
									</a>
									<ul class="dropdown-menu notif-box animated fadeIn" aria-labelledby="notifDropdown">
										<li>
											<div class="dropdown-title">Kamu memilik {{ count(count_order_by_status('DIPROSES')) }} pesanan baru</div>
										</li>
										<li>
											<div class="notif-scroll scrollbar-outer">
												<div class="notif-center">
													@foreach(count_order_by_status('DIPROSES') as $row)
													<a href="#">
														<div class="notif-icon notif-primary"> <i class="fa fa-user-plus"></i> </div>
														<div class="notif-content">
															<span class="block">
																Pesanan baru dari {{ $row->checkout->user->name }}
															</span>
															<span class="time">{{ cek_minute($row->created_at) }} menit yang lalu</span> 
														</div>
													</a>
													@endforeach
												</div>
											</div>
										</li>
										{{-- <li>
											<a class="see-all" href="javascript:void(0);">See all notifications<i class="fa fa-angle-right"></i> </a>
										</li> --}}
									</ul>
								</li>
								<li class="nav-item dropdown hidden-caret">
									<a class="dropdown-toggle profile-pic" data-toggle="dropdown" href="#" aria-expanded="false">
										<div class="avatar-sm">
											<img src="{{ asset('assets/img/setting/'.$pengaturan->logo) }}" alt="{{ $pengaturan->name }}" class="avatar-img rounded-circle">
										</div>
									</a>
									<ul class="dropdown-menu dropdown-user animated fadeIn">
										<div class="dropdown-user-scroll scrollbar-outer">
											<li>
												<div class="user-box">
													<div class="avatar-lg"><img src="{{ asset('assets/img/setting/'.$pengaturan->logo) }}" alt="image profile" class="avatar-img rounded"></div>
													<div class="u-text">
														<h4>{{ $pengaturan->name }}</h4>
														<p class="text-muted">{{ $pengaturan->email }}</p>
													</div>
												</div>
											</li>
											<li>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="">Account Setting</a>
												<div class="dropdown-divider"></div>
												<a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
												document.getElementById('logout-form').submit();">Keluar</a>
												<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
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
			</div>
			<div class="nav-bottom">
				<div class="container">
					<h3 class="title-menu d-flex d-lg-none"> 
						Menu 
						<div class="close-menu"> <i class="flaticon-cross"></i></div>
					</h3>
					<ul class="nav page-navigation page-navigation-info bg-white">
						
						<li class="nav-item">
							<a class="nav-link" href="{{ route('admin.dashboard') }}">
								<i class="link-icon icon-screen-desktop"></i>
								<span class="menu-title">Dashboard</span>
							</a>
						</li>
						<li class="nav-item submenu">
							<a class="nav-link" href="#">
								<i class="link-icon icon-pie-chart"></i>
								<span class="menu-title">Data master</span>
							</a>
							<div class="navbar-dropdown animated fadeIn">
								<ul>
									<li>
										<a href="{{ route('slider.index') }}">Data Slider</a>
									</li>
									<li>
										<a href="{{ route('card.index') }}">Data Rekening</a>
									</li>
									<li>
										<a href="{{ route('product.index') }}">Data Produk</a>
									</li>
									<li>
										<a href="{{ route('category.index') }}">Data Kategori</a>
									</li>
									<li>
										<a href="{{ route('user.index') }}">Data Petugas</a>
									</li>
									<li>
										<a href="{{ route('customer.index') }}">Data Customer</a>
									</li>
									<li>
										<a href="{{ route('tem.index') }}">Syarat Dan Ketentuan</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item submenu">
							<a class="nav-link" href="#">
								<i class="link-icon icon-docs"></i>
								<span class="menu-title">Pesanan 
									{{-- <sup class="notif-pesanan">{{ count(count_order()) }}</sup> --}}
								</span>
							</a>
							<div class="navbar-dropdown animated fadeIn">
								<ul>
									<li>
										<a href="{{ route('transaction.index') }}">Pesanan belum diproses @if(count(count_order_by_status('DIPROSES')) > 0) <sup class="notif-pesanan" style="top: 0px; right: -20px">{{ count(count_order_by_status('DIPROSES')) }}</sup> @endif</a>
									</li>
									<li>
										<a href="{{ route('transaction.index', ['status' => 'DIKEMAS']) }}">Pesanan belum dikirim @if(count(count_order_by_status('DIKEMAS')) > 0) <sup class="notif-pesanan" style="top: 0px; right: -20px">{{ count(count_order_by_status('DIKEMAS')) }}</sup> @endif</a>
									</li>
									<li>
										<a href="{{ route('transaction.index', ['status' => 'DIKIRIM']) }}">Pesanan sedang dikirim @if(count(count_order_by_status('DIKIRIM')) > 0) <sup class="notif-pesanan" style="top: 0px; right: -20px">{{ count(count_order_by_status('DIKIRIM')) }}</sup> @endif</a>
									</li>
									<li>
										<a href="{{ route('transaction.index', ['status' => 'DITERIMA']) }}">Pesanan selesai @if(count(count_order_by_status('DITERIMA')) > 0) <sup class="notif-pesanan" style="top: 0px; right: -20px">{{ count(count_order_by_status('DITERIMA')) }}</sup> @endif</a>
									</li>
									{{-- <li>
										<a href="{{ route('sales.index') }}">Data Order</a>
									</li> --}}
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('contact-us.index') }}">
								<i class="link-icon fa fa-comment"></i>
								<span class="menu-title">Pesan</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('laporan.index') }}">
								<i class="link-icon icon-docs"></i>
								<span class="menu-title">Laporan</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('setting.index') }}">
								<i class="link-icon icon-settings"></i>
								<span class="menu-title">Pengaturan</span>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
								<i class="link-icon icon-logout"></i>
								<span class="menu-title">Keluar</span>
							</a>

							<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
								@csrf
							</form>
						</li>
					</ul>
				</div>
			</div>
		</div>

            @yield('content')

            <footer class="footer">
                <div class="container">
                    {{-- <nav class="pull-left">
                        <ul class="nav">
                            <li class="nav-item">
                                <a class="nav-link" href="http://www.themekita.com">
                                    ThemeKita
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Help
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="#">
                                    Licenses
                                </a>
                            </li>
                        </ul>
                    </nav> --}}
                    <div class="copyright ml-auto">
                        <p>Copyright © {{ date('Y') }} <span class="text-primary">{{ $pengaturan->name }}</span></p>
                    </div>				
                </div>
            </footer>
        </div>
        <script src="{{ asset('assets/js/core/jquery.3.2.1.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/popper.min.js') }}"></script>
        <script src="{{ asset('assets/js/core/bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/moment/moment.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/chart.js/chart.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/chart-circle/circles.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/datatables/datatables.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/bootstrap-toggle/bootstrap-toggle.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jqvmap/maps/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/gmaps/gmaps.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/dropzone/dropzone.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/fullcalendar/fullcalendar.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/datepicker/bootstrap-datetimepicker.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/bootstrap-tagsinput/bootstrap-tagsinput.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/bootstrap-wizard/bootstrapwizard.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/jquery.validate/jquery.validate.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/summernote/summernote-bs4.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/select2/select2.full.min.js') }}"></script>
        <script src="{{ asset('assets/js/plugin/sweetalert/sweetalert.min.js') }}"></script>
        <script src="{{ asset('assets/js/atlantis2.min.js') }}"></script>
        <script src="{{ asset('assets/js/demo.js') }}"></script>
		@stack('scripts')

		<script>
			$('#basic-datatables').DataTable({
				"scrollX": true
			});

			$('#datepicker').datetimepicker({
				format: 'MM/DD/YYYY',
			});

			$('#basic').select2({
				theme: "bootstrap"
			});
		</script>
		@include('sweet::alert')
    </body>
    </html>
