<?php
  $custom_fields = get_post_custom();
  $galleryCaptions = isset($custom_fields['captions']) ? 'no-captions': 'captions';
?> 

<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix ' . $galleryCaptions); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

  <div class="teaser-surround ">

    <section class="entry-content clearfix <?php if ( has_post_thumbnail() ) {echo 'has-thumbnail';} ?>" itemprop="articleBody">

      <header class="article-header">

        <a href="<?php the_permalink() ?>"><h2 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h2></a>

      </header> <!-- end article header -->

      <?php the_content(); ?>

    </section> <!-- end article section -->

    <footer class="article-footer">
      <a href="<?php the_permalink() ?>" class="read-more" rel="bookmark" title="<?php the_title_attribute(); ?>"><?php echo __('See more photos &raquo'); ?></a>
    </footer> <!-- end article footer -->
  </div>

</article> <!-- end article -->
