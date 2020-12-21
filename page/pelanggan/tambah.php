




  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tambah Pelanggan
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

                                    <label>Nama Pelanggan</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="teks"name="nama" class="form-control"  />
                                        </div>
                                    </div>


                                    <label>Alamat </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="teks" name="alamat"class="form-control"  />
                                        </div>
                                    </div>


                                  <label>Telpon </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="teks" name="telpon"class="form-control"  />
                                        </div>
                                    </div>


                                  
                                  <label>Email </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" name="email"class="form-control"  />
                                        </div>
                                    </div>



                                  
                                    </div>                       
                                </div>
                                <a href="?page=pelanggan" class="btn btn-danger">Batal</a>
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                

                            </div>




                            </form>





                            <?php 
                            if (isset($_POST['simpan'])) {
                                 
                               
                                $nama=$_POST['nama'];
                                $alamat=$_POST['alamat'];
                                $telpon=$_POST['telpon'];
                                $email=$_POST['email'];
                              
                                
                                $sql = $koneksi->query("INSERT INTO tb_pelanggan (nama,alamat,telpon,email) values('$nama','$alamat','$telpon','$email')");


                                if ($sql) {
                                    ?>


                                    <script type="text/javascript">
                                        alert("Data Berhasil Ditambahkan");
                                        window.location.href="?page=pelanggan";
                                    </script>

                                  <?php 



                                }



                             } ?>