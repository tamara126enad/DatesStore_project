<?php

	$food_grocery_store_custom_css = '';

	/*---------------------------First highlight color -------------------*/

	$food_grocery_store_color = get_theme_mod('food_grocery_store_color');

	if($food_grocery_store_color != false){
		$food_grocery_store_custom_css .='.more-btn a,#sidebar h3,input[type="submit"],.scrollup i,#footer-2,.pagination span, .pagination a,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,.main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a,.main-navigation a:hover,#slider .carousel-control-prev-icon, #slider .carousel-control-next-icon,.order-track i.fas.fa-angle-right,span.wishlist-counter,.hot-deals-btn a,#comments input[type="submit"]{';
			$food_grocery_store_custom_css .='background: '.esc_attr($food_grocery_store_color).';';
		$food_grocery_store_custom_css .='}';
	}
	if($food_grocery_store_color != false){
		$food_grocery_store_custom_css .='#footer .textwidget a, #sidebar .textwidget a, .woocommerce-product-details__short-description p a, .textwidget p a, .entry-content a, #sidebar p a, #comments p a, .comment-meta.commentmetadata a, #content-vw a,#footer li a:hover, .account i, .logo .site-title a:hover, .account i:hover, .cart_no i:hover, .add-to-cart-btn a:hover, .deal-box h3 a:hover{';
			$food_grocery_store_custom_css .='color: '.esc_attr($food_grocery_store_color).';';
		$food_grocery_store_custom_css .='}';
	}
	if($food_grocery_store_color != false){
		$food_grocery_store_custom_css .='span.woocommerce-Price-amount.amount{';
			$food_grocery_store_custom_css .='color: '.esc_attr($food_grocery_store_color).'!important;';
		$food_grocery_store_custom_css .='}';
	}
	if($food_grocery_store_color != false){
		$food_grocery_store_custom_css .='.main-navigation ul ul, .loader-line{';
			$food_grocery_store_custom_css .='border-color: '.esc_attr($food_grocery_store_color).';';
		$food_grocery_store_custom_css .='}';
	}

	if($food_grocery_store_color != false){
		$food_grocery_store_custom_css .='@media screen and (max-width: 720px){
		.logo{';
			$food_grocery_store_custom_css .='background: '.esc_attr($food_grocery_store_color). ';';
		$food_grocery_store_custom_css .='} }';
	}

	/*----------------- Second highlight color -------------------*/

	$food_grocery_store_second_color = get_theme_mod('online_grocery_mart_second_color');

	if($food_grocery_store_second_color != false){
		$food_grocery_store_custom_css .='.more-btn a:hover,input[type="submit"]:hover,.scrollup i:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover,#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover,.custom-social-icons i:hover,.hot-deals-btn a:hover,.woocommerce span.onsale, span.cart-value, #preloader, #footer .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__button, #sidebar .wp-block-search .wp-block-search__label{';
			$food_grocery_store_custom_css .='background: '.esc_attr($food_grocery_store_second_color).';';
		$food_grocery_store_custom_css .='}';
	}

	if($food_grocery_store_second_color != false){
		$food_grocery_store_custom_css .='a, .wishlist i, .sticky .post-main-box h2:before, .top-bar p a:hover, .post-main-box:hover h2 a, .post-main-box:hover .post-info span a, .post-info:hover a, #comments a.comment-reply-link, .wishlist i:hover{';
			$food_grocery_store_custom_css .='color: '.esc_attr($food_grocery_store_second_color).';';
		$food_grocery_store_custom_css .='}';
	}

	if($food_grocery_store_color != false || $food_grocery_store_second_color != false){
		$food_grocery_store_custom_css .='.cart_no i{
		background: linear-gradient(to right, '.esc_attr($food_grocery_store_color).', '.esc_attr($food_grocery_store_second_color).');
		}';
	}

	if($food_grocery_store_color != false || $food_grocery_store_second_color != false){
		$food_grocery_store_custom_css .='@media screen and (max-width: 1000px){
		.toggle-nav i{';
			$food_grocery_store_custom_css .='linear-gradient(to right, '.esc_attr($food_grocery_store_color).', '.esc_attr($food_grocery_store_second_color).')';
		$food_grocery_store_custom_css .='} }';
	}

	/*---------------------------Slider Content Layout -------------------*/

	$food_grocery_store_theme_lay = get_theme_mod( 'food_grocery_store_slider_content_option','Left');
    if($food_grocery_store_theme_lay == 'Left'){
		$food_grocery_store_custom_css .='#slider .carousel-caption{';
			$food_grocery_store_custom_css .='text-align:left; right: 55%; left: 10%;';
		$food_grocery_store_custom_css .='}';
	}else if($food_grocery_store_theme_lay == 'Center'){
		$food_grocery_store_custom_css .='#slider .carousel-caption{';
			$food_grocery_store_custom_css .='text-align:center; right: 25%; left: 25%;';
		$food_grocery_store_custom_css .='}';
	}else if($food_grocery_store_theme_lay == 'Right'){
		$food_grocery_store_custom_css .='#slider .carousel-caption{';
			$food_grocery_store_custom_css .='text-align:right; right: 10%; left: 55%;';
		$food_grocery_store_custom_css .='}';
	}