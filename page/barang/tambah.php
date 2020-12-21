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
                                Tambah Barang
                                <small></small>
                            </h2>
                            <ul class="header-dropdown m-r--5">
                                <li class="dropdown">
                                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                        <i class="material-icons">more_vert</i>
                                    </a>
                                    <ul class="dropdown-menu pull-right">
                                        <li><a href="javascript:void(0);">Action</a></li>
                                        <li><a href="javascript:void(0);">Another action</a></li>
                                        <li><a href="javascript:void(0);">Something else here</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                         <div class="body">
                        
                            <form method="POST">
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <label>Kode Barcode</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="teks"name="kode" required="" class="form-control"  />
                                        </div>
                                    </div>


                                    <label>Nama Barang </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="teks"  required=""name="nama"class="form-control"  />
                                        </div>
                                    </div>



                                    <label>Satuan </label>
                                       <div class="form-group"  required="" name="satuan">
                                    <select class="form-control show-tick"  name="satuan">
                                        <option value="">-- Pilih Satuan --</option>
                                        <option value="LUSIN">LUSIN</option>
                                        <option value="PACK">PACK</option>
                                        <option value="PCS">PCS</option>
                                        
                                    </select>
                                </div>
                                  
                                  <label>Stok </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" required="" name="stok"class="form-control"  />
                                        </div>
                                    </div>


                                    <label>Harga Beli </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number"  required="" id="harga_beli" onkeyup="sum()" name="hbeli"class="form-control"  />
                                        </div>
                                    </div>


                                    <label>Harga Jual </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="number" required="" id="harga_jual" onkeyup="sum()" name="hjual"class="form-control"  />
                                        </div>
                                    </div>


                                    <label>Profit </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="teks"name="profit" id="profit"  readonly="" style="background-color: #e7e3e9" value="0" onkeyup="sum()" class="form-control"  />
                                        </div>
                                    </div>


                                    </div>                       
                                </div>
                                <a href="?page=barang" class="btn btn-danger">Batal</a>
                                <input type="submit"   name="simpan" value="Simpan" class="btn btn-primary">
                              

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
                                
                                $sql = $koneksi->query("INSERT INTO tb_barang value('$kode','$nama','$satuan','$hbeli','$stok','$hjual','$profit')");


                                if ($sql) {
                                    ?>


                                    <script type="text/javascript">
                                        alert("Data Berhasil Ditambahkan");
                                        window.location.href="?page=barang";
                                    </script>

                                     
                                 


                             


                                      <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
                                   
                                     <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
                                   

                                  <?php 



                                }



                             } ?>