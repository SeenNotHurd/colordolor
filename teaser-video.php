<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

  <div class="teaser-surround has-thumbnail">
    <a class="featured-image fancy-video fitvids">
        <?php the_content(); ?>
    </a>


    <section class="entry-content clearfix" itemprop="articleBody">
      <header class="article-header">

        <h2 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h2>

      </header>

      <?php the_excerpt(); ?>

    </section> <!-- end article section -->
  </div>
</article> <!-- end article -->
