




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
                                        <i class="material-icons">mro<?php if ($level=='KASIR') { echo "selected";} ?>e_vert</i>
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
                                            <input type="teks"name="username" class="form-control"  />
                                        </div>
                                    </div>


                                    <label>Nama </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="teks" name="nama"class="form-control"  />
                                        </div>
                                    </div>


                                  <label>Password </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="password" name="password"class="form-control"  />
                                        </div>
                                    </div>


                                  
                                  
                                    <label>Level </label>
                                       <div class="form-group" name="leve">
                                    <select class="form-control show-tick"  name="level">
                                        <option value="">-- Pilih Level --</option>
                                        <option value="admin">Admin</option>
                                        <option value="kasir">Kasir</option>
                                        
                                    </select>
                                </div>


                                	 <label>Foto </label>
                                    <div class="form-group">
                                        <div class="form-line">
                                            <input type="file" name="foto"class="form-control"  />
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
                                $password=$_POST['password'];
                                $level=$_POST['level'];

                                $foto=$_FILES['foto']['name'];
                                $lokasi=$_FILES['foto']['tmp_name'];
                                $upload=move_uploaded_file($lokasi, "images/".$foto);

                                if ($upload) {
                                	
                              
                              
                                
                                $sql = $koneksi->query("INSERT INTO tb_pengguna (username,nama,password,level,foto) values('$username','$nama','$password','$level','$foto')");


                                if ($sql) {
                                    ?>


                                    <script type="text/javascript">
                                        alert("Data Berhasil Ditambahkan");
                                        window.location.href="?page=pengguna";
                                    </script>

                                  <?php 



                                }
  }


                             } ?>