<?php
if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {

	if( isset( $_REQUEST['submit'] )){

		$nama_pelanggan = $_REQUEST['nama_pelanggan'];
		$alamat = $_REQUEST['alamat'];
		$hp = $_REQUEST['hp'];
		$nopol = $_REQUEST['nopol'];

		$sql = mysqli_query($koneksi, "INSERT INTO pelanggan(nama_pelanggan, alamat, hp, nopol) VALUES('$nama_pelanggan', '$alamat', '$hp', '$nopol')");

		if($sql == true){
			header('Location: ./admin.php?hlm=pelanggan');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Pelanggan Baru</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="nama" class="col-sm-2 control-label">Nama Pelanggan</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="Nama Pelanggan" required>
		</div>
	</div>
	<div class="form-group">
		<label for="alamat" class="col-sm-2 control-label">Alamat</label>
		<div class="col-sm-6">
			<textarea class="form-control" name="alamat" rows="4" required></textarea>
		</div>
	</div>
	<div class="form-group">
		<label for="hp" class="col-sm-2 control-label">Nomor HP</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="hp" name="hp" placeholder="Nomor HP" required>
		</div>
	</div>
	<div class="form-group">
		<label for="hp" class="col-sm-2 control-label">Nomor Polisi</label>
		<div class="col-sm-3">
			<input type="text" class="form-control" id="nopol" name="nopol" placeholder="Nomor Polisi" required>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<button type="submit" name="submit" class="btn btn-success">Simpan</button>
			<a href="./admin.php?hlm=pelanggan" class="btn btn-danger">Batal</a>
		</div>
	</div>
</form>
<?php
	}
}
?>
