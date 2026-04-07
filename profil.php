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
    
    <style>
        /* ========== STYLE LOCAL POUR L'INSCRIPTION ========== */
        
        /* Conteneur principal */
        .register-container {
            max-width: 500px;
            margin: 50px auto;
            padding: 0 20px;
        }
        
        /* Titre principal */
        .register-container h1 {
            text-align: center;
            color: #333;
            font-size: 32px;
            font-weight: 700;
            margin-bottom: 30px;
            position: relative;
            padding-bottom: 15px;
        }
        
        .register-container h1:after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            width: 80px;
            height: 3px;
            background: linear-gradient(135deg, #d2b706 0%, #e4d233 100%);
            border-radius: 2px;
        }
        
        /* Formulaire */
        .register-container form {
            background: white;
            padding: 40px;
            border-radius: 20px;
            box-shadow: 0 10px 40px rgba(0,0,0,0.1);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .register-container form:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 50px rgba(0,0,0,0.15);
        }
        
        /* Champs de saisie */
        .register-container input[type="text"],
        .register-container input[type="email"],
        .register-container input[type="tel"],
        .register-container input[type="password"] {
            width: 100%;
            padding: 14px 18px;
            margin-bottom: 20px;
            border: 2px solid #e8e8e8;
            border-radius: 12px;
            font-size: 15px;
            font-family: 'Open Sans', sans-serif;
            transition: all 0.3s ease;
            background: #fafafa;
            box-sizing: border-box;
        }
        
        .register-container input[type="text"]:focus,
        .register-container input[type="email"]:focus,
        .register-container input[type="tel"]:focus,
        .register-container input[type="password"]:focus {
            border-color: #e5d60b;
            outline: none;
            background: white;
            box-shadow: 0 0 0 4px rgba(78,115,223,0.1);
        }
        
        /* Placeholder stylisé */
        .register-container input::placeholder {
            color: #aaa;
            font-weight: 400;
        }
        
        /* Bouton submit */
        .register-container input[type="submit"] {
            width: 100%;
            padding: 14px;
            background: linear-gradient(135deg, #edf106 0%, #d7c51e 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 10px;
            font-family: 'Open Sans', sans-serif;
        }
        
        .register-container input[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(78,115,223,0.3);
            background: linear-gradient(135deg, #3a5fcf 0%, #1a3aa8 100%);
        }
        
        .register-container input[type="submit"]:active {
            transform: translateY(0);
        }
        
        /* Messages PHP stylisés */
        .register-container .success-message,
        .register-container .error-message {
            padding: 12px 20px;
            margin-bottom: 20px;
            border-radius: 12px;
            text-align: center;
            font-weight: 500;
            animation: fadeIn 0.5s ease;
        }
        
        .register-container .success-message {
            background: linear-gradient(135deg, #d4edda 0%, #c3e6cb 100%);
            color: #155724;
            border-left: 4px solid #28a745;
        }
        
        .register-container .error-message {
            background: linear-gradient(135deg, #f8d7da 0%, #f5c6cb 100%);
            color: #721c24;
            border-left: 4px solid #dc3545;
        }
        
        /* Animation d'apparition */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        /* Responsive design */
        @media (max-width: 768px) {
            .register-container {
                margin: 30px auto;
            }
            
            .register-container form {
                padding: 25px;
            }
            
            .register-container h1 {
                font-size: 28px;
            }
            
            .register-container input[type="text"],
            .register-container input[type="email"],
            .register-container input[type="tel"],
            .register-container input[type="password"] {
                padding: 12px 15px;
                font-size: 14px;
            }
        }
        
        @media (max-width: 480px) {
            .register-container form {
                padding: 20px;
            }
            
            .register-container h1 {
                font-size: 24px;
            }
        }
    </style>
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
     <?php  include('header.php'); ?>
    <!-- Navbar & Hero End -->
<?php  
$idu=$_SESSION['idu'];
$sel=mysqli_query($conn,"select * from utilisateur where idu=$idu");
$data_sel=mysqli_fetch_assoc($sel);
?>
    <div class="register-container">
        <h1>Update account</h1>
        <form method="post">
            <input type="text" name="nomu" value="<?php echo $data_sel['nomu'] ?>" required>
            <input type="email" name="emailu" value="<?php echo $data_sel['emailu'] ?>" required>
            <input type="tel" name="telu" value="<?php echo $data_sel['telu'] ?>" required>
            <input type="password" name="N_mdpu" placeholder="New Password" required>
            <input type="password" name="O_mdpu" placeholder="Old Password" required>
            <input type="submit" name="btn" value="Update Account" >
        </form>
        <?php
        if(isset($_POST['btn'])){
            $nomu=$_POST['nomu'];
            $emailu=$_POST['emailu'];
            $telu=$_POST['telu'];
            $N_mdpu=$_POST['N_mdpu'];
            $O_mdpu=$_POST['O_mdpu'];

            if($O_mdpu==$data_sel['mdpu']){
                $maj=mysqli_query($conn,"update utilisateur 
                set nomu='$nomu',emailu='$emailu',telu='$telu',
                mdpu='$N_mdpu' where idu=$idu
                ");
                echo"Updated !";
            }           
        }
        ?>
    </div>
    
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