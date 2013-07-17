<div id="debut-album" class="widget widget-debut-album">    
  <h3 class="widgettitle">debut album <br/>Cuckoo in a Clock</h3> 
  <?php //wp_nav_menu( array( 'theme_location' => 'footer-album-menu' ) ); /*ONLY USE IF :BEFORE isn't an issue for images.*/ ?>
  <ul class="lyric-menu">
    <li><a href="http://www.recordshopx.com/artist/color_dolor/cuckoo_in_a_clock/" class="store" target="_blank"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-header-cd.png" alt="Buy Online" class="header-icon" /><?php if( strtotime('2013-06-14 09:00:00') > strtotime('now') ) { echo 'Pre-order Online'; } else { echo 'Buy Online'; } ?></a></li>
    <li><a href="https://itunes.apple.com/fi/album/cuckoo-in-a-clock/id653279289?uo=4" target="itunes_store" class="itunes"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-header-itunes.png" alt="Get from iTunes" class="header-icon" /><?php if( strtotime('2013-06-14 09:00:00') > strtotime('now') ) { echo 'Pre-order from iTunes'; } else { echo 'Buy on iTunes'; } ?></a></li>
    <li><a href="spotify:artist:7kVCCcGxnqqdL40ZbyECO3" class="spotify"><img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-header-spotify.png" alt="Listen on Spotify" class="header-icon" />Listen on Spotify</a></li>
  </ul>
</div>