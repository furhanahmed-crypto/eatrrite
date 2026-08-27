<?php require_once __DIR__ . '/appointment-form/bootstrap.php'; ?>
<!DOCTYPE html>
<html lang="en">
   <?php
      include "header.php";
      ?>
   <style type="text/css">
      /* Chrome, Safari, Edge, Opera */
      input::-webkit-outer-spin-button,
      input::-webkit-inner-spin-button {
      -webkit-appearance: none;
      margin: 0;
      }
      /* Firefox */
      input[type=number] {
      -moz-appearance: textfield;
      }
   </style>
   <!-- Carousel Start -->
   <div class="container-fluid p-0">
      <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
         <div class="carousel-inner">
            <div class="carousel-item active">
               <img class="w-100" src="img/carousel-1.jpg" alt="Image">
               <!-- <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                  <div class="p-3" style="max-width: 900px;">
                      <h5 class="text-white text-uppercase mb-3 animated slideInDown">Keep You Healthy</h5>
                      <h1 class="display-1 text-white mb-md-4 animated zoomIn">Eat Rrite is a nutrition and fitness platform.</h1>
                      <a href="appointment.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Appointment</a>
                      <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                  </div>
                  </div> -->
            </div>
            <div class="carousel-item">
               <img class="w-100" src="img/carousel-2.jpg" alt="Image">
               <!-- <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                  <div class="p-3" style="max-width: 900px;">
                      <h5 class="text-white text-uppercase mb-3 animated slideInDown">Nourish And Build</h5>
                      <h1 class="display-1 text-white mb-md-4 animated zoomIn">Eat Rrite is dedicated to the healthy healing of lives.</h1>
                      <a href="appointment.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Appointment</a>
                      <a href="" class="btn btn-secondary py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                  </div>
                  </div> -->
            </div>
         </div>
         <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
            data-bs-slide="prev">
         <span class="carousel-control-prev-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Previous</span>
         </button>
         <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
            data-bs-slide="next">
         <span class="carousel-control-next-icon" aria-hidden="true"></span>
         <span class="visually-hidden">Next</span>
         </button>
      </div>
   </div>
   <!-- Carousel End -->
   <!-- Banner Start -->
   <div class="container-fluid banner mb-5">
      <div class="container">
         <div class="row gx-0">
            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
               <div class="bg-primary d-flex flex-column p-5" style="height: 300px;background-color: #e5fad1 !important;">
                  <h3 class="text-black mb-3">Opening Hours</h3>
                  <div class="d-flex justify-content-between text-white mb-3">
                     <h6 class="text-black mb-0">Mon - Fri</h6>
                     <p class="text-black mb-0" style="color:#000"> 10:00am - 7:00pm</p>
                  </div>
                  <div class="d-flex justify-content-between text-black mb-3">
                     <h6 class="text-black mb-0">Saturday</h6>
                     <p class="text-black mb-0" style="color:#000"> 10:00am - 7:00pm</p>
                  </div>
                  <div class="d-flex justify-content-between text-black mb-3">
                     <h6 class="text-black mb-0">Sunday</h6>
                     <p class="text-black mb-0" style="color:#000"> 10:00am - 7:00pm</p>
                  </div>
                  <a class="btn btn-dark" href="">Appointment</a>
               </div>
            </div>
            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
               <div class="bg-dark d-flex flex-column p-5" style="height: 300px;background-color: #bbb29a !important;">
                  <h3 class="text-black mb-3">Call Back Request</h3>
                  <form action="email/callback.php" method="post">
                     <div class="mb-3" id="date" data-target-input="nearest">
                        <input name="mobile" placeholder="Phone Number" type="number"  class="form-control bg-light border-0 datetimepicker-input" required>
                     </div>
                     <select name="program" class="form-select bg-light border-0 mb-3" style="height: 40px;" required>
                        <option value="" >Select A Service</option>
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
                     <button class="btn btn-dark w-100 py-3">Request For Call Back</button>
                  </form>
               </div>
            </div>
            <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
               <div class="bg-secondary d-flex flex-column p-5" style="height: 300px;background-color: #e5fad1 !important;">
                  <h3 class="text-black mb-3">Make Appointment</h3>
                  <p class="text-black">Don't miss out on this opportunity to receive personalized care and expert guidance.<br>Schedule your appointment today</p>
                  <h2 class="text-black mb-0">+91 96398 77483</h2>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Banner Start -->
   <!-- About Start -->
   <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container">
         <div class="row g-5">
            <div class="col-lg-7">
               <div class="section-title mb-4">
                  <h5 class="position-relative d-inline-block text-uppercase">About Us</h5>
                  <h1 class="display-5 mb-0">Eat Rrite is a Nutrition and Holistic Wellness platform</h1>
               </div>
               <h4 class="text-body fst-italic mb-4">It is time to strike a balance between comfort, celebration, food and fitness to make healthy living an effortless routine.</h4>
               <p class="mb-4">Our core values are based on the  principles of traditions, minimalism and sustainability in terms of nutrition and fitness. We align your lifestyle to our scientific approach of nutrition and then craft the most unique program which can help you achieve any goal, be it fitness or wellness.</p>
               <div class="row g-3">
                  <div class="col-sm-6 wow zoomIn" data-wow-delay="0.3s">
                     <h5 class="mb-3"><i class="fa fa-check-circle dark-txti me-3"></i>Award Winning</h5>
                     <h5 class="mb-3"><i class="fa fa-check-circle dark-txti me-3"></i>Professional Staff</h5>
                  </div>
                  <div class="col-sm-6 wow zoomIn" data-wow-delay="0.6s">
                     <h5 class="mb-3"><i class="fa fa-check-circle dark-txti me-3"></i>24/7 Opened</h5>
                     <h5 class="mb-3"><i class="fa fa-check-circle dark-txti me-3"></i>Fair Prices</h5>
                  </div>
               </div>
               <a href="appointment.html" class="btn btn-dark py-3 px-5 mt-4 wow zoomIn" data-wow-delay="0.6s">Make Appointment</a>
            </div>
            <div class="col-lg-5" style="min-height: 500px;">
               <div class="position-relative h-100">
                  <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="img/pic.jpeg" style="object-fit: cover;">
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- About End -->
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
                  <?php include __DIR__ . '/appointment-form/form.php'; ?>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Appointment End -->
   <!-- Service Start -->
   <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container">
         <div class="row g-5 mb-5">
            <!--<div class="col-lg-5 wow zoomIn" data-wow-delay="0.3s" style="min-height: 400px;">-->
            <!--   <div class="position-relative h-100">-->
            <!--      <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="img/home.jpg" style="object-fit: cover;">-->
            <!--   </div>-->
            <!--</div>-->
            <div class="col-lg-12">
               <div class="section-title mb-5">
                  <h5 class="position-relative d-inline-block text-uppercase">Our Services</h5>
                  <h1 class="display-5 mb-0">Eat Rrite is dedicated to the healthy healing of lives.</h1>
               </div>
               <div class="row g-5">
                  <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.6s">
                     <div class="rounded-top overflow-hidden">
                        <img class="img-fluid" src="img/services/detail/complete-lifestyle-and-weight-management-nutrition-program.jpg" alt="">
                     </div>
                     <div class="position-relative geen-txt rounded-bottom text-center p-4">
                        <h5 class="m-0">Weight & Lifestyle Management Program</h5>
                     </div>
                  </div>
                  <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.6s">
                     <div class="rounded-top overflow-hidden">
                        <img class="img-fluid" src="img/services/detail/diabetes-management-and-reversal-diet-plan.jpg" alt="">
                     </div>
                     <div class="position-relative geen-txt rounded-bottom text-center p-4">
                        <h5 class="m-0">Diabetes Management And Reversal Diet Plan</h5>
                     </div>
                  </div>
                  <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.6s">
                     <div class="rounded-top overflow-hidden">
                        <img class="img-fluid" src="img/services/detail/gut-health.jpg" alt="">
                     </div>
                     <div class="position-relative geen-txt rounded-bottom text-center p-4">
                        <h5 class="m-0">Gut Health Diet Program</h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="row g-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-lg-12">
               <div class="row g-12">
                  <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.3s">
                     <div class="rounded-top overflow-hidden">
                        <img class="img-fluid" src="img/services/detail/female-hormone-health-diet-program.jpg" alt="">
                     </div>
                     <div class="position-relative geen-txt rounded-bottom text-center p-4">
                        <h5 class="m-0">Female Hormone Health Diet Program</h5>
                     </div>
                  </div>
                  <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.6s">
                     <div class="rounded-top overflow-hidden">
                        <img class="img-fluid" src="img/services/detail/celiac-and-crohn-disease.jpg" alt="">
                     </div>
                     <div class="position-relative geen-txt rounded-bottom text-center p-4">
                        <h5 class="m-0">Celiac And Crohn's Disease</h5>
                     </div>
                  </div>
                  <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.3s">
                     <div class="rounded-top overflow-hidden">
                        <img class="img-fluid" src="img/services/detail/oncology-disease-management-nutrition-program.jpg" alt="">
                     </div>
                     <div class="position-relative geen-txt rounded-bottom text-center p-4">
                        <h5 class="m-0">Oncology(Cancer) Disease Management Nutrition Program</h5>
                     </div>
                  </div>
               </div>
            </div>
            <!-- <div class="col-lg-5 service-item wow zoomIn" data-wow-delay="0.9s">
               <div class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-4">
                   <h3 class="text-white mb-3">Make Appointment</h3>
                   <p class="text-white mb-3">Clita ipsum magna kasd rebum at ipsum amet dolor justo dolor est magna stet eirmod</p>
                   <h2 class="text-white mb-0">+012 345 6789</h2>
               </div>
               </div> -->
         </div>
         <div class="row g-5 wow fadeInUp" data-wow-delay="0.1s">
            <div class="col-lg-12">
               <div class="row g-12">
                  <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.3s">
                     <div class="rounded-top overflow-hidden">
                        <img class="img-fluid" src="img/services/detail/enduro-sports-nutrition-program.png" alt="">
                     </div>
                     <div class="position-relative geen-txt rounded-bottom text-center p-4">
                        <h5 class="m-0">Enduro Sports Nutrition Program: Fueling Your Endurance Journey</h5>
                     </div>
                  </div>
                  <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.6s">
                     <div class="rounded-top overflow-hidden">
                        <img class="img-fluid" src="img/services/detail/mom-to-be.png" alt="">
                     </div>
                     <div class="position-relative geen-txt rounded-bottom text-center p-4">
                        <h5 class="m-0">NutriCare for Mom-to-Be: A Nourishing Journey to Motherhood</h5>
                     </div>
                  </div>
                  <div class="col-md-4 service-item wow zoomIn" data-wow-delay="0.3s">
                     <div class="rounded-top overflow-hidden">
                        <img class="img-fluid" src="img/services/detail/post-natal-nutri-care-and-weight-loss-program.png" alt="">
                     </div>
                     <div class="position-relative geen-txt rounded-bottom text-center p-4">
                        <h5 class="m-0">Post Natal NutriCare and Weight Loss Program: Nurturing Your Well-being After Birth</h5>
                     </div>
                  </div>
               </div>
            </div>
            <!-- <div class="col-lg-5 service-item wow zoomIn" data-wow-delay="0.9s">
               <div class="position-relative bg-primary rounded h-100 d-flex flex-column align-items-center justify-content-center text-center p-4">
                   <h3 class="text-white mb-3">Make Appointment</h3>
                   <p class="text-white mb-3">Clita ipsum magna kasd rebum at ipsum amet dolor justo dolor est magna stet eirmod</p>
                   <h2 class="text-white mb-0">+012 345 6789</h2>
               </div>
               </div> -->
         </div>
      </div>
   </div>
   <!-- Service End -->
   <!-- Offer Start -->
   <!-- <div class="container-fluid bg-offer my-5 py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container py-5">
          <div class="row justify-content-center">
              <div class="col-lg-7 wow zoomIn" data-wow-delay="0.6s">
                  <div class="offer-text text-center rounded p-5">
                      <h1 class="display-5 text-white">Save 30% On Your First Checkup</h1>
                      <p class="text-white mb-4">Eirmod sed tempor lorem ut dolores sit kasd ipsum. Dolor ea et dolore et at sea ea at dolor justo ipsum duo rebum sea. Eos vero eos vero ea et dolore eirmod diam duo lorem magna sit dolore sed et.</p>
                      <a href="appointment.html" class="btn btn-dark py-3 px-5 me-3">Appointment</a>
                      <a href="" class="btn btn-light py-3 px-5">Read More</a>
                  </div>
              </div>
          </div>
      </div>
      </div> -->
   <!-- Offer End -->
   <!-- Pricing Start -->
   <!-- <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
      <div class="container">
          <div class="row g-5">
              <div class="col-lg-5">
                  <div class="section-title mb-4">
                      <h5 class="position-relative d-inline-block text-primary text-uppercase">Pricing Plan</h5>
                      <h1 class="display-5 mb-0">We Offer Fair Prices for Dental Treatment</h1>
                  </div>
                  <p class="mb-4">Tempor erat elitr rebum at clita. Diam dolor diam ipsum et tempor sit. Aliqu diam amet diam et eos labore. Clita erat ipsum et lorem et sit, sed stet no labore lorem sit. Sanctus clita duo justo eirmod magna dolore erat amet</p>
                  <h5 class="text-uppercase text-primary wow fadeInUp" data-wow-delay="0.3s">Call for Appointment</h5>
                  <h1 class="wow fadeInUp" data-wow-delay="0.6s">+012 345 6789</h1>
              </div>
              <div class="col-lg-7">
                  <div class="owl-carousel price-carousel wow zoomIn" data-wow-delay="0.9s">
                      <div class="price-item pb-4">
                          <div class="position-relative">
                              <img class="img-fluid rounded-top" src="img/price-1.jpg" alt="">
                              <div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle" style="z-index: 2;">
                                  <h2 class="text-primary m-0">$35</h2>
                              </div>
                          </div>
                          <div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
                              <h4>Teeth Whitening</h4>
                              <hr class="text-primary w-50 mx-auto mt-0">
                              <div class="d-flex justify-content-between mb-3"><span>Modern Equipment</span><i class="fa fa-check text-primary pt-1"></i></div>
                              <div class="d-flex justify-content-between mb-3"><span>Professional Dentist</span><i class="fa fa-check text-primary pt-1"></i></div>
                              <div class="d-flex justify-content-between mb-2"><span>24/7 Call Support</span><i class="fa fa-check text-primary pt-1"></i></div>
                              <a href="appointment.html" class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Appointment</a>
                          </div>
                      </div>
                      <div class="price-item pb-4">
                          <div class="position-relative">
                              <img class="img-fluid rounded-top" src="img/price-2.jpg" alt="">
                              <div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle" style="z-index: 2;">
                                  <h2 class="text-primary m-0">$49</h2>
                              </div>
                          </div>
                          <div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
                              <h4>Dental Implant</h4>
                              <hr class="text-primary w-50 mx-auto mt-0">
                              <div class="d-flex justify-content-between mb-3"><span>Modern Equipment</span><i class="fa fa-check text-primary pt-1"></i></div>
                              <div class="d-flex justify-content-between mb-3"><span>Professional Dentist</span><i class="fa fa-check text-primary pt-1"></i></div>
                              <div class="d-flex justify-content-between mb-2"><span>24/7 Call Support</span><i class="fa fa-check text-primary pt-1"></i></div>
                              <a href="appointment.html" class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Appointment</a>
                          </div>
                      </div>
                      <div class="price-item pb-4">
                          <div class="position-relative">
                              <img class="img-fluid rounded-top" src="img/price-3.jpg" alt="">
                              <div class="d-flex align-items-center justify-content-center bg-light rounded pt-2 px-3 position-absolute top-100 start-50 translate-middle" style="z-index: 2;">
                                  <h2 class="text-primary m-0">$99</h2>
                              </div>
                          </div>
                          <div class="position-relative text-center bg-light border-bottom border-primary py-5 p-4">
                              <h4>Root Canal</h4>
                              <hr class="text-primary w-50 mx-auto mt-0">
                              <div class="d-flex justify-content-between mb-3"><span>Modern Equipment</span><i class="fa fa-check text-primary pt-1"></i></div>
                              <div class="d-flex justify-content-between mb-3"><span>Professional Dentist</span><i class="fa fa-check text-primary pt-1"></i></div>
                              <div class="d-flex justify-content-between mb-2"><span>24/7 Call Support</span><i class="fa fa-check text-primary pt-1"></i></div>
                              <a href="appointment.html" class="btn btn-primary py-2 px-4 position-absolute top-100 start-50 translate-middle">Appointment</a>
                          </div>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div> -->
   <!-- Pricing End -->
   <!-- Testimonial Start removed this bg-testimonial-->
   <div class="container-fluid bg-primary  py-5 my-5 wow fadeInUp bg-appointment" data-wow-delay="0.1s">
      <div class="container py-5">
         <div class="row justify-content-center">
            <div class="col-lg-7">
               <div class="owl-carousel testimonial-carousel rounded p-5 wow zoomIn" data-wow-delay="0.6s">
                  <div class="testimonial-item text-center text-black">
                     <img class="img-fluid mx-auto rounded mb-4" src="img/testimonial/royal.png" alt="">
                     <p class="fs-5">Eat Rrite is the Best Nutrition and wellness experience that one can come across in their pursuance of Good Health and weight loss. I have never come across any Nutritionist or a Dietitian with such an highly constructive, wholistic approach to nutrition and such in depth knowledge of her subject... <a href="https://www.instagram.com/p/Cv4yjB4MggG" target="_blank" style="color: #F57E57 !important;">Read More</a></p>
                     <hr class="mx-auto w-25">
                     <h4 class="text-black mb-0">Royal Ryder </h4>
                  </div>
                  <div class="testimonial-item text-center text-black">
                     <img class="img-fluid mx-auto rounded mb-4" src="img/testimonial/snehi.jpg" alt="">
                     <p class="fs-5">Mukta is my GO-TO person for any kind of diet advice. She's been extremely helpful, not just in general upkeep of my health through Yoga & diet, but also during chronic gastric ailments for my family members. She has a thorough process where she goes through all necessary medical reports and creates a truly personalised plan... <a href="https://www.instagram.com/p/CvyyVLdpoUa" target="_blank" style="color: #F57E57 !important;">Read More</a></p>
                     <hr class="mx-auto w-25">
                     <h4 class="text-black mb-0">Snehi Singh</h4>
                  </div>
                  <div class="testimonial-item text-center text-black">
                     <img class="img-fluid mx-auto rounded mb-4" src="img/testimonial/aakarsh.jpg" alt="">
                     <p class="fs-5">I was super impressed by the nutrition advice provided by Mukta. I lost 12kgs weight in 4 months and the best part is that some of the best practices she shared with me during with me stayed on as habits. So I never really went back to gaining weight afterwards... <a href="https://www.instagram.com/p/Cv1ZKh5v6Pf" target="_blank" style="color: #F57E57 !important;">Read More</a></p>
                     <hr class="mx-auto w-25">
                     <h4 class="text-black mb-0">Kamal Aakarsh Vishnubhotla</h4>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
   <!-- Testimonial End -->
   <!-- Team Start -->
   <!-- <div class="container-fluid py-5">
      <div class="container">
          <div class="row g-5">
              <div class="col-lg-4 wow slideInUp" data-wow-delay="0.1s">
                  <div class="section-title bg-light rounded h-100 p-5">
                      <h5 class="position-relative d-inline-block text-primary text-uppercase">Our Dentist</h5>
                      <h1 class="display-6 mb-4">Meet Our Certified & Experienced Dentist</h1>
                      <a href="appointment.html" class="btn btn-primary py-3 px-5">Appointment</a>
                  </div>
              </div>
              <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                  <div class="team-item">
                      <div class="position-relative rounded-top" style="z-index: 1;">
                          <img class="img-fluid rounded-top w-100" src="img/team-1.jpg" alt="">
                          <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                          </div>
                      </div>
                      <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                          <h4 class="mb-2">Dr. John Doe</h4>
                          <p class="text-primary mb-0">Implant Surgeon</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                  <div class="team-item">
                      <div class="position-relative rounded-top" style="z-index: 1;">
                          <img class="img-fluid rounded-top w-100" src="img/team-2.jpg" alt="">
                          <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                          </div>
                      </div>
                      <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                          <h4 class="mb-2">Dr. John Doe</h4>
                          <p class="text-primary mb-0">Implant Surgeon</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 wow slideInUp" data-wow-delay="0.1s">
                  <div class="team-item">
                      <div class="position-relative rounded-top" style="z-index: 1;">
                          <img class="img-fluid rounded-top w-100" src="img/team-3.jpg" alt="">
                          <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                          </div>
                      </div>
                      <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                          <h4 class="mb-2">Dr. John Doe</h4>
                          <p class="text-primary mb-0">Implant Surgeon</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                  <div class="team-item">
                      <div class="position-relative rounded-top" style="z-index: 1;">
                          <img class="img-fluid rounded-top w-100" src="img/team-4.jpg" alt="">
                          <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                          </div>
                      </div>
                      <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                          <h4 class="mb-2">Dr. John Doe</h4>
                          <p class="text-primary mb-0">Implant Surgeon</p>
                      </div>
                  </div>
              </div>
              <div class="col-lg-4 wow slideInUp" data-wow-delay="0.6s">
                  <div class="team-item">
                      <div class="position-relative rounded-top" style="z-index: 1;">
                          <img class="img-fluid rounded-top w-100" src="img/team-5.jpg" alt="">
                          <div class="position-absolute top-100 start-50 translate-middle bg-light rounded p-2 d-flex">
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-twitter fw-normal"></i></a>
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-facebook-f fw-normal"></i></a>
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-linkedin-in fw-normal"></i></a>
                              <a class="btn btn-primary btn-square m-1" href="#"><i class="fab fa-instagram fw-normal"></i></a>
                          </div>
                      </div>
                      <div class="team-text position-relative bg-light text-center rounded-bottom p-4 pt-5">
                          <h4 class="mb-2">Dr. John Doe</h4>
                          <p class="text-primary mb-0">Implant Surgeon</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      </div> -->
   <!-- Team End -->
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
         <!-- for Call back request -->
         <?php
            if ( isset($_GET['callbacksuccess']) && $_GET['callbacksuccess'] == 1 )
                {
                   echo '<p '.'class =' .'successmsg'.'>We have received your request and will get back to you shortly</p>';
                }
            
            if ( isset($_GET['callbackfail']) && $_GET['callbackfail'] == 1 )
                {
                   echo '<p '.'class =' .'fail'.'> Message could not be sent</p>';
                }
            ?>
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