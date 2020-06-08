@extends('layout.master')

@section('page-title')
	Author
@endsection

@section('main-content')
<main class="main-content">

		<!-- Author Listing -->
		<div class="author-listing tc-padding">
			<div class="container">
				<div class="row">

					<!-- Content -->
					<div class="col-lg-9 col-md-8 col-xs-12">
													
						<!-- Author Filter -->
						<div class="authors-filter">
							<ul>
								@foreach(range('a', 'z') as $letter)
									<li><a href="author?letter={{ $letter }}">{{ $letter }}</a></li>
								@endforeach
							</ul>
						</div>
						<!-- Author Filter -->

						<!-- Author List -->
						<ul class="author-list">
							@forelse($authors as $author)
							<li>
								<div class="author-list-widget">
									<div class="arthor-list-img">
										@if($author->author_img == 'No image found')
			      							<img src="/assets/images/hello.png" width="178" height="178" alt="No Image">
			      						@else
			      							<img src="/uploads/{{ $author->author_img }}" width="178" height="178" alt="{{ $author->title }}">
			      						@endif 
										<div class="overlay"></div>
									</div>
									<div class="author-list-detail">
										<h6>{{ $author->title }}</h6>
										<span>Born: {{ $author->dob }} {{-- 15 March 1975 --}} {{ $author->country }}</span>
										<p>{{ str_limit($author->description, 100) }}</p>
										<a href="/author_detail/{{ $author->slug }}" class="btn-1 sm">Read more<i class="fa fa-arrow-circle-right"></i></a>
									</div>
								</div>
							</li>
							@empty
								<div class="alert alert-danger">No author found</div>
							@endforelse
						
						</ul>
						<!-- Author List -->

						<!-- Pagination -->
		           		<div class="pagination-holder">
		           			{{ $authors->links('pagination.links') }}
		           		</div>
		           		<!-- Pagination -->

					</div>
					<!-- Content -->

					<!-- Aside -->
					<aside class="col-lg-3 col-md-4 col-xs-12">
						<!-- Aside Widget -->
						<div class="aside-widget">
							<h6>Authors of the Week</h6>
							<ul class="s-arthor-list">
								@forelse($authorOfTheWeeks as $authorOfTheWeek)
								<li>
									<div class="s-arthor-wighet">
										<div class="s-arthor-img">
											@if($authorOfTheWeek->author_img == 'No image found')
				      							<img src="/assets/images/hello.png" width="45" height="45" alt="No Image">
				      						@else
				      							<img src="/uploads/{{ $authorOfTheWeek->author_img }}" width="45" height="45" alt="{{ $authorOfTheWeek->title }}">
				      						@endif
											<div class="overlay">
												<a class="position-center-center" href="#"></a>
											</div>
										</div>
										<div class="s-arthor-detail">
											<h6>{{ $authorOfTheWeek->title }}</h6>
											<a href="/author_detail/{{ $authorOfTheWeek->slug }}">Read more</a>
										</div>
									</div>
								</li>
								@empty
									<li class="alert alert-danger">No author found</li>
								@endforelse
								
								
								
								
							</ul>
						</div>
						<!-- Aside Widget -->

						<!-- Aside Widget -->
						<div class="aside-widget">
							<h6>Most Downloaded Books</h6>
							<ul class="books-year-list">
								@forelse($downloaded_books as $downloaded_book)
								<li>
									<div class="books-post-widget">
										@if($downloaded_book->book_img == 'No image found')
			      							<img src="/assets/images/hello.png" width="54" height="73" alt="No Image">
			      						@else
			      							<img src="/uploads/{{ $downloaded_book->book_img }}" width="54" height="73" alt="{{ $downloaded_book->title }}">
			      						@endif 
										
										<h6><a href="{{ route('front.book', [$downloaded_book->slug]) }}">{{ $downloaded_book->title }}</a></h6>
										<span>By {{ $downloaded_book->author->title }}</span>
									</div>
								</li>
								@empty
									<li class="alert alert-danger">No book found</li>
								@endforelse

								
								
								
							</ul>
						</div>
						<!-- Aside Widget -->

					</aside>
					<!-- Aside -->

				</div>
			</div>
		</div>
		<!-- Author Listing -->

	</main>
@endsection