<!DOCTYPE html>
<html lang="en">
   <?php
      include "header.php";
      ?>
   <!-- Hero Start -->
   <div class="container-fluid bg-primary py-5 hero-header mb-5">
      <div class="row py-3">
         <div class="col-12 text-center">
            <h1 class="display-3 text-white animated zoomIn">Contact Us</h1>
            <a href="index.php" class="h4 text-white">Home</a>
            <i class="far fa-circle text-white px-2"></i>
            <a href="" class="h4 text-white">Contact</a>
         </div>
      </div>
   </div>
   <!-- Hero End -->
   <!-- Contact Start -->
   <div class="container-fluid py-5">
      <div class="container">
         <div class="row g-5">
            <div class="col-xl-4 col-lg-6 wow slideInUp" data-wow-delay="0.1s">
               <div class="bg-light rounded h-100 p-5">
                  <div class="section-title">
                     <h5 class="position-relative d-inline-block text-primary text-uppercase">Contact Us</h5>
                     <h1 class="display-6 mb-4">Feel Free To Contact Us</h1>
                  </div>
                  <div class="d-flex align-items-center mb-2">
                     <i class="bi bi-geo-alt fs-1 text-primary me-3"></i>
                     <div class="text-start">
                        <h5 class="mb-0">Our Office</h5>
                        <span>Telangana, India</span><br>
                        <span>Dehradun, Uttarakhand, India</span>
                     </div>
                  </div>
                  <div class="d-flex align-items-center mb-2">
                     <i class="bi bi-envelope-open fs-1 text-primary me-3"></i>
                     <div class="text-start">
                        <h5 class="mb-0">Email Us</h5>
                        <span>eatrrite@gmail.com</span>
                     </div>
                  </div>
                  <div class="d-flex align-items-center">
                     <i class="bi bi-phone-vibrate fs-1 text-primary me-3"></i>
                     <div class="text-start">
                        <h5 class="mb-0">Call Us</h5>
                        <span>+91 96398 77483</span>
                     </div>
                  </div>
               </div>
            </div>
            <div class="col-xl-4 col-lg-6 wow slideInUp" data-wow-delay="0.3s">
               <form action="email/mail.php" method="post">
                  <div class="row g-3">
                     <div class="col-12">
                        <input type="text" class="form-control border-0 bg-light px-4" placeholder="Your Name" name="name" style="height: 55px;" required>
                     </div>
                     <div class="col-12">
                        <input type="email" class="form-control border-0 bg-light px-4" placeholder="Your Email" name="email" style="height: 55px;" required>
                     </div>
                     <div class="col-12">
                        <input type="text" class="form-control border-0 bg-light px-4" placeholder="Mobile Number" name="mobilenumber" style="height: 55px;" required>
                     </div>
                     <div class="col-12">
                        <input type="text" class="form-control border-0 bg-light px-4" placeholder="Subject" name="subject" style="height: 55px;" required>
                     </div>
                     <div class="col-12">
                        <textarea class="form-control border-0 bg-light px-4 py-3" rows="5" placeholder="Message"  name="messageBody"></textarea>
                     </div>
                     <div class="col-12">
                        <button class="btn btn-dark w-100 py-3" type="submit">Send Message</button>
                     </div>
                     <?php
                        if ( isset($_GET['success']) && $_GET['success'] == 1 )
                            {
                               echo '<p '.'class =' .'successmsg'.'> Message has been sent</p>';
                            }
                        
                        if ( isset($_GET['fail']) && $_GET['fail'] == 1 )
                            {
                               echo '<p '.'class =' .'fail'.'> Message could not be sent</p>';
                            }   
                        ?>
                  </div>
               </form>
            </div>
            <div class="col-xl-4 col-lg-12 wow slideInUp" data-wow-delay="0.6s">
               <iframe class="position-relative rounded w-100 h-100"
                  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3888600.9136236887!2d76.63699895988631!3d17.86384608099243!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3a3350db9429ed43%3A0x63ef7ba741594059!2sTelangana!5e0!3m2!1sen!2sin!4v1693475475098!5m2!1sen!2sin"
                  frameborder="0" style="min-height: 400px; border:0;" allowfullscreen="" aria-hidden="false"
                  tabindex="0">
               </iframe>
            </div>
         </div>
      </div>
   </div>
   <!-- Contact End -->
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