<?php 



  $data=$_GET['id'];
    $sql=$koneksi->query("delete from tb_pengguna where id='$data'");

    if ($sql) {
    
    
 ?>
 


	<script type="text/javascript">
                                		alert("Data berhasil Dihapus");
                                		window.location.href="?page=pengguna";
                                	</script>


  <?php


}

?>