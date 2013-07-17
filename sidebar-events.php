				<div id="sidebar1" class="sidebar fourcol last clearfix" role="complementary">

          <?php
            $gmt_offset = (get_option('gmt_offset') >= '0' ) ? ' +' . get_option('gmt_offset') : " " . get_option('gmt_offset');
            $gmt_offset = str_replace( array( '.25', '.5', '.75' ), array( ':15', ':30', ':45' ), $gmt_offset );
            // Change this to set 'if passed' as variable for later use.
            if (strtotime( tribe_get_end_date(get_the_ID(), false, 'Y-m-d G:i') . $gmt_offset ) <= time() ) { $eventPassed = true;} else { $eventPassed = false ;}
          ?>

					<!-- Calendar block  -->

          <?php include(TEMPLATEPATH . '/sidebar-widgets/widget-event-calendar.php'); ?>
    
          <!-- List of past events -->
          <?php
              //$count = $post->post_count;
              if(!$eventPassed) {
                include(TEMPLATEPATH . '/sidebar-widgets/widget-past-shows.php');
              } else if($eventPassed) { 
                include(TEMPLATEPATH . '/sidebar-widgets/widget-upcoming-shows.php');
              }
          ?>

						<!-- This content shows up if there are no widgets defined in the backend. -->



				</div>