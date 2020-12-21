
		
 <?php 

 $id = $_GET['id'];
 $sql = $koneksi->query("select * from tb_pengguna where id='$id'");
 $tampil= $sql->fetch_assoc();
 $level=$tampil['level'];
?>

  <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                Tambah Pengguna
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
                        
                            <form method="POST" enctype="multipart/form-data">
                            <div class="row clearfix">
                                <div class="col-sm-12">

                                    <label>Username</label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="teks"name="username" value="<?php echo $tampil['username'] ?>"class="form-control"  />
                                        </div>
                                    </div>


                                    <label>Nama </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="teks" name="nama" value="<?php echo $tampil['nama'] ?>"class="form-control"  />
                                        </div>
                                    </div>


                                  

                                  
                                  
                                    <label>Level </label>
                                       <div class="form-group"  name="level">
                                    <select class="form-control show-tick"  name="level">
                                       
                                        <option value="admin"<?php if ($level=='admin') { echo "selected";} ?>>ADMIN</option>
                                        <option value="kasir"<?php if ($level=='kasir') { echo "selected";} ?>>KASIR</option>
                                        
                                    </select>
                                </div>

                                	<label> Foto </label>
                                    <div class="form-group">
                                       
                                            <img src="images/<?php echo $tampil['foto']  ?>"width="
                                            50"height="50">
                                        
                                    </div>

                                  
                                    </div>                       
                                </div>

                                	 <label>Ganti Foto </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="foto" value="<?php echo $tampil['username'] ?>class="form-control"  />
                                        </div>
                                    </div>

                                  
                                    </div>                       
                                </div>
                                <a href="?page=pengguna" class="btn btn-danger">Batal</a>
                                <input type="submit" name="simpan" value="Simpan" class="btn btn-primary">
                                

                            </div>




                            </form>





                            <?php 
                            if (isset($_POST['simpan'])) {
                                 
                               
                                $username=$_POST['username'];
                                $nama=$_POST['nama'];
                               
                                $level=$_POST['level'];

                                $foto=$_FILES['foto']['name'];
                                $lokasi=$_FILES['foto']['tmp_name'];
                              

                                if (!empty($lokasi)) {
                                	
                              
                                $upload=move_uploaded_file($lokasi, "images/".$foto);
                                
                                $sql = $koneksi->query("UPDATE  tb_pengguna set username='$username',nama='$nama',level='$level',foto='$foto' where id='$id'");
                               if ($sql) {
                                    ?>


                                    <script type="text/javascript">
                                        alert("Data Berhasil DiUbah");
                                        window.location.href="?page=pengguna";
                                    </script>

                                  <?php 



  								}


                             }else {
                             	
                                
                                $sql = $koneksi->query("UPDATE  tb_pengguna set username='$username',nama='$nama',level='$level' where id='$id' ");
                               if ($sql) {
                                    ?>


                                    <script type="text/javascript">
                                        alert("Data Berhasil DiUbah");
                                        window.location.href="?page=pengguna";
                                    </script>

                                  <?php 

}

                               		 }
                             }

                              ?>