<!-- main activity section -->
<div id="main-activity-section" class="main-activity-section">

 <!-- background -->
 <div class="background-main">

 </div>

 <!-- main content wrapper -->
 <div class="main-content-wrapper">

 <!-- prompt -->
 <div class="catagory-prompt">

 </div>
 <h2 class="prompt">What would you like to do today?</h2>

   <div class="business-categories">
     <div class="link-column">
       <!-- pulls in business categories -->
       <?php echo do_shortcode('[businessdirectory-categories]'); ?>
     </div>
     <div class="link-column">
       <ul>
         <li class="decription-box"> <h4>Local Arts and Entertainment bussinesses within the Sosna region</h4> </li>
         <li class="decription-box"> <h4>Local Automotive, Contractors and Construction Materials bussinesses within the Sosna region</h4> </li>
         <li class="decription-box"> <h4>Local Hair and Nail bussinesses within the Sosna region</h4> </li>
         <li class="decription-box"> <h4>Local Medical, Health, Wellness and Fitness bussinesses within the Sosna region</h4> </li>
         <li class="decription-box"> <h4>Parks, School, Banks, Drycleaner/Laundromat, Houses of Worship, Senior Services, Professional Services, Legal, Kids, Pets, Parks & Recreation, Parking</h4> </li>
         <li class="decription-box"> <h4>Local Restaurants, Food & Drink, Grocery / Convenience Stores bussinesses within the Sosna region</h4> </li>
         <li class="decription-box"> <h4>Local stores and shopping bussinesses in the sosna region</h4> </li>
       </ul>
     </div>



  </div>



   </div>

   <?php if ( $listings ): ?>
       <?php echo $listings; ?>
   <?php endif; ?>


 </div>


</div>
