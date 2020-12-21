<?php 
	$koneksi = new mysqli("localhost","root","","db_pos");
	                error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
		 $kasir = $_GET['kasir'];
		 $kode_pj = $_GET['kode_pjl'];
		  
		 
 ?>
 		<h4>Struk Penjualan Barang</h4>

 		<table>	
 			<tr>
 				<td>Toko Serba Berkah</td>
 			</tr>

 			<tr>
 				<td>Jalan Raya Jepara Bangsri Km 7</td>
 			</tr>

 		</table>

 		<table>
 			

 			<?php 


 				$sql = $koneksi->query("select * from tb_penjualan,tb_pelanggan  where tb_penjualan.id_pelanggan=tb_pelanggan.kode_pelanggan and kode_penjualan='$kode_pj'");
 				$tampil = $sql->fetch_assoc();

 			 ?>

 			<tr>
 				<td>Kode Penjualan &nbsp&nbsp </td>
 				<td>:&nbsp&nbsp<?php echo $tampil['kode_penjualan']; ?></td>
 				
 			</tr>

 			<tr>
 				<td>Tanggal &nbsp&nbsp </td>
 				<td>:&nbsp&nbsp<?php echo $tampil['tgl_penjualan']; ?></td>
 				
 			</tr>

 			<tr>
 				<td>Pelanggan &nbsp&nbsp </td>
 				<td>:&nbsp&nbsp<?php echo $tampil['nama']; ?></td>
 				
 			</tr>

 			<tr>
 				<td>Kasir &nbsp&nbsp </td>
 				<td>:&nbsp&nbsp<?php echo $kasir; ?></td>
 				
 			</tr>


 			<?php 


 			$sql2 = $koneksi->query("select * from tb_penjualan ,tb_penjualan_detail,tb_barang where tb_penjualan.kode_penjualan=tb_penjualan_detail.kode_penjualan and tb_penjualan.kode_barcode=tb_barang.kode_barcode
 			 and tb_penjualan.kode_penjualan='$kode_pj' ");


 			while ( $tampil2 = $sql2->fetch_assoc()) {
 			
 		
 			

 			 ?>


 			 	<tr>
 				<td><?php echo $tampil2['nama_barang'] ?> </td>
 				<td>:<?php echo number_format( $tampil2['harga_jual']).',-'.'&nbsp'.'&nbsp '.'X'.'&nbsp'.'&nbsp '.$tampil2['jumlah'].'&nbsp'.'&nbsp '.'&nbsp'.'&nbsp '?></td>
 				<td><?php echo number_format($tampil2['total']).',-' ?> </td>
 				
 				
 			</tr>


 				<?php 

 					$diskon = $tampil2['diskon'];
 					$potongan = $tampil2['potongan'];
 					$bayar = $tampil2['bayar'];
 					$kembali = $tampil2['kembali'];
 					$total_b = $tampil2['total_b'];
 					$total_bayar = $total_bayar + $tampil2['total'];



 					} ?>

 					<tr><td><hr></td></tr>

 					<tr>
 				<th colspan="3">Total </th>
 				<td>:<?php echo $total_bayar; ?></td>
 				
 				</tr>

 				<tr>
 				<th colspan="3">Diskon </th>
 				<td>:<?php echo $diskon.'%'; ?></td>
 				
 				</tr>


				<tr>
 				<th colspan="3">Potongan Diskon </th>
 				<td>:<?php echo $potongan; ?></td>
 				
 				</tr>


				<tr>
 				<th colspan="3">Sub Total </th>
 				<td>:<?php echo $total_b; ?></td>
 				
 				</tr>


				<tr>
 				<th colspan="3"> Bayar </th>
 				<td>:<?php echo $bayar; ?></td>
 				
 				</tr>

 				<tr>
 				<th colspan="3"> Kemabali </th>
 				<td>:<?php echo $kembali; ?></td>
 				
 				</tr>


 		</table>


 		<table>
 			
 			<tr>
 				<td>Barang Yang Sudah Dibeli Tidak Dapat Dikembalikan</td>
 			</tr>


 		</table>

 		<br>

 		<input type="button" name="print" value="Print" onclick="window.print()">