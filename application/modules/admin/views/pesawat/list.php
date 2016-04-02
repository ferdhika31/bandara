<title><?= $title;?></title>
<script src="http://code.responsivevoice.org/responsivevoice.js"></script>

<table border="1">
	<tr>
		<th>No</th>
		<th>Kode Pesawat</th>
		<th>Nama Maskapai</th>
		<th>Status</th>
		<th>Aksi</th>
	</tr>
	<?php $no=1; foreach ($list as $pesawat): ?>
	<tr>
		<td><?=$no;?></td>
		<td><?=$pesawat['kode_pesawat'];?></td>
		<td><?=$pesawat['nama_maskapai'];?></td>
		<td><?=$pesawat['status'];?></td>
		<td>
			<a href="<?= site_url('admin/pesawat/ubah/'.$pesawat['index']); ?>">
				Ubah
			</a>
			 | 
			<a href="<?= site_url('admin/pesawat/hapus/'.$pesawat['index']); ?>">
				Hapus
			</a>
			 | 
			<input onclick='responsiveVoice.speak("Pesawat <?=$pesawat['nama_maskapai'];?> dengan kode <?=$pesawat['kode_pesawat'];?> akan segera berangkat.", "Indonesian Female", {volume: 5});' type='button' value='🔊 ID' />
			 | 
			<input onclick='responsiveVoice.speak("<?=$pesawat['nama_maskapai'];?> plane with code <?=$pesawat['kode_pesawat'];?> leaving soon.");' type='button' value='🔊 EN' />
		</td>
	</tr>
	<?php $no++; endforeach; ?>
</table>

<?= $message;?>