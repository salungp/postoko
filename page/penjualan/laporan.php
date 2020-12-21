<?php 
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		$koneksi= new mysqli("localhost","root","","db_pos");

 ?>

 <style>
 	@media print{
 		input.noPrint{
 			display;none;
 		}
 	}
 </style>

 <table border="1" width="100%" style="border-collapse: collapse;">

 	<caption>Laporan Penjualan<br><br></caption>

 	<thead>

 		<tr>
 			<th>No</th>
 			<th>kode barcode</th>
 			<th>Nama Barang</th>
 			<th>Satuan</th>
 			<th>Stok</th>
 			<th>Harga beli</th>
 			<th>Harga Jual</th>
 			
 			<th>Profit </th>
 		</tr>
 	</thead>
<tbody>
	<?php 
	$tgl_awal=$_POST['tgl_awal'];
	$tgl_akhir=$_POST['tgl_akhir'];
	$no=1;
	
	$sql=$koneksi->query("SELECT * from tb_penjualan, tb_barang where tb_penjualan.kode_barcode=tb_barang.kode_barcode and tgl_penjualan between '$tgl_awal' and '$tgl_akhir'");

	while ($data=$sql->fetch_assoc()) {
		
	

	 ?>

	 <tr>
	 	<td><?php echo $no++; ?></td>
	 	<td><?php echo $data['kode_barcode']?></td>
	 	<td><?php echo $data['nama_barnag']?></td>
	 	<td><?php echo $data['satuan']?></td>
	 	<td><?php echo $data['stok']?></td>
	 	<td><?php echo $data['harga_beli']?></td>
	 	<td><?php echo $data['harga_jual']?></td>
	 	<td><?php echo $data['profit']?></td>

	 </tr>
	<?php } ?>
</tbody>
<br><br>
 </table>
 <br><br>
 <input type="button" value="Cetak" class="noPrint" onclick="window.print()">