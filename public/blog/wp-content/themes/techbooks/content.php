<div id="post-<?php the_ID() ?>" class="list-blog">
	<div class="row">
		<div class="col-lg-4 col-md-12">
			<?php if ( has_post_thumbnail() && ! post_password_required() ): ?>
                <?php the_post_thumbnail() ?>
            <?php else: ?>
                <h3>No Image found</h3>
            <?php endif ?>
		</div>
		<div class="col-lg-8 col-md-12">
			<div class="blog-detail">
				<?php if ( is_single() ): ?>
                    <h3><?php the_title(); ?></h3>
                <?php else: ?>
                    <h3><a href="<?php echo the_permalink() ?>"><?php the_title(); ?></a></h3>
                <?php endif ?>

                <?php // techbooks_post_meta(); ?>
				
				<!-- <ul class="meta-post">
					<li><i class="fa fa-share-alt"></i><span>470</span> Share</li>
					<li><i class="fa fa-comments"></i><span>78</span> comments</li>
				</ul> -->

				<?php if ( is_search() ): ?>
                    <?php the_excerpt(); ?>
                <?php else: ?>
                    <?php the_excerpt(); ?>
                <?php endif ?>
				<a href="<?php echo the_permalink(); ?>" class="btn-1 shadow-0 sm">Learn more<i class="fa fa-arrow-circle-right"></i></a> 
			</div>
		</div>
	</div>
</div>