<title><?= $title;?></title>

Hallo, <?= $dataUser['nama']; ?>
<table border="1">
	<tr>
		<th>No</th>
		<th>Username</th>
		<th>Nama</th>
		<th>Hak</th>
	</tr>
	<?php $no=1; foreach ($listUser as $user): ?>
	<tr>
		<td><?=$no;?></td>
		<td><?=$user['username'];?></td>
		<td><?=$user['nama'];?></td>
		<td><?=$user['hak'];?></td>
	</tr>
	<?php $no++; endforeach; ?>
</table>