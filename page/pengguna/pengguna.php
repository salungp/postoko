




            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                 Data Pengguna
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
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                        	<th>No </th>
                                            <th>Username</th>
                                            <th>Nama </th>
                                            <th>Password</th>
                                            <th>Level</th>
                                            <th>Foto</th>
                                           
                                            <th>Aksi</th> 
                                          
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    	<?php 
                                    			$no = 1;
                                    			$sql = $koneksi->query("select * from tb_pengguna" );
                                    			while ($data = $sql->fetch_assoc()){

                                    			

                                    	 ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $data['username'] ?></td>
                                            <td><?php echo $data['nama'] ?></td>
                                             <td><?php echo $data['password'] ?></td>
                                            <td><?php echo $data['level'] ?></td>
                                            <td><img src="images/<?php echo $data['foto'] ?>" width="50" height="50"></td>
                                          

                                            <td>
                                            	<a href="?page=pengguna&aksi=ubah&id=<?php echo $data['id'] ?>"class="btn btn-warning waves-effect"> <i class="material-icons">create</i></a>

                                     
                                             
                                             
                                       
                               
                                            
                                            <a onclick="return confirm('Apa Anda Yakin Ingin Menghapus Data Ini?')" href="?page=pengguna&aksi=hapus&id=<?php echo $data['id'] ?>"class="btn btn-danger waves-effect"> <i class="material-icons">delete_sweep</i></a></td>
                                        </tr>
                                      <?php } ?>
                                        </tbody>
                                </table>

                                		<a href="?page=pengguna&aksi=tambah" class="btn btn-success waves-effect"><i class="material-icons">add_box</i>Tambah</a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>