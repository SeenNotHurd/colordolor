<?php
  global $post;
  $all_events = tribe_get_events(array(
    'eventDisplay'=>'upcoming',
    'posts_per_page'=>5
  ));
  if(!empty($all_events)) { 
?>
<div id="events-upcoming" class="widget widget-events-upcoming">    
  <h3 class="widgettitle">See Color Dolor Live!</h3>
  <ul class="future-shows event-list">
  
    <?php
      foreach($all_events as $post) {
      setup_postdata($post);
    ?>

    <li>
      <a href="<?php the_permalink(); ?>">
        <h4><?php the_title(); ?></h4></a>
        <span class="event-date">
          <?php echo tribe_get_start_date($post->ID, true, 'j M Y'); ?> <?php if(tribe_has_Venue()) { echo 'at'; } ?> <?php echo tribe_get_venue($post->ID); ?>
        </span>
         
    </li>

    <?php } //endforeach ?>
    <?php wp_reset_query(); ?>
  </ul>
  <?php if(!empty($all_events)) { ?>
    <div class="tribe-events-nav-next">
      <!--  Display Next Page Navigation -->
      <a href='<?php echo tribe_get_upcoming_link(); ?>'><span><?php _e('all upcoming shows >', 'tribe-events-calendar'); ?></span></a>
    </div>
  <?php } ?>
</div>
<?php }?>