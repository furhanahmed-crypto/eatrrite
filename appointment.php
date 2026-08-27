<!DOCTYPE html>
<html lang="en">
<?php
    include "header.php";
?>
<!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 hero-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Appointment</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Appointment</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


     <!-- Appointment Start -->
   <div class="container-fluid bg-primary bg-appointment my-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container">
         <div class="row gx-5">
            <div class="col-lg-6 py-5">
               <div class="py-5">
                  <h1 class="display-5 text-white mb-4">Eat Rrite is dedicated to the healthy healing of lives.</h1>
                  <p class="text-white mb-0">We believe in creating nutrition programs which are structured to become a part of your lifestyle and a routine for you. We align your lifestyle to our scientific approach of nutrition and then craft the most unique program which can help you achieve any goal, be it fitness or wellness.</p>
               </div>
            </div>
            <div class="col-lg-6">
               <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                  <h1 class="text-dark mb-4">Make Appointment</h1>
                  <form action="email/bookappointment.php" method="post">
                     <div class="row g-3">
                        <div class="col-12 col-sm-12">
                           <select class="form-select bg-light border-0" style="height: 55px;" name="programname" required>
                                <option value="">Select A Service</option>
                                <option value="Weight & Lifestyle Management Program">Weight & Lifestyle Management Program</option>
                                <option value="Gut Health Diet Program">Gut Health Diet Program</option>
                                <option value="Celiac And Crohn Disease">Celiac And Crohn Disease</option>
                                <option value="Female Hormone Health Diet Program">Female Hormone Health Diet Program</option>
                                <option value="Diabetes Management And Reversal Diet Plan">Diabetes Management And Reversal Diet Plan</option>
                                <option value="Heart Disease Management Diet Program">Heart Disease Management Diet Program</option>
                                <option value="Oncology (Cancer) Disease Management Nutrition Program">Oncology (Cancer) Disease Management Nutrition Program</option>
                                <option value="Enduro Sports Nutrition Program">Enduro Sports Nutrition Program</option>
                                <option value="NutriCare for Mom-to-Be">NutriCare for Mom-to-Be</option>
                                <option value="Post Natal NutriCare and Weight Loss Program">Post Natal NutriCare and Weight Loss Program</option>
                           </select>
                        </div>
                        <div class="col-12 col-sm-6">
                           <input type="text" class="form-control bg-light border-0" placeholder="Your Name" style="height: 55px;" name="name" required>
                        </div>
                        <div class="col-12 col-sm-6">
                           <input type="number" class="form-control bg-light border-0" placeholder="Phone Number" style="height: 55px;" name="mobilenumber" required>
                        </div>
                        <div class="col-12 col-sm-6">
                           <div class="date" id="date1" data-target-input="nearest">
                              <input type="text"
                                 class="form-control bg-light border-0 datetimepicker-input"
                                 placeholder="Appointment Date" data-target="#date1" data-toggle="datetimepicker" style="height: 55px;" name="date" required>
                           </div>
                        </div>
                        <div class="col-12 col-sm-6">
                           <div class="time" id="time1" data-target-input="nearest">
                              <input type="text"
                                 class="form-control bg-light border-0 datetimepicker-input"
                                 placeholder="Appointment Time" data-target="#time1" data-toggle="datetimepicker" style="height: 55px;" name="time" required>
                           </div>
                        </div>
                        <div class="col-12">
                           <button class="btn btn-dark w-100 py-3" type="submit">Make Appointment</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Appointment End -->
    

    <!-- Newsletter Start -->
    <div id="subscribe" class="container-fluid position-relative pt-5 wow fadeInUp" data-wow-delay="0.1s" style="z-index: 1;">
        <?php
           if ( isset($_GET['appointmentsuccess']) && $_GET['appointmentsuccess'] == 1 )
               {
                  echo '<p '.'class =' .'successmsg'.'>We have received your request and will get back to you shortly</p>';
               }
           
           if ( isset($_GET['appointmentfail']) && $_GET['appointmentfail'] == 1 )
               {
                  echo '<p '.'class =' .'fail'.'> Message could not be sent</p>';
               }
           ?>
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