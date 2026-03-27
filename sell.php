<!DOCTYPE html>
<?php session_start(); ?>

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

     <h1> Add a product </h1>
    <form  method="post" enctype="multipart/form-data"> 
        <input type="text" name="titrep" placeholder="title" required>
        <input type="text" name="description" placeholder="description" required>
        <input type="number" name="prix" placeholder="prix" required>
        <input type="text" name="ville" placeholder="ville" required>
        <select name="idc">
               <?php
                                include "connection.php";
                                $req_cat=mysqli_query($conn,"SELECT * FROM categorie");
                                while($data_cat=mysqli_fetch_assoc($req_cat)){
                                ?>
            <option value="<?php echo $data_cat['idc']; ?>"><?php echo $data_cat['titrec']; ?></option> 
             <?php } ?>      
        </select>
        <input type="file" name="ph1" required>
        <input type="file" name="ph2" required>
        <input type="file" name="ph3" required>
        
        <input type="submit" name="btn" value="save and publish">
    </form>
    <?php
include "connection.php";
if (isset($_POST['btn'])) {
    $titrep = $_POST['titrep'];
    $description = $_POST['description'];
    $prix = $_POST['prix'];
    $ville = $_POST['ville'];
    $idc = $_POST['idc']; 
    $idu = $_SESSION['idu'];
    $datep = date("Y-m-d");
    $ph1 = $_FILES['ph1'];
    $ph2 = $_FILES['ph2'];
    $ph3 = $_FILES['ph3'];  

    $chemin1 = "images/" . $ph1['name'];
    copy($ph1['tmp_name'],$chemin1);
    $chemin2 = "images/" . $ph2['name'];
    copy($ph2['tmp_name'],$chemin2);
    $chemin3 = "images/" . $ph3['name'];
    copy($ph3['tmp_name'],$chemin3);

        $ajt = mysqli_query($conn, "insert into produit (titrep,description,prix,ville,idc,idu,datep,ph1,ph2,ph3) 
            values ('$titrep','$description','$prix','$ville','$idc','$idu','$datep','$chemin1','$chemin2','$chemin3')");


        echo "<script> alert('product added successfully'); </script> ";
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