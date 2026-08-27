<!DOCTYPE html>
<html lang="en">
<?php
    include "header.php";
?>
<!-- Hero Start -->
    <div class="container-fluid bg-primary py-5 yoga-header mb-5">
        <div class="row py-3">
            <div class="col-12 text-center">
                <h1 class="display-3 text-white animated zoomIn">Register</h1>
                <a href="" class="h4 text-white">Home</a>
                <i class="far fa-circle text-white px-2"></i>
                <a href="" class="h4 text-white">Registration For Yoga</a>
            </div>
        </div>
    </div>
    <!-- Hero End -->


     <!-- Appointment Start -->
   <div class="container-fluid bg-primary bg-yoga my-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container">
         <div class="row gx-5">
             <div class="col-lg-2"></div>
            <div class="col-lg-8"  style="padding:20px 5px;;">
               <div class="appointment-form h-100 d-flex flex-column justify-content-center text-center p-5 wow zoomIn" data-wow-delay="0.6s">
                  <h1 class="text-dark mb-4">Yoga Registration Form</h1>
                  <form action="email/bookappointment.php" method="post">
                     <div class="row g-3">
                        <div class="col-12 col-sm-6">
                           <input type="text" class="form-control bg-light border-0" placeholder="Full Name" style="height: 55px;" name="name" required>
                        </div>
                        <div class="col-12 col-sm-6">
                           <input type="number" class="form-control bg-light border-0" placeholder="Mobile Number" style="height: 55px;" name="mobilenumber" required>
                        </div>
                        <div class="col-12 col-sm-6">
                           <input type="email" class="form-control bg-light border-0" placeholder="Email" style="height: 55px;" name="mobilenumber" required>
                        </div>
                        <div class="col-12 col-sm-6">
                           <input type="number" class="form-control bg-light border-0" placeholder="Age" style="height: 55px;" name="mobilenumber" required>
                        </div>
                        <div class="col-12 col-sm-6">
                           <input type="text" class="form-control bg-light border-0" placeholder="Weight" style="height: 55px;" name="mobilenumber" required>
                        </div>
                        <div class="col-12 col-sm-6">
                           <input type="text" class="form-control bg-light border-0" placeholder="Height" style="height: 55px;" name="mobilenumber" required>
                        </div>
                        <div class="col-12 col-sm-6">
                           <input type="text" class="form-control bg-light border-0" placeholder="Occupation" style="height: 55px;" name="mobilenumber" required>
                        </div>
                        <div class="col-12 col-sm-6">
                           <input type="text" class="form-control bg-light border-0" placeholder="Address" style="height: 55px;" name="mobilenumber" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <select class="form-select bg-light border-0" style="height: 55px;" name="programname" required>
                                <option value="">Yoga Experience</option>
                                <option value="None">None</option>
                                <option value="Beginner">Beginner</option>
                                <option value="Intermediate">Intermediate</option>
                                <option value="Advanced">Advanced</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-6">
                            <select class="form-select bg-light border-0" style="height: 55px;" name="programname" required>
                                <option value="">What are your goals for joining this class?</option>
                                <option value="Weight Loss">Weight Loss</option>
                                <option value="Flexibility and mobility">Flexibility and mobility</option>
                                <option value="Stress Relief">Stress Relief</option>
                                <option value="General Health Improvement">General Health Improvement</option>
                                <option value="Pain Relief (if any, specify body part)">Pain Relief (if any, specify body part)</option>
                            </select>
                        </div>
                        <div class="col-12 col-sm-12">
                           <input type="text" class="form-control bg-light border-0" placeholder="Are you suffering from any medical conditions, injuries, or ailments?" style="height: 55px;" name="mobilenumber" required>
                        </div>
                        <div class="col-12 col-sm-12">
                           <input type="text" class="form-control bg-light border-0" placeholder="Do you follow a diet plan or any specific lifestyle modifications currently?" style="height: 55px;" name="mobilenumber" required>
                        </div>
                        <div class="col-12 col-sm-12">
                           <input type="text" class="form-control bg-light border-0" placeholder="Would you prefer to register only for a yoga class or a yoga class with a personalised diet chart." style="height: 55px;" name="mobilenumber" required>
                        </div>
                        <div class="col-12 col-sm-6">
                           <input type="text" class="form-control bg-light border-0" placeholder="Any other specific requests or preferences?" style="height: 55px;" name="mobilenumber" required>
                        </div>
                        <div class="col-12 col-sm-6">
                            <select class="form-select bg-light border-0" style="height: 55px;" name="programname" required>
                                <option value="">Preferred Time Slot</option>
                                <option value="Morning">Morning</option>
                                <option value="Evening">Evening</option>
                            </select>
                        </div>
                        
                        <div class="col-12">
                           <button class="btn btn-dark w-100 py-3" type="submit">Register Now</button>
                        </div>
                     </div>
                  </form>
               </div>
            </div>
            <div class="col-lg-2"></div>
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