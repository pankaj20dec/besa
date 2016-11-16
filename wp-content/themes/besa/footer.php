			</div>
			<footer>
					<div class="instafeeds">
						<?php echo do_shortcode('[instagram-feed]');?>
					</div>
					<div class="footer-nav-container">
					<div class="container">
							<?php wp_bootstrap_footer_nav();?>
							<div class="social-icons">
								<ul class="footer-social">
									<li><a href="#" class="insta-link"><span class="genericon genericon-instagram"></span></a></li>
									<li><a href="#" class="facebook-link"><span class="genericon genericon-facebook-alt"></span></a></li>
									<li><a href="#" class="twitter-link"><span class="genericon genericon-twitter"></span></a></li>
								</ul>
							</div>
						</div>
					</div>
					<div class="credits">
						<span class="copyright">
							Copyright &copy; <?php echo date("Y"); ?> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?> </a>
						</span>
						<span>
							<a href="http://firstflightstudio.com" target="_blank"><?php printf( __( 'Fuelled by First Flight' ), 'WordPress' ); ?></a>
						</span>
					</div>
			</footer> 
		
		 <!-- end #container -->
				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
		
		<?php wp_footer(); // js scripts are inserted using this function ?>

		<!-- remove this for production -->

		<script src="//localhost:35729/livereload.js"></script>
	    <script src="http://code.jquery.com/ui/1.12.0/jquery-ui.js"></script>
		<script type="text/javascript">
			if($("ul.page-numbers").length){
				//var container = $('.blog-listing');
				var pg_num = 2;
				var num_of_pg = $("ul.page-numbers").children().length;
				$('#more_posts').on('click', function() { 
					var page  = window.location.href;  
					var inc_pg_num = pg_num++;
					if(inc_pg_num <= num_of_pg) {
						var url   =   page+'page/'+inc_pg_num+'/';
						
						$.ajax({
							url: url ,
							type: 'post',
							beforeSend: function(){
							$('.loader_product').css({"display":"block"}); 
							},
							success: function(data){
							$('.blog-listing').hide("slide", { direction: "left" }, 400).html($(data).find('.blog-listing').html()).show("slide", { direction: "right" }, 400);
							/*$('.blog-listing').append($(data).find('.blog-listing').html());
								alert($(data).find('.blog-listing').html()); */
								$('.loader_product').css({"display":"none"}); 
							},
							complete: function(){

							}
						});
					}   
					else{
					$('#more_posts').hide();
					$('.no_more').show(); 
					} 
				});
			}

			else{
			$('#more_posts').hide();
			}
		
		</script>
	</body>

</html>