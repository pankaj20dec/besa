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

	</body>

</html>