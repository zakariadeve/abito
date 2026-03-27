<?php
include "connection.php";
?>

<div class="container-fluid product py-5">
        <div class="container py-5">
            <div class="tab-class">
                <div class="row g-4">
                    <div class="col-lg-4 text-start wow fadeInLeft" data-wow-delay="0.1s">
                        <h1> Products</h1>
                    </div>
                    <div class="col-lg-8 text-end wow fadeInRight" data-wow-delay="0.1s">
                        <ul class="nav nav-pills d-inline-flex text-center mb-5">
                            <li class="nav-item mb-4">
                                <a class="d-flex mx-2 py-2 bg-light rounded-pill active" data-bs-toggle="pill"
                                    href="index.php">
                                    <span class="text-dark" style="width: 130px;">All Products</span>
                                </a>
                            </li>
                            <li class="nav-item mb-4">
                                <a class="d-flex py-2 mx-2 bg-light rounded-pill" data-bs-toggle="pill" href="index.php">
                                    <span class="text-dark" style="width: 130px;">Recent</span>
                                </a>
                            </li>
                            <li class="nav-item mb-4">
                                <a class="d-flex mx-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="index.php">
                                    <span class="text-dark" style="width: 130px;">low price</span>
                                </a>
                            </li>
                            <li class="nav-item mb-4">
                                <a class="d-flex mx-2 py-2 bg-light rounded-pill" data-bs-toggle="pill" href="index.php">
                                    <span class="text-dark" style="width: 130px;">Top View</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">

                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        <div class="row g-4">
                            <?php
                            include "connection.php";
                            $req_pro=mysqli_query($conn,"SELECT * FROM produit");
                            while($row_pro=mysqli_fetch_assoc($req_pro)){
                            ?>
                            <div class="col-md-6 col-lg-4 col-xl-3">
                                <div class="product-item rounded wow fadeInUp" data-wow-delay="0.1s">
                                    <div class="product-item-inner border rounded">
                                        <div class="product-item-inner-item">
                                            <img src="img/product-3.png" class="img-fluid w-100 rounded-top" alt="">
                                            <div class="product-new"> <a href="#"
                                                    class="text-succes d-flex align-items-center justify-content-center me-0"><span
                                                        class="rounded-circle btn-sm-square border"><i
                                                            class="fas fa-heart"></i></a></div>
                                            <div class="product-details">
                                                <a href="detail.php"><i class="fa fa-eye fa-1x"></i></a>
                                            </div>
                                        </div>
                                        <div class="text-center rounded-bottom p-4">
                                           
                                            <a href="detail.php" class="d-block h4">Apple iPad Mini</a>
                                        
                                            <span class="text-primary fs-5">560 dh</span>
                                        </div>
                                    </div>
                                    <div
                                        class="product-item-add border border-top-0 rounded-bottom text-center p-4 pt-0">
                                        <a href="https://wa.me/+212661234567"
                                            class="btn btn-primary border-secondary rounded-pill py-2 px-4 mb-4"><i
                                                class="fas fa-shopping-cart me-2"></i> Buy </a>
                                        <div class="d-flex justify-content-between align-items-center">
                                           
                                          
                                        </div>
                                    </div>
                                </div>
                            </div>
                        
                        </div>
                        <?php } ?>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>