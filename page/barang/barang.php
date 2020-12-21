


            <div class="row clearfix">
                <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                    <div class="card">
                        <div class="header">
                            <h2>
                                 Tabel Barang
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
                                <a href="?page=barang&aksi=tambah"title="Tambah"class="btn btn-primary waves-effect"><i class="material-icons"class="noPrint">add_box</i></a>
                                <br> <br> 
                                <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                                    <thead>
                                        <tr>
                                        	<th>No </th>
                                            <th>Kode Barcode</th>
                                            <th>Nama Barang</th>
                                            <th>Satuan</th>
                                            <th>Stok</th>
                                            <th>Harga Jual</th>
                                            <th>Harga Beli</th>
                                            <th>Profit</th> 
                                            <th >Aksi</th> 
                                          
                                        </tr>
                                    </thead>
                                    
                                    <tbody>
                                    	<?php 
                                    			$no = 1;
                                    			$sql = $koneksi->query("select * from tb_barang" );
                                    			while ($data = $sql->fetch_assoc()){

                                    			

                                    	 ?>
                                        <tr>
                                            <td><?php echo $no++ ?></td>
                                            <td><?php echo $data['kode_barcode'] ?></td>
                                            <td><?php echo $data['nama_barang'] ?></td>
                                            <td><?php echo $data['satuan'] ?></td>
                                            <td><?php echo $data['stok'] ?></td>
                                            <td><?php echo $data['harga_beli']?></td>
                                            <td><?php echo $data['harga_jual'] ?></td>
                                            <td><?php echo $data['profit'] ?></td>

                                            <td>
                                                
                                            	<a href="?page=barang&aksi=ubah&id=<?php echo $data['kode_barcode'] ?>"class="btn btn-warning waves-effect"> <i class="material-icons" title="Ubah">create</i> 
                                                <a onclick="return confirm('Apa Anda Yakin Ingin Menghapus Data Ini?')" href="?page=barang&aksi=hapus&id=<?php echo $data['kode_barcode'] ?>"title="Hapus"class="btn btn-danger waves-effect"> <i class="material-icons">delete_sweep</i></a> </td>
                                            
                                        </tr>
                                      <?php } ?>
                                        </tbody>
                                </table>



<script type="text/javascript">


     function alert() {

   
swal({
        title: "Apa Anda Yakin?",
        text: "Data Barang Dihapus!!!",
        type: "warning",
        showCancelButton: true,

        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Hapus Data!",
        closeOnConfirm: false
    }, function alert() {
        swal("Terhapus", "Data Barang Telah Terhapus", "success");
        document.location.href="?page=barang&aksi=hapus&id=000";
    });}
</script>



                            </div>
                        </div>
                    </div>
                </div>
            </div>