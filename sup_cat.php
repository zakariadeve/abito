
<?php
session_start();
include("connection.php");
if(isset($_GET['idc'])){ 
    $idc=$_GET['idc'];
    $sup=mysqli_query($conn,"delete from categorie where idc='$idc'");
     if($sup){
        echo "<script>window.location.href='cpanel.php'</script>";
  }
}
?>