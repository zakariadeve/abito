<div class="container-fluid carousel bg-light px-0">
        <div class="row g-0 justify-content-end">
            <div class="col-12 col-lg-7 col-xl-9">
                <div class="header-carousel owl-carousel bg-light py-5">
                    <?php 
                    $req_slide = mysqli_query($conn, "select * from slide  where fixe = 'non'");
                    while($data_slide = mysqli_fetch_assoc($req_slide)){
                    ?>
                    <div class="row g-0 header-carousel-item align-items-center">
                        <div class="col-xl-6 carousel-img wow fadeInLeft" data-wow-delay="0.1s">
                            <img src="<?php echo $data_slide['photos']?>" class="img-fluid w-100" alt="Image">
                        </div>
                        <div class="col-xl-6 carousel-content p-4">
                            <h4 class="text-uppercase fw-bold mb-4 wow fadeInRight" data-wow-delay="0.1s"
                                style="letter-spacing: 3px;"><?php echo $data_slide['titres']?></h4>
                            <h1 class="display-3 text-capitalize mb-4 wow fadeInRight" data-wow-delay="0.3s">On Selected
                                Laptops & Desktop Or Smartphone</h1>
                            <p class="text-dark wow fadeInRight" data-wow-delay="0.5s"><?php echo $data_slide['prixs']?></p>
                            <a class="btn btn-primary rounded-pill py-3 px-5 wow fadeInRight" data-wow-delay="0.7s"
                                href="#">Shop Now</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                
            </div>
            <div class="col-12 col-lg-5 col-xl-3 wow fadeInRight" data-wow-delay="0.1s">
                <?php 
                    $req_slide2 = mysqli_query($conn, "select * from slide  where fixe = 'oui'");
                    while($data_slide2 = mysqli_fetch_assoc($req_slide2)){
                    ?>
                <div class="carousel-header-banner h-100">
                    <img src="<?php echo $data_slide2['photos']?>" class="img-fluid w-100 h-100" style="object-fit: cover;" alt="Image">
                    <div class="carousel-banner-offer">
                       
                        <p class="text-primary fs-5 fw-bold mb-0">Special Offer</p>
                    </div>
                    <div class="carousel-banner">
                        <div class="carousel-banner-content text-center p-4">
                           
                            <a href="#" class="d-block text-white fs-3"><?php echo $data_slide2['titres']?></a>
                            
                            <span class="text-primary fs-5"><?php echo $data_slide2['prixs']?></span>
                        </div>
                        <a href="#" class="btn btn-primary rounded-pill py-2 px-4"><i
                                class="fas fa-shopping-cart me-2"></i> Add To Cart</a>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>