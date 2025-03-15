<?php

if( empty( $_SESSION['id_user'] ) ){

	$_SESSION['err'] = '<strong>ERROR!</strong> Anda harus login terlebih dahulu.';
	header('Location: ./');
	die();
} else {
	if( isset( $_REQUEST['aksi'] )){
		$aksi = $_REQUEST['aksi'];
		switch($aksi){
			case 'baru':
				include 'pelanggan_baru.php';
				break;
			case 'edit':
				include 'pelanggan_edit.php';
				break;
			case 'hapus':
				include 'pelanggan_hapus.php';
				break;
		}
	} else {

		echo '

			<div class="container">
			<div class="col-md-8">
				<h3 style="margin-bottom: -20px;">Daftar Pelanggan</h3>
					<a href="./admin.php?hlm=pelanggan&aksi=baru" class="btn btn-success btn-s pull-right">Tambah Pelanggan</a>
				<br/><hr/>

				<table class="table table-bordered">
				 <thead>
				   <tr class="info">
					 <th width="5%">No</th>
					 <th width="22%">Nama Pelanggan</th>
					 <th width="33%">Alamat</th>
					 <th width="20%">HP</th>
					 <th width="20%">Nopol</th>
				   </tr>
				 </thead>
				 <tbody>';

			//skrip untuk menampilkan data dari database
		 	$sql = mysqli_query($koneksi, "SELECT * FROM pelanggan");
		 	if(mysqli_num_rows($sql) > 0){
		 		$no = 0;

				 while($row = mysqli_fetch_array($sql)){
	 				$no++;
	 			echo '

				   <tr>
					 <td>'.$no.'</td>
					 <td>'.$row['nama_pelanggan'].'</td>
					 <td>'.$row['alamat'].'</td>
					  <td>'.$row['hp'].'</td>
					   <td>'.$row['nopol'].'</td>
					 <td>

					<script type="text/javascript" language="JavaScript">
					  	function konfirmasi(){
						  	tanya = confirm("Anda yakin akan menghapus pelanggan ini?");
						  	if (tanya == true) return true;
						  	else return false;
						}
					</script>

					 <a href="?hlm=pelanggan&aksi=edit&id_pelanggan='.$row['id_pelanggan'].'" class="btn btn-warning btn-s">Edit</a>
					 <a href="?hlm=pelanggan&aksi=hapus&submit=yes&id_pelanggan='.$row['id_pelanggan'].'" onclick="return konfirmasi()" class="btn btn-danger btn-s">Hapus</a>

					 </td>';
				}
			} else {
				 echo '<td colspan="8"><center><p class="add">Tidak ada data untuk ditampilkan. <u><a href="?hlm=pelanggan&aksi=baru">Tambah user baru</a></u> </p></center></td></tr>';
			}
			echo '
			 	</tbody>
			</table>
			</div>
		</div>';
	}
}
?>
