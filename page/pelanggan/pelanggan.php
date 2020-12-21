




            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                 Data Pelanggan
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
                                            <th>Nama</th>
                                            <th>Alamat </th>
                                            <th>Telpon</th>
                                            <th>Email</th>
                                           
                                            <th>Aksi</th> 
                                          
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    	<?php 
                                    			$no = 1;
                                    			$sql = $koneksi->query("select * from tb_pelanggan" );
                                    			while ($data = $sql->fetch_assoc()){

                                    			

                                    	 ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $data['nama'] ?></td>
                                            <td><?php echo $data['alamat'] ?></td>
                                            <td><?php echo $data['telpon'] ?></td>
                                            <td><?php echo $data['email'] ?></td>
                                          

                                            <td>
                                            	<a href="?page=pelanggan&aksi=ubah&id=<?php echo $data['kode_pelanggan'] ?>"class="btn btn-warning waves-effect"> <i class="material-icons">create</i></a>

                                     
                                             
                                             
                                       
                               
                                            
                                            <a onclick="return confirm('Apa Anda Yakin Ingin Menghapus Data Ini?')" href="?page=pelanggan&aksi=hapus&id=<?php echo $data['kode_pelanggan'] ?>"class="btn btn-danger waves-effect"> <i class="material-icons">delete_sweep</i></a></td>
                                        </tr>
                                      <?php } ?>
                                        </tbody>
                                </table>

                                		<a href="?page=pelanggan&aksi=tambah" class="btn btn-success waves-effect"><i class="material-icons">add_box</i>Tambah</a>


                            </div>
                        </div>
                    </div>
                </div>
            </div>