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
							<tbody class="isi">
								<tr></tr>
								<!-- 
							<?php
							foreach ($daftar as $res):
							?>
								<tr>
									<td>
										
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
							?> -->
							</tbody>
						</table>
					</div>
				</div>
				<!-- <button onclick="cek()">Cek</button> -->
			</article>
		</div>
	</div>
</div>
<script src="<?php echo base_url('assets/admin/js/jquery-1.11.0.min.js');?>" type="text/javascript"></script>
<script type="text/javascript">
	// setInterval(cek, 1000);

	// function mundur(){
	// 	//todo
	// }
	cek();
	function cek(){
		$.get("<?php echo site_url('welcome/data');?>", function(data){
			// console.log(data.length);
			$(".isi tr").remove();
			if(data.length>0){
				for (var i = data.length - 1; i >= 0; i--) {
					$(".isi").prepend("<tr><td>"+data[i].nama_maskapai+"</td><td>"+data[i].kode_pesawat+"</td><td>"+data[i].tujuan+"</td><td>"+data[i].waktu+"</td><td></td><td>"+data[i].keterangan+"</td></tr>");
				};
			}else{
				$(".isi").prepend("<tr><td colspan='6'>Tidak ada jadwal</td></tr>");
			}
		}, "json" );

		setTimeout('cek();','1000');
	}

	

	
</script>