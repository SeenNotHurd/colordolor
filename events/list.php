<?php
/**
* The TEC template for a list of events. This includes the Past Events and Upcoming Events views 
* as well as those same views filtered to a specific category.
*
* You can customize this view by putting a replacement file of the same name (list.php) in the events/ directory of your theme.
*/

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }
?>
<div id="tribe-events-content" class="upcoming">

	<?php if(!tribe_is_day()): // day view doesn't have a grid ?>
		<!-- <div id='tribe-events-calendar-header' class="clearfix">
			<h2>See Color Dolor Live!</h2>
		</div>--><!--tribe-events-calendar-header-->
	<?php endif; ?>
	<div id="tribe-events-loop" class="tribe-events-events post-list clearfix">
		<?php if (have_posts()) : ?>
		<?php $hasPosts = true; $first = true; ?>
		<?php while ( have_posts()) : the_post(); ?>
			<?php //if(tribe_is_upcoming()) { ?>
				<?php global $more; $more = false; ?>
				<div id="post-<?php the_ID(); ?>" <?php post_class('tribe-events-event clearfix'); ?> itemscope itemtype="http://schema.org/Event">
					<!-- title -->
					<?php the_title('<span class="entry-title" itemprop="name"><a href="' . tribe_get_event_link() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></span>'); ?>
					<!-- date(s) of events -->
				  <?php if (tribe_is_multiday() || !tribe_get_all_day()): ?>
							<span class="tribe-events-event-meta-value start-date" itemprop="startDate" content="<?php echo tribe_get_start_date(); ?>"><?php echo tribe_get_start_date( get_the_ID(), false, 'j M Y'); ?></span>
						<?php else: ?>
							<span class="tribe-events-event-meta-value start-date" itemprop="startDate" content="<?php echo tribe_get_start_date(); ?>"><?php echo tribe_get_start_date( get_the_ID(), false, 'j M Y'); ?></span> until 
							<span class="tribe-events-event-meta-value end-date" itemprop="endDate" content="<?php echo tribe_get_end_date(); ?>"><?php echo tribe_get_end_date( get_the_ID(), false, 'j M Y'); ?></span>
					<?php endif; ?>
					<!-- venue -->
					<div class="tribe-events-event-meta-value venue-name" itemprop="name">
						<?php if( class_exists( 'TribeEventsPro' ) ): ?>
							<?php tribe_get_venue_link( get_the_ID(), class_exists( 'TribeEventsPro' ) ); ?>
						<?php else: ?>
							<?php echo tribe_get_venue( get_the_ID() ); ?>
						<?php endif; ?>
					</div>
					<!--  city  -->
					<?php if (tribe_address_exists( get_the_ID() ) ) : ?>
						<div class="tribe-events-event-meta-value venue-city"><?php echo tribe_get_city( get_the_ID() ); ?></div>
					<?php endif; ?>
				</div> <!-- End post -->
			<?php //} ?>
		<?php endwhile;// posts ?>
	<?php else :?>
		<div class="tribe-events-no-entry">
			<?php 
				$tribe_ecp = TribeEvents::instance();
				if ( is_tax( $tribe_ecp->get_event_taxonomy() ) ) {
					$cat = get_term_by( 'slug', get_query_var('term'), $tribe_ecp->get_event_taxonomy() );
					if( tribe_is_upcoming() ) {
						$is_cat_message = sprintf(__(' listed under %s. Check out past events for this category or view the full calendar.','tribe-events-calendar'),$cat->name);
					} else if( tribe_is_past() ) {
						$is_cat_message = sprintf(__(' listed under %s. Check out upcoming events for this category or view the full calendar.','tribe-events-calendar'),$cat->name);
					}
				} 
			?>
			<?php if(tribe_is_day()): ?>
				<?php printf( __('No events scheduled for <strong>%s</strong>. Please try another day.', 'tribe-events-calendar'), date_i18n('F d, Y', strtotime(get_query_var('eventDate')))); ?>
			<?php endif; ?>
			<?php if(tribe_is_upcoming()) { ?>
			<div class="no-events-available">
				<?php
					_e('No upcoming shows at the moment, check out some of our past shows below:', 'tribe-events-calendar');
					echo !empty($is_cat_message) ? $is_cat_message : ""; 
					?>
			</div>
					<?php
				    global $post;
			      $all_events = tribe_get_events(array(
			        'eventDisplay'=>'past',
			        'posts_per_page'=>10
			      ));
			       
			      foreach($all_events as $post) {
			      setup_postdata($post);
				  ?>

				    <div id="post-<?php the_ID(); ?>" <?php post_class('tribe-events-event clearfix'); ?> itemscope itemtype="http://schema.org/Event">
							<!-- title -->
							<?php the_title('<span class="entry-title" itemprop="name"><a href="' . tribe_get_event_link() . '" title="' . the_title_attribute('echo=0') . '" rel="bookmark">', '</a></span>'); ?>
							<!-- date(s) of events -->
						  <?php if (tribe_is_multiday() || !tribe_get_all_day()): ?>
									<span class="tribe-events-event-meta-value start-date" itemprop="startDate" content="<?php echo tribe_get_start_date(); ?>"><?php echo tribe_get_start_date( get_the_ID(), false, 'j M Y'); ?></span>
								<?php else: ?>
									<span class="tribe-events-event-meta-value start-date" itemprop="startDate" content="<?php echo tribe_get_start_date(); ?>"><?php echo tribe_get_start_date( get_the_ID(), false, 'j M Y'); ?></span> until 
									<span class="tribe-events-event-meta-value end-date" itemprop="endDate" content="<?php echo tribe_get_end_date(); ?>"><?php echo tribe_get_end_date( get_the_ID(), false, 'j M Y'); ?></span>
							<?php endif; ?>
							<!-- venue -->
							<div class="tribe-events-event-meta-value venue-name" itemprop="name">
								<?php if( class_exists( 'TribeEventsPro' ) ): ?>
									<?php tribe_get_venue_link( get_the_ID(), class_exists( 'TribeEventsPro' ) ); ?>
								<?php else: ?>
									<img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-footer-maps.png" class="event-icon" alt="Venue"/><?php echo tribe_get_venue( get_the_ID() ); ?>
								<?php endif; ?>
							</div>
							<!--  city  -->
							<?php if (tribe_address_exists( get_the_ID() ) ) : ?>
								<div class="tribe-events-event-meta-value venue-city"><?php echo tribe_get_city( get_the_ID() ); ?></div>
							<?php endif; ?>
						</div> <!-- End post -->
					<?php } //endforeach ?>
    		<?php wp_reset_query(); ?>

			<?php } elseif(tribe_is_past()) { ?>
				<?php 
					_e('No previous events' , 'tribe-events-calendar');
					echo !empty($is_cat_message) ? $is_cat_message : "."; 
				?>
			<?php } ?>
		</div>
	<?php endif; ?>
</div><!-- #tribe-events-loop -->
<div id="tribe-events-nav-below" class="tribe-events-nav clearfix">
	<div class="tribe-events-nav-previous"><?php 
		// Display Previous Page Navigation
		if( tribe_is_upcoming() && get_previous_posts_link() ) : ?>
			<?php previous_posts_link( '<span>'.__('&laquo; Earlier Shows', 'tribe-events-calendar').'</span>' ); ?>
		<?php elseif( tribe_is_upcoming() && !get_previous_posts_link( ) ) : ?>
			<a href='<?php echo tribe_get_past_link(); ?>'><span><?php _e('&laquo; Earlier Shows', 'tribe-events-calendar' ); ?></span></a>
		<?php elseif( tribe_is_past() && get_next_posts_link( ) ) : ?>
			<?php next_posts_link( '<span>'.__('&laquo; Earlier Shows', 'tribe-events-calendar').'</span>' ); ?>
		<?php endif; ?>
		</div>

		<div class="tribe-events-nav-next"><?php
		// Display Next Page Navigation
		if( tribe_is_upcoming() && get_next_posts_link( ) ) : ?>
			<?php next_posts_link( '<span>'.__('Later Shows &raquo;', 'tribe-events-calendar').'</span>' ); ?>
		<?php elseif( tribe_is_past() && get_previous_posts_link( ) ) : ?>
			<?php previous_posts_link( '<span>'.__('Later Shows &raquo;', 'tribe-events-calendar').'</span>' ); // a little confusing but in 'past view' to see newer events you want the previous page ?>
		<?php elseif( tribe_is_past() && !get_previous_posts_link( ) ) : ?>
			<a href='<?php echo tribe_get_upcoming_link(); ?>'><span><?php _e('Later Shows &raquo;', 'tribe-events-calendar'); ?></span></a>
		<?php endif; ?>
		</div>
	<?php if ( !empty($hasPosts) && function_exists('tribe_get_ical_link') ): ?>
		<a title="<?php esc_attr_e('iCal Import', 'tribe-events-calendar'); ?>" class="ical" href="<?php echo tribe_get_ical_link(); ?>"><?php _e('iCal Import', 'tribe-events-calendar'); ?></a>
	<?php endif; ?>
</div>
