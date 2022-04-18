<?php
	add_action( 'wp_enqueue_scripts', 'online_grocery_mart_enqueue_styles' );
	function online_grocery_mart_enqueue_styles() {
    	$parent_style = 'food-grocery-store-basic-style'; // Style handle of parent theme.
    	wp_enqueue_style( 'bootstrap-style', esc_url(get_template_directory_uri()).'/assets/css/bootstrap.css' );
		wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
		wp_enqueue_style( 'online-grocery-mart-style', get_stylesheet_uri(), array( $parent_style ) );
		require get_parent_theme_file_path( '/custom-style.php' );
		wp_add_inline_style( 'online-grocery-mart-style',$food_grocery_store_custom_css );
		require get_theme_file_path( '/custom-style.php' );
		wp_add_inline_style( 'online-grocery-mart-style',$food_grocery_store_custom_css );
	}

	add_action( 'init', 'online_grocery_mart_remove_parent_function');
	function online_grocery_mart_remove_parent_function() {
		remove_action( 'admin_notices', 'food_grocery_store_activation_notice' );
		remove_action( 'wp_enqueue_scripts', 'food_grocery_store_header_style' );
		remove_action( 'admin_menu', 'food_grocery_store_gettingstarted' );
	}

	function online_grocery_mart_customize_register() {
		global $wp_customize;
		$wp_customize->remove_section( 'food_grocery_store_upgrade_pro_link' );
		$wp_customize->remove_section( 'food_grocery_store_get_started_link' );
		$wp_customize->remove_setting( 'food_grocery_store_daily_deals_text' );
		$wp_customize->remove_control( 'food_grocery_store_daily_deals_text' );
		$wp_customize->remove_setting( 'food_grocery_store_daily_deals_link' );
		$wp_customize->remove_control( 'food_grocery_store_daily_deals_link' );
		$wp_customize->remove_setting( 'food_grocery_store_contact_text' );
		$wp_customize->remove_control( 'food_grocery_store_contact_text' );
		$wp_customize->remove_setting( 'food_grocery_store_contact_link' );
		$wp_customize->remove_control( 'food_grocery_store_contact_link' );
	}
	add_action( 'customize_register', 'online_grocery_mart_customize_register', 11 );

	function online_grocery_mart_header_style() {
		if ( get_header_image() ) :
		$custom_css = "
	        .home-page-header{
				background-image:url('".esc_url(get_header_image())."');
				background-position: center top;
				background-size: 100%;
			}";
		   	wp_add_inline_style( 'online-grocery-mart-style', $custom_css );
		endif;
	}
	add_action( 'wp_enqueue_scripts', 'online_grocery_mart_header_style' );

	function online_grocery_mart_scripts() {	
		wp_enqueue_script( 'Custom JS ', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery') );

		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}
	}
	add_action( 'wp_enqueue_scripts', 'online_grocery_mart_scripts' );

	function online_grocery_mart_font_url() {
		$font_url      = '';
		$font_family   = array();
		$font_family[] = 'Prata';
		$font_family[] = 'Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i';
		$query_args = array(
			'family' => rawurlencode(implode('|', $font_family)),
		);
		$font_url = add_query_arg($query_args, '//fonts.googleapis.com/css');
		return $font_url;
	}
	
	function online_grocery_mart_customizer ( $wp_customize ) {

		// Header
		$wp_customize->add_setting('online_grocery_mart_discount_text',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('online_grocery_mart_discount_text',array(
			'label'	=> esc_html__('Discount Text','online-grocery-mart'),
			'input_attrs' => array(
	            'placeholder' => esc_html__( 'Discount Text', 'online-grocery-mart' ),
	        ),
			'section'=> 'food_grocery_store_top_header',
			'type'=> 'text'
		));

		$wp_customize->add_setting('online_grocery_mart_email_address',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_email'
		));	
		$wp_customize->add_control('online_grocery_mart_email_address',array(
			'label'	=> esc_html__('Email Address','online-grocery-mart'),
			'input_attrs' => array(
	            'placeholder' => esc_html__( 'example@support123.com', 'online-grocery-mart' ),
	        ),
			'section'=> 'food_grocery_store_top_header',
			'type'=> 'text'
		));

		$wp_customize->add_setting('online_grocery_mart_hot_deal_text',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));	
		$wp_customize->add_control('online_grocery_mart_hot_deal_text',array(
			'label'	=> esc_html__('Hot Deals Text','online-grocery-mart'),
			'input_attrs' => array(
	            'placeholder' => esc_html__( 'Hot Deals', 'online-grocery-mart' ),
	        ),
			'section'=> 'food_grocery_store_top_header',
			'type'=> 'text'
		));

		$wp_customize->add_setting('online_grocery_mart_hot_deal_link',array(
			'default'=> '',
			'sanitize_callback'	=> 'esc_url_raw'
		));	
		$wp_customize->add_control('online_grocery_mart_hot_deal_link',array(
			'label'	=> esc_html__('Hot Deals Link','online-grocery-mart'),
			'input_attrs' => array(
	            'placeholder' => esc_html__( 'https://example.com/page', 'online-grocery-mart' ),
	        ),
			'section'=> 'food_grocery_store_top_header',
			'type'=> 'url'
		));

		// Best Deal
		$wp_customize->add_section( 'online_grocery_mart_best_deal_section' , array(
	    	'title' => esc_html__( 'Product Section', 'online-grocery-mart' ),
			'panel' => 'food_grocery_store_panel_id',
			'priority' => 5,
		) );

		$wp_customize->add_setting('online_grocery_mart_best_deal_number',array(
			'default'=> '',
			'sanitize_callback'	=> 'absint'
		));	
		$wp_customize->add_control('online_grocery_mart_best_deal_number',array(
			'label'	=> esc_html__('Number of Product','online-grocery-mart'),
			'section'=> 'online_grocery_mart_best_deal_section',
			'type'=> 'number'
		));

		$args = array(
	       'type'                     => 'product',
	        'child_of'                 => 0,
	        'parent'                   => '',
	        'orderby'                  => 'term_group',
	        'order'                    => 'ASC',
	        'hide_empty'               => false,
	        'hierarchical'             => 1,
	        'number'                   => '',
	        'taxonomy'                 => 'product_cat',
	        'pad_counts'               => false
	    );
	    $categories = get_categories( $args );
	    $cats = array();
	    $i = 0;
	    foreach($categories as $category){
	        if($i==0){
	            $default = $category->slug;
	            $i++;
	        } 
	        $cats[$category->slug] = $category->name;
	    }
	    $wp_customize->add_setting('online_grocery_mart_best_deal',array(
	        'sanitize_callback' => 'online_grocery_mart_sanitize_select',
	    ));
	    $wp_customize->add_control('online_grocery_mart_best_deal',array(
	        'type'    => 'select',
	        'choices' => $cats,
	        'label' => __('Select Product Category','online-grocery-mart'),
	        'section' => 'online_grocery_mart_best_deal_section',
	    ));

	    // Color Option
	    $wp_customize->add_setting( 'online_grocery_mart_second_color', array(
		    'default' => '',
		    'sanitize_callback' => 'sanitize_hex_color'
	  	));
	  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'online_grocery_mart_second_color', array(
	  		'label' => esc_html__('Color Option', 'online-grocery-mart'),
		    'description' => esc_html__('It will change the complete theme color in one click.', 'online-grocery-mart'),
		    'section' => 'food_grocery_store_global_typography',
		    'settings' => 'online_grocery_mart_second_color',
	  	)));
	}
	add_action( 'customize_register', 'online_grocery_mart_customizer' );

	//define
	define('ONLINE_GROCERY_MART_FREE_THEME_DOC',__('https://vwthemesdemo.com/docs/free-food-grocery-store/','online-grocery-mart'));
	define('ONLINE_GROCERY_MART_SUPPORT',__('https://wordpress.org/support/theme/online-grocery-mart/','online-grocery-mart'));
	define('ONLINE_GROCERY_MART_REVIEW',__('https://wordpress.org/support/theme/online-grocery-mart/reviews/','online-grocery-mart'));
	define('ONLINE_GROCERY_MART_BUY_NOW',__('https://www.vwthemes.com/themes/online-grocery-shopping-wordpress-theme/','online-grocery-mart'));
	define('ONLINE_GROCERY_MART_LIVE_DEMO',__('https://www.vwthemes.net/online-grocery-shopping-pro/','online-grocery-mart'));
	define('ONLINE_GROCERY_MART_PRO_DOC',__('https://vwthemesdemo.com/docs/food-grocery-store-pro/','online-grocery-mart'));
	define('ONLINE_GROCERY_MART_FAQ',__('https://www.vwthemes.com/faqs/','online-grocery-mart'));
	define('ONLINE_GROCERY_MART_CONTACT',__('https://www.vwthemes.com/contact/','online-grocery-mart'));
	define('ONLINE_GROCERY_MART_CHILD_THEME',__('https://developer.wordpress.org/themes/advanced-topics/child-themes/','online-grocery-mart'));
	define('ONLINE_GROCERY_MART_CREDIT',__('https://www.vwthemes.com/themes/free-online-grocery-wordpress-theme/','online-grocery-mart'));

	if ( ! function_exists( 'online_grocery_mart_credit' ) ) {
		function online_grocery_mart_credit(){
			echo "<a href=".esc_url(ONLINE_GROCERY_MART_CREDIT)." target='_blank'>".esc_html__('Online Grocery WordPress Theme','online-grocery-mart')."</a>";
		}
	}
	
	function online_grocery_mart_sanitize_select( $input, $setting ){
	    $input = sanitize_key($input);
	    $choices = $setting->manager->get_control( $setting->id )->choices;
	    return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}

// Customizer Pro
load_template( ABSPATH . WPINC . '/class-wp-customize-section.php' );

class Online_Grocery_Mart_Customize_Section_Pro extends WP_Customize_Section {
	public $type = 'online-grocery-mart';
	public $pro_text = '';
	public $pro_url = '';
	public function json() {
		$json = parent::json();
		$json['pro_text'] = $this->pro_text;
		$json['pro_url']  = esc_url( $this->pro_url );
		return $json;
	}
	protected function render_template() { ?>
		<li id="accordion-section-{{ data.id }}" class="accordion-section control-section control-section-{{ data.type }} cannot-expand">
			<h3 class="accordion-section-title">
				{{ data.title }}
				<# if ( data.pro_text && data.pro_url ) { #>
					<a href="{{ data.pro_url }}" class="button button-secondary alignright" target="_blank">{{ data.pro_text }}</a>
				<# } #>
			</h3>
		</li>
	<?php }
}

final class Online_Grocery_Mart_Customize {
	public static function get_instance() {
		static $instance = null;
		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}
		return $instance;
	}
	private function __construct() {}
	private function setup_actions() {
		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );
		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}
	public function sections( $manager ) {
		// Register custom section types.
		$manager->register_section_type( 'Online_Grocery_Mart_Customize_Section_Pro' );
		// Register sections.
		$manager->add_section( new Online_Grocery_Mart_Customize_Section_Pro( $manager, 'online_grocery_mart',array(
			'priority'   => 1,
			'title'    => esc_html__( 'Online Grocery Mart', 'online-grocery-mart' ),
			'pro_text' => esc_html__( 'UPGRADE PRO', 'online-grocery-mart' ),
			'pro_url'  => esc_url('https://www.vwthemes.com/themes/grocery-store-wordpress-theme/'),
		) ) );

		// Register sections.
		$manager->add_section(new Online_Grocery_Mart_Customize_Section_Pro($manager,'online_grocery_mart_get_started_link',array(
			'priority'   => 1,
			'title'    => esc_html__( 'DOCUMENTATION', 'online-grocery-mart' ),
			'pro_text' => esc_html__( 'DOCS', 'online-grocery-mart' ),
			'pro_url'  => admin_url('themes.php?page=online_grocery_mart_guide'),
		)));
	}
	public function enqueue_control_scripts() {
		wp_enqueue_script( 'online-grocery-mart-customize-controls', get_stylesheet_directory_uri() . '/js/customize-controls-child.js', array( 'customize-controls' ) );
		wp_enqueue_style( 'online-grocery-mart-customize-controls', get_stylesheet_directory_uri() . '/css/customize-controls-child.css' );
	}
}
Online_Grocery_Mart_Customize::get_instance();

/* Theme Setup */
if ( ! function_exists( 'online_grocery_mart_setup' ) ) :
 
function online_grocery_mart_setup() {

	$GLOBALS['content_width'] = apply_filters( 'online_grocery_mart_content_width', 640 );

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'title-tag' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'responsive-embeds' );
	add_theme_support( 'html5', array( 'comment-list', 'search-form', 'comment-form', ) );
	add_theme_support( 'custom-logo', array(
		'height'      => 240,
		'width'       => 240,
		'flex-height' => true,
	) );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, icons, and column width.
	 */
	add_editor_style( array( 'css/editor-style.css', online_grocery_mart_font_url() ) );

	// Theme Activation Notice
	global $pagenow;

	if (is_admin() || ('themes.php' == $pagenow)) {
		add_action('admin_notices', 'online_grocery_mart_activation_notice');
	}
}
endif;

add_action( 'after_setup_theme', 'online_grocery_mart_setup' );

// Notice after Theme Activation
function online_grocery_mart_activation_notice() {
	echo '<div class="notice notice-success is-dismissible welcome-notice">';
	echo '<p>'. esc_html__( 'Thank you for choosing Online Grocery Mart Theme. Would like to have you on our Welcome page so that you can reap all the benefits of our Online Grocery Mart Theme.', 'online-grocery-mart' ) .'</p>';
	echo '<p><a href="'. esc_url( admin_url( 'themes.php?page=online_grocery_mart_guide' ) ) .'" class="button button-primary">'. esc_html__( 'GET STARTED', 'online-grocery-mart' ) .'</a></p>';
	echo '</div>';
}

/* Theme Widgets Setup */
function online_grocery_mart_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Social Icon', 'online-grocery-mart' ),
		'description'   => __( 'Appears on Header', 'online-grocery-mart' ),
		'id'            => 'social-icon',
	) );
}
add_action( 'widgets_init', 'online_grocery_mart_widgets_init' );

/* Social Icons */
require get_theme_file_path() . '/inc/themes-widgets/social-icon.php';

/* Block Pattern */
require get_theme_file_path() . '/inc/block-patterns/block-patterns.php';

/* getstart */
require get_theme_file_path('/inc/getstart/getstart.php');

/* Block Pattern */
require get_theme_file_path('/inc/tgm/tgm.php');

/* Block Pattern */
require get_theme_file_path('/inc/getstart/plugin-activation.php');