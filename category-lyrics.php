<?php
/*
This is the custom post type taxonomy template.
If you edit the custom taxonomy name, you've got
to change the name of this template to
reflect that name change.

i.e. if your custom taxonomy is called
register_taxonomy( 'shoes',
then your single template should be
taxonomy-shoes.php

*/
?>

<?php get_header(); ?>

			<div id="content">

				<div id="inner-content" class="wrap clearfix">

						<div id="main" class="eightcol first clearfix" role="main">


							<!-- List of songs in Lyrics Category -->
								<div class="category-description">
									<?php echo category_description(  ); ?>
								</div>

							<div class="song-list">
								<h2><?php echo __('Songs'); ?></h2>
								<?php query_posts('category_name=lyrics&posts_per_page=20'); ?>
										<ul class="lyrics-menu">
										<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
											<li><a href="#post-<?php the_ID(); ?>"><?php the_title(); ?></a></li>
										<?php endwhile; ?>
										</ul>
								<?php endif; ?>
							</div>

							<div class="song-lyrics">

								<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

								<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">

									<header class="article-header">

										<h2 class="h2"><?php the_title(); ?></h2>
										<p class="byline vcard">
										<?php

										  $custom_fields = get_post_custom();
										  $lyricsBy = $custom_fields['Lyrics'];
										  echo 'Lyrics by '. $lyricsBy[0];

											?>
										</p>

									</header> <!-- end article header -->

									<section class="entry-content">
										<?php the_content(); ?>

									</section> <!-- end article section -->

									<footer class="article-footer">

									</footer> <!-- end article footer -->

								</article> <!-- end article -->

								<?php endwhile; ?>

										<?php if (function_exists('bones_page_navi')) { ?>
												<?php bones_page_navi(); ?>
										<?php } else { ?>
												<nav class="wp-prev-next">
														<ul class="clearfix">
															<li class="prev-link"><?php next_posts_link(__('&laquo; Older Entries', "bonestheme")) ?></li>
															<li class="next-link"><?php previous_posts_link(__('Newer Entries &raquo;', "bonestheme")) ?></li>
														</ul>
												</nav>
										<?php } ?>

								<?php else : ?>

										<article id="post-not-found" class="hentry clearfix">
											<header class="article-header">
												<h1><?php _e("Oops, Post Not Found!", "bonestheme"); ?></h1>
											</header>
											<section class="entry-content">
												<p><?php _e("Uh Oh. Something is missing. Try double checking things.", "bonestheme"); ?></p>
											</section>
											<footer class="article-footer">
													<p><?php //_e("This is the error message in the taxonomy-custom_cat.php template.", "bonestheme"); ?></p>
											</footer>
										</article>

								<?php endif; ?>

							</div> <!-- end song section -->

						</div> <!-- end #main -->

						<?php include(TEMPLATEPATH . '/sidebar-lyrics.php'); ?>

				</div> <!-- end #inner-content -->

			</div> <!-- end #content -->

<?php get_footer(); ?>
