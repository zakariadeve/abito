<?php
session_start();
include("connection.php");
if(isset($_SESSION['idu'])){ 
    $idp=$_GET['idp'];
    $idm=$_GET['idm'];
    $sup=mysqli_query($conn,"delete from commentaire where idm=$idm");
     if($sup){
        echo "<script>window.location.href='detail.php?idp=$idp'</script>";


 
  }
}
?>