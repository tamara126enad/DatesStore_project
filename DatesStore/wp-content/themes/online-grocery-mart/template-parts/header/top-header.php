<?php
/**
 * The template part for top header
 *
 * @package Online Grocery Mart
 * @subpackage online-grocery-mart
 * @since online-grocery-mart 1.0
 */
?>

<div class="top-bar">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 col-md-3">
        <?php if( get_theme_mod('food_grocery_store_phone_number') != ''){ ?>
          <p class="mb-0"><i class="fas fa-phone me-2"></i><a href="tel:<?php echo esc_attr( get_theme_mod('food_grocery_store_phone_number','') ); ?>"><?php echo esc_html(get_theme_mod('food_grocery_store_phone_number',''));?></a></p>
        <?php } ?>
      </div>
      <div class="col-lg-4 col-md-9 py-1">
        <?php if( get_theme_mod( 'online_grocery_mart_discount_text') != '') { ?>
          <p class="mb-0 discount-line "><?php echo esc_html(get_theme_mod('online_grocery_mart_discount_text',''));?></p>
        <?php } ?>
      </div>
      <div class="col-lg-6 col-md-12">
        <div class="row">
          <div class="col-lg-6 col-md-4">
            <?php if( get_theme_mod('online_grocery_mart_email_address') != ''){ ?>
              <p class="mb-0"><i class="fas fa-envelope me-2"></i><a href="mailto:<?php echo esc_attr(get_theme_mod('online_grocery_mart_email_address',''));?>"><?php echo esc_html(get_theme_mod('online_grocery_mart_email_address',''));?></a></p>
            <?php } ?>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <?php if( get_theme_mod( 'food_grocery_store_google_translator') != '') { ?>
              <div class="translate-lang">
                <?php echo do_shortcode( '[gtranslate]' );?>
              </div>
            <?php } ?>
          </div>
          <div class="col-lg-3 col-md-4 col-6">
            <?php if( get_theme_mod( 'food_grocery_store_currency_switcher') != '') { ?>
              <?php if(class_exists('woocommerce')){ ?>
                <div class="currency-box">
                  <?php echo do_shortcode( '[woocommerce_currency_switcher_drop_down_box]' );?>
                </div>
              <?php } ?>
            <?php }?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>