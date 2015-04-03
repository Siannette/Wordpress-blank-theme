<input type="checkbox" name="sidebar-show" id="sidebar-show" />
	<label for="sidebar-show" class="css-label"></label>
	<aside id="right-sidebar">
				<div class="brand66">
				<h4>Brand 66: Exploring Design</h4>
				<p>One small step for design blogs. Brand66 is on a mission to uncover design trends and examples of brilliant thinking, be they in distant lands or closer to home.</p>
				</div>
				<div class="subscribe">
						<h4>Subscribe</h4>
						<p>Brand 66 delivered fresh to your inbox</p>
						<form class="subscribe-form" method="get">
										<input type="email" class="email-subscribe" placeholder="Email address" />
										<button type="submit"><i class="fa fa-check fa-2x"></i></button>
						</form>
						<ul class="socials">
								<li>
										<a href="#">
												<span class="fa-stack fa-lg">
														<i class="fa fa-circle-thin fa-stack-2x"></i>
														<i class="fa fa-rss fa-stack-1x"></i>
												</span>
										</a>
								</li>
								<li>
										<a href="#">
												<span class="fa-stack fa-lg">
														<i class="fa fa-circle-thin fa-stack-2x"></i>
														<i class="fa fa-linkedin fa-stack-1x"></i>
												</span>
										</a>
								</li>
								<li>
										<a href="#">
												<span class="fa-stack fa-lg">
														<i class="fa fa-circle-thin fa-stack-2x"></i>
														<i class="fa fa-twitter fa-stack-1x"></i>
												</span>
										</a>
								</li>
						</ul>
				</div>
		<div class="recent">
				<h4>Recent</h4>
				<?php if (function_exists('fetch_feed')) { ?>
				
				<?php include_once(ABSPATH . WPINC . '/feed.php'); 
				
				      $feed = fetch_feed('http://www.iflscience.com/');
				
					  $limit = $feed->get_item_quantity(25);
					
					  $items = $feed->get_items(0, $limit);
					
					if (!$items) {
						
						echo "problem";
						
					} else {
						
						foreach ($items as $item) { ?>
								
								<h5><a href="<?php echo $item->get_permalink(); ?>"><?php echo $item->get_title(); ?></a></h5>
						
					<?php } 
					
				    } ?>

			<?php } ?>

				</div>

				<div class="search">
						<h4>Search</h4>
						<?php get_search_form(); ?>
				</div>

<?php if ( is_active_sidebar( 'home_right_1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'home_right_1' ); ?>
	</div><!-- #primary-sidebar -->
<?php endif; ?>

		</aside>
