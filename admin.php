<?php session_start();  ?>
<?php include('connection.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
</head>
<body>
    <h1> espace admin</h1>
    <form action="admin.php" method="post">
        <input type="text" name="user" placeholder="user" required>
        <input type="password" name="mdpa" placeholder="password" required>
        <input type="submit" name ="btn" value="login">
    </form>
    <?php
    if(isset($_POST['btn'])){
        $user = $_POST['user'];
        $mdpa = $_POST['mdpa'];
        $req=mysqli_query($con,"select * from admin 
        where user='$user' AND mdp='$mdpa'");
        if(mysqli_num_rows($req)>1){
            echo "<script>window.location.href='cpanel.php'</script>";
       
    }
    else{
        echo "error error ";
    }
    }
    ?>

</body>

</html>