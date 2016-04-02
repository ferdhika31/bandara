<title><?= $title; ?></title>

<form method="post" action="">
	Kode Pesawat : <input type="text" name="A_kode" value="<?= (!empty($data['kode_pesawat']))?$data['kode_pesawat']:''; ?>" placeholder="Kode"><br>
	Nama Maskapai : <input type="text" name="A_nama" value="<?= (!empty($data['nama_maskapai']))?$data['nama_maskapai']:''; ?>" placeholder="Nama"><br>
	Image : <input type="text" name="A_image" value="<?= (!empty($data['image']))?$data['image']:''; ?>" placeholder="Image"><br>
	Status : <select name="A_stt">
		<option value="aktif" <?= (!empty($data['status'])) ? ($data['status']=="aktif")?'selected':'' : ''; ?>>Aktif</option>
		<option value="!aktif" <?= (!empty($data['status'])) ? ($data['status']=="!aktif")?'selected':'' : ''; ?>>Tidak Aktif</option>
	</select>
	<input type="submit" value="Kirim">
</form>

<?= $message; ?>

<?= anchor('admin/pesawat','Back'); ?>