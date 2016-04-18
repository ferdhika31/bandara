<script src="http://code.responsivevoice.org/responsivevoice.js"></script>
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
								<a href="<?php echo site_url('admin/jadwal');?>"><?php echo $title;?></a>
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
										<i class="fa fa-plane"></i><?php echo $title;?>
									</div>
									<!-- <div class="tools">
										
									</div> -->
								</div>

								<div class="portlet-body">

									<div class="box">
										<div class="box-body">
											<table id="example2" class="table table-bordered table-hover">
												<thead>
													<tr>
														<th>No</th>
														<th>Kode Pesawat</th>
														<th>Nama Maskapai</th>
														<th>Tujuan</th>
														<th>Waktu</th>
														<th>Aksi</th>
														<?php if($this->session->userdata("hak")=="operator"): ?>
														<th>Suara</th>
														<?php endif; ?>
													</tr>
												</thead>

												<tbody>
													<?php 

													$no=1; 
													$temp = array();  
													if(!empty($list)):
														$pesan = $this->config->item('pesanJadwal');
														foreach ($list as $jadwal): 
														$temp[] = array(
															'index' => $jadwal['index'],
															'kode' => $jadwal['kode_pesawat'],
															'nama' => $jadwal['nama_maskapai'],
															'tujuan' => $jadwal['tujuan'],
															'waktu' => $jadwal['waktu']
														);
													?>
													<tr>
														<td><?=$no;?></td>
														<td><?=$jadwal['kode_pesawat'];?></td>
														<td><?=$jadwal['nama_maskapai'];?></td>
														<td><?=$jadwal['tujuan'];?></td>
														<td><?=$jadwal['waktu'];?></td>
														<td>
															<?php if($this->session->userdata("hak")=="admin"): ?>
															<a href="<?= site_url('admin/jadwal/ubah/'.$jadwal['index']); ?>" class="btn default btn-xs purple">
																<i class="fa fa-edit"></i> Ubah 
															</a>
															<?php else:?>
																<select class="form-control" name="A_ket">
																	<?php
																		$keterangan = $this->config->item('keterangan');
																		foreach ($keterangan as $keterangan):
																	?>
																	<option value="<?php echo $keterangan;?>" <?php echo (!empty($data['keterangan'])) ? ($keterangan==$data['keterangan']) ? 'selected' : '' : '';?>><?php echo $keterangan;?></option>
																	<?php endforeach;?>
																</select>
															<?php endif;?>
															<!-- <a data-toggle="modal" href="#hapus<?php echo $jadwal['index'];?>" class="btn default btn-xs red">
																<i class="fa fa-trash"></i> Delete 
															</a> -->
														</td>
														<?php if($this->session->userdata("hak")=="operator"): ?>
														<td>
															<button class="btn default btn-xs red" onclick='responsiveVoice.speak("<?php echo sprintf($pesan['indonesia'], $jadwal['nama_maskapai'], $jadwal['kode_pesawat']);?>", "Indonesian Female", {volume: 5});'><i class="fa fa-volume-up"></i> ID</button>
															<button class="btn default btn-xs red" onclick='responsiveVoice.speak("<?php echo sprintf($pesan['inggris'], $jadwal['nama_maskapai'], $jadwal['kode_pesawat']);?>");' ><i class="fa fa-volume-up"></i> EN</button>
														</td>
														<?php endif; ?>
													</tr>
														<?php $no++; endforeach; else: ?>
													<tr>
														<td colspan="6">Tidak ada data.</td>
													</tr>
													<?php endif; ?>
												</tbody>
											</table>
										</div>
									</div>

									<?php if($this->session->userdata("hak")=="admin"):?>
									<center>
										<a class="btn default green" href="<?php echo site_url('admin/jadwal/tambah');?>">
											Tambah
										</a>
									</center>
									<?php endif;?>
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

<?php
if(!empty($temp)):
	foreach ($temp as $tmp):
?>

<div class="modal fade bs-modal-sm" id="hapus<?php echo $tmp['index'];?>" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Konfirmasi</h4>
			</div>
			<div class="modal-body">
				Apakah benar data <?php echo $tmp['kode'].'-'.$tmp['nama'];?> akan dihapus?
			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
				<a class="btn red" href="<?= site_url('admin/jadwal/hapus/'.$tmp['index']); ?>">Delete</a>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

<?php
	endforeach;
endif;
?>