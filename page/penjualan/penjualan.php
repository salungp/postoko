 <?php 


 	$kode = $_GET['kodepj'];


 	$kasir = $data['nama'];

  ?>
				<div class="row clearfix">
					<div class="body">
						<form method="POST">
							<div class=" col-md-2 ">
							<input type="teks"name="kode" value="<?php echo $kode; ?>"class="form-control" readonly=""  />

						</div>
							</div>


							<div class=" col-md-2 ">
							<input type="teks"name="kode_barcode" class="form-control" autofocus="" />

								</div>

						 	<input type="submit" name="simpan" value="Tambahkan" class="btn btn-primary">


						 </form>
						</div>


						<?php if (isset($_POST['simpan'])) {
							$date = date("y-m-d");
							$kd_pj=$_POST['kode'];
							$barcode=$_POST['kode_barcode'];
							$barang = $koneksi->query("select * from tb_barang where kode_barcode='$barcode'");
							$data_barang = $barang->fetch_assoc();
							$harga_jual = $data_barang['harga_jual'];
							$jumlah = 1;
							$total = $jumlah * $harga_jual;
							$barang2 = $koneksi->query("select * from tb_barang where kode_barcode='$barcode'");
							while ($data_barang2 = $barang2->fetch_assoc()) {
								$sisa = $data_barang2['stok'];

								if ($sisa==0) {
									?>

										<script type="text/javascript">
											
											alert("Stok Barang Sudah Habis....Tidak dapat melakukan penjualan.!!!");
											window.location.href="?page=penjualan&kodepj=<?php echo $kode; ?>"


										</script>


									<?php
								}

								else{

									$koneksi->query("insert into tb_penjualan (kode_penjualan,kode_barcode,jumlah,total,tgl_penjualan)values('$kd_pj','$barcode','$jumlah','$total','$date')");
								}
							}

						}


						 ?>

<br><br>
<form method="POST">
	<div class="col-md-2 ">

		<label for="">Pelanggan</label>
		<select name="pelanggan" class="form-control show-tick">
			<?php $pelanggan=$koneksi->query("select *from tb_pelanggan order by kode_pelanggan");

			while ($d_pelanggan=$pelanggan->fetch_assoc()) {
				echo "

					<option value='$d_pelanggan[kode_pelanggan]'>$d_pelanggan[nama]</option>

				";
			}

			 ?>
		</select>
		
	</div>



<br><br><br><br>


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                 Data Belanjaan
                            </h2>
                           
                        </div>
                        <div class="body">
                            <div class="table-responsive">
                                <table class="table table-striped ">
                                    <thead>
                                        <tr>
                                        	<th>NO </th>
                                        	<th>Kode Barcode </th>
                                            <th>Nama Barang</th>
                                            <th>Harga </th>
                                            
                                            <th>Jumlah</th>
                                           	<th>Total</th>
                                            <th>Aksi</th> 
                                          
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    	<?php 
                                    			$no = 1;
                                    			$sql = $koneksi->query("select * from tb_penjualan,tb_barang where tb_penjualan.kode_barcode=tb_barang.kode_barcode AND kode_penjualan='$kode'" );
                                    			while ($data = $sql->fetch_assoc()){

                                    			

                                    	 ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $data['kode_barcode'] ?></td>
                                            <td><?php echo $data['nama_barang'] ?></td>
                                            <td><?php echo $data['harga_jual'] ?></td>
                                            <td><?php echo $data['jumlah'] ?></td>
                                            <td><?php echo $data['total'] ?></td>
                                          

                                            <td>


                                            	<a href="?page=penjualan&aksi=tambah&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['kode_penjualan'] ?>&harga_jual=<?php echo $data['harga_jual']?>&kode_b=<?php echo $data['kode_barcode'] ?>"title="Tambah"class="btn btn-success waves-effect"> <i class="material-icons">add_box</i></a>

                                     		
                                     		     <a href="?page=penjualan&aksi=kurang&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['kode_penjualan'] ?>&harga_jual=<?php echo $data['harga_jual']?>&kode_b=<?php echo $data['kode_barcode'] ?>"title="Tambah"class="btn btn-success waves-effect"> <i class="material-icons">remove</i></a>
                                       
                               
                                         
                                            <a onclick="return confirm('Apa Anda Yakin Ingin Menghapus Data Ini?')"  href="?page=penjualan&aksi=hapusa&id=<?php echo $data['id']?>&kode_pj=<?php echo $data['kode_penjualan'] ?>&harga_jual=<?php echo $data['harga_jual']?>&kode_b=<?php echo $data['kode_barcode'] ?>&jumlah=<?php echo $data['jumlah']; ?>" title="Hapus" class="btn btn-danger waves-effect"> <i class="material-icons">clear</i></a>
                                        </tr>
                                      <?php 

                                      		$total_bayar = $total_bayar+$data['total'];


			                                  } 


			                                  ?>
                                        </tbody>


                                        <tr>
                                        	<th colspan="5" style="text-align: right">Total</th>
                                        	<th> <input type="number" style="text-align: right"readonly="" onkeyup="hitung();" value="<?php echo $total_bayar; ?>" id="total_bayar"name="total_bayar"></th>
                                        </tr>
                                        <tr>
                                        	<th colspan="5" style="text-align: right">Diskon</th>
                                        	<th> <input style="text-align: right" type="number"onkeyup="hitung();" id="diskon"name="diskon"></th>
                                        </tr>
                                        <tr>
                                        	<th colspan="5" style="text-align: right">Potongan Diskon</th>
                                        	<th> <input style="text-align: right" type="number" id="potongan" onkeyup="hitung();"name="potongan"></th>
                                        </tr>
                                         <tr>
                                        	<th colspan="5" style="text-align: right">Sub Total</th>
                                        	<th> <input style="text-align: right" readonly="" type="number" id="s_total"name="s_total"></th>
                                        </tr>
                                          <tr>
                                        	<th colspan="5" style="text-align: right">Bayar </th>
                                        	<th> <input style="text-align: right" onkeyup="hitung();"type="number" id="bayar"name="bayar"></th>
                                        </tr>
                                        <tr>
                                        	<th colspan="5" style="text-align: right">Kembali </th>
                                        	<th> <input style="text-align: right" readonly="" type="number" id="kembali"name="kembali">

                                        		<input type="submit" name="simpan_pj" value="Simpan" class="btn btn-primary ")">

                                        		<!-- <input type="submit"  value="Cetak" class="btn btn-success "onclick="window.open('page/penjualan/cetak.php?kode_pjl=<?php echo $kode ?>&kasir=<?php echo $kasir  ?>','mywindow','width=600px,height=600px,left=300px')"> -->

                                        	</th>
                                        </tr>

                                </table>

                                		


                            </div>
                        </div>
                    </div>
                </div>
            </div>
</form>

										<?php 


						if (isset($_POST['simpan_pj'])) {
							$pelanggan = $_POST['pelanggan'];
							$total_bayar=$_POST['total_bayar'];

							$diskon = $_POST['diskon'];
							$potongan = $_POST['potongan'];
							$s_total = $_POST['s_total'];
							$bayar = $_POST['bayar'];
							$kembali = $_POST['kembali'];


					$koneksi->query("INSERT INTO tb_penjualan_detail(kode_penjualan,bayar,kembali,diskon,potongan,total)VALUES('$kode','$bayar','$kembali','$diskon','$potongan','$s_total')");

					$koneksi->query("UPDATE tb_penjualan set id_pelanggan ='$pelanggan'where kode_penjualan='$kode'");
				}


			 ?>





            									<script type="text/javascript">
            										
            										function hitung() {
            										
            										var total_bayar = document.getElementById('total_bayar').value;

            										var diskon = document.getElementById('diskon').value;

            										var diskon_pot = parseInt(total_bayar)*parseInt(diskon)/parseInt(100);

            										if (!isNaN(diskon_pot)) {


            											var potongan= document.getElementById('potongan').value = diskon_pot;
            										}

            										var sub_total = parseInt(total_bayar)-parseInt(potongan);

            											if (!isNaN(sub_total)) {


            											var s_total= document.getElementById('s_total').value = sub_total;
            										}

            										var bayar = document.getElementById('bayar').value;
            										var bayar_b = parseInt(bayar)-parseInt(s_total);

            										if (!isNaN(bayar_b)) {


            											 document.getElementById('kembali').value = bayar_b;
            										}

            									}
            									</script>