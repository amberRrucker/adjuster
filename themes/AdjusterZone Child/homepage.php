<?php
/**
 * Front Page - Adjuster Zone
 *
 * @package understrap
 */

get_header();

$container   = get_theme_mod( 'understrap_container_type' );
?>

<?php if ( is_front_page() && is_home() ) : ?>
	<?php get_template_part( 'global-templates/hero' ); ?>
<?php endif; ?>

<div class="wrapper" id="index-wrapper">

<div class="valueProps-container">
  <div class="valueProps-row">
    <div class="valueProps-textArea">
      <h3 class="valueProps-title">This is an h3 header for value props</h3>
      <p class="valueProps-text">This is a paragraph, lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s.</p>
      <button class="valueProps-cta">Get Started</button>
    </div>
    <div class="valueProps-itemArea">
      <div class="valueProps-item">
        <i class="valueProps-itemIcon"></i>
        <p class="valueProps-itemText"></p>
      </div>
    </div>
    <div class="valueProps-itemArea">
      <div class="valueProps-item">
        <i class="valueProps-itemIcon"></i>
        <p class="valueProps-itemText"></p>
      </div>
    </div>
    <div class="valueProps-itemArea">
      <div class="valueProps-item">
        <i class="valueProps-itemIcon"></i>
        <p class="valueProps-itemText"></p>
      </div>
    </div>
    <div class="valueProps-itemArea">
      <div class="valueProps-item">
        <i class="valueProps-itemIcon"></i>
        <p class="valueProps-itemText"></p>
      </div>
    </div>
    <div class="valueProps-itemArea">
      <div class="valueProps-item">
        <i class="valueProps-itemIcon"></i>
        <p class="valueProps-itemText"></p>
      </div>
    </div>
    <div class="valueProps-itemArea">
      <div class="valueProps-item">
        <i class="valueProps-itemIcon"></i>
        <p class="valueProps-itemText"></p>
      </div>
    </div>
  </div>
</div>

<div class="pricing-container">
  <div class="pricing-row">
    <div class="pricing-tableArea">
      <div class="pricing-tableIndividualArea">
        <div class="pricing-tableTitleArea">
          <h4 class="pricing-tableTitle"></h4>
          <p class="pricing-tableSubheading"></p>
        </div>
        <div class="pricing-tableFeaturesArea">
          <div class="pricing-tableFeature">
          </div>
          <div class="pricing-tableFeature">
          </div>
          <div class="pricing-tableFeature">
          </div>
          <button class="pricing-cta">
          </button>
        </div>
      </div>
      <div class="pricing-tableIndividualArea">
        <div class="pricing-tableTitleArea">
          <h4 class="pricing-tableTitle"></h4>
          <p class="pricing-tableSubheading"></p>
        </div>
        <div class="pricing-tableFeaturesArea">
          <div class="pricing-tableFeature">
          </div>
          <div class="pricing-tableFeature">
          </div>
          <div class="pricing-tableFeature">
          </div>
          <button class="pricing-cta">
          </button>
        </div>
      </div>
      <div class="pricing-tableIndividualArea featured">
        <div class="pricing-tableTitleArea">
          <h4 class="pricing-tableTitle"></h4>
          <p class="pricing-tableSubheading"></p>
        </div>
        <div class="pricing-tableFeaturesArea">
          <div class="pricing-tableFeature">
          </div>
          <div class="pricing-tableFeature">
          </div>
          <div class="pricing-tableFeature">
          </div>
          <button class="pricing-cta featured">
          </button>
        </div>
      </div>
    </div>
    <div class="pricing-textArea">
      <h3 class="pricing-title"></h3>
      <p class="pricing-text"></p>
      <ul class="pricing-list">
        <li class="pricing-listItem"></li>
        <li class="pricing-listItem"></li>
        <li class="pricing-listItem"></li>
      </ul>
    </div>
  </div>
</div>

<div class="global-container">
  <div class="global-row">
    <div class="global-textArea">
      <h3 class="global-title"></h3>
      <p class="global-text"></p>
    </div>
    <div class="global-image">
    </div>
  </div>
</div>

<div class="signup-container">
  <div class="signup-row">
    <div class="signup-titleArea">
      <h4 class="signup-title"></h4>
    </div>
    <div class="signup-ctaArea">
      <button class="signup-cta">Get Started</button>
    </div>
  </div>
</div>
