<?php
//about theme info
add_action( 'admin_menu', 'online_grocery_mart_gettingstarted' );
function online_grocery_mart_gettingstarted() {
	add_theme_page( esc_html__('About Online Grocery Mart', 'online-grocery-mart'), esc_html__('About Online Grocery Mart', 'online-grocery-mart'), 'edit_theme_options', 'online_grocery_mart_guide', 'online_grocery_mart_mostrar_guide');
}

// Add a Custom CSS file to WP Admin Area
function online_grocery_mart_admin_theme_style() {
   wp_enqueue_style('online-grocery-mart-custom-admin-style', esc_url(get_theme_file_uri()) . '/inc/getstart/getstart.css');
   wp_enqueue_script('online-grocery-mart-tabs', esc_url(get_theme_file_uri()) . '/inc/getstart/js/tab.js');
}
add_action('admin_enqueue_scripts', 'online_grocery_mart_admin_theme_style');

//guidline for about theme
function online_grocery_mart_mostrar_guide() { 
	//custom function about theme customizer
	$return = add_query_arg( array()) ;
	$theme = wp_get_theme( 'online-grocery-mart' );
?>

<div class="wrapper-info">
    <div class="col-left">
    	<h2><?php esc_html_e( 'Welcome to Online Grocery Mart Theme', 'online-grocery-mart' ); ?> <span class="version">Version: <?php echo esc_html($theme['Version']);?></span></h2>
    	<p><?php esc_html_e('All our WordPress themes are modern, minimalist, 100% responsive, seo-friendly,feature-rich, and multipurpose that best suit designers, bloggers and other professionals who are working in the creative fields.','online-grocery-mart'); ?></p>
    </div>
    <div class="col-right">
    	<div class="logo">
			<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/final-logo.png" alt="" />
		</div>
		<div class="update-now">
			<h4><?php esc_html_e('Buy Online Grocery Mart at 20% Discount','online-grocery-mart'); ?></h4>
			<h4><?php esc_html_e('Use Coupon','online-grocery-mart'); ?> ( <span><?php esc_html_e('vwpro20','online-grocery-mart'); ?></span> ) </h4> 
			<div class="info-link">
				<a href="<?php echo esc_url( ONLINE_GROCERY_MART_BUY_NOW ); ?>" target="_blank"> <?php esc_html_e( 'Upgrade to Pro', 'online-grocery-mart' ); ?></a>
			</div>
		</div>
    </div>

    <div class="tab-sec">
		<div class="tab">		
			<button class="tablinks" onclick="online_grocery_mart_open_tab(event, 'lite_theme')"><?php esc_html_e( 'Setup With Customizer', 'online-grocery-mart' ); ?></button>	
			<button class="tablinks" onclick="online_grocery_mart_open_tab(event, 'block_pattern')"><?php esc_html_e( 'Setup With Block Pattern', 'online-grocery-mart' ); ?></button>
			<button class="tablinks" onclick="online_grocery_mart_open_tab(event, 'gutenberg_editor')"><?php esc_html_e( 'Setup With Gutunberg Block', 'online-grocery-mart' ); ?></button>
			<button class="tablinks" onclick="online_grocery_mart_open_tab(event, 'theme_pro')"><?php esc_html_e( 'Get Premium', 'online-grocery-mart' ); ?></button>
			<button class="tablinks" onclick="online_grocery_mart_open_tab(event, 'free_pro')"><?php esc_html_e( 'Support', 'online-grocery-mart' ); ?></button>
		</div>

		<?php
			$online_grocery_mart_plugin_custom_css = '';
			if(class_exists('Ibtana_Visual_Editor_Menu_Class')){
				$online_grocery_mart_plugin_custom_css ='display: block';
			}
		?>
		<div id="lite_theme" class="tabcontent open">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
				$plugin_ins = Online_Grocery_Mart_Plugin_Activation_Settings::get_instance();
				$online_grocery_mart_actions = $plugin_ins->recommended_actions;
				?>
				<div class="online-grocery-mart-recommended-plugins">
				    <div class="online-grocery-mart-action-list">
				        <?php if ($online_grocery_mart_actions): foreach ($online_grocery_mart_actions as $key => $online_grocery_mart_actionValue): ?>
				                <div class="online-grocery-mart-action" id="<?php echo esc_attr($online_grocery_mart_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($online_grocery_mart_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($online_grocery_mart_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($online_grocery_mart_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" get-start-tab-id="lite-theme-tab" href="javascript:void(0);"><?php esc_html_e('Skip','online-grocery-mart'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="lite-theme-tab" style="<?php echo esc_attr($online_grocery_mart_plugin_custom_css); ?>">
				<h3><?php esc_html_e( 'Lite Theme Information', 'online-grocery-mart' ); ?></h3>
				<hr class="h3hr">
			  	<p><?php esc_html_e('Get a modern online solution to make your grocery store a huge success and to do this, using this Free Online Grocery WordPress Theme is the smartest choice. Designed for all kinds of grocery shops, grocery markets, wholesale grocery outlets, grocery and vegetable retailers, and supermarkets; it impresses the buyers with a clean, sophisticated, and categorized display of all your products. To make your products look radiant and catchy, it comes with a retina-ready design that is flexible enough to adapt to every screen. Navigation is sticky and simple so that your visitors can get to explore your grocery site quickly without facing any difficulty. Every single product detail can be displayed and to make it even more engaging, you get a lot of typography and font options thanks to the Font Awesome integration. You can also establish yourself as a brand as putting up a customized logo on your site can help to build an identity of your business.','online-grocery-mart'); ?></p>
			  	<div class="col-left-inner">
			  		<h4><?php esc_html_e( 'Theme Documentation', 'online-grocery-mart' ); ?></h4>
					<p><?php esc_html_e( 'If you need any assistance regarding setting up and configuring the Theme, our documentation is there.', 'online-grocery-mart' ); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( ONLINE_GROCERY_MART_FREE_THEME_DOC ); ?>" target="_blank"> <?php esc_html_e( 'Documentation', 'online-grocery-mart' ); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Theme Customizer', 'online-grocery-mart'); ?></h4>
					<p> <?php esc_html_e('To begin customizing your website, start by clicking "Customize".', 'online-grocery-mart'); ?></p>
					<div class="info-link">
						<a target="_blank" href="<?php echo esc_url( admin_url('customize.php') ); ?>"><?php esc_html_e('Customizing', 'online-grocery-mart'); ?></a>
					</div>
					<hr>				
					<h4><?php esc_html_e('Having Trouble, Need Support?', 'online-grocery-mart'); ?></h4>
					<p> <?php esc_html_e('Our dedicated team is well prepared to help you out in case of queries and doubts regarding our theme.', 'online-grocery-mart'); ?></p>
					<div class="info-link">
						<a href="<?php echo esc_url( ONLINE_GROCERY_MART_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support Forum', 'online-grocery-mart'); ?></a>
					</div>
					<hr>
					<h4><?php esc_html_e('Reviews & Testimonials', 'online-grocery-mart'); ?></h4>
					<p> <?php esc_html_e('All the features and aspects of this WordPress Theme are phenomenal. I\'d recommend this theme to all.', 'online-grocery-mart'); ?>  </p>
					<div class="info-link">
						<a href="<?php echo esc_url( ONLINE_GROCERY_MART_REVIEW ); ?>" target="_blank"><?php esc_html_e('Reviews', 'online-grocery-mart'); ?></a>
					</div>
			  		<div class="link-customizer">
						<h3><?php esc_html_e( 'Link to customizer', 'online-grocery-mart' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','online-grocery-mart'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-slides"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=food_grocery_store_slidersettings') ); ?>" target="_blank"><?php esc_html_e('Slider Section','online-grocery-mart'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=food_grocery_store_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','online-grocery-mart'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=food_grocery_store_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','online-grocery-mart'); ?></a>
								</div>
							</div>

							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=food_grocery_store_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','online-grocery-mart'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-align-center"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=food_grocery_store_top_header') ); ?>" target="_blank"><?php esc_html_e('Top Header','online-grocery-mart'); ?></a>
								</div> 
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','online-grocery-mart'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','online-grocery-mart'); ?></a>
								</div> 
							</div>

						</div>
					</div>
			  	</div>
				<div class="col-right-inner">
					<h3 class="page-template"><?php esc_html_e('How to set up Home Page Template','online-grocery-mart'); ?></h3>
				  	<hr class="h3hr">
					<p><?php esc_html_e('Follow these instructions to setup Home page.','online-grocery-mart'); ?></p>
	                <ul>
	                  	<p><span class="strong"><?php esc_html_e('1. Create a new page :','online-grocery-mart'); ?></span><?php esc_html_e(' Go to ','online-grocery-mart'); ?>
					  	<b><?php esc_html_e(' Dashboard >> Pages >> Add New Page','online-grocery-mart'); ?></b></p>

	                  	<p><?php esc_html_e('Name it as "Home" then select the template "Custom Home Page".','online-grocery-mart'); ?></p>
	                  	<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/home-page-template.png" alt="" />
	                  	<p><span class="strong"><?php esc_html_e('2. Set the front page:','online-grocery-mart'); ?></span><?php esc_html_e(' Go to ','online-grocery-mart'); ?>
					  	<b><?php esc_html_e(' Settings >> Reading ','online-grocery-mart'); ?></b></p>
					  	<p><?php esc_html_e('Select the option of Static Page, now select the page you created to be the homepage, while another page to be your default page.','online-grocery-mart'); ?></p>
	                  	<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/set-front-page.png" alt="" />
	                  	<p><?php esc_html_e(' Once you are done with this, then follow the','online-grocery-mart'); ?> <a class="doc-links" href="https://vwthemesdemo.com/docs/free-food-grocery-store/" target="_blank"><?php esc_html_e('Documentation','online-grocery-mart'); ?></a></p>
	                </ul>
			  	</div>
			</div>
		</div>

		<div id="block_pattern" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Online_Grocery_Mart_Plugin_Activation_Settings::get_instance();
			$online_grocery_mart_actions = $plugin_ins->recommended_actions;
			?>
				<div class="online-grocery-mart-recommended-plugins">
				    <div class="online-grocery-mart-action-list">
				        <?php if ($online_grocery_mart_actions): foreach ($online_grocery_mart_actions as $key => $online_grocery_mart_actionValue): ?>
				                <div class="online-grocery-mart-action" id="<?php echo esc_attr($online_grocery_mart_actionValue['id']);?>">
			                        <div class="action-inner">
			                            <h3 class="action-title"><?php echo esc_html($online_grocery_mart_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($online_grocery_mart_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($online_grocery_mart_actionValue['link']); ?>
			                            <a class="ibtana-skip-btn" href="javascript:void(0);" get-start-tab-id="gutenberg-editor-tab"><?php esc_html_e('Skip','online-grocery-mart'); ?></a>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php } ?>
			<div class="gutenberg-editor-tab" style="<?php echo esc_attr($online_grocery_mart_plugin_custom_css); ?>">
				<div class="block-pattern-img">
				  	<h3><?php esc_html_e( 'Block Patterns', 'online-grocery-mart' ); ?></h3>
					<hr class="h3hr">
					<p><?php esc_html_e('Follow the below instructions to setup Home page with Block Patterns.','online-grocery-mart'); ?></p>
	              	<p><b><?php esc_html_e('Click on Below Add new page button >> Click on "+" Icon >> Click Pattern Tab >> Click on homepage sections >> Publish.','online-grocery-mart'); ?></span></b></p>
	              	<div class="online-grocery-mart-pattern-page">
				    	<a href="javascript:void(0)" class="vw-pattern-page-btn button-primary button"><?php esc_html_e('Add New Page','online-grocery-mart'); ?></a>
				    </div>
	              	<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/block-pattern.png" alt="" />
	            </div>

              	<div class="block-pattern-link-customizer">
	              	<div class="link-customizer-with-block-pattern">
						<h3><?php esc_html_e( 'Link to customizer', 'online-grocery-mart' ); ?></h3>
						<hr class="h3hr">
						<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','online-grocery-mart'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=food_grocery_store_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','online-grocery-mart'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','online-grocery-mart'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=food_grocery_store_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','online-grocery-mart'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=food_grocery_store_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','online-grocery-mart'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','online-grocery-mart'); ?></a>
								</div> 
							</div>
						</div>
					</div>	
				</div>			
	        </div>
		</div>

		<div id="gutenberg_editor" class="tabcontent">
			<?php if(!class_exists('Ibtana_Visual_Editor_Menu_Class')){ 
			$plugin_ins = Online_Grocery_Mart_Plugin_Activation_Settings::get_instance();
			$online_grocery_mart_actions = $plugin_ins->recommended_actions;
			?>
				<div class="online-grocery-mart-recommended-plugins">
				    <div class="online-grocery-mart-action-list">
				        <?php if ($online_grocery_mart_actions): foreach ($online_grocery_mart_actions as $key => $online_grocery_mart_actionValue): ?>
				                <div class="online-grocery-mart-action" id="<?php echo esc_attr($online_grocery_mart_actionValue['id']);?>">
			                        <div class="action-inner plugin-activation-redirect">
			                            <h3 class="action-title"><?php echo esc_html($online_grocery_mart_actionValue['title']); ?></h3>
			                            <div class="action-desc"><?php echo esc_html($online_grocery_mart_actionValue['desc']); ?></div>
			                            <?php echo wp_kses_post($online_grocery_mart_actionValue['link']); ?>
			                        </div>
				                </div>
				            <?php endforeach;
				        endif; ?>
				    </div>
				</div>
			<?php }else{ ?>
				<h3><?php esc_html_e( 'Gutunberg Blocks', 'online-grocery-mart' ); ?></h3>
				<hr class="h3hr">
				<div class="online-grocery-mart-pattern-page">
			    	<a href="<?php echo esc_url( admin_url( 'admin.php?page=ibtana-visual-editor-templates' ) ); ?>" class="vw-pattern-page-btn ibtana-dashboard-page-btn button-primary button"><?php esc_html_e('Ibtana Settings','online-grocery-mart'); ?></a>
			    </div>

			    <div class="link-customizer-with-guternberg-ibtana">
					<h3><?php esc_html_e( 'Link to customizer', 'online-grocery-mart' ); ?></h3>
					<hr class="h3hr">
					<div class="first-row">
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-buddicons-buddypress-logo"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[control]=custom_logo') ); ?>" target="_blank"><?php esc_html_e('Upload your logo','online-grocery-mart'); ?></a>
								</div>
								<div class="row-box2">
									<span class="dashicons dashicons-format-gallery"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=food_grocery_store_post_settings') ); ?>" target="_blank"><?php esc_html_e('Post settings','online-grocery-mart'); ?></a>
								</div>
							</div>
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-menu"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=nav_menus') ); ?>" target="_blank"><?php esc_html_e('Menus','online-grocery-mart'); ?></a>
								</div>
								
								<div class="row-box2">
									<span class="dashicons dashicons-text-page"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=food_grocery_store_footer') ); ?>" target="_blank"><?php esc_html_e('Footer Text','online-grocery-mart'); ?></a>
								</div>
							</div>
							
							<div class="row-box">
								<div class="row-box1">
									<span class="dashicons dashicons-admin-generic"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[section]=food_grocery_store_left_right') ); ?>" target="_blank"><?php esc_html_e('General Settings','online-grocery-mart'); ?></a>
								</div>
								 <div class="row-box2">
									<span class="dashicons dashicons-screenoptions"></span><a href="<?php echo esc_url( admin_url('customize.php?autofocus[panel]=widgets') ); ?>" target="_blank"><?php esc_html_e('Footer Widget','online-grocery-mart'); ?></a>
								</div> 
							</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div id="theme_pro" class="tabcontent">
		  	<h3><?php esc_html_e( 'Premium Theme Information', 'online-grocery-mart' ); ?></h3>
			<hr class="h3hr">
		    <div class="col-left-pro">
		    	<p><?php esc_html_e('Online Grocery Shopping WordPress Theme not only gives the right web presence but also the required room for your grocery business for its improvement and scalability. Being conducive for grocery markets, food, and organic products stores, this wonderful theme has a design that everyone will find visually appealing. With a full-width featured product slider, you can display and highlight your grocery products photos in a pretty way seeking the attention of your audience. Taking an online grocery store into consideration, WP Online Grocery WordPress Theme features all the necessary shopping options at the top such as product cart, the current offers, and deals, options for tracking your orders, etc. There are several categories that make it easy for your grocery shoppers to search the grocery. For this, they can make use of the search option provided. This theme is a great investment if you are eyeing the expansion of your business in the near future.','online-grocery-mart'); ?></p>
		    	<div class="pro-links">
			    	<a href="<?php echo esc_url( ONLINE_GROCERY_MART_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'online-grocery-mart'); ?></a>
					<a href="<?php echo esc_url( ONLINE_GROCERY_MART_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Buy Pro', 'online-grocery-mart'); ?></a>
					<a href="<?php echo esc_url( ONLINE_GROCERY_MART_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Pro Documentation', 'online-grocery-mart'); ?></a>
				</div>
		    </div>
		    <div class="col-right-pro">
		    	<img src="<?php echo esc_url(get_theme_file_uri()); ?>/inc/getstart/images/responsive.png" alt="" />
		    </div>
		    <div class="featurebox">
			    <h3><?php esc_html_e( 'Theme Features', 'online-grocery-mart' ); ?></h3>
				<hr class="h3hr">
				<div class="table-image">
					<table class="tablebox">
						<thead>
							<tr>
								<th></th>
								<th><?php esc_html_e('Free Themes', 'online-grocery-mart'); ?></th>
								<th><?php esc_html_e('Premium Themes', 'online-grocery-mart'); ?></th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><?php esc_html_e('Theme Customization', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Responsive Design', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Logo Upload', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Social Media Links', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Slider Settings', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Number of Slides', 'online-grocery-mart'); ?></td>
								<td class="table-img"><?php esc_html_e('4', 'online-grocery-mart'); ?></td>
								<td class="table-img"><?php esc_html_e('Unlimited', 'online-grocery-mart'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Template Pages', 'online-grocery-mart'); ?></td>
								<td class="table-img"><?php esc_html_e('3', 'online-grocery-mart'); ?></td>
								<td class="table-img"><?php esc_html_e('6', 'online-grocery-mart'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Home Page Template', 'online-grocery-mart'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'online-grocery-mart'); ?></td>
								<td class="table-img"><?php esc_html_e('1', 'online-grocery-mart'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Theme sections', 'online-grocery-mart'); ?></td>
								<td class="table-img"><?php esc_html_e('2', 'online-grocery-mart'); ?></td>
								<td class="table-img"><?php esc_html_e('16', 'online-grocery-mart'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Contact us Page Template', 'online-grocery-mart'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('1', 'online-grocery-mart'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Blog Templates & Layout', 'online-grocery-mart'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('3(Full width/Left/Right Sidebar)', 'online-grocery-mart'); ?></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Page Templates & Layout', 'online-grocery-mart'); ?></td>
								<td class="table-img">0</td>
								<td class="table-img"><?php esc_html_e('2(Left/Right Sidebar)', 'online-grocery-mart'); ?></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Color Pallete For Particular Sections', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Global Color Option', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Reordering', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Demo Importer', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Allow To Set Site Title, Tagline, Logo', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Enable Disable Options On All Sections, Logo', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Full Documentation', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Latest WordPress Compatibility', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Woo-Commerce Compatibility', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Support 3rd Party Plugins', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Secure and Optimized Code', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Exclusive Functionalities', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Section Enable / Disable', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Section Google Font Choices', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Gallery', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Simple & Mega Menu Option', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Support to add custom CSS / JS ', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Shortcodes', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Background, Colors, Header, Logo & Menu', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Premium Membership', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Budget Friendly Value', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('Priority Error Fixing', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Custom Feature Addition', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr class="odd">
								<td><?php esc_html_e('All Access Theme Pass', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td><?php esc_html_e('Seamless Customer Support', 'online-grocery-mart'); ?></td>
								<td class="table-img"><span class="dashicons dashicons-no"></span></td>
								<td class="table-img"><span class="dashicons dashicons-saved"></span></td>
							</tr>
							<tr>
								<td></td>
								<td class="table-img"></td>
								<td class="update-link"><a href="<?php echo esc_url( ONLINE_GROCERY_MART_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Upgrade to Pro', 'online-grocery-mart'); ?></a></td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div id="free_pro" class="tabcontent">
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-star-filled"></span><?php esc_html_e('Pro Version', 'online-grocery-mart'); ?></h4>
				<p> <?php esc_html_e('To gain access to extra theme options and more interesting features, upgrade to pro version.', 'online-grocery-mart'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( ONLINE_GROCERY_MART_BUY_NOW ); ?>" target="_blank"><?php esc_html_e('Get Pro', 'online-grocery-mart'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-cart"></span><?php esc_html_e('Pre-purchase Queries', 'online-grocery-mart'); ?></h4>
				<p> <?php esc_html_e('If you have any pre-sale query, we are prepared to resolve it.', 'online-grocery-mart'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( ONLINE_GROCERY_MART_CONTACT ); ?>" target="_blank"><?php esc_html_e('Question', 'online-grocery-mart'); ?></a>
				</div>
		  	</div>
		  	<div class="col-3">		  		
		  		<h4><span class="dashicons dashicons-admin-customizer"></span><?php esc_html_e('Child Theme', 'online-grocery-mart'); ?></h4>
				<p> <?php esc_html_e('For theme file customizations, make modifications in the child theme and not in the main theme file.', 'online-grocery-mart'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( ONLINE_GROCERY_MART_CHILD_THEME ); ?>" target="_blank"><?php esc_html_e('About Child Theme', 'online-grocery-mart'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-admin-comments"></span><?php esc_html_e('Frequently Asked Questions', 'online-grocery-mart'); ?></h4>
				<p> <?php esc_html_e('We have gathered top most, frequently asked questions and answered them for your easy understanding. We will list down more as we get new challenging queries. Check back often.', 'online-grocery-mart'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( ONLINE_GROCERY_MART_FAQ ); ?>" target="_blank"><?php esc_html_e('View FAQ','online-grocery-mart'); ?></a>
				</div>
		  	</div>

		  	<div class="col-3">
		  		<h4><span class="dashicons dashicons-sos"></span><?php esc_html_e('Support Queries', 'online-grocery-mart'); ?></h4>
				<p> <?php esc_html_e('If you have any queries after purchase, you can contact us. We are eveready to help you out.', 'online-grocery-mart'); ?></p>
				<div class="info-link">
					<a href="<?php echo esc_url( ONLINE_GROCERY_MART_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Contact Us', 'online-grocery-mart'); ?></a>
				</div>
		  	</div>
		</div>
	</div>
</div>
<?php } ?>