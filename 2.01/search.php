<?php get_header(); ?>
			<div id="outer-column-container">
				<div id="inner-column-container">
					<div id="source-order-container">
						<div id="middle-column">
							<div class="inside">
	<?php if (have_posts()) : ?>
		<h2 class="pagetitle"><span style="color: #666666">Search Results for "</span><?php the_search_query(); ?><span style="color: #666666">":</span></h2>
<?php if (function_exists('show_posts_nav') && show_posts_nav()) : ?>
		<div class="navigation">
				<div class='older'><?php next_posts_link('&laquo; Older Entries'); ?></div>
				<div class='newer'><?php previous_posts_link('Newer Entries &raquo;'); ?></div>
		</div>
<?php endif; ?><div style="clear: both"></div><div class="line1pix"></div>
		<?php while (have_posts()) : the_post(); ?>
			<?php if (is_last_post()) {?><div class="post-last"><?php } else { ?><div class="post"><?php } ?>
				<!--<div class="calendar">
				<div class="calendar1"><?php the_time('M') ?></div><div style="clear:left"></div>
				<div class="calendar2"><?php the_time('j') ?></div><div style="clear:left"></div>
				<div class="calendar3"><?php the_time('Y') ?></div><div style="clear:left"></div>
				</div>
				<div class="vert1"><div class="vert2"><div class="vert3">--><h2 style="line-height: 1.2em;" id="post-<?php the_ID(); ?>"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php if (function_exists('the_title_attribute')) {the_title_attribute();} elseif (function_exists('the_title')) {the_title();} ?>"><?php the_title(); ?></a></h2><!--</div></div></div>-->
				<div style="clear: left;"></div><div class="entry">
 					   <?php the_excerpt(); ?>
				<p class="postmetadata">Posted on <?php the_time('F jS, Y') ?> under <?php the_category(', ') ?>. <?php if ( function_exists('the_tags') ) {the_tags('Tags: ', ', ', '. ');} ?><?php edit_post_link('Edit', '', '. '); ?><?php comments_popup_link('Comments: None', 'Comments: 1', 'Comments: %'); ?></p>
				</div>
			</div>
		<?php endwhile; ?>
<?php if (function_exists('show_posts_nav') && show_posts_nav()) : ?>
		<div class="navigation">
				<div class='older'><?php next_posts_link('&laquo; Older Entries'); ?></div>
				<div class='newer'><?php previous_posts_link('Newer Entries &raquo;'); ?></div>
		</div>
<?php endif; ?>
	<?php else : ?>
		<h2 class="center">No posts found. Try a different search?</h2>
		<?php include (TEMPLATEPATH . '/searchform.php'); ?>
	<?php endif; ?>
							</div>
						</div>
						<div id="left-column">
							<div class="inside">
<?php get_sidebar(); ?>
							</div>
						</div>
						<div class="clear-columns"><!-- do not delete --></div>
					</div>
					<div id="right-column">
						<div class="inside">
<?php include ('sidebar2.php'); ?>
						</div>
					</div>
					<div class="clear-columns"><!-- do not delete --></div>
				</div>
			</div>
<?php get_footer(); ?>