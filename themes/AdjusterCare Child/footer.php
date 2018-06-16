<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package understrap
 */

$the_theme = wp_get_theme();
$container = get_theme_mod( 'understrap_container_type' );
?>

<?php get_sidebar( 'footerfull' ); ?>

<div class="footer-wrapper">

	<div class="container" id="colophon">
  	
  	<div class="row">
      <div class="footer-logo">
  			<?php the_custom_logo(); ?>
  		</div>
  	</div>

		<div class="row">
  		
  		<div class="footer-menu">
      			<h6 class="footer-contactTitle">Contact Us</h6>
      			<p class="footer-contactInfo">800-573-5145</p>
            <p class="footer-contactInfo">7702 FM 1960 E STE 106<br>
              Humble TX 77346</p>
            <p class="footer-contactInfo">info@adjustercare.com</p>
  			</div>
  			
  			<div class="footer-menu">
    			<h6 class="footer-contactTitle">More Info</h6>
          <ul class="footer-menuList">
            <li class="footer-menuItem"><a class="footer-menuLink" href="/our-plans/">Our Plans</a></li>
            <li class="footer-menuItem"><a class="footer-menuLink" href="/faqs/">FAQs</a></li>
            <li class="footer-menuItem"><a class="footer-menuLink" href="/find-a-physician/">Find A Physician</a></li>
          </ul>
  			</div>
  			
  			<div class="footer-menu">
    			<h6 class="footer-contactTitle">My Account</h6>
          <ul class="footer-menuList">
            <li class="footer-menuItem"><a class="footer-menuLink" href="/my-account/">My Account</a></li>
            <li class="footer-menuItem"><a class="footer-menuLink" href="/cart/">Cart</a></li>
            <li class="footer-menuItem"><a class="footer-menuLink" href="/checkout/">Checkout</a></li>
          </ul>
  			</div>

		</div><!-- row end -->

	</div><!-- container end -->

</div><!-- footer end -->

<div class="basement-wrapper">
  <div class="basement-container container">
    <div class="basement-row row">
      <div class="basement-copyright">
        <p>&copy; AdjusterCare <?php echo date('Y'); ?></p>
      </div>
    </div>
  </div>
</div>

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

