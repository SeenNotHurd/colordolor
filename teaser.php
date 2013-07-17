<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix teaser'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

  <div class="teaser-surround <?php if ( has_post_thumbnail() ) {echo 'has-thumbnail';} ?>">
  <?php if ( function_exists('has_post_thumbnail') && has_post_thumbnail() ) { 
    $feat_image = wp_get_attachment_url( get_post_thumbnail_id() ); ?>
    <a href="<?php the_permalink() ?>" class="read-more" rel="bookmark" title="<?php the_title_attribute(); ?>">
      <div class="featured-image" style="background-image: url('<?php echo $feat_image; ?>');" >
      </div>
    </a>
  <?php } ?>

  <section class="entry-content clearfix" itemprop="articleBody">


    <header class="article-header">

      <a href="<?php the_permalink() ?>"><h2 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h2></a>

      <p class="byline vcard"><?php
      printf(__('Posted on <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
    ?></p>

    </header> <!-- end article header -->

    <?php the_excerpt(); ?>

  </section> <!-- end article section -->

  <footer class="article-footer">
    <a href="<?php the_permalink() ?>" class="read-more" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo __('Read More &raquo'); ?></a>
  </footer> <!-- end article footer -->
</div>

</article> <!-- end article -->
