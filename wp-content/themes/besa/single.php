<?php get_header(); ?>
<div class="blog-detail-page">
	<div class="container">
		<div class="row clearfix">
			<div class="col-md-6 centered">
				<div class="blog-title-container">
					<?php $triumph = new WP_Query("pagename=blog"); 
					while($triumph->have_posts()) : $triumph->the_post();?>
					<h2><?php the_title(); ?></h2>
					<div class="blog-sub-content">
						<?php the_content(); ?>
					</div>
					<?php endwhile; ?>
				</div>
			</div>
		</div>
	</div>
	<div class="container">
		<div id="content" class="row clearfix">
			<div id="main" class="col-sm-10 centered" role="main">
				<div class="single-container">
				<?php if (have_posts()) : while (have_posts()) : the_post(); ?>	
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						<div class="featured-image">
							<?php the_post_thumbnail( 'wpbs-featured' ); ?>
							<div class="blog-details">
								<h3 class="blog-date"> <?php echo get_the_date("d/m/y"); ?></h3>
								<p><?php the_title();?></p>
							</div>
						</div>
						<div class="single-post_content">
							<?php the_content(); ?>
							<div class="post-info">
								<?php twentysixteen_entry_meta2();?>
								<ul class="single-tags">
									<?php
									$tags_list = get_the_tag_list('', _x('', 'Used between list items, there is a space after the comma.', 'skandi'));
									if ($tags_list) {
										printf('<li>%1$s</li>', $tags_list);
									}?>
								</ul>
								<?php social_sharing_buttons();?>
							</div>
							<?php wp_link_pages(); ?>
						</div> 
							<div class="back-to-blog"><a href="/" class="back-blog link-button"><< Back to Blog</a></div>
					
					</article> <!-- end article -->
					
						<?php comments_template('',true); ?>
					
					<?php endwhile; ?>			
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "wpbootstrap"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "wpbootstrap"); ?></p>
					    </section>
					    <footer>
					    </footer>
					</article>
					
					<?php endif; ?>
				</div>
			</div>
		</div> 
	</div>
</div>	
<?php get_footer(); ?>