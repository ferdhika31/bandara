			
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
										<i class="fa fa-plane"></i><?php echo $title;?>
									</div>
									<!-- <div class="tools">
									</div> -->
								</div>
								<div class="portlet-body form">
									<!-- BEGIN FORM-->
									<form action="" method="post">
										<div class="form-body">
											<div class="form-group">
												<label class="control-label">Pesawat</label>
												<select  class="form-control" name="A_pesawat">
													<?php
														if(!empty($dataPesawat)):
															foreach ($dataPesawat as $dataPesawat):
													?>
													<option value="<?php echo $dataPesawat['kode_pesawat'];?>" <?php echo (!empty($data['kode_pesawat'])) ? ($dataPesawat['kode_pesawat']==$data['kode_pesawat']) ? 'selected' : '' : '';?>>
														<?php echo $dataPesawat['kode_pesawat'].' - '.$dataPesawat['nama_maskapai']; ?>
													</option>
													<?php
															endforeach;
														else:
													?>
													<option>-Tidak ada data pesawat-</option>
													<?php
													endif;
													?>
												</select>
											</div>
											<div class="form-group">
												<label class="control-label">Tujuan</label>
												<select class="form-control" name="A_tujuan">
													<?php
														$tujuan = $this->config->item('tujuan');
														foreach ($tujuan as $tujuan):
													?>
													<option value="<?php echo $tujuan;?>" <?php echo (!empty($data['tujuan'])) ? ($tujuan==$data['tujuan']) ? 'selected' : '' : '';?>><?php echo $tujuan;?></option>
													<?php endforeach;?>
												</select>
											</div>
											<div class="form-group">
												<label class="control-label">Waktu</label>
												<div class="bootstrap-timepicker">
													<input id="timepicker" name="A_waktu" <?php echo (!empty($data['waktu'])) ? 'value="'.$data['waktu'].'"' : '';?> type="text" class="form-control">
												</div>
											</div>
											<div class="form-group">
												<label class="control-label">Keterangan</label>
												<select class="form-control" name="A_ket">
													<?php
														$keterangan = $this->config->item('keterangan');
														foreach ($keterangan as $keterangan):
													?>
													<option value="<?php echo $keterangan;?>" <?php echo (!empty($data['keterangan'])) ? ($keterangan==$data['keterangan']) ? 'selected' : '' : '';?>><?php echo $keterangan;?></option>
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
						</div>
					</div>
					<!-- END DASHBOARD STATS -->
					<div class="clearfix">
					</div>
				</div>
			</div>
			<!-- END CONTENT -->