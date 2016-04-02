<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container" style="margin-top:100px;">
	<div class="row">
		<div class="col-md-10 col-lg-12 article">
			<article>
				<div class="panel panel-danger">
					<div class="table-responsive">
						<table class="table table-striped">
							<thead style="background:#EF5F5A;color:#fff;">
								<tr>
									<th>AIRLINES</th>
									<th>FLIGHT</th>
									<th>DESTINATION</th>
									<th>TIME</th>
									<th>DESK</th>
									<th>REMARK</th>
								</tr>
							</thead>
							<tbody>
							<?php
							foreach ($daftar as $res):
							?>
								<tr>
									<td>
										<!-- <img height="60" src="assets/img/pesawat/garuda.jpg"> -->
										<?= $res['nama_maskapai'];?>
									</td>
									<td><?= $res['kode_pesawat'];?></td>
									<td><?= $res['tujuan'];?></td>
									<td><?= $res['waktu'];?></td>
									<td><?= $res['desk'];?></td>
									<td><?= $res['keterangan'];?></td>
								</tr>
							<?php
							endforeach;
							?>
							</tbody>
						</table>
					</div>
				</div>
			</article>
		</div>
	</div>
</div>