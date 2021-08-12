<!-- loader  -->
<div class="loader_bg">
		<div class="loader"><img src="<?= base_url('assets/') ?>images/loading.gif" alt="#" /></div>
	</div>
	<!-- end loader -->
	<!-- header -->
	<header>
		<!-- header inner -->
		<div class="header">
		<div class="header_white_section">
			<div class="container-fluid">
				<div class="row">
					<div class="col-md-12">
					<div class="header_information">
						<ul>
							<li><img src="<?= base_url('assets/') ?>images/1.png" alt="#"/> 145.street road new York</li>
							<li><img src="<?= base_url('assets/') ?>images/2.png" alt="#"/> +71  5678954378</li>
							<li><img src="<?= base_url('assets/') ?>images/3.png" alt="#"/> Demo@hmail.com</li>
						</ul>
					</div>
					</div>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
				<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
					<div class="full">
					<div class="center-desk">
						<div class="logo"> <a href="<?= base_url('c_home') ?>"><img src="<?= base_url('assets/') ?>images/tngc.png" width="100" alt="#"></a> </div>
					</div>
					</div>
				</div>
				<div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
					<div class="menu-area">
					<div class="limit-box">
						<nav class="main-menu">
							<ul class="menu-area-main">
								<li> <a href="<?= base_url() ?>">Home</a> </li>
								<li> <a href="#about">About</a> </li>
								<?php 
									if($this->session->userdata('nama') != "") {
										echo '<li>
												<div class="dropdown">
													<a class="btn btn-warning btn-lg text-white dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" style="display: inline">
														Akun
													</a>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<a class="dropdown-item" href="'.base_url('c_home/profil').'">Profil Saya</a>
														<a class="dropdown-item" href="'.base_url('c_home/pesanan').'">Pesanan Saya</a>
														<a class="dropdown-item" href="' .base_url('c_auth/logout'). '">Logout</a>
													</div>
												</div>
												</li>';
										// echo '<li><a href="' .base_url('c_auth/logout'). '" class="btn btn-warning btn-sm dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" style="display: inline">Logout</a></li>';
									} else 
										echo '<li>
												<div class="dropdown">
													<a class="btn btn-warning btn-lg text-white dropdown-toggle" id="dropdownMenuButton" data-toggle="dropdown" style="display: inline">
														Login
													</a>
													<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
														<a class="dropdown-item" href="' .base_url('c_home/login'). '">Login Pendaki</a>
														<a class="dropdown-item" href="' .base_url('c_admin'). '">Login Admin</a>
													</div>
												</div>
												</li>';	
								?>
							</ul>
						</nav>
					</div>
					</div>
				</div>
			</div>
		</div>
		</div>
		<!-- end header inner -->
	</header>
	<!-- end header -->