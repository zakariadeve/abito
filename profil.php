<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
 
<head>
    <meta charset="utf-8">
    <title>Abito platforme ecommerce</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="ecommerce maroc tendance " name="keywords">
    <meta content="" name="description">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet">
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">


    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

    <!-- Spinner Start -->
    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>
    <!-- Spinner End -->


    <!-- Navbar & Hero Start -->
     <?php include('header.php'); ?>
    <!-- Navbar & Hero End -->
     <?php
     $idu=$_SESSION['idu'];
     $sel=mysqli_query($conn,"select * from utilisateur where idu='$idu'");
     $data_sel=mysqli_fetch_assoc($sel);
     ?>

     <form method="post">
        <input type="text" name="nomu" placeholder="name" value="<?php echo $data_sel['nomu']; ?>" required>
        <input type="email" name="emailu" placeholder="email" value="<?php echo $data_sel['emailu']; ?>" required>
        <input type="text" name="telu" placeholder="telephone" value="<?php echo $data_sel['telu']; ?>" required>
        <input type="password" name="N_mdpu" placeholder="new password"  required>
        <input type="password" name="O_mdpu" placeholder=" old password"  required>
        <input type="submit" name="btn" value="update Account">
    </form>     
    <?php
if (isset($_POST['btn'])) {
    $nomu = $_POST['nomu'];
    $emailu = $_POST['emailu'];
    $telu = $_POST['telu'];
    $N_mdpu = $_POST['N_mdpu'];
    $O_mdpu = $_POST['O_mdpu'];

    if ($O_mdpu==$data_sel['mdpu'] ) {
        $maj = mysqli_query($conn, " update utilisateur
         set nomu='$nomu',emailu='$emailu',telu='$telu',
         mdpu='$N_mdpu' where idu ='$idu'");
   
        echo "updated !";

    }
}
?>

    <!-- Footer Start -->
    <?php include('footer.php'); ?>
    <!-- Footer End -->


    


    <!-- Back to Top -->
    <a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>


    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>