<title><?= $title; ?></title>

<form method="post" action="">
	Nama : <input type="text" name="A_nama" value="<?= ($data['nama'])?$data['nama']:''; ?>" placeholder="Nama"><br>
	Email : <input type="text" name="A_email" value="<?= ($data['email'])?$data['email']:''; ?>" placeholder="Email"><br>
	Username : <input type="text" name="A_uname" value="<?= ($data['username'])?$data['username']:''; ?>" placeholder="Username"><br>
	Alamat : <textarea name="A_alamat"><?= ($data['nama'])?$data['nama']:''; ?></textarea><br>
	Status : <select name="A_stt">
		<option value="1" <?= ($data['stt']==1)?'selected':''; ?>>Aktif</option>
		<option value="0" <?= ($data['stt']==0)?'selected':''; ?>>DeAktif</option>
	</select>
	<input type="submit" value="Ubah">
</form>

<?= $message; ?>

<?= anchor('admin','Back'); ?>