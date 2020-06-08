<?php get_header() ?>
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
							<?php if ( have_posts() ): while ( have_posts() ) : the_post() ?>
								<?php get_template_part( 'content' ); ?>
							<?php endwhile ?>
							<?php endif ?>		
                        <?php //echo techlaptop_paging_nav(); ?>
							
			           		<div class="pagination-holder">
			           			<ul class="pagination">
								    <li><a href="#" aria-label="Previous">Prev</a></li>
								    <li><a href="#">1</a></li>
								    <li class="active"><a href="#">2</a></li>
								    <li><a href="#">3</a></li>
								    <li><a href="#">4</a></li>
								    <li><a href="#">5</a></li>
								    <li><a href="#">6</a></li>
								    <li><a href="#">7</a></li>
								    <li><a href="#">...</a></li>
								    <li><a href="#">23</a></li>
								    <li><a href="#" aria-label="Next">Next</a></li>
								</ul>
			           		</div>
						</div>
						<!-- List Blog -->

					</div>
					<!-- Content -->

					<!-- Aside -->
					<?php get_sidebar(); ?>
					<!-- Aside -->

				</div>
			</div>
		</div>
		<!-- Blog List -->

	</main>
	<!-- END MAIN CONTENT -->

	<!-- Footer -->
	<?php get_footer() ?>
	