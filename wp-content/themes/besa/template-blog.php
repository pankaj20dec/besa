<?php
/*
Template Name: Blog
*/
get_header(); ?>
<?php
while ( have_posts() ) : the_post();
	//$subHeading = get_post_meta($post->ID, "smoke_custom_sub_heading", true);
	?>
	<div class="container">
		<div class="listing-page common-space">
			<div class="blog-listing">
			<?php
				$perPage = get_option( 'posts_per_page' );
				$paged = ( get_query_var('paged') ? get_query_var('paged') : 1);

				$args = array(
				'posts_per_page' => $perPage,
				'orderby' => 'post_date',
				'order' => 'DESC',
				'post_type' => 'post',
				'paged' => $paged );
				$the_query = new WP_Query( $args ); 

				if ( $the_query->have_posts() ) :
					$i 	= 1;
					while ( $the_query->have_posts() ) : $the_query->the_post();
						$image = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'post-img-archive' );
						?>
				<div class="blog-container <?php if($i%2 == 0){ echo "even";}else{ echo "odd";}?>">
					<div class="row clearfix">
						<div class="col-md-6">
						<?php if($i%2 == 0){?>
							<div class="blog-descripton">
								<div class="blog-content">
									<?php the_content();?>
								</div>
								<a href="<?php echo the_permalink();?>" target="_blank" class="link-button">Read More...</a>
							</div>
						<?php }else{?>
							<div class="blog-image">
								<img src="<?php echo $image[0];?>" alt="<?php the_title();?>" />
								<div class="blog-details">
									<h3 class="blog-date"> <?php echo get_the_date("d/m/y"); ?></h3>
									<p><?php the_title();?></p>
								</div>
							</div>
						<?php } ?>
						</div>
						<div class="col-md-6">
							<?php if($i%2 == 0){?>
							
							<div class="blog-image">
								<img src="<?php echo $image[0];?>" alt="<?php the_title();?>" />
								<div class="blog-details">
									<h3 class="blog-date"> <?php echo get_the_date("d/m/y"); ?></h3>
									<p><?php the_title();?></p>
								</div>
							</div>
						<?php }else{?>
							<div class="blog-descripton">
								<div class="blog-content">
									<?php the_content();?>
								</div>
								<a href="<?php echo the_permalink();?>" target="_blank" class="link-button">Read More...</a>
							</div>
						<?php } ?>
						</div>
					</div>
				</div>
				<?php $i++; endwhile;	
					wp_reset_postdata();
					else:
						?>
						<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
						<?php
					endif; ?>
			</div>
			<div class="more-posts">
				<i aria-hidden="true" style="display:none;" class="fa fa-spinner fa-spin loader_product"></i>
				<a href="javascript:void(0);" id="more_posts" class="link-button">More posts >></a>
				<span style="display:none;" class="no_more">no more posts</span>
			</div>
		</div>
	</div>
	<?php
endwhile;
if (function_exists("pagination")) {
		pagination($the_query->max_num_pages);
	} 
?>
<?php get_footer(); ?>