<div id="post-<?php the_ID(); ?>" class="list-blog">
	<div class="row">
		<div class="col-lg-4 col-md-12">
			<?php if ( has_post_thumbnail() && ! post_password_required() ) : ?>
                <?php the_post_thumbnail() ?>
            <?php else: ?>
                <h3>No Image found</h3>
            <?php endif ?>
		</div>
		<div class="col-lg-8 col-md-12">
			<div class="blog-detail">
				<?php if ( is_single() ): ?>
                    <h3><?php the_title() ?></h3>
                <?php else: ?>
                    <h3><a href="<?php echo the_permalink() ?>"> <?php the_title() ?></a></h3>
                <?php endif ?>

                <?php  alliedbooks_post_meta(); ?>
				
				<?php if ( is_search() ) : ?>
                    <p><?php the_excerpt(); ?></p>
                <?php else: ?> 
                    <p><?php the_excerpt(); ?></p>
                <?php endif ?> 
				<a href="<?php echo the_permalink() ?>" class="btn-1 shadow-0 sm">Learn more<i class="fa fa-arrow-circle-right"></i></a> 
			</div>
		</div>
	</div>
</div>