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
                <a href="" class="h4 text-white"> 8-Week Wellness Initiative</a>
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
                  <h1 class="text-dark mb-4"> 8-Week Wellness Initiative Registration Form</h1>
                  <form action="email/bookappointment.php" method="post">
                     <div class="row g-3">
                         
                        <h5 class="text-dark" style="text-align: left;">Participant Details</h5>
                        
                        <div class="col-12 col-sm-6">
                           <input type="text" class="form-control bg-light border-0" placeholder="Full Name" style="height: 55px;" name="name" required>
                        </div>
                        
                        <div class="col-12 col-sm-6">
                           <input type="email" class="form-control bg-light border-0" placeholder="Email" style="height: 55px;" name="mobilenumber" required>
                        </div>
                        
                        <div class="col-12 col-sm-6">
                           <input type="number" class="form-control bg-light border-0" placeholder="Phone Number" style="height: 55px;" name="mobilenumber" required>
                        </div>
                        
                        <div class="col-12 col-sm-6">
                           <input type="number" class="form-control bg-light border-0" placeholder="City of Residence" style="height: 55px;" name="city" required>
                        </div>
                        
                        <h5 class="text-dark" style="text-align: left;">Anthropometric Data</h5>
                        
                        
                        <div class="col-12 col-sm-6">
                           <input type="text" class="form-control bg-light border-0" placeholder="Height in Ft." style="height: 55px;" name="height" required>
                        </div>
                        
                        <div class="col-12 col-sm-6">
                           <input type="text" class="form-control bg-light border-0" placeholder="Weight in Kg" style="height: 55px;" name="weight" required>
                        </div>
                        
                        <div class="col-12 col-sm-6">
                           <input type="text" class="form-control bg-light border-0" placeholder="Waist Circumference in inches" style="height: 55px;" name="waist" required>
                        </div>
                        
                        <div class="col-12 col-sm-6">
                           <input type="text" class="form-control bg-light border-0" placeholder="Starting Weight Goal (e.g., lose 5 kg)" style="height: 55px;" name="weight_goal" required>
                        </div>
                        
                        <h5 class="text-dark" style="text-align: left;">Medical History & Concerns</h5>
                        <div class="col-12 col-sm-12">
                            <div class="row">
                                <h6 class="text-dark" style="text-align: left;padding-bottom:10px;">Do you currently have or have been diagnosed with any of the following? (Tick all that apply)</h6>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="obesity" name="obesity" value="obesity">
                                    <label for="obesity">Obesity </label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="obesity" name="cholesterol" value="cholesterol">
                                    <label for="cholesterol">High Cholesterol </label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="obesity" name="pcos/pcod" value="pcos/pcod">
                                    <label for="pcos/pcod">PCOD/PCOS</label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="obesity" name="diabetes" value="diabetes">
                                    <label for="diabetes">Diabetes (Type 1 or 2)</label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="obesity" name="thyroid" value="thyroid">
                                    <label for="thyroid">Thyroid Issues</label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="hypertension" name="hypertension" value="hypertension">
                                    <label for="hypertension">Hypertension</label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="heartdisease" name="heartdisease" value="heart-disease">
                                    <label for="heartdisease">Heart Disease</label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="digestive" name="digestive" value="digestive">
                                    <label for="digestive"> Digestive Issues (e.g., IBS) </label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="other" name="other" value="other">
                                    <label for="other">Other </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-sm-12">
                            <div class="row">
                                <h6 class="text-dark" style="text-align: left;padding-bottom:10px;">Current Signs and Symptoms (Tick all that apply)</h6>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="lowenergy" name="lowenergy" value="lowenergy">
                                    <label for="lowenergy">Low Energy Levels</label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="Bloating/Digestiv" name="Bloating/Digestiv" value="Bloating/Digestive Discomfort">
                                    <label for="Bloating/Digestiv">Bloating/Digestive Discomfort </label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="periods" name="periods" value="Irregular Periods">
                                    <label for="periods">Irregular Periods</label>
                                </div>
                                
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="fatigue" name="fatigue" value="Fatigue or Stress">
                                    <label for="fatigue">Fatigue or Stress</label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="sugar" name="sugar" value="Sugar or Carb Cravings">
                                    <label for="sugar"> Sugar or Carb Cravings </label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="other" name="other" value="other">
                                    <label for="other">Other </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-sm-12">
                            <div class="row">
                                <h6 class="text-dark" style="text-align: left;padding-bottom:10px;">Your Wellness Goals</h6>
                                <div class="col-12 col-sm-12">
                                    <select class="form-select bg-light border-0" style="height: 55px;" name="programname" required>
                                        <option value="">What is your primary goal for this program?</option>
                                        <option value="Weight Loss">Weight Loss</option>
                                        <option value="Improved Flexibility & Strength">Improved Flexibility & Strength</option>
                                        <option value="Better Digestion">Better Digestion</option>
                                        <option value="Hormonal Balance">Hormonal Balance</option>
                                        <option value="Increased Energy Levels">Increased Energy Levels</option>
                                        <option value="Stress Management">Stress Management</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-sm-12">
                            <div class="row">
                                <h6 class="text-dark" style="text-align: left;padding-bottom:10px;">What do you hope to gain from this program? (Tick all that apply)</h6>
                                
                                <div class="col-md-6 col-sm-12 col-lg-6" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="understanding" name="understanding" value="A better understanding of my body’s needs.">
                                    <label for="understanding">A better understanding of my body’s needs.</label>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 col-lg-6" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="consistent" name="consistent" value="Building a consistent yoga practice.">
                                    <label for="consistent">Building a consistent yoga practice.</label>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 col-lg-6" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="guidance" name="guidance" value="Guidance on sustainable eating habits.">
                                    <label for="guidance">Guidance on sustainable eating habits.</label>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 col-lg-6" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="feeling" name="feeling" value="Feeling lighter, healthier, and more active">
                                    <label for="feeling">Feeling lighter, healthier, and more active.</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-sm-12">
                            <div class="row">
                                <h6 class="text-dark" style="text-align: left;padding-bottom:10px;">8 Weeks Workshop Preferences <sup>(Monday to Friday)</sup></h6>
                                <div class="col-12 col-sm-12">
                                    <select class="form-select bg-light border-0" style="height: 55px;" name="programname" required>
                                        <option value="">Timings</option>
                                        <option value="Morning Slot: 9:00 AM - 10:00 AM">Morning Slot: 9:00 AM - 10:00 AM</option>
                                        <option value="Evening Slot: 6:00 PM - 7:00 PM">Evening Slot: 6:00 PM - 7:00 PM</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        
                        <h5 class="text-dark" style="text-align: left;">Medical History & Concerns</h5>
                        <div class="col-12 col-sm-12">
                            <div class="row">
                                <h6 class="text-dark" style="text-align: left;padding-bottom:10px;">Do you follow any specific diet or have restrictions? (Tick all that apply):</h6>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="vegetarian" name="vegetarian" value="Vegetarian">
                                    <label for="vegetarian">Vegetarian </label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="eggetarian" name="eggetarian" value="Eggetarian">
                                    <label for="eggetarian">Eggetarian </label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="vegan" name="vegan" value="Vegan">
                                    <label for="vegan">Vegan </label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="gluten" name="gluten" value="Gluten-Free">
                                    <label for="gluten">Gluten-Free </label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="lactose" name="lactose" value="Lactose-Free">
                                    <label for="lactose">Lactose-Free</label>
                                </div>
                                
                                <div class="col-md-4 col-sm-6 col-lg-4" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="other" name="other" value="Other">
                                    <label for="other">Other </label>
                                </div>
                            </div>
                        </div>
                        
                        <h5 class="text-dark" style="text-align: left;">Do you have any food allergies or intolerances?</h5>
                        <div class="col-12 col-sm-12">
                           <input type="text" class="form-control bg-light border-0" placeholder="eg. peanuts, tree nuts, eggs" style="height: 55px;" name="name" required>
                        </div>
                        
                        <h5 class="text-dark" style="text-align: left;">Why This Program?</h5>
                        <div class="col-12 col-sm-12">
                            <div class="row">
                                <h6 class="text-dark" style="text-align: left;padding-bottom:10px;">What made you decide to join this program? (Tick one or more)</h6>
                                
                                <div class="col-md-6 col-sm-12 col-lg-6" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="journey" name="journey" value="I want to finally start my health journey.">
                                    <label for="journey">I want to finally start my health journey.</label>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 col-lg-6" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="guidance" name="guidance" value="I’ve tried other approaches but want expert guidance.">
                                    <label for="guidance">I’ve tried other approaches but want expert guidance.</label>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 col-lg-6" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="results" name="results" value="I like the idea of combining yoga and nutrition for better results.">
                                    <label for="results">I like the idea of combining yoga and nutrition for better results.</label>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 col-lg-6" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="lifestyle" name="lifestyle" value="I want a holistic program that fits into my lifestyle.">
                                    <label for="lifestyle">I want a holistic program that fits into my lifestyle..</label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-12 col-sm-12">
                            <div class="row">
                                <h6 class="text-dark" style="text-align: left;padding-bottom:10px;">What does health and fitness mean to you? (Choose one or elaborate):</h6>
                                
                                <div class="col-md-6 col-sm-12 col-lg-6" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="confident" name="confident" value="Feeling confident in my body">
                                    <label for="confident">Feeling confident in my body.</label>
                                </div>
                                
                                <div class="col-md-6 col-sm-12 col-lg-6" style="text-align:left; padding:5px;">
                                    <input type="checkbox" id="mentally" name="mentally" value="Being physically and mentally strong.">
                                    <label for="mentally">Being physically and mentally strong..</label>
                                </div>
                                
                                <div class="col-md-12 col-sm-12 col-lg-12" style="text-align:left; padding:5px; margin-bottom: 20px;">
                                    <input type="checkbox" id="sacrificing" name="sacrificing" value="Eating right without sacrificing joy.">
                                    <label for="sacrificing">Eating right without sacrificing joy..</label>
                                </div>
                                <div class="col-12 col-sm-12">
                                   <input type="text" class="form-control bg-light border-0" placeholder="Please elaborate" style="height: 55px;" name="name" required>
                                </div>
                                
                            </div>
                        </div>
                        
                        <!--<div class="col-12 col-sm-12">-->
                        <!--   <input type="text" class="form-control bg-light border-0" placeholder="Are you suffering from any medical conditions, injuries, or ailments?" style="height: 55px;" name="mobilenumber" required>-->
                        <!--</div>-->
                        <!--<div class="col-12 col-sm-12">-->
                        <!--   <input type="text" class="form-control bg-light border-0" placeholder="Do you follow a diet plan or any specific lifestyle modifications currently?" style="height: 55px;" name="mobilenumber" required>-->
                        <!--</div>-->
                        <!--<div class="col-12 col-sm-12">-->
                        <!--   <input type="text" class="form-control bg-light border-0" placeholder="Would you prefer to register only for a yoga class or a yoga class with a personalised diet chart." style="height: 55px;" name="mobilenumber" required>-->
                        <!--</div>-->
                        <!--<div class="col-12 col-sm-6">-->
                        <!--   <input type="text" class="form-control bg-light border-0" placeholder="Any other specific requests or preferences?" style="height: 55px;" name="mobilenumber" required>-->
                        <!--</div>-->
                        <!--<div class="col-12 col-sm-6">-->
                        <!--    <select class="form-select bg-light border-0" style="height: 55px;" name="programname" required>-->
                        <!--        <option value="">Preferred Time Slot</option>-->
                        <!--        <option value="Morning">Morning</option>-->
                        <!--        <option value="Evening">Evening</option>-->
                        <!--    </select>-->
                        <!--</div>-->
                        
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