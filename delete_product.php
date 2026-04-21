
<?php
session_start();
include("connection.php");
if(isset($_SESSION['idu'])){ 
    $idp=$_GET['idp'];
    $sup=mysqli_query($conn,"delete from produit where idp=$idp");
     if($sup){
        echo "<script>window.location.href='my_products.php'</script>";
  }
}
?>