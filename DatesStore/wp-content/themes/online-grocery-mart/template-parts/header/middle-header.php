<?php
/**
 * The template part for header
 *
 * @package Online Grocery Mart
 * @subpackage online-grocery-mart
 * @since online-grocery-mart 1.0
 */
?>

<div id="middle-header" class="py-4">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-2 col-md-4 align-self-center">
        <div class="logo mb-md-3">
          <?php if ( has_custom_logo() ) : ?>
            <div class="site-logo"><?php the_custom_logo(); ?></div>
          <?php endif; ?>
          <?php $blog_info = get_bloginfo( 'name' ); ?>
            <?php if ( ! empty( $blog_info ) ) : ?>
              <?php if ( is_front_page() && is_home() ) : ?>
                <?php if( get_theme_mod('food_grocery_store_logo_title_hide_show',true) != ''){ ?>
                  <h1 class="site-title p-0 mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php } ?>
              <?php else : ?>
                <?php if( get_theme_mod('food_grocery_store_logo_title_hide_show',true) != ''){ ?>
                  <p class="site-title mb-0"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
                <?php } ?>
              <?php endif; ?>
            <?php endif; ?>
            <?php
              $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) :
            ?>
            <?php if( get_theme_mod('food_grocery_store_tagline_hide_show',true) != ''){ ?>
              <p class="site-description mb-0">
                <?php echo esc_html($description); ?>
              </p>
            <?php } ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="col-lg-2 col-md-3 align-self-center">
        <?php if(class_exists('woocommerce')){ ?>      
          <div class="product-cat-box my-3 my-lg-0 my-md-0 text-center">
            <button class="product-btn"><?php esc_html_e('All Categories','online-grocery-mart'); ?><i class="fas fa-chevron-down ms-2"></i></button>
            <div class="product-cat">
              <?php
                $args = array(
                  'orderby'    => 'title',
                  'order'      => 'ASC',
                  'hide_empty' => 0,
                  'parent'  => 0
                );
                $product_categories = get_terms( 'product_cat', $args );
                $count = count($product_categories);
                if ( $count > 0 ){
                  foreach ( $product_categories as $product_category ) {
                    $product_cat_id   = $product_category->term_id;
                    $cat_link = get_category_link( $product_cat_id );
                    if ($product_category->category_parent == 0) { ?>
                  <li class="drp_dwn_menu p-2"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                  <?php
                }
                echo esc_html( $product_category->name ); ?></a></li>
              <?php } } ?>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-4 col-md-5 align-self-center">
        <?php if(class_exists('woocommerce')){ ?>
          <div class="search-box">
            <?php get_product_search_form(); ?>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-4 col-md-12 align-self-center">
        <div class="row">
          <div class="col-lg-5 col-md-6 align-self-center">
            <?php if( get_theme_mod( 'food_grocery_store_order_tracking') != '') { ?>
              <?php if(class_exists('woocommerce')){ ?>
                <div class="order-track my-3 my-lg-0 my-md-0 text-md-center position-relative">
                  <i class="fas fa-map-marker-alt me-2"></i><span><?php esc_html_e('Track Order','online-grocery-mart'); ?><i class="fas fa-angle-right"></i></span>
                  <div class="order-track-hover text-start">
                    <?php echo do_shortcode('[woocommerce_order_tracking]','online-grocery-mart'); ?>
                  </div>
                </div>
              <?php }?>
            <?php }?>
          </div>
          <div class="col-lg-7 col-md-6 text-center align-self-center">
            <?php dynamic_sidebar('social-icon'); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>