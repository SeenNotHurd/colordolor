<?php
/**
* A single event.  This displays the event title, description, meta, and 
* optionally, the Google map for the event.
*
* You can customize this view by putting a replacement file of the same name (single.php) in the events/ directory of your theme.
*/

// Don't load directly
if ( !defined('ABSPATH') ) { die('-1'); }
?>
<!-- sets 'has passed' variable -->
<?php
  $gmt_offset = (get_option('gmt_offset') >= '0' ) ? ' +' . get_option('gmt_offset') : " " . get_option('gmt_offset');
  $gmt_offset = str_replace( array( '.25', '.5', '.75' ), array( ':15', ':30', ':45' ), $gmt_offset );
  // Change this to set 'if passed' as variable for later use.
  if (strtotime( tribe_get_end_date(get_the_ID(), false, 'Y-m-d G:i') . $gmt_offset ) <= time() ) { $eventPassed = true;} else { $eventPassed = false ;}
?>

<!-- First the title -->
<h2 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h2>
<!-- back link to pages -->
<span class="back"><a href="<?php echo tribe_get_events_link(); ?>"><?php _e('&laquo; Back to Events', 'tribe-events-calendar'); ?></a></span>        

<!-- Featured image if set -->

<?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { 
  $feat_image = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
  <div class="featured-image" style="background-image: url('<?php echo $feat_image; ?>');" >
  </div>
<?php } ?>


<!-- put date/time here -->
<div id="tribe-events-event-meta" itemscope itemtype="http://schema.org/Event">
  <div class="dates">
    <span class="info-span">
    <img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/icon-time.png" class="event-icon" alt="Time"/>
    <?php if (tribe_get_start_date() !== tribe_get_end_date() ) { ?>
      <span class="event-meta event-meta-start"><meta itemprop="startDate" content="<?php echo tribe_get_start_date( null, true, 'Y-m-d-h:i:s' ); ?>"/><?php echo tribe_get_start_date(get_the_ID(),true, 'j M Y'); ?></span>
      <span> until </span>
      <span class="event-meta event-meta-end"><meta itemprop="endDate" content="<?php echo tribe_get_end_date( null, true, 'Y-m-d-h:i:s' ); ?>"/><?php echo tribe_get_end_date(get_the_ID(),true, 'j M Y'); ?></span>            
    </span>
    <?php } else { ?>
      <span class="event-meta event-meta-start"><meta itemprop="startDate" content="<?php echo tribe_get_start_date( null, true, 'Y-m-d-h:i:s' ); ?>"/><?php echo tribe_get_start_date(get_the_ID(),true, 'j M Y'); ?></span>
    </span>
    <?php } ?>
    <?php if(tribe_get_venue()) : ?>
    <span itemprop="name" class="event-meta event-meta-venue info-span">
        <img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-footer-maps.png" class="event-icon" alt="Venue"/><?php echo tribe_get_venue( get_the_ID() ) . ', ' . tribe_get_city(); ?>
    </span>
    <?php endif; ?>
    
    <!-- ical link -->
    <?php if( function_exists('tribe_get_single_ical_link') ): ?>
     <a class="ical single" href="<?php echo tribe_get_single_ical_link(); ?>"><?php _e('iCal Import', 'tribe-events-calendar'); ?></a>
    <?php endif; ?>
    <!-- gcal link -->
    <?php if( function_exists('tribe_get_gcal_link') ): ?>
       <a href="<?php echo tribe_get_gcal_link(); ?>" class="gcal-add" title="<?php _e('Add to Google Calendar', 'tribe-events-calendar'); ?>"><?php _e('+ Google Calendar', 'tribe-events-calendar'); ?></a>
    <?php endif; ?>
  </div>

  <!-- address to get tickets from, from custom field 'Tickets' -->
  <?php
    $custom_fields = get_post_custom();
    $ticketUrl = isset($custom_fields['tickets']) ? $custom_fields['tickets']: false;
    $facebookURL = isset($custom_fields['facebook']) ? $custom_fields['facebook']: false; 
  ?>
  <?php if(!($eventPassed)) { ?>
  <?php if(!empty($ticketURL) || tribe_get_cost() || !empty($facebookURL)) { ?>
  <div class="tickets-facebook">

    <?php if(!($eventPassed)) { ?>
      <?php if(!empty($ticketUrl) || tribe_get_cost()) { ?>
        <span class="info-span">
          <img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/icon-ticket.png" class="event-icon" alt="Tickets"/>
        <?php } ?>
    
        <?php if ( tribe_get_cost() ) : ?>
          <span itemprop="price" class="event-meta event-meta-cost"><?php echo tribe_get_cost(); ?> €</span>
        <?php endif; ?>
        <?php if (!empty($ticketUrl) ) { ?>
          <a href="<?php echo $ticketUrl[0]; ?>">Get tickets ></a>
        <?php } ?>
        <?php if(!empty($ticketUrl) || tribe_get_cost()) { ?>
          </span>
        <?php } ?>

        <!-- On facebook link -->

        <?php if (!empty($facebookURL)) { ?>
        <span class="info-span">
          <img src="<?php echo get_template_directory_uri(); ?>/library/images/social-icons/social-footer-facebook.png" class="event-icon" alt="Facebook Event"/><a href="<?php $facebookURL[0]; ?>" class="facebook-event-link"><?php echo $eventPassed ? 'See the Facebook Event' : 'Join the Facebook Event'; ?> ></a>
        </span>
        <?php } ?>
      </div>
      <?php } ?>
    <?php } ?>
  <?php } ?>

  <!-- event summary -->
  <div class="entry-content">
    <div class="summary"><?php the_content(); ?></div>
  </div>

  <!-- map -->
  <?php if( tribe_embed_google_map( get_the_ID() ) ) : ?>
  <?php if( tribe_address_exists( get_the_ID() ) ) { echo tribe_get_embedded_map(); } ?>
  <?php else: ?>
    <div class="event-meta event-meta-address">
      <?php echo tribe_get_full_address( get_the_ID() ); ?>
    </div>
  <?php endif; ?>

<div style="clear:both"></div>
