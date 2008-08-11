<?php get_header(); ?>
			<div id="outer-column-container">
				<div id="inner-column-container">
					<div id="source-order-container">
						<div id="middle-column">
							<div class="inside">
	<?php if (have_posts()) : ?>
		<?php while (have_posts()) : the_post(); ?>
			<?php if (is_last_post()) {?><div class="post-last" id="post-<?php the_ID(); ?>"><?php } else { ?><div class="post" id="post-<?php the_ID(); ?>"><?php } ?>
				<!--<div class="calendar">
				<div class="calendar1"><?php the_time('M y') ?></div><div style="clear:left"></div>
				<div class="calendar2"><?php the_time('j') ?></div><div style="clear:left"></div>
				<div class="calendar3"><?php the_time('Y') ?></div><div style="clear:left"></div>
				</div>-->
				<!--<div class="vert1"><div class="vert2"><div class="vert3">--><h2 style="line-height: 1.2em;"><a href="<?php the_permalink() ?>" rel="bookmark" title="Permanent Link to <?php if (function_exists('the_title_attribute')) {the_title_attribute();} elseif (function_exists('the_title')) {the_title();} ?>"><?php the_title(); ?></a></h2><!--</div></div></div>-->
				<div style="clear: left;"></div><div class="entry">
					<?php the_content('More &raquo;'); ?>
				<p class="postmetadata"><?php the_time('F jS, Y') ?> <?php if ( function_exists('the_tags') && get_the_tags()) {the_tags('| Tags: ', ', ', ' ');} ?>| Category: <?php the_category(', ') ?> <?php if(function_exists('wp_print')) { echo " | "; print_link(); } ?> <?php if(function_exists('wp_email')) { echo " | "; email_link(); } ?><?php edit_post_link('Edit', ' | ', ''); ?> | <?php comments_popup_link('Leave a comment', 'Comments (1)', 'Comments (%)'); ?></p>				
				</div>
			</div>
		<?php endwhile; ?>

	<?php if(function_exists('wp_pagenavi')) { ?>
	<div class="wp-pagenavi-navigation">
	<?php wp_pagenavi(); ?> 
	</div>
	<?php } else { ?>
	<div class="navigation">
	<div class="older"><?php next_posts_link('&laquo; Older Entries'); ?></div>
	<div class="newer"><?php previous_posts_link('Newer Entries &raquo;'); ?></div>
	<div style="clear:both"></div>
	</div>
	<?php } ?>
	
	<?php else : ?>
		<h2 class="center">Not Found</h2>
		<p class="center">Sorry, but you are looking for something that isn't here.</p>
		<?php include (TEMPLATEPATH . "/searchform.php"); ?>
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