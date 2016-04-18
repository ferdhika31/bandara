			<!-- BEGIN CONTENT -->
			<div class="page-content-wrapper">
				<div class="page-content">
					<!-- BEGIN PAGE HEADER-->
					<h3 class="page-title">
						<?php echo $title;?> <small><?php echo $description;?></small>
					</h3>
					<div class="page-bar">
						<ul class="page-breadcrumb">
							<li>
								<i class="fa fa-home"></i>
									<a href="<?php echo site_url('admin');?>">Home</a>
									<i class="fa fa-angle-right"></i>
								</li>
							<li>
								<a href="<?php echo site_url('admin/user');?>"><?php echo $title;?></a>
							</li>
						</ul>
					</div>
					<!-- END PAGE HEADER-->
					<!-- BEGIN DASHBOARD STATS -->
					<div class="row">
						<div class="col-md-12">
							<?php if(!empty($message)):?>
							<div class="note note-success">
								<h4 class="block">Info</h4>
								<p><?php echo $message;?></p>
							</div>
						<?php endif;?>
							<!-- BEGIN SAMPLE TABLE PORTLET-->
							<div class="portlet box red">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-user"></i><?php echo $title;?>
									</div>
									<!-- <div class="tools">
										
									</div> -->
								</div>

								<div class="portlet-body">
									<div class="table-scrollable">

										<table class="table table-hover">
											<thead>
												<tr>
													<th>No</th>
													<th>Username</th>
													<th>Nama</th>
													<th>Hak</th>
												</tr>
											</thead>
											<tbody>
											<?php 

											$no=1; 
											if(!empty($listUser)):
												foreach ($listUser as $user):
											?>
											<tr <?php echo ($user['username']==$this->session->userdata('uname')) ? 'class="active"' : '';?>>
												<td><?=$no;?></td>
												<td><?=$user['username'];?></td>
												<td><?=$user['nama'];?></td>
												<td><?=$user['hak'];?></td>
											</tr>
												<?php $no++; endforeach; else: ?>
											<tr>
												<td colspan="4">Tidak ada data.</td>
											</tr>
											<?php endif; ?>
											</tbody>
										</table>
									</div>
									<!-- <center>
										<a class="btn default green" data-toggle="modal" href="#tambah">
											Tambah
										</a>
										<a class="btn default green" href="<?php echo site_url('admin/pesawat/tambah');?>">
											Tambah
										</a>
									</center> -->
								</div>
							</div>
						<!-- END SAMPLE TABLE PORTLET-->
						</div>
					</div>
					<!-- END DASHBOARD STATS -->
					<div class="clearfix">
					</div>
				</div>
			</div>
			<!-- END CONTENT -->
