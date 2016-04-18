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
								<a href="<?php echo site_url('admin');?>"><?php echo $title;?></a>
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
						<div class="col-md-12">
							<div class="portlet box red">
								<div class="portlet-title">
									<div class="caption">
										<i class="fa fa-plane"></i>Data Pesawat
									</div>
									<!-- <div class="tools">
									</div> -->
								</div>
								<div class="portlet-body form">
									<!-- BEGIN FORM-->
									<form action="" method="post">
										<div class="form-body">
											<div class="form-group">
												<label class="control-label">Kode Pesawat</label>
												<input type="text" class="form-control" name="A_kode" value="<?= (!empty($data['kode_pesawat']))?$data['kode_pesawat']:''; ?>" placeholder="Kode">
											</div>
											<div class="form-group">
												<label class="control-label">Nama Maskapai</label>
												<select class="form-control" name="A_nama">
													<?php
														$maskapai = $this->config->item('maskapai');
														foreach ($maskapai as $maskapai):
													?>
													<option value="<?php echo $maskapai;?>" <?php echo (!empty($data['nama_maskapai'])) ? ($maskapai==$data['nama_maskapai']) ? 'selected' : '' : '';?>><?php echo $maskapai;?></option>
													<?php endforeach;?>
												</select>
											</div>
										</div>
										<div class="form-actions">
											<button type="submit" class="btn green">Submit</button>
											<button type="button" class="btn default">Cancel</button>
										</div>
									</form>
									<!-- END FORM-->
								</div>
							</div>
						</div>
						<!-- <form method="post" action="">
							Kode Pesawat : <input type="text" name="A_kode" value="<?= (!empty($data['kode_pesawat']))?$data['kode_pesawat']:''; ?>" placeholder="Kode"><br>
							Nama Maskapai : <input type="text" name="A_nama" value="<?= (!empty($data['nama_maskapai']))?$data['nama_maskapai']:''; ?>" placeholder="Nama"><br>
							Image : <input type="text" name="A_image" value="<?= (!empty($data['image']))?$data['image']:''; ?>" placeholder="Image"><br>
							Status : <select name="A_stt">
								<option value="aktif" <?= (!empty($data['status'])) ? ($data['status']=="aktif")?'selected':'' : ''; ?>>Aktif</option>
								<option value="!aktif" <?= (!empty($data['status'])) ? ($data['status']=="!aktif")?'selected':'' : ''; ?>>Tidak Aktif</option>
							</select>
							<input type="submit" value="Kirim">
						</form> -->
						</div>
					</div>
					<!-- END DASHBOARD STATS -->
					<div class="clearfix">
					</div>
				</div>
			</div>
			<!-- END CONTENT -->
