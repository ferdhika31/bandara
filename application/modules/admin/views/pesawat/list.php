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
								<a href="<?php echo site_url('admin/pesawat');?>"><?php echo $title;?></a>
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
														<!-- <th>Status</th> -->
														<th>Aksi</th>
													</tr>
												</thead>
												<tbody>
													<?php 
													$no=1; 
													$temp = array();  
													if(!empty($list)):
														
														foreach ($list as $pesawat): 
														$temp[] = array(
															'index' => $pesawat['index'],
															'kode' => $pesawat['kode_pesawat'],
															'nama' => $pesawat['nama_maskapai'],
														);
													?>
													<tr>
														<td><?=$no;?></td>
														<td><?=$pesawat['kode_pesawat'];?></td>
														<td><?=$pesawat['nama_maskapai'];?></td>
														<!-- <td><?=$pesawat['status'];?></td> -->
														<td>
															<a href="<?= site_url('admin/pesawat/ubah/'.$pesawat['index']); ?>" class="btn default btn-xs purple">
																<i class="fa fa-edit"></i> Ubah 
															</a>
															<a data-toggle="modal" href="#hapus<?php echo $pesawat['index'];?>" class="btn default btn-xs red">
																<i class="fa fa-trash"></i> Hapus 
															</a>
														</td>
													</tr>
														<?php $no++; endforeach; else: ?>
													<tr>
														<td colspan="5">Tidak ada data.</td>
													</tr>
													<?php endif; ?>
												</tbody>
											</table>
										</div>
									</div>
									
									<center>
										<!-- <a class="btn default green" data-toggle="modal" href="#tambah">
											Tambah
										</a> -->
										<a class="btn default green" href="<?php echo site_url('admin/pesawat/tambah');?>">
											Tambah
										</a>
									</center>
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


<div class="modal fade" id="tambah" tabindex="-1" role="tambah" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Tambah Pesawat</h4>
			</div>
			<div class="modal-body">
				<div class="row">
				<div class="col-md-6">
				Name : <input class="form-control" type="text" ng-model="member.name">
				</div>
				<div class="col-md-6">
				Instituion : <input class="form-control" type="text" ng-model="member.institution">
				</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
				<button type="button" class="btn blue">Save changes</button>
			</div>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>

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
				<a class="btn red" href="<?= site_url('admin/pesawat/hapus/'.$tmp['index']); ?>">Delete</a>
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