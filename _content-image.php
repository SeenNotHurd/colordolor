  <?php
    $custom_fields = get_post_custom();
    $galleryCaptions = isset($custom_fields['captions']) && ($custom_fields['captions'] == false) ? 'no-captions': 'captions';

  ?>
<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix ' . $galleryCaptions); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">

  <header class="article-header">

    <h1 class="entry-title single-title" itemprop="headline"><?php the_title(); ?></h1>
    <p class="byline vcard"><?php
      printf(__('Posted on <time class="updated" datetime="%1$s" pubdate>%2$s</time> by <span class="author">%3$s</span>', 'bonestheme'), get_the_time('Y-m-j'), get_the_time(get_option('date_format')), bones_get_the_author_posts_link(), get_the_category_list(', '));
    ?></p>

  </header> <!-- end article header -->

  <section class="entry-content clearfix" itemprop="articleBody">
    <?php the_content(); ?>
  </section> <!-- end article section -->

  <footer class="article-footer">
    <?php the_tags('<p class="tags"><span class="tags-title">' . __('Tags:', 'bonestheme') . '</span> ', ', ', '</p>'); ?>

  </footer> <!-- end article footer -->

</article> <!-- end article -->
