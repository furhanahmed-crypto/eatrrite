<!DOCTYPE html>
<html lang="en">

<?php
    include "header.php";
?>


    <!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Services</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Wellness </a>
            </div>
        </div>
    </div>
    <!-- Hero End -->
    <!-- Service Start -->
    <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row g-5 mb-5">
                <div class="col-lg-5 wow zoomIn" data-wow-delay="0.3s" style="min-height: 400px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="img/services/wellness.jpg" style="object-fit: cover; visibility: visible; animation-delay: 0.9s; animation-name: zoomIn;">
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="section-title mb-5">
                        <h5 class="position-relative d-inline-block text-dark text-uppercase">Wellness </h5>
                        <h1 class="display-5 mb-0">What is wellness and its  importance </h1>
                    </div>
                    <div class="row g-5">
                        <p class="mb-4" >
                            Wellness is the coming together of five important aspects of health - Mental, Emotional, Physical, Social, and Spiritual. When these five are aligned perfectly is when one can say that they are a healthy individual in mind, body, and soul. I Mukta, as the founder of Eat Rrite, have successfully attempted to create a unique diet plan which is inclusive of all the above-mentioned aspects.
                        </p>
                        <p class="mb-4"style="margin-top: 0px; !important">
                            As a firm believer in eating the right kinds of food, I have curated a diet program that combines modern science with eating habits, cuisine, and traditions special to your particular lifestyle and family.
                        </p>
                        <p class="mb-4"style="margin-top: 0px; !important">
                            While the inclusion of modern science in your diet teaches you how to balance your macro and micronutrients, the inclusion of eating habits based on your traditions and culture gives you a whole new level of eating food without feeling guilty.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row g-5 wow fadeInUp" data-wow-delay="0.1s">
                <p class="mb-4">
                    Oftentimes, we try and adapt to different styles of eating in an attempt to achieve a certain goal, thereby entering into a loophole that will make you crave and then binge eat. While one aspect of the program is a diet that embraces the aspects of wellness, the other aspect is a workout. I also create workout plans suitable for your specific body type. In some cases, it is a mix of modern-day weight training mixed with the benefits of yoga.
                </p>
                <p class="mb-4" style="margin-top: 0px; !important">
                    There is research-backed evidence supporting the coming together of nutrition, exercise, and yoga for our entire well-being. In today’s fast-paced world, overall wellness is what needs to be a priority to live a thriving full-filled life rather than mere survival. So take that first step and join us in the movement to Just stay healthy, Stay fit and Always EAT RRITE !
                </p>
                
            </div>
        </div>
    </div>
    <!-- Service End -->
    

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
    <!-- Footer end -->
</body>

</html>