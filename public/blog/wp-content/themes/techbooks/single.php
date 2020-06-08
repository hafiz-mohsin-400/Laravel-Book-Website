<?php get_header() ?>
<?php if ( have_posts() ) : the_post() ?>
<main class="main-content">
		<!-- Blog List -->
		<div class="tc-padding">
			<div class="container">
				<div class="row">

					<!-- Content -->
					<div class="col-lg-9 col-md-8">
						<!-- blog Detail -->
						<div class="single-blog-detail">
							<h2><?php the_title() ?></h2>
							<div class="large-blog-img">
								<?php if ( has_post_thumbnail() && ! post_password_required() ): ?>
				                    <?php the_post_thumbnail() ?>
				                <?php else: ?>
				                    <h3>No Image found</h3>
				                <?php endif ?>
								
							</div>
							<div class="social-text">
								<ul class="social-icons">
				                	<li><a class="facebook" href="//www.facebook.com/sharer.php?u=<?php echo the_permalink() ?>/&intent=share"><i class="fa fa-facebook"></i></a></li>
				                    <li><a class="twitter" href="https://twitter.com/intent/tweet?text=<?php the_title() ?>&<?php echo the_permalink() ?>"><i class="fa fa-twitter"></i></a></li>
				                    <li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
				                    <li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
				                </ul>
				                <p><?php the_content() ?></p>
							</div>
							
							<!-- BEGIN AUTHOR HERE -->
                    		<?php if ( get_the_author_meta( 'description') ): ?>
							<div class="blog-arthor">
								<?php echo get_avatar( get_the_author_meta( 'user_email' ), '80', '', '',  array('class' => array('img-circle') )); ?>
								<!-- <img class="position-center-x" src="/assets/images/blog-arthor/img-01.jpg" alt=""> -->
								<div class="blog-arthor-detail">
									<h6><?php the_author_meta( 'display_name' ); ?></h6>
									<p><?php the_author_meta( 'description' ); ?></p>
									<ul class="social-icons">
					                	<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
					                    <li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
					                    <li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
					                </ul>
				                </div>
							</div>
						<?php endif ?>

							<!-- END AUTHRO HERE -->

						</div>
						<!-- blog Detail -->

						<!-- Related Blog -->
						<div class="related-events">

							<!-- Secondary heading -->
			        		<div class="sec-heading">
			        			<h3>You may also like this</h3>
			        		</div>
			        		<!-- Secondary heading -->

			        		<!-- Related Blog -->
							<div class="related-events-slider">
								<div class="item">
									<div class="grid-blog">
				    					<div class="grid-blog-img">
				    						<img src="/assets/images/grid-blog/img-01.jpg" alt="">
				    					</div>
				    					<div class="product-detail blog-detail">
				    						<span class="date"><i class="fa fa-calendar"></i>02 March 2016</span>
				    						<h5>How to writean eBook in 2015 and make</h5>
				    						<p>How to make money writing and publishing eBooks Part 1. The first post in this series is on how...</p>
				    						<div class="aurthor-detail">
				    							<span><img src="/assets/images/book-aurthor/img-01.jpg" alt="">Chelsea McMnin</span>
				    							<a class="add-wish" href="#"><i class="fa fa-share-alt"></i></a>
				    						</div>
				    					</div>
				    				</div>
								</div>
								<div class="item">
									<div class="grid-blog">
				    					<div class="grid-blog-img">
				    						<img src="/assets/images/grid-blog/img-02.jpg" alt="">
				    					</div>
				    					<div class="product-detail blog-detail">
				    						<span class="date"><i class="fa fa-calendar"></i>02 March 2016</span>
				    						<h5>How to writean eBook in 2015 and make</h5>
				    						<p>How to make money writing and publishing eBooks Part 1. The first post in this series is on how...</p>
				    						<div class="aurthor-detail">
				    							<span><img src="/assets/images/book-aurthor/img-01.jpg" alt="">Chelsea McMnin</span>
				    							<a class="add-wish" href="#"><i class="fa fa-share-alt"></i></a>
				    						</div>
				    					</div>
				    				</div>
								</div>
								<div class="item">
									<div class="grid-blog">
				    					<div class="grid-blog-img">
				    						<img src="/assets/images/grid-blog/img-03.jpg" alt="">
				    					</div>
				    					<div class="product-detail blog-detail">
				    						<span class="date"><i class="fa fa-calendar"></i>02 March 2016</span>
				    						<h5>How to writean eBook in 2015 and make</h5>
				    						<p>How to make money writing and publishing eBooks Part 1. The first post in this series is on how...</p>
				    						<div class="aurthor-detail">
				    							<span><img src="/assets/images/book-aurthor/img-01.jpg" alt="">Chelsea McMnin</span>
				    							<a class="add-wish" href="#"><i class="fa fa-share-alt"></i></a>
				    						</div>
				    					</div>
				    				</div>
								</div>
		    				</div>
		    				<!-- Related Blog -->
						</div>
						<!-- Related Blog -->

						<!-- Comments Holder -->
						<div class="comments-holder">

							<!-- Secondary heading -->
			        		<div class="sec-heading">
			        			<h3>People Comments</h3>
			        		</div>
			        		<!-- Secondary heading -->

			        		<!-- Comments -->
							<ul>
								<li>
									<img class="position-center-x" src="/assets/images/commenter/img-01.jpg" alt="">
									<div class="comment">
										<h6>Lonut Zamfir<span>02 March 2016 </span></h6>
										<p>Etiam eros condimentum curabitur donec amet maecenas, morbi placerat etiam adipiscing libero erat facilisis, taciti congue mattis quam primis sed vivamus eu hendrerit habitasse per et aliquam aliquet adipiscing pharetra bibendum eget laoreet.iaculis inceptos primis senectus laoreet commodo venenatis tristique inceptos curabitur enim vitae.</p>
									</div>
								</li>
							</ul>
							<!-- Comments -->
						</div>
						<!-- Comments Holder -->

						<!-- Form -->
						<div class="form-holder">

							<!-- Secondary heading -->
			        		<div class="sec-heading">
			        			<h3>Leave Comments</h3>
			        		</div>
			        		<!-- Secondary heading -->

			        		<!-- Sending Form -->
			        		<form class="sending-form">
			        			<div class="row">
			        				<div class="col-sm-12">
					        			<div class="form-group">
					        				<textarea class="form-control" required="required" rows="5" placeholder="Text here..."></textarea>
					        				<i class="fa fa-pencil-square-o"></i>
					        			</div>
				        			</div>
				        			<div class="col-sm-6">
					        			<div class="form-group">
					        				<input class="form-control" required="required" placeholder="Full name">
					        				<i class="fa fa-user"></i>
					        			</div>
				        			</div>
				        			<div class="col-sm-6">
					        			<div class="form-group">
					        				<input class="form-control" required="required" placeholder="Subject">
					        				<i class="fa fa-align-left"></i>
					        			</div>
				        			</div>
				        			<div class="col-sm-6">
					        			<div class="form-group">
					        				<input class="form-control" required="required" placeholder="Email">
					        				<i class="fa fa-envelope"></i>
					        			</div>
				        			</div>
				        			<div class="col-sm-6">
					        			<div class="form-group">
					        				<input class="form-control" required="required" placeholder="Phone no.">
					        				<i class="fa fa-phone"></i>
					        			</div>
				        			</div>
				        			<div class="col-sm-12">
					        			<button class="btn-1 shadow-0 sm">send message</button>
				        			</div>
			        			</div>
			        		</form>
			        		<!-- Sending Form -->
						</div>
						<!-- Form -->
					</div>
					<!-- Content -->

					<!-- Aside -->
					<aside class="col-lg-3 col-md-4">
						<div class="aside-widget">
							<form class="search-bar style-2">
								<input type="text" class="form-control" required="required" placeholder="Type a search here...">
								<button class="sub-btn fa fa-search"></button>
							</form>
						</div>
						<!-- Aside Widget -->
						<div class="aside-widget">
							<h6>Books by Category</h6>
							<ul class="Category-list">
								<li><a href="#">Fictionright (25) </a></li>
								<li><a href="#">Non Fictionright (30)</a></li>
								<li><a href="#">Award Winnersright (15)</a></li>
								<li><a href="#">Kids &amp; Teensright (10)</a></li>
								<li><a href="#">Australianright(30)</a></li>
								<li><a href="#">Autobiographyright (08)</a></li>
								<li><a href="#">Biographyright (12)</a></li>
								<li><a href="#">Crimeright(25)</a></li>
								<li><a href="#">Environmentright (30)</a></li>
								<li><a href="#">Eroticar(20)</a></li>
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
						<!-- Aside Widget -->
						<div class="aside-widget">
							<h6>Latest Books</h6>
							<ul class="books-year-list">
								<li>
									<div class="books-post-widget">
										<img src="/assets/images/books-year-list/img-01.jpg" alt="">
										<h6><a href="#">My Brilliant Friend The Neapolitan Novels, Book One</a></h6>
										<span>By Elena Ferrante</span>
									</div>
								</li>
								<li>
									<div class="books-post-widget">
										<img src="/assets/images/books-year-list/img-02.jpg" alt="">
										<h6><a href="#">As night fell, something stirred the darkness.</a></h6>
										<span>By Meg Caddy</span>
									</div>
								</li>
								<li>
									<div class="books-post-widget">
										<img src="/assets/images/books-year-list/img-03.jpg" alt="">
										<h6><a href="#">The Rosie Project: Don Tillman 1</a></h6>
										<span>By Graeme Simsion</span>
									</div>
								</li>
								<li>
									<div class="books-post-widget">
										<img src="/assets/images/books-year-list/img-04.jpg" alt="">
										<h6><a href="#">Heartbreaking, joyous, traumatic, intimate and</a></h6>
										<span>By Magda Szubanski</span>
									</div>
								</li>
							</ul>
						</div>
						<!-- Aside Widget -->
					</aside>
					<!-- Aside -->
				</div>
			</div>
		</div>
		<!-- Blog List -->
	</main>
<?php endif ?>
<?php get_footer() ?>