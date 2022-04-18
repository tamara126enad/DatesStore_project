<?php
/**
 * The template part for header
 *
 * @package Online Grocery Mart
 * @subpackage online-grocery-mart
 * @since online-grocery-mart 1.0
 */
?>

<div id="header" class="py-2">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-8 col-md-6 col-3">
        <?php if(has_nav_menu('primary')){ ?>
          <div class="toggle-nav mobile-menu">
            <button role="tab" onclick="food_grocery_store_menu_open_nav()" class="responsivetoggle"><i class="p-3 <?php echo esc_attr(get_theme_mod('food_grocery_store_res_open_menu_icon','fas fa-bars')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','online-grocery-mart'); ?></span></button>
          </div>
        <?php } ?>
        <div id="mySidenav" class="nav sidenav">
          <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'online-grocery-mart' ); ?>">
            <?php 
              if(has_nav_menu('primary')){
                wp_nav_menu( array( 
                  'theme_location' => 'primary',
                  'container_class' => 'main-menu clearfix' ,
                  'menu_class' => 'clearfix',
                  'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
                  'fallback_cb' => 'wp_page_menu',
                ) ); 
              }
            ?>
            <a href="javascript:void(0)" class="closebtn mobile-menu" onclick="food_grocery_store_menu_close_nav()"><i class="<?php echo esc_attr(get_theme_mod('food_grocery_store_res_close_menus_icon','fas fa-times')); ?>"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','online-grocery-mart'); ?></span></a>
          </nav>
        </div>
      </div>
      <div class="col-lg-2 col-md-3 col-9">
        <?php if(class_exists('woocommerce')){ ?>
          <div class="row">
            <div class="col-lg-4 col-md-4 col-4">
              <div class="wishlist mt-2 mt-lg-0 text-end position-relative">
                <?php if(defined('YITH_WCWL')){ ?>
                  <a class="wishlist_view" href="<?php echo YITH_WCWL()->get_wishlist_url(); ?>"><i class="fas fa-heart"></i>
                  <?php $wishlist_count = YITH_WCWL()->count_products(); ?>
                  <span class="wishlist-counter"><?php echo $wishlist_count; ?></span></a>
                <?php }?>
              </div>
            </div>
            <div class="col-lg-3 col-md-4 col-4">
              <div class="account mt-2 mt-lg-0 text-center">
                <?php if ( is_user_logged_in() ) { ?>
                  <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('My Account','online-grocery-mart'); ?>"><i class="fas fa-sign-in-alt"></i><span class="screen-reader-text"><?php esc_html_e( 'My Account','online-grocery-mart' );?></span></a>
                <?php }
                else { ?>
                  <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php esc_attr_e('Login / Register','online-grocery-mart'); ?>"><i class="fas fa-user"></i><span class="screen-reader-text"><?php esc_html_e( 'Login / Register','online-grocery-mart' );?></span></a>
                <?php } ?>
              </div>
            </div>
            <div class="col-lg-5 col-md-4 col-4">
              <div class="cart_no">
                <a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>" title="<?php esc_attr_e( 'shopping cart','online-grocery-mart' ); ?>"><i class="fas fa-shopping-cart"></i><span class="screen-reader-text"><?php esc_html_e( 'shopping cart','online-grocery-mart' );?></span></a>
                <span class="cart-value"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count() ));?></span>
              </div>
            </div>            
          </div>
        <?php }?>
      </div>
      <div class="col-lg-2 col-md-3">
        <div class="hot-deals-btn my-2 text-center text-lg-center text-md-center">
          <?php if( get_theme_mod( 'online_grocery_mart_hot_deal_link') != '' || get_theme_mod( 'online_grocery_mart_hot_deal_text') != '') { ?>
            <a href="<?php echo esc_url(get_theme_mod('online_grocery_mart_hot_deal_link',''));?>" class="px-3 py-2 d-inline-block"><?php echo esc_html(get_theme_mod('online_grocery_mart_hot_deal_text',''));?></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>