<!-- BEGIN CONTAINER -->
		<div class="page-container">
			<!-- BEGIN SIDEBAR -->
			<div class="page-sidebar-wrapper">
				<div class="page-sidebar navbar-collapse collapse">
					<!-- BEGIN SIDEBAR MENU -->
					<ul class="page-sidebar-menu" data-auto-scroll="true" data-slide-speed="200">
						<li class="sidebar-search-wrapper">
							<form class="sidebar-search ">
							</form>
						</li>
						<li class="start <?php echo ($menu=='dashboard')? 'active open': '';?>">
							<a href="<?php echo site_url('admin');?>">
								<i class="fa fa-dashboard"></i>
								<span class="title">Dashboard</span>
								<span class="selected"></span>
							</a>
						</li>
						<?php if($this->session->userdata("hak")=="admin"):?>
						<li <?php echo ($menu=='pengguna')? 'class="active open"': '';?>>
							<a href="<?php echo site_url('admin/user');?>">
								<i class="fa fa-user"></i>
								<span class="title">Pengguna</span>
								<span class="selected"></span>
							</a>
						</li>
						<?php endif;?>
						<li class="last <?php echo ($menu=='list_pesawat' || $menu=='tambah_pesawat' || $menu=='ubah_pesawat' || $menu=='tambah_jadwal' || $menu=='ubah_jadwal')? 'active open': '';?>">
							<a href="javascript:;">
								<i class="fa fa-plane"></i>
								<span class="title">Pesawat</span>
								<span class="arrow "></span>
							</a>
							<ul class="sub-menu">
								<?php if($this->session->userdata("hak")=="admin"):?>
								<li>
									<a href="<?php echo site_url('admin/pesawat');?>">
										Data Pesawat
									</a>
								</li>
								<?php endif;?>
								<li>
									<a href="<?php echo site_url('admin/jadwal');?>">
										Jadwal Keberangkatan
									</a>
								</li>
							</ul>
						</li>
						<li <?php echo ($menu=='pesan')? 'class="active open"': '';?>>
							<a href="<?php echo site_url('admin/pesan');?>">
								<i class="fa fa-inbox"></i>
								<span class="title">Pesan</span>
								<span class="selected"></span>
							</a>
						</li>
					</ul>
				<!-- END SIDEBAR MENU -->
				</div>
			</div>
			<!-- END SIDEBAR -->