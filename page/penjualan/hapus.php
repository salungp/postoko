<?php 
   error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
  $koneksi = new mysqli("localhost","root","","db_pos");
	$id=$_GET['id'];
	$kode_pj=$_GET['kode_pj'];
	$harga_jual=$_GET['harga_jual'];
	$kode_b=$_GET['kode_b'];
	$jumlah=$_GET['jumlah'];



	$sql= $koneksi->query("delete from tb_penjualan where id='$id'");
		$sql2 = $koneksi->query("UPDATE tb_barang set stok=(stok + $jumlah )where kode_barcode ='$kode_b'");


	if ($sql || $sql2) {
		?>

			<script type="text/javascript">
				window.location.href="?page=penjualan&kodepj=<?php echo $kode_pj ?>";
			</script>

		<?php
	}



 ?>