<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<main id="maincontent" role="main">  
  <?php do_action( 'food_grocery_store_before_slider' ); ?>

  <?php if( get_theme_mod( 'food_grocery_store_slider_arrows', false) != '' || get_theme_mod( 'food_grocery_store_resp_slider_hide_show', false) != '') { ?>
    <section id="slider">
      <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="<?php echo esc_attr(get_theme_mod( 'food_grocery_store_slider_speed',4000)) ?>"> 
        <?php $food_grocery_store_pages = array();
          for ( $count = 1; $count <= 3; $count++ ) {
            $mod = intval( get_theme_mod( 'food_grocery_store_slider_page' . $count ));
            if ( 'page-none-selected' != $mod ) {
              $food_grocery_store_pages[] = $mod;
            }
          }
          if( !empty($food_grocery_store_pages) ) :
            $args = array(
              'post_type' => 'page',
              'post__in' => $food_grocery_store_pages,
              'orderby' => 'post__in'
            );
            $query = new WP_Query( $args );
            if ( $query->have_posts() ) :
              $i = 1;
        ?>
        <div class="carousel-inner" role="listbox">
          <?php while ( $query->have_posts() ) : $query->the_post(); ?>
            <div <?php if($i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
              <?php the_post_thumbnail(); ?>
              <div class="carousel-caption pt-0">
                <div class="inner_carousel">
                  <h1 class="mb-0 pt-0 wow slideInDown" data-wow-duration="2s"><?php the_title(); ?></h1>                  
                  <div class="more-btn my-3 my-lg-4 my-md-4 text-lg-start text-md-start wow slideInDown" data-wow-duration="2s">
                    <a class="px-4 py-3" href="<?php the_permalink(); ?>"><?php esc_html_e('Start Buying','online-grocery-mart');?><span class="screen-reader-text"><?php esc_html_e('Shop Buying','online-grocery-mart'); ?></span></a>
                  </div>
                </div>
              </div>
            </div>
          <?php $i++; endwhile; 
          wp_reset_postdata();?>
        </div>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
        endif;?>
        <a class="carousel-control-prev" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev" role="button">
          <span class="carousel-control-prev-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Previous','online-grocery-mart' );?></span>
        </a>
        <a class="carousel-control-next" data-bs-target="#carouselExampleCaptions" data-bs-slide="next" role="button">
          <span class="carousel-control-next-icon w-auto h-auto" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
          <span class="screen-reader-text"><?php esc_html_e( 'Next','online-grocery-mart' );?></span>
        </a>
      </div>
      <div class="clearfix"></div>
    </section>
  <?php }?>

  <?php do_action( 'food_grocery_store_after_slider' ); ?>

  <section id="best-deal" class="py-5 wow zoomInUp" data-wow-duration="2s">
    <div class="container">
      <div class="row">
        <?php if ( class_exists( 'WooCommerce' ) ) {
          $product_cat = get_theme_mod('online_grocery_mart_best_deal_number');
          $args = array( 
            'post_type' => 'product',
            'posts_per_page' => $product_cat,
            'product_cat' => get_theme_mod('online_grocery_mart_best_deal'),
            'order' => 'ASC'
          );
          $loop = new WP_Query( $args );
          $product_i = 0; 
          while ( $loop->have_posts() ) : $loop->the_post(); global $product; 
              if($product_i < 3) {
                $product_i++;
              } else {
                $product_i = 1;
              }
            ?>
            <div class="col-lg-4 col-md-4">              
              <div class="deal-box mb-4 p-3 <?php echo('deal-box-color').esc_attr($product_i); ?>">
                <div class="row">
                  <div class="col-lg-6 col-md-12 one">
                    <div class="con-box text-lg-start text-center mb-3 mb-lg-0">
                      <h3><a href="<?php echo esc_url(get_permalink( $loop->post->ID )); ?>"><?php the_title(); ?></a></h3>
                      <div class="add-to-cart-btn">
                        <?php if( $product->is_type( 'simple' ) ){ woocommerce_template_loop_add_to_cart( $loop->post, $product ); } ?><i class="fas fa-angle-right ms-2"></i>
                      </div>
                    </div>
                  </div>
                  <div class="col-lg-6 col-md-12">
                    <div class="product-image">
                      <?php if (has_post_thumbnail( $loop->post->ID )) echo get_the_post_thumbnail($loop->post->ID, 'shop_catalog'); else echo '<img src="'.esc_url(woocommerce_placeholder_img_src()).'" />'; ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endwhile; wp_reset_query(); ?>
        <?php } ?>
      </div>
    </div>
  </section>

  <section id="product-sec" class="py-5 wow lightSpeedIn" data-wow-duration="2s">
    <div class="container">
      <?php $food_grocery_store_product_page = array();
        $mod = absint( get_theme_mod( 'food_grocery_store_product_settings','online-grocery-mart'));
        if ( 'page-none-selected' != $mod ) {
          $food_grocery_store_product_page[] = $mod;
        }
        if( !empty($food_grocery_store_product_page) ) :
          $args = array(
            'post_type' => 'page',
            'post__in' => $food_grocery_store_product_page,
            'orderby' => 'post__in'
          );
          $query = new WP_Query( $args );
          if ( $query->have_posts() ) :
            $count = 0;
            while ( $query->have_posts() ) : $query->the_post(); ?>
              <div class="heading-txt mb-4 text-start">
                <h2><?php the_title(); ?></h2>
                <hr class="mb-0 mt-0">
              </div>
              <?php the_content(); ?>
            <?php $count++; endwhile; ?>
          <?php else : ?>
            <div class="no-postfound"></div>
          <?php endif;
        endif;
        wp_reset_postdata()
      ?>
    </div>
  </section>

  <?php do_action( 'food_grocery_store_after_service' ); ?>

  <div id="content-vw">
    <div class="container">
      <?php while ( have_posts() ) : the_post(); ?>
        <?php the_content(); ?>
      <?php endwhile; // end of the loop. ?>
    </div>
  </div>
</main>

<?php get_footer(); ?>