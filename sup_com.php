<?php
session_start();
include("connection.php");
if(isset($_GET['idm'])){ 
    $idm=$_GET['idm'];
    $sup=mysqli_query($conn,"delete from commentaire where idm='$idm'");
     if($sup){
        echo "<script>window.location.href='cpanel.php'</script>";
  }
}
?>