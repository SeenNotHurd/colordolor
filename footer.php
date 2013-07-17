<?php if(!is_front_page()) { //shows only header for front page. Probably a better way to do this but this work with the existing way the theme was written . TH 2013-06-08 ?>		
			</div> <!-- end .background-surround -->

			<footer class="footer" role="contentinfo">

				<div id="inner-footer" class="wrap clearfix">

					<!-- <nav role="navigation">
							<?php //bones_footer_links(); ?>
									</nav> -->
					<div class="logo">
						<img src="<?php echo get_template_directory_uri(); ?>/library/images/logo.png" alt="Color Dolor" />
					</div>

					<div class="contact">
						<h4>contact us</h4>
						<p>General: colordolor ( at ) gmail.com</p>

						<p>Booking Finland: lotta ( at ) kaihobooking.com</br> 050 413 0094<br/>
						Booking International: jan ( at ) solotuotanto.com</br> +358 40 562 2609<br/>
						Press: hannaleena.ehn ( at ) gmail.com<br/> +358 40 550 5036<br/>
						Label: Konkurssi Records<br/>
						info ( at ) konkurssirecords.fi<br/>
						<a href="http://www.konkurssirecords.fi">Konkurssirecords.fi</a></p>

						<p>
							<a href="http://colordolor.com/media">High quality pictures</a>&nbsp;Photos by Antti Saarainen and Sofia Okkonen<br>
							<a title="Tech &amp; Hospitality Rider" href="http://colordolor.com/rider/color%20dolor%20rider.pdf">Tech &amp; Hospitality Rider</a>
						</p>

						<p>Credits:<br/> Graphic Design: Tuomas Saikkonen<br />
							Website: <a href="http://www.seennothurd.com/" target="_blank">Seen Not Hurd</a></p>

							<p class="source-org copyright">&copy; <?php echo date('Y'); ?> <?php bloginfo('name'); ?>.</p>
					</div>

					<div class="social">
						<h4>hear and see<br />Color Dolor</h4>
						<?php //wp_nav_menu( array( 'theme_location' => 'footer-social-menu' ) ); ONLY USE IF :BEFORE isn't an issue for images. ?>
						<!-- in the mean time use this: -->
						<ul class="footer-nav">
							<li><a href="http://www.facebook.com/ColorDolor" class="facebook" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-footer-facebook.png" alt="Facebook" class="footer-icon" />fb.com/ColorDolor</a></li>
							<li><a href="http://www.youtube.com/ColorDolor" class="youtube" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-footer-youtube.png" alt="Youtube" class="footer-icon" />youtube.com/ColorDolor</a></li>
							<li><a href="http://www.twitter.com/ColorDolor" class="twitter" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-footer-twitter.png" alt="Twitter" class="footer-icon" />twitter.com/ColorDolor</a></li>
							<li><a href="http://www.soundcloud.com/Color-Dolor" class="soundcloud" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-footer-soundcloud.png" alt="logo" class="footer-icon" />soundcloud.com/Color-Dolor</a></li>
						</ul>
						<!-- search bar -->
						<form method="get" id="searchform" action="<?php bloginfo('url'); ?>/">
							<div><input type="text" size="18" value="<?php echo esc_html($s, 1); ?>" name="s" id="s" />
							<input type="submit" id="searchsubmit" value="Search" class="btn" />
							</div>
						</form>
					</div>

					<div class="album">
						<h4>debut album<br />Cuckoo in a Clock</h4>
						<?php //wp_nav_menu( array( 'theme_location' => 'footer-album-menu' ) ); ONLY USE IF :BEFORE isn't an issue for images. ?>
						<ul class="footer-nav">
							<li><a href="http://www.recordshopx.com/artist/color_dolor/cuckoo_in_a_clock/" class="store" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-footer-cd.png" alt="Buy Online" class="footer-icon" /><?php if( strtotime('2013-06-14 09:00:00') > strtotime('now') ) { echo 'Pre-order Online'; } else { echo 'Buy Online'; } ?></a></li>
							<li><a href="https://itunes.apple.com/fi/artist/color-dolor/id596809781?uo=4" class="itunes" target="itunes_store"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-footer-itunes.png" alt="Buy on iTunes" class="footer-icon" /><?php if( strtotime('2013-06-14 09:00:00') > strtotime('now') ) { echo 'Pre-order from iTunes'; } else { echo 'Buy on iTunes'; } ?></a></li>
							<li><a href="spotify:artist:7kVCCcGxnqqdL40ZbyECO3" class="spotify" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-footer-spotify.png" alt="Listen on Spotify" class="footer-icon" />Listen on Spotify</a></li>
						</ul>
					</div>

					<div class="graphic">
						<img src="<?php echo get_template_directory_uri(); ?>/library/images/social-footer-map.png" class="graphical-element" alt="Color Dolor" />
					</div>


				</div> <!-- end #inner-footer -->

			</footer> <!-- end footer -->

		</div> <!-- end #container -->
	<?php } ?>

		<!-- all js scripts are loaded in library/bones.php -->
		<?php wp_footer(); ?>

	</body>

</html> <!-- end page. what a ride! -->
