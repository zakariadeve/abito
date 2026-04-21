<?php
session_start();
include("connection.php");

if(isset($_SESSION['idu'])){ 
    $idu=$_GET['idu'];
    $idp=$_GET['idp'];
    $signal=mysqli_query($conn," update utilisateur set  signaler= signaler + 1 
    where idu=$idu  ");
     if($signal){
        echo "<script>window.location.href='detail.php?idp=$idp'</script>";

  }
}