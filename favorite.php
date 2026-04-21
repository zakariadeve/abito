<?php
session_start();
include("connection.php");

if(isset($_SESSION['idu'])){ 
    $idu=$_SESSION['idu'];
    $idp=$_GET['idp'];
    $datef=date("Y-m-d");
    $rech=mysqli_query($conn,"select * from favo
     where idu=$idu and idp=$idp");
    if(mysqli_num_rows($rech)>=1){
        echo "<script>alert('already in favorite')</script>";
        echo "<script>window.location.href='detail.php?idp=$idp'</script>";
    }else{
        $fav=mysqli_query($conn," insert into favo (idu,idp,datef) 
        values($idu,$idp,'$datef') ");
     if($fav){
        echo "<script>window.location.href='my_fav.php'</script>"; 
  }
  }
}