<link href="<?php echo base_url('assets/admin/admin/pages/css/inbox.css');?>" rel="stylesheet" type="text/css"/>
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
								<a href="<?php echo site_url('admin/pesan');?>"><?php echo $title;?></a>
							</li>
						</ul>
					</div>
					<!-- END PAGE HEADER-->
					<?php if(!empty($message)):?>
					<div class="note note-success">
						<h4 class="block">Info</h4>
						<p><?php echo $message;?></p>
					</div>
					<?php endif;?>
					<!-- BEGIN DASHBOARD STATS -->
					<div class="row inbox">
						<div class="col-md-2">
							<ul class="inbox-nav margin-bottom-10">
								<li class="compose-btn">
									<a data-toggle="modal" href="#kirim" data-title="Compose" class="btn green">
										<i class="fa fa-edit"></i> Kirim 
									</a>
								</li>
								<li class="inbox active">
									<a href="<?php echo site_url("admin/pesan"); ?>" class="btn" data-title="Inbox">
									Kotak Masuk(<?php echo count($inbox);?>) </a>
									<b></b>
								</li>
								<li class="sent">
									<a class="btn" href="<?php echo site_url("admin/pesan/sent"); ?>" data-title="Sent">
									Terkirim(<?php echo count($sent);?>) </a>
									<b></b>
								</li>
							</ul>
						</div>
						<div class="col-md-10">
							<div class="inbox-header">
								<h1 class="pull-left">Kotak Masuk</h1>
							</div>
							<div class="inbox-content">
								<div class="table-scrollable">
									<table class="table table-hover">
										<thead>
											<tr>
												<th>#</th>
												<th>Dari</th>
												<th>Pesan</th>
												<th>Tanggal</th>
												<th>Aksi</th>
											</tr>
										</thead>
										<tbody>
										<?php
										if(!empty($inbox)):
											$index=1;
											foreach ($inbox as $inbox):
												$tanggal = substr($inbox['waktu'], 0,10);
										?>
											<tr>
												<td><?php echo $index;?></td>
												<td><?php echo ucwords($inbox['dari']);?></td>
												<td><?php echo ucfirst(substr($inbox['pesan'], 0,30));?></td>
												<td><?php echo nama_hari($tanggal).', '.tgl_indo($tanggal);?></td>
												<td>
													<a href="<?= site_url('admin/pesan/lihat/'.$inbox['index']); ?>" class="btn default btn-xs blue">
														<i class="fa fa-search"></i> Lihat
													</a>
												</td>
											</tr>
										<?php
											$index++;
											endforeach;
										else:
										?>
											<tr colspan="5">
												<td>Tidak ada pesan</td>
											</tr>
										<?php
										endif;
										?>
										</tbody>
									</table>
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

<div class="modal fade" id="kirim" tabindex="-1" role="dialog" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<form class="bootbox-form" action="<?php echo site_url('admin/pesan/kirim');?>" method="post">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
				<h4 class="modal-title">Kirim Pesan</h4>
			</div>
			<div class="modal-body">
				<div class="bootbox-body">
					<div class="form-group">
						<label class="control-label">Ke</label>
						<input type="hidden" class="form-control" id="select2_tags" name="A_ke">
					</div>
					<div class="form-group">
						<label class="control-label">Pesan</label>
						<textarea class="form-control" name="A_pesan"></textarea>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn default" data-dismiss="modal">Close</button>
				<input type="submit" class="btn red" value="Kirim">
			</div>
			</form>
		</div>
		<!-- /.modal-content -->
	</div>
	<!-- /.modal-dialog -->
</div>