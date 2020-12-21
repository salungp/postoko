<?php 



  $data=$_GET['id'];
    $sql=$koneksi->query("delete from tb_pelanggan where kode_pelanggan='$data'");

    if ($sql) {
    
    
 ?>
 


	<script type="text/javascript">
                                		alert("Data berhasil Dihapus");
                                		window.location.href="?page=pelanggan";
                                	</script>


  <?php


}

?>