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
   if(isset($_GET['idp'])){
    $idp=$_GET['idp'];
    $maj=mysqli_query($conn,"update produit set vue=vue+1 
    where idp=$idp");
    $req_pro=mysqli_query($conn,"select * from produit,utilisateur 
    where idp= $idp and produit.idu=utilisateur.idu");
    $data_pro=mysqli_fetch_assoc($req_pro);
    }
    else{

       echo "<script>window.location.href='index.php';</script>";
    }
    ?>

       <!-- Single Products Start -->
    <div class="container-fluid shop py-5">
        <div class="container py-5">
            <div class="row g-4">
              
                <div class="col-lg-7 col-xl-9 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="row g-4 single-product">
                        <div class="col-xl-6">
                            <div class="single-carousel owl-carousel">


                                <div class="single-item"
                                    data-dot="<img class='img-fluid' src='<?php echo  $data_pro['ph1']?>' alt=''>">
                                    <div class="single-inner bg-light rounded">
                                        <img src="<?php echo $data_pro['ph1']?>" class="img-fluid rounded" alt="Image">
                                    </div>
                                </div>  
                                 <div class="single-item"
                                    data-dot="<img class='img-fluid' src='<?php echo  $data_pro['ph2']?>' alt=''>">
                                    <div class="single-inner bg-light rounded">
                                        <img src="<?php echo $data_pro['ph2']?>" class="img-fluid rounded" alt="Image">
                                    </div>
                                </div> 
                                 <div class="single-item"
                                    data-dot="<img class='img-fluid' src='<?php echo  $data_pro['ph3']?>' alt=''>">
                                    <div class="single-inner bg-light rounded">
                                        <img src="<?php echo $data_pro['ph3']?>" class="img-fluid rounded" alt="Image">
                                    </div>
                                </div>                            
                            </div>
                        </div>
                        <div class="col-xl-6">
                            <h4 class="fw-bold mb-3"><?php echo $data_pro['titrep'] ?></h4>
                            <p class="mb-3"> <?php echo $data_pro['ville'] ?> </p>
                            <h5 class="fw-bold mb-3">Prix :<?php echo $data_pro['prix'] ?>DH</h5>

                           
                            <div class="mb-3">
                              
                                <div class="btn btn-secondary d-inline-block rounded text-white py-1 px-4 ms-2"><i
                                        class="far fa-heart ms-1"></i> ADD favorite</div>
                            </div>
                            <div class="d-flex flex-column mb-3">
                                <small>Vue: <?php echo $data_pro['vue'] ?> fois</small>
                                <small>posted <strong class="text-primary"><?php echo $data_pro['datep'] ?></strong></small>
                            </div>
                            <p class="mb-4"><?php echo $data_pro['description'] ?> </p>
                            
                            <h5>posted by : <?php echo $data_pro['nomu'] ?></h5>
                            <a href="tel:<?php echo $data_pro['telu'] ?>"
                                class="btn btn-primary border border-secondary rounded-pill px-4 py-2 mb-4 text-primary"><i
                                    class="fa fa-shopping-bag me-2 text-white"></i> contact seller</a>
                        </div>
                        <div class="col-lg-12">
                            <nav>
                                <div class="nav nav-tabs mb-3">
                                  
                                    <button class="nav-link border-white border-bottom-0" type="button" role="tab"
                                        id="nav-mission-tab" data-bs-toggle="tab" data-bs-target="#nav-mission"
                                        aria-controls="nav-mission" aria-selected="false">Reviews</button>
                                </div>
                            </nav>
                            <div class="tab-content mb-5">
                               
                                <div class="tab-pane active " id="nav-mission" role="tabpanel"
                                    aria-labelledby="nav-mission-tab">
                                 
 <?php
 $req_comm=mysqli_query($conn,"select * from commentaire,utilisateur ,produit
 where commentaire.idu=utilisateur.idu
  and commentaire.idp=produit.idp and produit.idp=$idp"); 
    while($data_comm=mysqli_fetch_assoc($req_comm)){ 
 ?>       
                                       
                                    <div class="d-flex">
                                        <img src="img/avatar.jpg" class="img-fluid rounded-circle p-3"
                                            style="width: 100px; height: 100px;" alt="">
                                        <div class="">
                                            <p class="mb-2" style="font-size: 14px;"><?php echo $data_comm['datem'] ?></p>
                                            <div class="d-flex justify-content-between">
                                                <h5><?php echo $data_comm['nomu'] ?></h5>
                                               
                                            </div>
                                            <p><?php echo $data_comm['comment'] ?></p>
                                        </div>
                                    </div>
 <?php } ?> 
 <?php
 if(mysqli_num_rows($req_comm)==0){
    echo "No reviews yet";
    }
    ?>
                        

                                 
                                </div>
                               
                            </div>
                        </div>
                        <?php
                        if(isset($_SESSION['idu'])){ ?>
                        <form  method="post">
                            <h4 class="mb-5 fw-bold">Leave a Reply</h4>
                            <div class="row g-4">

                                <div class="col-lg-12">
                                    <div class="border-bottom rounded my-4">
                                        <textarea name="comment" id="" class="form-control border-0" cols="30" rows="8"
                                            placeholder="Your Review *" spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="d-flex justify-content-between py-3 mb-5">
                                       
                                        <button  type="submit" name="btn"
                                            class="btn btn-primary border border-secondary text-primary rounded-pill px-4 py-3">
                                            Post Comment</button>
                                            
                                
                                    </div>
                                </div>
                            </div>
                        </form>
                        
<?php
// Handle comment submission
if(isset($_POST['btn']) ){
    $comment =$_POST['comment'];
    $datem = date('Y-m-d');
    $idu = $_SESSION['idu'];
    $idp = $_GET['idp'];
    
    
    
        $insert_comment = mysqli_query($conn, "insert into commentaire ( datem,comment, idu, idp) 
        values ( '$datem','$comment', $idu, $idp)");
        if($insert_comment){
            echo "<script>window.location.href='detail.php?idp=$idp';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
            
        }
    
}
?>
                        <?php }else{
                            echo"<a href='login.php'> Login to add reviews </a>";
                           } ?>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Single Products End -->

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