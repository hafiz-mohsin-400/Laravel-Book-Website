@extends('layout.master')

@section('page-title')
	Author Detail
@endsection
@section('main-content')
<main class="main-content">

		<!-- Arthor Detail -->
		<div class="single-aurthor-detail tc-padding">
			<div class="container">
				<div class="row">
					
					<!-- Aside -->
					<aside class="col-lg-4 col-md-5">
						<div class="arthor-detail-column">
							<div class="arthor-img">
								@if($author_detail->author_img == 'No image found')
	      							<img src="/assets/images/hello.png" width="207" height="197" alt="No Image">
	      						@else
	      							<img src="/uploads/{{ $author_detail->author_img }}" width="207" height="197" alt="{{ $author_detail->title }}">
	      						@endif 
							</div>
							<div class="arthor-detail">
								<h6>{{ $author_detail->title }}</h6>
								<span>{{ $author_detail->designation }}</span>
							</div>
							<div class="social-activity">
								<div>
									<ul class="social-icons">
					                	<li><a class="facebook" href="{{ $author_detail->facebook_id }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
					                    <li><a class="twitter" href="{{ $author_detail->twitter_id }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
					                    <li><a class="youtube" href="{{ $author_detail->youtube_id }}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
					                    <li><a class="pinterest" href="{{ $author_detail->pinterest_id }}" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
					                </ul>
				                </div>
				         	</div>
						</div>
					</aside>
					<!-- Aside -->

					<!-- Content -->
					<div class="col-lg-8 col-md-7">
						<div class="single-arthor-detail">

							<!-- Widget -->
							<div class="single-arthor-widget">
								<h5>Author Overview</h5>
								<div class="author-overview">
									<p>{{ $author_detail->description }}</p>
								</div>
							</div>
							<!-- Widget -->

							<!-- Widget -->
							<div class="single-arthor-widget">
								<h5>Recommended {{ $author_detail->title }} Titles </h5>

								<!-- Recommended -->
							  	<div id="filter-masonry" class="gallery-masonry">
									@forelse($author_detail->author_books as $author_book)
									<!-- Product Box -->
					    			<div class="col-lg-3 col-xs-6 r-full-width masonry-grid most-recent">
					    				<div class="recommended-book">
					    					<div class="recommended-book-img">
					    						@if($author_book->book_img == 'No image found')
					      							<img src="/assets/images/hello.png" width="179" height="246" alt="No Image">
					      						@else
					      							<img src="/uploads/{{ $author_book->book_img }}" width="179" height="246" alt="{{ $author_book->title }}">
					      						@endif 
					    					</div>
					    					<div class="recommended-book-detail">
						    					<h6>{{ $author_book->title }}</h6>
						    				</div>
					    				</div>
					    			</div>
					    			<!-- Product Box -->
									@empty
										<div class="alert alert-danger">
											No book found
										</div>
									@endforelse
							  	</div>
							  	<!-- Recommended -->

							</div>
							<!-- Widget -->
						</div>
					</div>
					<!-- Content -->
				</div>
			</div>
		</div>
		<!-- Arthor Detail -->
	</main>
@endsection