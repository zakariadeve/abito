 <div class="container-fluid nav-bar p-0">
        <div class="row gx-0 bg-primary px-5 align-items-center">
            <div class="col-lg-3 d-none d-lg-block">
                <nav class="navbar navbar-light position-relative" style="width: 250px;">
                    <button class="navbar-toggler border-0 fs-4 w-100 px-0 text-start" type="button"
                        data-bs-toggle="collapse" data-bs-target="#allCat">
                        <h4 class="m-0"><i class="fa fa-bars me-2"></i>All Categories</h4>
                    </button>
                    <div class="collapse navbar-collapse rounded-bottom" id="allCat">
                        <div class="navbar-nav ms-auto py-0">
                            <ul class="list-unstyled categories-bars">
                                <?php
                                include "connection.php";
                                $req_cat=mysqli_query($conn,"SELECT * FROM categorie");
                                while($row_cat=mysqli_fetch_assoc($req_cat)){
                                ?>
                                <li>

                                    <div class="categories-bars-item">
                                        <a href="#"><?php echo $row_cat['titrec']; ?></a>
                                       
                                    </div>
                                </li>
                                <?php } ?>


                              
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
            <div class="col-12 col-lg-9">
                <nav class="navbar navbar-expand-lg navbar-light bg-primary ">
                    <a href="" class="navbar-brand d-block d-lg-none">
                        <h1 class="display-5 text-secondary m-0"><i
                                class="fas fa-shopping-bag text-white me-2"></i>Electro</h1>
                        <!-- <img src="img/logo.png" alt="Logo"> -->
                    </a>
                    <button class="navbar-toggler ms-auto" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarCollapse">
                        <span class="fa fa-bars fa-1x"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                        <div class="navbar-nav ms-auto py-0">
                            <a href="index.php" class="nav-item nav-link ">Home</a>
        <?php if(!isset($_SESSION['idu'])){ ?>
                            <a href="login.php" class="nav-item nav-link">Login</a>
                            <a href="signup.php" class="nav-item nav-link">SignUp</a>
                            <?php
                         } else { ?>    
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">My account</a>
                                <div class="dropdown-menu m-0">
                                    <a href="profile.php" class="dropdown-item">profile</a>
                                    <a href="favorite.php" class="dropdown-item">Favorite(5)</a>
                                    <a href="my_products.php" class="dropdown-item">My products(5)</a>
                                    <a href="deconnecter.php" class="dropdown-item">Discounnect(10)</a>
                                    
                                </div>
                            </div>
                            <?php } ?>
                            <div class="nav-item dropdown d-block d-lg-none mb-3">
                                <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">All Category</a>
                                <div class="dropdown-menu m-0">
                                    <ul class="list-unstyled categories-bars">
                                        <li>
                                            <div class="categories-bars-item">
                                                <a href="#">Accessories</a>
                                                <span>(3)</span>
                                            </div>
                                        </li>
                                      
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php if(isset($_SESSION['idu'])){ ?>
                        <a href="sell.php" class="btn btn-secondary rounded-pill py-2 px-4 px-lg-3 mb-3 mb-md-3 mb-lg-0"><i
                                class="fa fa-pen me-2"></i> sell a product</a>
                        <?php } ?>

                    </div>
                </nav>
            </div>
        </div>
    </div>