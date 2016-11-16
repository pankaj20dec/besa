<?php
/*
Template Name: Homepage
*/
?>

<?php get_header(); ?>
			
			<div id="content" class="clearfix row">
			
				<div id="main" class="col-sm-12 clearfix" role="main">

					<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article">
					
						<header>

							<?php 
								$post_thumbnail_id = get_post_thumbnail_id();
								$featured_src = wp_get_attachment_image_src( $post_thumbnail_id, 'wpbs-featured-home' );
							?>

							<div class="jumbotron row">
				
								<div class="page-header">
									<img src="<?php echo $featured_src[0]; ?>" alt="featured-image"/>
									<h1><?php echo get_post_meta($post->ID, 'custom_tagline' , true);?></h1>
								</div>				
								
							</div>
						
						</header>
						
						<section class="row post_content">
							<!--<div id="home"class="scrollpage" style="height:500px;"></div>-->
							<div id="mission" class="scrollpage">
								<div class="container-fluid">
									<div class="col-sm-6 col-sm-offset-3">
										<div class="row">
										<div class="body-text text-center">
											<?php $triumph = new WP_Query("pagename=mission"); 
											while($triumph->have_posts()) : $triumph->the_post();?>
											<h2><?php the_title(); ?></h2>
											<?php the_content(); ?>
											<?php endwhile; ?>
										</div>	
										</div>
									</div>
								</div>
							</div>
							<div id="portfolio" class="scrollpage">
								<div class="container-fluid">
									<div class="col-sm-6 col-sm-offset-3">	
										<div class="row">
										<div class="body-text text-center">
											<?php $triumph = new WP_Query("pagename=portfolio"); 
											while($triumph->have_posts()) : $triumph->the_post();?>
											<h2><?php the_title(); ?></h2>
											<?php the_content(); ?>
											<?php endwhile; ?>
										</div>	
										
										</div>
									</div>
									<div class="portfolio-gallery">
										<div class="portfolio-container">
											<ul class="row">
												<?php query_posts('post_type=portfolio&showposts=9&order=ASC'); ?>
													<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
														$portfolioThumbnail = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio-thumbnail', false, '' );
														$portfolioLarge = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'portfolio-large', false, '' );
													?>							
														<li class="gallery-item">
															<div class="item-content">
															<?php 
															echo sprintf( '<a href="%s" data-lightbox="portfolio-group" 
															data-title="<h3>'.get_the_title().'</h3><p>'.get_the_content().'</p>">', $portfolioLarge[0] ).'<img src="'.$portfolioThumbnail[0].'"  alt="'.get_the_title().'" /></a>'; ?>
																
																<div class="item-description">
																	<h3><?php the_title();?></h3>
																	<p><?php the_content();?></p>
																</div>
															</div>
														</li>												
													<?php endwhile; endif;
													wp_reset_query(); ?>
											</ul>
										</div>
									</div>
								</div>
							</div>
							<div id="get-a-quote" class="scrollpage">
								<div class="col-sm-6 col-sm-offset-3">	
									<div class="row">
										<div class="body-text text-center">
											<?php $triumph = new WP_Query("pagename=get-a-quote"); 
											while($triumph->have_posts()) : $triumph->the_post();?>
											<h2><?php the_title(); ?></h2>
											<?php the_content(); ?>
											<?php endwhile; ?>
										</div>	
									</div>
								</div>
							</div>
							<div id="testimonials" class="scrollpage">
								<div class="container">
									<div class="testimonial-container">
										<h2>Testimonials</h2>
										
										<ul class="testi-list">
											<?php query_posts('post_type=testimonial&showposts=-1&order=ASC'); ?>
											<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>						
												<?php //echo '<pre>' ; print_r($abc); echo '</pre>'; ?>
												 <li class="testi-item">
													<div class="testi-content">
														<?php the_content(); ?>													
														<p class="testi-author"> <?php the_title(); ?></p>
													</div>
												</li>												
											<?php endwhile; endif;
											wp_reset_query(); ?>
										</ul>
									</div>
								</div>
							</div>
							<div id="blog" class="scrollpage">
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
									<div class="blog-listing">
									<?php
										$perPage = get_option( 'posts_per_page' );
										$paged = ( get_query_var('page') ? get_query_var('page') : 1);
										
										$args = array(
										'posts_per_page' => $perPage,
										'orderby' => 'post_date',
										'order' => 'DESC',
										'post_type' => 'post',
										'paged' => $paged ); 
										$the_query = new WP_Query( $args); 

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
											else:
												?>
												<p><?php _e( 'Sorry, no posts matched your criteria.' ); ?></p>
												<?php
											endif;
											wp_reset_query();
										?>
									</div>
									<div class="more-posts">
										<!--<i aria-hidden="true" style="display:none;" class="fa fa-spinner fa-spin loader_product"></i>-->
										<a href="javascript:void(0);" id="more_posts" class="link-button">More posts >></a>
										<span style="display:none;" class="no_more">no more posts</span>
									</div>
								</div>
							</div>
							<div id="contact" class="scrollpage">
								<div class="col-sm-6 col-sm-offset-3">	
									<div class="row">
										<div class="body-text text-center">
											<?php $triumph = new WP_Query("pagename=contact"); 
											while($triumph->have_posts()) : $triumph->the_post();?>
											<h2><?php the_title(); ?></h2>
											<?php the_content(); ?>
											<?php endwhile; ?>
										</div>	
									</div>
								</div>
							</div>			
						</section> 
						
						
					
					</article> <!-- end article -->
					
					<?php 
						// No comments on homepage
						//comments_template();
					?>
					
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
			
				</div> <!-- end #main -->
    
				<?php //get_sidebar(); // sidebar 1 ?>
    
			</div> <!-- end #content -->

<?php 
	if (function_exists("pagination")) {
		pagination($the_query->max_num_pages);
	} 
get_footer(); ?>