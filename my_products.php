<?php session_start();  ?>
<?php include('connection.php'); ?>

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
<style>
    /* Style local pour le tableau des produits */
    .table-container {
        max-width: 1200px;
        margin: 2rem auto;
        padding: 0 20px;
        overflow-x: auto;
    }

    table {
        width: 100%;
        border-collapse: separate;
        border-spacing: 0;
        background: white;
        border-radius: 12px;
        overflow: hidden;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        font-family: 'Open Sans', sans-serif;
    }

    /* Style des en-têtes */
    table thead tr {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
    }

    table th {
        padding: 15px 20px;
        color: white;
        font-weight: 600;
        font-size: 16px;
        text-transform: uppercase;
        letter-spacing: 1px;
        text-align: center;
        border-bottom: 2px solid rgba(255, 255, 255, 0.2);
    }

    /* Style des cellules */
    table td {
        padding: 12px 20px;
        text-align: center;
        vertical-align: middle;
        border-bottom: 1px solid #e0e0e0;
        color: #333;
    }

    /* Effet hover sur les lignes */
    table tbody tr {
        transition: all 0.3s ease;
    }

    table tbody tr:hover {
        background-color: #f8f9ff;
        transform: scale(1.01);
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }

    /* Style des images dans le tableau */
    table td img {
        width: 80px;
        height: 80px;
        object-fit: cover;
        border-radius: 8px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        transition: transform 0.3s ease;
    }

    table td img:hover {
        transform: scale(1.1);
    }

    /* Style du bouton delete */
    table td a {
        display: inline-block;
        padding: 8px 16px;
        background: linear-gradient(135deg, #f56565 0%, #e53e3e 100%);
        color: white;
        text-decoration: none;
        border-radius: 6px;
        font-size: 14px;
        font-weight: 500;
        transition: all 0.3s ease;
    }

    table td a:hover {
        background: linear-gradient(135deg, #e53e3e 0%, #c53030 100%);
        transform: translateY(-2px);
        box-shadow: 0 4px 12px rgba(229, 62, 62, 0.3);
    }

    /* Style du prix */
    table td:nth-child(3) {
        font-weight: 600;
        color: #48bb78;
        font-size: 18px;
    }

    /* Style du titre */
    table td:first-child {
        font-weight: 600;
        color: #2d3748;
    }

    /* Responsive design */
    @media (max-width: 768px) {
        .table-container {
            margin: 1rem auto;
            padding: 0 10px;
        }

        table th,
        table td {
            padding: 10px 12px;
            font-size: 14px;
        }

        table td img {
            width: 60px;
            height: 60px;
        }

        table td a {
            padding: 6px 12px;
            font-size: 12px;
        }
    }

    /* Style pour les lignes alternées */
    table tbody tr:nth-child(even) {
        background-color: #fafafa;
    }

    table tbody tr:nth-child(even):hover {
        background-color: #f8f9ff;
    }

    /* Animation d'apparition */
    @keyframes fadeInUp {
        from {
            opacity: 0;
            transform: translateY(20px);
        }

        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    table tbody tr {
        animation: fadeInUp 0.5s ease forwards;
        opacity: 0;
    }

    /* Délais d'animation pour chaque ligne */
    table tbody tr:nth-child(1) { animation-delay: 0.1s; }
    table tbody tr:nth-child(2) { animation-delay: 0.2s; }
    table tbody tr:nth-child(3) { animation-delay: 0.3s; }
    table tbody tr:nth-child(4) { animation-delay: 0.4s; }
    table tbody tr:nth-child(5) { animation-delay: 0.5s; }
</style>
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
     <?php  include('header.php'); ?>
    <!-- Navbar & Hero End -->
        <?php
            if(isset($_SESSION['idu'])){                

        ?>
        <table>
            <tr>
                <td>titre</td>
                <td>photo</td>
                <td>prix</td>
                <td>action</td>
            </tr>
            <?php $idu=$_SESSION['idu'];
                $req_pro=mysqli_query($conn,"select * from produit 
                               where idu=$idu");
                while($data_pro=mysqli_fetch_assoc($req_pro)){ ?>
            <tr>
                <td><?php echo $data_pro['titrep'] ?></td>
                <td><img src="<?php echo $data_pro['ph1'] ?>"></td>
                <td><?php echo $data_pro['prix'] ?></td>
                <td><a href="delete_pro.php?idp=<?php echo $data_pro['idp'] ?>">delete</a></td>
            </tr>
            <?php } ?>

        </table>
        <?php  }else{
            echo"<script>window.location.href='login.php'</script>";

         }  ?>

    <!-- Footer Start -->
    <?php  include('footer.php'); ?>
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