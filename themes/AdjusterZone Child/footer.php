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
            <p class="footer-contactInfo">12680 W Lake Houston Pkwy<br>
              Suite 510-4003<br>
              Houston, TX 77044</p>
            <p class="footer-contactInfo">Info@adjusterzone.com</p>
  			</div>
  			
  			<div class="footer-menu">
    			<h6 class="footer-contactTitle">More Info</h6>
          <ul class="footer-menuList">
            <li class="footer-menuItem"><a class="footer-menuLink" href="/shop/">Our Plans</a></li>
            <li class="footer-menuItem"><a class="footer-menuLink" href="/resources/">Resources</a></li>
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
        <p>&copy; AdjusterZone <?php echo date('Y'); ?></p>
      </div>
    </div>
  </div>
</div>

<?php wp_footer(); ?>

</body>

</html>

