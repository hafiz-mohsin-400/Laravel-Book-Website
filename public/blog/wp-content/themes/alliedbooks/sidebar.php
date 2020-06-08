<aside class="col-lg-3 col-md-4 col-xs-12">
	<!-- Aside Widget -->
	<div class="aside-widget">
		<h6>Latest Books</h6>
		<ul class="s-arthor-list style-2">
			<?php
	            $args = ['numberposts' => '5']; 
	            $recent_posts = wp_get_recent_posts( $args );
	        ?>
			<?php foreach ($recent_posts as $recent_post): ?>
			<li>
				<div class="s-arthor-wighet">
					<div class="s-arthor-img">
						<?php if ( has_post_thumbnail()) : ?>
	                        <?php the_post_thumbnail() ?>
	                    <?php else: ?>
							<img src="/assets/images/s-news-post/img-01.jpg" alt="">
	                    <?php endif ?>
					</div>
					<div class="s-arthor-detail">
						<h6><a href="<?php echo the_permalink( $recent_post["ID"] ); ?>"><?php echo $recent_post['post_title']; ?></a></h6>
						<span>Posted on <?php echo get_the_date(); ?> </span>
					</div>
				</div>
			</li>
		<?php  endforeach ?>
		</ul>
	</div>
						<!-- Aside Widget -->

	<!-- Aside Widget -->
	<div class="aside-widget">
		<a href="#">
			<img src="/assets/images/add-banner-1.jpg" alt="">
		</a>
	</div>
	<!-- Aside Widget -->
</aside>