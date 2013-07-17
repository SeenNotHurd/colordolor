<!doctype html>

<!--[if lt IE 7]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9 lt-ie8"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html <?php language_attributes(); ?> class="no-js lt-ie9"><![endif]-->
<!--[if gt IE 8]><!--> <html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->

	<head>
		<meta charset="utf-8">

		<!-- Google Chrome Frame for IE -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

		<title><?php bloginfo('name'); ?> | <?php is_home() ? bloginfo('description') : wp_title(''); ?></title>

		<!-- mobile meta (hooray!) -->
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>

		<!-- icons & favicons (for more: http://www.jonathantneal.com/blog/understand-the-favicon/) -->
		<link rel="apple-touch-icon" href="<?php echo get_template_directory_uri(); ?>/library/images/apple-icon-touch.png">
		<link rel="icon" href="<?php echo get_template_directory_uri(); ?>/favicon.png">
		<!--[if IE]>
			<link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico">
		<![endif]-->
		<!-- or, set /favicon.ico for IE10 win -->
		<meta name="msapplication-TileColor" content="#f01d4f">
		<meta name="msapplication-TileImage" content="<?php echo get_template_directory_uri(); ?>/library/images/win8-tile-icon.png">

		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">

		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->

		<!-- drop Google Analytics Here -->
		<!-- end analytics -->

	</head>

	<body <?php body_class(); ?>>

		<div id="container">

			<header class="header" role="banner">

				<div id="inner-header" class="wrap clearfix">					

					<a href="<?php echo home_url(); ?>" rel="nofollow" id="logo"><img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png"></a>

					<div class="nav-social">

						<nav role="navigation">
							<?php bones_main_nav(); ?>
						</nav>

						<div class="social-header">
							<ul class="social-menu">
								<li><a href="http://www.facebook.com/ColorDolor" class="social facebook" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-header-facebook.png" class="icon" alt="Facebook" /></a></li>
								<li><a href="http://www.youtube.com/ColorDolor" class="social youtube" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-header-youtube.png" class="icon" alt="Youtube" /></a></li>
								<li><a href="http://www.twitter.com/ColorDolor" class="social twitter" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-header-twitter.png" class="icon" alt="Twitter" /></a></li>
								<li><a href="https://itunes.apple.com/fi/album/cuckoo-in-a-clock/id653279289?uo=4" target="itunes_store" class="itunes"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-header-itunes.png" alt="<?php if( strtotime('2013-06-14 09:00:00') > strtotime('now') ) { echo 'Pre-order from iTunes'; } else { echo 'Buy on iTunes'; } ?>" class="icon" /></a></li>
	    					<li><a href="spotify:artist:7kVCCcGxnqqdL40ZbyECO3" class="spotify"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-header-spotify.png" alt="Listen on Spotify" class="icon" /></a></li>
								<li><a href="http://www.soundcloud.com/Color-Dolor" class="social soundcloud" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-header-soundcloud.png" class="icon" alt="SoundCloud" /></a></li>
							</ul>
						</div>
					</div>
					
					<?php if(is_front_page() ): ?>

						<div id="header-photo" class="band-photo">
							<img src="<?php echo get_template_directory_uri(); ?>/library/images/color-dolor-photo.png">
						</div>

						<?php $header_query = new WP_Query('category_name=featured-video&posts_per_page=1&post_format=post-format-video'); ?>

						<?php while ($header_query->have_posts()) : $header_query->the_post(); ?>
						  
						  <div class="featured-video">
						  	<?php /*$header_query->*/the_content(); ?>
						  </div>

						<?php endwhile; ?>
					<?php else: ?>

					<h1 class="section-title">
					<?php 
						if(is_category()) { 
							$headerTitle = single_cat_title(); 
							// if($headerTitle == '') {
							//   echo 'Live Shows';
							// } else {
							// 	echo $headerTitle;
							// }
							
						} elseif(is_page() && !tribe_is_event()) {
							$headerTitle = get_the_title();
							if($headerTitle == '') {
							  echo 'Live Shows';
							} else {
								echo $headerTitle;
							}
							
						} elseif(is_single($post->ID) && !tribe_is_event()) {
							$category = get_the_category(); 
						  $headerTitle = $category[0]->cat_name;
							if($headerTitle == '') {
							  echo 'Live Shows';
							} else {
								echo $headerTitle;
							}
						} elseif(tribe_is_event() /*|| /*tribe_is_event() || tribe_is_list_view() /*empty($hasPosts)*/) {
						 	$headerTitle = 'Live Shows';
						 	echo $headerTitle;
						} 

							?>
						<?php

					?>
					</h1>

					<?php endif; ?>

				</div> <!-- end #inner-header -->

			</header> <!-- end header -->

			<?php if(!is_front_page()) {

				echo '<div id="background-surround">';

			} ?>

