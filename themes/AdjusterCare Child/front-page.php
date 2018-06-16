<?php
/**
 * Front Page - Adjuster Care
 *
 * @package understrap
 */

get_header();

$container  = get_theme_mod( 'understrap_container_type' );
?>

<div class="header-image">
  		<div class="header-container container">
    		<div class="header-row">
      		<div class="header-content">
    			 <h1 class="header-title">The Headline for the Site</h1>
    			 <h2 class="header-subheading">Subheading about Being a Member</h2>
      		</div>
    		</div>
  		</div>
		</div>

<div class="wrapper" id="index-wrapper">

<div class="valueProps-container">
 <div class="valueProps-row">
  <div class="valueProps-wrapper">
   <div class="valueProps-itemRow">
    <div class="valueProps-item">
     <i class="valueProps-itemIcon far fa-money"></i>
     <p class="valueProps-itemText">AdjusterCare is a comprehensive Patient Physician Cooperative (PPC) healthcare system that provides easy access to affordable healthcare through a low monthly payment plan with $0 copay.</p>
    </div>
    <div class="valueProps-item">
     <i class="valueProps-itemIcon far fa-user-circle"></i>
     <p class="valueProps-itemText">AdjusterCare PPC is a healthcare system focusing on wellness and comprehensive healthcare services for individuals.</p>
    </div>
    <div class="valueProps-item">
     <i class="valueProps-itemIcon fas fa-medkit"></i>
     <p class="valueProps-itemText">AdjusterCare offers plans that include a discount prescription card, labs, medical imaging, dental care, vision, and several benefits that add even more value.</p>
    </div>
    <div class="valueProps-item">
     <i class="valueProps-itemIcon fa fa-hospital-o"></i>
     <p class="valueProps-itemText">Your plan gives you access to a professional Patient Advocate to help establish your healthcare plan and pre-negotiate the cost of any required procedures or hospital stays — so you can focus on wellness.</p>
    </div>
    <div class="valueProps-item">
     <i class="valueProps-itemIcon fas fa-phone"></i>
     <p class="valueProps-itemText">Your plan gives you access to Teladoc; a national network of board-certified physicians for non-emergency treatment 24/7 when your physician is not available, and even roadside assistance!</p>
    </div>
    <div class="valueProps-item">
     <i class="valueProps-itemIcon fas fa-user-md"></i>
     <p class="valueProps-itemText">Your membership offers the services of your selected personal physician from our member group for primary care visits, preventive care, and management of chronic medical conditions.</p>
    </div>
   </div>
  </div>
 </div>
</div>

<div class="formGraphic-container">
 <div class="formGraphic-row row-eq-height">
  <div class="formGraphic-textArea">
   <h3 class="formGraphic-title">Get Started Now - Fill Out a Quick Form</h3>
   <p class="formGraphic-text">No waiting, no red tape, $0 copay for primary care, no pre-existing conditions, and low out-of-pocket expenses. No other healthcare system comes close to this value.</p>
   <a href="https://portal.patientphysiciancoop.com/adjustercare2" target="_blank"><button class="signup-cta">Get Started</button></a>
  </div>
  <div class="formGraphic-imageWrapper">
    <img class="formGraphic-imageArea" src="<?php echo get_stylesheet_directory_uri(); ?>/imgs/browser.jpg"/>
  </div>
 </div>
</div>


<div class="signup-wrapper">
  <div class="signup-container container">
   <div class="signup-row row">
    <div class="signup-titleArea">
     <h3 class="signup-title">Sign Up Today!</h3>
     <p class="signup-text">No waiting, no red tape, $0 copay for primary care, no pre-existing conditions, and low out-of-pocket expenses. No other healthcare system comes close to this value.</p>
     <a href="https://portal.patientphysiciancoop.com/adjustercare2" target="_blank"><button class="secondary-cta">Get Started</button></a>
    </div>
    <div class="signup-ctaArea">
     
    </div>
   </div>
  </div>
</div>

<?php get_footer(); ?>