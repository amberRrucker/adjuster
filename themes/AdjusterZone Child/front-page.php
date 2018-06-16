<?php
/**
 * Front Page - Adjuster Zone
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
?>

<div class="header-image">
	<div class="header-container container">
		<div class="header-row">
  		<div class="header-content">
			 <h1 class="header-title">An Association of Insurance Adjusters</h1>
			 <h2 class="header-subheading">Providing insurance adjusters access to resources, training, health care, education and exclusive benefits.</h2>
  		</div>
		</div>
	</div>
</div>

<div class="wrapper" id="index-wrapper">

<div class="valueProps-container">
  <div class="valueProps-row">
    <div class="valueProps-textArea">
      <h3 class="valueProps-title">Our Mission</h3>
      <p class="valueProps-text">Providing benefits, career development, professional networking, and resources to independent adjusters across the United States.</p>
      <a href="http://adjusters.test/zone/shop/"><button class="signup-cta">Get Started</button></a>
    </div>
    <div class="valueProps-itemWrapper">
      <div class="valueProps-itemRow">
          <div class="valueProps-item">
            <i class="valueProps-itemIcon fas fa-medkit"></i>
            <p class="valueProps-itemText">Access to AdjusterCare, An exclusive ACA approved health care plan specifically for adjusters</p>
          </div>

          <div class="valueProps-item">
            <i class="valueProps-itemIcon fas fa-wrench"></i>
            <p class="valueProps-itemText">Premiere content to connect you with the best adjuster resources</p>
          </div>

          <div class="valueProps-item">
            <i class="valueProps-itemIcon far fa-money"></i>
            <p class="valueProps-itemText">Exclusive industry discounts on adjuster related tools, services and products</p>
          </div>

          <div class="valueProps-item">
            <i class="valueProps-itemIcon fas fa-university"></i>
            <p class="valueProps-itemText">Many professional education videos and training modules</p>
          </div>

          <div class="valueProps-item">
            <i class="valueProps-itemIcon fas fa-briefcase"></i>
            <p class="valueProps-itemText">Real world career training in scoping, estimating, and more</p>
          </div>

          <div class="valueProps-item">
            <i class="valueProps-itemIcon fas fa-users"></i>
            <p class="valueProps-itemText">Premium discounts to the AdjusterCon Annual Adjuster Conference</p>
          </div>

      </div>
    </div>
  </div>
</div>

<div class="pricing-container">
  <div class="pricing-row">
    <div class="pricing-tableArea">
      <div class="pricing-tableAreaRow">
        <div class="pricing-tableIndividualArea">
          <div class="pricing-tableTitleArea">
            <h4 class="pricing-tableTitle">Free</h4>
            <p class="pricing-tableSubheading">Standard Membership</p>
          </div>
          <div class="pricing-tableFeaturesArea">
            <ul class="pricing-tableFeatureList">
              <li class="pricing-tableFeature">Newsletter</li>
              <li class="pricing-tableFeature">Basic Training and Education</li>
            </ul>
            <a href="http://adjusters.test/zone/product/free/"><button class="pricing-cta">Get Started</button></a>
          </div>
        </div>
        <div class="pricing-tableIndividualArea featured">
          <div class="pricing-tableTitleArea">
            <h4 class="pricing-tableTitle">$350</h4>
            <p class="pricing-tableSubheading">Platinum Membership</p>
          </div>
          <div class="pricing-tableFeaturesArea">
            <ul class="pricing-tableFeatureList">
              <li class="pricing-tableFeature">Access to Healthcare Benefits</li>
              <li class="pricing-tableFeature">Premium Vendor Discounts</li>
              <li class="pricing-tableFeature">Online Training Modules</li>
              <li class="pricing-tableFeature">Educational Videos</li>
            </ul>
            <a href="http://adjusters.test/zone/product/gold-membership/"><button class="pricing-cta">Get Started</button></a>
          </div>
        </div>
      </div>
    </div>
    <div class="pricing-textArea">
      <h3 class="pricing-title">Why Choose Adjuster Zone</h3>
      <p class="pricing-text"> Our goal is to bring independent insurance adjusters together for the purpose of providing benefits, education, professional networking and resources.</p>
      <ul class="pricing-list">
        <li class="pricing-listItem">Industry Discounts</li>
        <li class="pricing-listItem">Professional Development</li>
      </ul>
    </div>
  </div>
</div>

<div class="sponsor-container container">
  <div class="sponsor-titleRow row">
    <h2 class="sponsor-title">Platinum Sponsors</h2>
  </div>
 <div class="sponsor-row row">
  <div class="sponsor-imageWrapper">
    <img class="sponsor-image" src="<?php echo get_stylesheet_directory_uri(); ?>/img/sponsorLogos.jpg"/>
  </div>
 </div>
</div>

<div class="global-container">
 <div class="global-row row-eq-height">
  <div class="global-textArea">
   <h3 class="global-title">Global Support System</h3>
   <p class="global-text">No waiting, no red tape, $0 copay for primary care, no pre-existing conditions, and low out-of-pocket expenses. No other healthcare system comes close to this value.</p>
   <button class="signup-cta">Get Started</button>
  </div>
  <div class="global-imageWrapper">
    <img class="global-imageArea" src="<?php echo get_stylesheet_directory_uri(); ?>/img/global.png"/>
  </div>
 </div>
</div>

<div class="signup-wrapper">
  <div class="signup-container container">
   <div class="signup-row row">  
     <div class="signup-titleArea">
       <h4 class="signup-title">Sign Up Today!</h4>
       <p class="signup-text"> Our goal is to bring independent insurance adjusters together for the purpose of providing benefits, education, professional networking and resources.</p>
       <a href="http://adjusters.test/zone/shop/"><button class="secondary-cta">Get Started</button></a>
      </div>
     </div>
    </div>
  </div>

<?php get_footer(); ?>