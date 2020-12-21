
 <?php 

 $data = $_GET['id'];
 $sql = $koneksi->query("select * from tb_pelanggan where kode_pelanggan='$data'");
 $tampil= $sql->fetch_assoc();

?>



  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Ubah Data Pelanggan
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
                                            <input type="teks"name="nama" value="<?php echo $tampil['nama'];?>" class="form-control"  />
                                        </div>
                                    </div>


                                    <label>Alamat </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="teks" name="alamat" value="<?php echo $tampil['alamat'];?>"class="form-control"  />
                                        </div>
                                    </div>


                                  <label>Telpon </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="teks" name="telpon" value="<?php echo $tampil['telpon'];?>"class="form-control"  />
                                        </div>
                                    </div>


                                  
                                  <label>Email </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="email" name="email" value="<?php echo $tampil['email'];?>"class="form-control"  />
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
                              
                                
                                $sql= $koneksi->query("update  tb_pelanggan set nama='$nama',alamat='$alamat',telpon='$telpon',email='$email' where kode_pelanggan='$data'");


                                if ($sql) {
                                    ?>


                                    <script type="text/javascript">
                                        alert("Data Berhasil DiUbah");
                                        window.location.href="?page=pelanggan";
                                    </script>

                                  <?php 



                                }



                             } ?>