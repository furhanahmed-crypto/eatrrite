<!DOCTYPE html>
<html lang="en">

<?php
    include "header.php";
?>


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">About Us</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">About</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title mb-4">
                        <h5 class="position-relative d-inline-block text-dark text-uppercase">About Us</h5>
                        <h1 class="display-5 mb-0">Eat Rrite is a Nutrition and Holistic Wellness platform</h1>
                    </div>
                    <h4 class="text-body fst-italic mb-4">It is time to strike a balance between comfort, celebration, food and fitness to make healthy living an effortless routine.</h4>
                    <p class="mb-4">Eat Rrite is a nutrition and wellness company which holds true to the values of wholesome eating and healthy living. We promote healthy fat loss and monitor your eating patterns so that, you not only lose weight but, also maintain yourself in order to lead a healthy lifestyle.</p>
                    <p class="mb-4">There is often times a disconnect when it comes to living a healthy lifestyle; we know what’s good for our bodies, but we don’t always act accordingly. Eat Rrite aims to mend the gap between knowing and doing, by catering to each individual's unique circumstances. Whether it is weight loss or weight management, managing a dietary condition, or developing a healthy relationship with food, Eat Rrite offers a variety of services and packages designed to meet your needs.</p>
                    <div class="row g-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.3s">
                            <h5 class="mb-3"><i class="fa fa-check-circle text-dark me-3"></i>Award Winning</h5>
                            <h5 class="mb-3"><i class="fa fa-check-circle text-dark me-3"></i>Professional Staff</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">
                            <h5 class="mb-3"><i class="fa fa-check-circle text-dark me-3"></i>24/7 Opened</h5>
                            <h5 class="mb-3"><i class="fa fa-check-circle text-dark me-3"></i>Fair Prices</h5>
                        </div>
                    </div>
                    <a href="appointment.html" class="btn btn-dark py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.6s">Make Appointment</a>
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="img/about-eatrrite.png" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    

    <!-- Newsletter Start -->
    <div id="subscribe" class="container-fluid position-relative pt-5 wow fadeInUp" data-wow-delay="0.1s" style="z-index: 1;">
        <div class="container">
            <div class="geen-txt p-5">
                <form class="mx-auto" style="max-width: 600px;" method="post" action="email/subscribe.php">
                    <div class="input-group">
                        <input type="text" class="form-control border-white p-3" placeholder="Your Email" name="email">
                        <button class="btn btn-dark px-4">Sign Up</button>
                    </div>
                </form>
            </div>            
        </div>
    </div>
    <!-- Newsletter End -->
    

    
    <!-- Footer Start -->
    <?php
        include "footer.php";
    ?>
    <!-- Footer End -->
</body>

</html>
