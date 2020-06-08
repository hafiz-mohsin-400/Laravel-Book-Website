	<?php get_header(); ?>
	<!-- Header -->

	<!-- BEGIN MAIN CONTENT -->
		<main class="main-content">
		<!-- Blog List -->
		<div class="tc-padding">
			<div class="container">
				<div class="row">
					
					<!-- Content -->
					<div class="col-lg-9 col-md-8 col-xs-12">

						<!-- List Blog -->
						<div class="blog-list">
							<?php if ( have_posts() ) : while( have_posts() ) : the_post() ?>
			                	<?php get_template_part( 'content' ) ?>
			            	<?php endwhile ?>	
			                <?php else : ?>
								<?php get_template_part( 'content', 'none') ?>
			                <?php endif ?>						
			           		<?php echo alliedbooks_numbered_pagination() ?>
						</div>
						<!-- List Blog -->

					</div>
					<!-- Content -->

					<!-- Aside -->
					<?php get_sidebar() ?>
					<!-- Aside -->

				</div>
			</div>
		</div>
		<!-- Blog List -->

	</main>
	<!-- END MAIN CONTENT -->

	<!-- Footer -->
	<?php get_footer() ?>