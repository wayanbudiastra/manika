<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>MANIKA</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="{{asset('/assets/img/icon.ico')}}" type="image/x-icon"/>

	<!-- Fonts and icons -->
	  <link rel="stylesheet" href="{{asset('assets\air-datepicker\dist\css\datepicker.css')}}">
	<script src="{{asset('/assets/js/plugin/webfont/webfont.min.js')}}"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], 
			urls: ["{{asset('/assets/css/fonts.min.css')}}"]},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	 <link rel="stylesheet" href="{{url('assets/select2/dist/css/select2.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('/assets/css/atlantis.min.css')}}">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="{{asset('/assets/css/demo.css')}}">
	<!-- <link rel="stylesheet" href="{{url('/assets/select2/dist/css/select2.min.css')}}"> -->
  <link rel="stylesheet" href="{{url('/assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css')}}">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header" data-background-color="white">
				
				<a href="index.html" class="logo">
					
					<center><img src="{{asset('/assets/img/manika-logo.jpg')}}" width="40%"></center>
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
			<nav class="navbar navbar-header navbar-expand-lg" data-background-color="white">
				
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
									<img src="{{asset('/assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
								</div>
							</a>
							<ul class="dropdown-menu dropdown-user animated fadeIn">
								<div class="dropdown-user-scroll scrollbar-outer">
									<li>
										<div class="user-box">
											<div class="avatar-lg"><img src="{{asset('/assets/img/profile.jpg')}}" alt="image profile" class="avatar-img rounded"></div>
											<div class="u-text">
												<h4>{{auth()->user()->name}}</h4>
												<p class="text-muted">{{auth()->user()->email}}</p><a href="profile.html" class="btn btn-xs btn-secondary btn-sm">View Profile</a>
											</div>
										</div>
									</li>
									<li>
										
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="{{url('/logout')}}">Logout</a>
									</li>
								</div>
							</ul>
						</li>
					</ul>
				</div>
			</nav>
			<!-- End Navbar -->
		</div>

		<!-- Sidebar -->
		<div class="sidebar sidebar-style-2">			
			<div class="sidebar-wrapper scrollbar scrollbar-inner">
				<div class="sidebar-content">
					<div class="user">
						<div class="avatar-sm float-left mr-2">
							<img src="{{asset('/assets/img/profile.jpg')}}" alt="..." class="avatar-img rounded-circle">
						</div>
						<div class="info">
							<a data-toggle="collapse" href="#collapseExample" aria-expanded="true">
								<span>
									{{auth()->user()->name}}
									<span class="user-level">{{auth()->user()->role}}</span>
									<span class="caret"></span>
								</span>
							</a>
							<div class="clearfix"></div>

							<div class="collapse in" id="collapseExample">
								<ul class="nav">
									<li>
										<a href="#profile">
											<span class="link-collapse">My Profile</span>
										</a>
									</li>
									<li>
										<a href="#edit">
											<span class="link-collapse">Edit Profile</span>
										</a>
									</li>
									<li>
										<a href="#settings">
											<span class="link-collapse">Settings</span>
										</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
					<ul class="nav nav-primary">
						<li class="nav-item active">
							<a data-toggle="collapse" href="{{url('Dashboard')}}" class="collapsed" aria-expanded="false">
								<i class="fas fa-home"></i>
								<p>Dashboard</p>	
							</a>
							
						</li>
						<li class="nav-section">
							<span class="sidebar-mini-icon">
								<i class="fa fa-ellipsis-h"></i>
							</span>
							<h4 class="text-section">Components</h4>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#base">
								<i class="fas fa-layer-group"></i>
								<p>Master Data</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="base">
								<ul class="nav nav-collapse">
									<li>
										<a data-toggle="collapse" href="#subnav1">
											<span class="sub-item">Manajemen</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav1">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="{{url('/spesialis')}}">
														<span class="sub-item">Spesialis</span>
													</a>
												</li>
												<li>
													<a href="{{url('/subspesialis')}}">
														<span class="sub-item">Sub Spesialis</span>
													</a>
												</li>
												<li>
													<a href="{{url('/faskes')}}">
														<span class="sub-item">Faskes</span>
													</a>
												</li>
												<li>
													<a href="{{url('/asuransi')}}">
														<span class="sub-item">Asuransi</span>
													</a>
												</li>

												<li>
													<a href="{{url('/rujukan')}}">
														<span class="sub-item">Rujukan</span>
													</a>
												</li>
											</ul>
										</div>
									</li>

									<li>
										<a data-toggle="collapse" href="#subnav2">
											<span class="sub-item">Ruangan</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav2">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="{{url('/poli')}}">
														<span class="sub-item">Poli klinik</span>
													</a>
												</li>
												<li>
													<a href="{{url('/poli/dokter')}}">
														<span class="sub-item">Map.Poli dokter</span>
													</a>
												</li>
												<li>
													<a href="{{url('/poli/tindakan')}}">
														<span class="sub-item">Map.Poli Tindakan</span>
													</a>
												</li>
												<li>
													<a href="{{url('/poli/item')}}">
														<span class="sub-item">Map.Poli Item</span>
													</a>
												</li>
											</ul>
										</div>
									</li>

									<li>
										<a data-toggle="collapse" href="#subnav3">
											<span class="sub-item">Medis</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav3">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="{{url('/jasa')}}">
														<span class="sub-item">Tindakan</span>
													</a>
												</li>
												<li>
													<a href="{{url('/jasakatagori')}}">
														<span class="sub-item">Katagori Tindakan</span>
													</a>
												</li>
												
											</ul>
										</div>
									</li>
									<li>
										<a data-toggle="collapse" href="#subnav4">
											<span class="sub-item">Produk</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav4">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="{{url('/satuanbesar')}}">
														<span class="sub-item">Satuan Besar</span>
													</a>
												</li>
												<li>
													<a href="{{url('/satuankecil')}}">
														<span class="sub-item">Satuan Kecil</span>
													</a>
												</li>
												<li>
													<a href="{{url('/produkitem')}}">
														<span class="sub-item">Item Medis</span>
													</a>
												</li>
												<li>
													<a href="{{url('/produk_katagori')}}">
														<span class="sub-item">Katagori </span>
													</a>
												</li>
												
												<li>
													<a href="{{url('/suplier')}}">
														<span class="sub-item">Suplier</span>
													</a>
												</li>
											</ul>
										</div>
									</li>

									<li>
										<a data-toggle="collapse" href="#subnav5">
											<span class="sub-item">SDM</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav5">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="{{url('/staff')}}">
														<span class="sub-item">Staff</span>
													</a>
												</li>
												<li>
													<a href="{{url('/dokter')}}">
														<span class="sub-item">Dokter</span>
													</a>
												</li>
												<li>
													<a href="{{url('/perawat')}}">
														<span class="sub-item">Perawat</span>
													</a>
												</li>
												<li>
													<a href="{{url('/users')}}">
														<span class="sub-item">User Login</span>
													</a>
												</li>
												<li>
													<a href="{{url('/users_akses')}}">
														<span class="sub-item">User Akses</span>
													</a>
												</li>
											</ul>
										</div>
									  </li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#sidebarLayouts">
								<i class="fas fa-th-list"></i>
								<p>Registrasi</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="sidebarLayouts">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{url('/pasien')}}">
											<span class="sub-item">Data Pasien</span>
										</a>
									</li>
									<li>
										<a href="{{url('/registrasi/new')}}">
											<span class="sub-item">Reg.Pasien Baru</span>
										</a>
									</li>
									<li>
										<a href="{{url('/registrasi')}}">
											<span class="sub-item">Reg.Pasien Lama</span>
										</a>
									</li>
									<li>
										<a href="{{url('/registrasi_retail')}}">
											<span class="sub-item">Reg. Retail</span>
										</a>
									</li>

									<li>
										<a href="{{url('/registrasi/list')}}">
											<span class="sub-item">Reg. List</span>
										</a>
									</li>
									<li>
										<a href="{{url('/registrasi_retail/list')}}">
											<span class="sub-item">Reg. List Retail</span>
										</a>
									</li>
									
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#forms">
								<i class="fas fa-pen-square"></i>
								<p>Inventory</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="forms">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{url('/penerimaan/create')}}">
											<span class="sub-item">Penerimaan</span>
										</a>
									</li>
									<li>
										<a href="{{url('/penerimaan')}}">
											<span class="sub-item">Penerimaan List</span>
										</a>
									</li>
									<li>
										<a href="{{url('/retur')}}">
											<span class="sub-item">Retur Barang</span>
										</a>
									</li>
									<li>
										<a href="{{url('/kartustok')}}">
											<span class="sub-item">Kartu Stok</span>
										</a>
									</li>
									<li>
										<a href="{{url('/set_minmax')}}">
											<span class="sub-item">Min-Max</span>
										</a>
									</li>
									<li>
										<a href="{{url('/adjustment')}}">
											<span class="sub-item">Adustment</span>
										</a>
									</li>
									<li>
										<a href="{{url('/stokopname')}}">
											<span class="sub-item">Stok Opname</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<li class="nav-item">
							<a data-toggle="collapse" href="#tables">
								<i class="fas fa-table"></i>
								<p>Keuangan</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="tables">
								<ul class="nav nav-collapse">
									<li>
										<a href="{{url('/kas')}}">
											<span class="sub-item">Open Kas</span>
										</a>
									</li>
									<li>
										<a href="{{url('/kas/closing')}}">
											<span class="sub-item">Closing Kas</span>
										</a>
									</li>
									<li>
										<a href="{{url('/manualkas')}}">
											<span class="sub-item">Manual Kas</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
					
						<li class="nav-item">
							<a data-toggle="collapse" href="#charts">
								<i class="far fa-chart-bar"></i>
								<p>Pembayaran</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="charts">
								<ul class="nav nav-collapse">
									<li>
										<a data-toggle="collapse" href="#subnav6">
											<span class="sub-item">Rawat Jalan</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav6">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="{{url('/pembayaran')}}">
														<span class="sub-item">Add Pembayaran</span>
													</a>
												</li>
												<li>
													<a href="{{url('/pembayaran_detil')}}">
														<span class="sub-item">On Proses</span>
													</a>
												</li>
												<li>
													<a href="{{url('/pembayaran/show')}}">
														<span class="sub-item">List Pembayaran</span>
													</a>
												</li>
												<li>
													<a href="{{url('/invoice')}}">
														<span class="sub-item">List Invoice</span>
													</a>
												</li>
												<li>
													<a href="{{url('/outsanding')}}">
														<span class="sub-item">Outstanding</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li>
										<a href="charts/sparkline.html">
											<span class="sub-item">Retail</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						<!-- <li class="nav-item">
							<a href="widgets.html">
								<i class="fas fa-desktop"></i>
								<p>Widgets</p>
								<span class="badge badge-success">4</span>
							</a>
						</li> -->
						<li class="nav-item">
							<a data-toggle="collapse" href="#submenu">
								<i class="fas fa-bars"></i>
								<p>Report</p>
								<span class="caret"></span>
							</a>
							<div class="collapse" id="submenu">
								<ul class="nav nav-collapse">
									<li>
										<a data-toggle="collapse" href="#subnav1">
											<span class="sub-item">Master Data</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav1">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="#">
														<span class="sub-item">Level 2</span>
													</a>
												</li>
												<li>
													<a href="#">
														<span class="sub-item">Level 2</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li>
										<a data-toggle="collapse" href="#subnav2">
											<span class="sub-item">Inventory</span>
											<span class="caret"></span>
										</a>
										<div class="collapse" id="subnav2">
											<ul class="nav nav-collapse subnav">
												<li>
													<a href="#">
														<span class="sub-item">Level 2</span>
													</a>
												</li>
											</ul>
										</div>
									</li>
									<li>
										<a href="#">
											<span class="sub-item">Pembayaran</span>
										</a>
									</li>
								</ul>
							</div>
						</li>
						
					</ul>
				</div>
			</div>
		</div>
		<!-- End Sidebar -->

		 @yield('content')

		
			<footer class="footer">
				<div class="container-fluid">
					<nav class="pull-left">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="https://www.themekita.com">
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
					</nav>
					<div class="copyright ml-auto">
						2019, made with <i class="fa fa-heart heart text-danger"></i> by <a href="https://mutiaradev.com">mutiara dev</a>
					</div>				
				</div>
			</footer>
		</div>
		
		<!-- Custom template | don't include it in your project! -->
	
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="{{asset('/assets/js/core/jquery.3.2.1.min.js')}}"></script>
	<script src="{{asset('/assets/js/core/popper.min.js')}}"></script>
	<script src="{{asset('/assets/js/core/bootstrap.min.js')}}"></script>

	<!-- jQuery UI -->
	<script src="{{asset('/assets/js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}"></script>
	<script src="{{asset('/assets/js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js')}}"></script>

	<!-- jQuery Scrollbar -->
	<script src="{{asset('/assets/js/plugin/jquery-scrollbar/jquery.scrollbar.min.js')}}"></script>


	<!-- Chart JS -->
	<script src="{{asset('/assets/js/plugin/chart.js/chart.min.js')}}"></script>

	<!-- jQuery Sparkline -->
	<script src="{{asset('/assets/js/plugin/jquery.sparkline/jquery.sparkline.min.js')}}"></script>

	<!-- Chart Circle -->
	<script src="{{asset('/assets/js/plugin/chart-circle/circles.min.js')}}"></script>

	<!-- Datatables -->
	<script src="{{asset('/assets/js/plugin/datatables/datatables.min.js')}}"></script>

	<!-- Bootstrap Notify -->
	<script src="{{asset('/assets/js/plugin/bootstrap-notify/bootstrap-notify.min.js')}}"></script>

	<!-- jQuery Vector Maps -->
	<script src="{{asset('/assets/js/plugin/jqvmap/jquery.vmap.min.js')}}"></script>
	<script src="{{asset('/assets/js/plugin/jqvmap/maps/jquery.vmap.world.js')}}"></script>

	<!-- Sweet Alert -->
	<script src="{{asset('/assets/js/plugin/sweetalert/sweetalert.min.js')}}"></script>

	<!-- Atlantis JS -->
	<script src="{{asset('/assets/js/atlantis.min.js')}}"></script>

	<!-- Atlantis DEMO methods, don't include it in your project! -->
	<script src="{{asset('/assets/js/setting-demo.js')}}"></script>
	<script src="{{asset('/assets/js/demo.js')}}"></script>
	<script src="{{url('/assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js')}}"></script>
	<!-- <script src="{{url('/assets/select2/dist/js/select2.full.min.js')}}"></script> -->
	<script src="{{asset('assets\air-datepicker\dist\js\datepicker.js')}}"></script>
    <script src="{{asset('assets\air-datepicker\dist\js\i18n\datepicker.en.js')}}"></script>
    <script src="{{url('/assets/select2/dist/js/select2.full.min.js')}}"></script>
	@yield('js')
	
</body>
</html>