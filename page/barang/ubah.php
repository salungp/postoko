  <script>
      function sum() {
            var harga_beli = document.getElementById('harga_beli').value;
            var harga_jual = document.getElementById('harga_jual').value;
            var result = parseInt(harga_jual) - parseInt(harga_beli);
            if (!isNaN(result)) {
                document.getElementById('profit').value=result;
            }

      }
  </script>
  

  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ubah Barang
                                <small></small>
                            </h2>
                            
                        </div>
                         <div class="body">
                        
                            <form method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <label>Kode Barcode</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="teks"name="kode" value="<?php echo $tampil['kode_barcode'];?>" class="form-control" />
                                        </div>
                                    </div>


                                    <label>Nama Barang </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="teks" name="nama"value="<?php echo $tampil['nama_barang'];?>"class="form-control"  />
                                        </div>
                                    </div>



                                    <label>Satuan </label>
                                       <div class="form-group" name="satuan">
                                    <select class="form-control show-tick"  name="satuan">
                                        
                                        <option value="LUSIN"<?php if ($satuan=='LUSIN') { echo "selected";} ?>>LUSIN</option>
                                        <option value="PACK"<?php if ($satuan=='PACK') { echo "selected";} ?>>PACK</option>
                                        <option value="PCS"<?php if ($satuan=='PCS') { echo "selected";} ?>>PCS</option>
                                        
                                    </select>
                                </div>
                                  
                                  <label>Stok </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" value="<?php echo $tampil['stok'];?>"name="stok"class="form-control"  />
                                        </div>
                                    </div>


                                    <label>Harga Beli </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number"  id="harga_beli"value="<?php echo $tampil['harga_beli'];?>" onkeyup="sum()" name="hbeli"class="form-control"  />
                                        </div>
                                    </div>


                                    <label>Harga Jual </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" id="harga_jual" onkeyup="sum()" name="hjual"value="<?php echo $tampil['harga_jual'];?>"class="form-control"  />
                                        </div>
                                    </div>


                                    <label>Profit </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="teks"name="profit" id="profit" readonly="" style="background-color: #e7e3e9" value="<?php echo $tampil['profit'];?>" onkeyup="sum()" class="form-control"  />
                                        </div>
                                    </div>


                                    </div>                       
                                </div>
                                <a href="?page=barang" class="btn btn-danger">Batal</a>
                                <input type="submit" onclick="simpan" name="simpan" value="Simpan" class="btn btn-primary">

                            </div>




                            </form>





                            <?php 
                            if (isset($_POST['simpan'])) {
                                 
                                $kode=$_POST['kode'];
                                $nama=$_POST['nama'];
                                $satuan=$_POST['satuan'];
                                $stok=$_POST['stok'];
                                $hbeli=$_POST['hbeli'];
                                $hjual=$_POST['hjual'];
                                $profit=$_POST['profit'];
                                
                                $sql2 = $koneksi->query("update  tb_barang set kode_barcode='$kode',nama_barang='$nama',satuan='$satuan',stok='$stok',harga_beli='$hbeli',harga_jual='$hjual',profit='$profit' where kode_barcode='$kode2'");


                                if ($sql) {
                                    ?>


                                    <script type="text/javascript">
                                        alert("Data Berhasil Diubah");
                                        window.location.href="?page=barang";
                                    </script>

                                  <?php 



                                }



                             } ?>