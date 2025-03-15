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

		$sql = mysqli_query($koneksi, "INSERT INTO pelanggan(id_pelanggan,nama_pelanggan,alamat,hp,nopol) VALUES('$id_pelanggan', '$nama_pelanggan', '$alamat', '$hp', '$nopol')");

		if($sql == true){
			header('Location: ./admin.php?hlm=pelanggan');
			die();
		} else {
			echo 'ERROR! Periksa penulisan querynya.';
		}
	} else {
?>
<h2>Tambah Data Master Pelanggan</h2>
<hr>
<form method="post" action="" class="form-horizontal" role="form">
	<div class="form-group">
		<label for="jenis" class="col-sm-2 control-label">Nama Pelanggan</label>
		<div class="col-sm-4">
			<input type="text" class="form-control" id="nama_pelanggan" name="nama_pelanggan" placeholder="nama_pelanggan" required>
		</div>
	</div>
	<div class="form-group">
		<label for="biaya" class="col-sm-2 control-label">Alamat</label>
		<div class="col-sm-3">
			<input type="number" class="form-control" id="Alamat" name="Alamat" placeholder="Alamat" required>
		</div>
	</div>
		<div class="form-group">
		<label for="biaya" class="col-sm-2 control-label">HP</label>
		<div class="col-sm-3">
			<input type="number" class="form-control" id="hp" name="hp" placeholder="hp" required>
		</div>
	</div>
		<div class="form-group">
		<label for="biaya" class="col-sm-2 control-label">Nopol</label>
		<div class="col-sm-3">
			<input type="number" class="form-control" id="nopol" name="nopol" placeholder="nopol" required>
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
