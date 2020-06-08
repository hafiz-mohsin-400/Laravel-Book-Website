@extends('layout.master')
@section('page-title')
  Home
@endsection
@section('main-content')
<main class="main-content">
		<div id="main-slider" class="main-slider">
		@forelse ($sliders as $slider)
        <!-- Item -->
        <div class="item">
        	@if($slider->media_img == 'No image found')
				<img src="/assets/images/hello.png" width="1921" height="735">
			@else
				<img src="/uploads/{{ $slider->media_img  }}" alt="{{ $slider->title }}">
			@endif 
        </div>
        <!-- Item -->
    	@empty
        	<div class="alert alert-danger">
        		No Slider found
        	</div>
        @endforelse
    </div>
	
		<section class="upcoming-release">
		<!-- Heading -->
		<div class="container-fluid p-0">
		  	<div class="release-heading pull-right h-white">
		  		<h5>New and Upcoming Release</h5>
		  	</div>
		</div>
		<!-- Heading -->

		<!-- Upcoming Release Slider -->
		<div class="upcoming-slider">
			<div class="container">
				<!-- Release Book Detail -->
				<div class="release-book-detail h-white p-white">
                        <div class="release-book-slider">
							@forelse ($upcoming_books as $upcoming_book)
                            <div class="item">
                                <div class="detail">
                                    <h5><a href="{{ route('front.book', [$upcoming_book->slug]) }}">{{ $upcoming_book->title }}</a></h5>
                                    <p>{{ str_limit($upcoming_book->description, '130') }}</p>
                                    <span>Rs/- {{ $upcoming_book->price }}</span>
                                    {{-- <i class="fa fa-angle-double-right"></i> --}}
                                </div>
                                <div class="detail-img">
                                    @if($upcoming_book->book_img == 'No image found')
										<img src="/assets/images/hello.png" width="112" height="156">
									@else
										<img src="/uploads/{{ $upcoming_book->book_img  }}" alt="{{ $upcoming_book->title }}">
									@endif
                                </div>
                            </div>
                            @empty
                            	<div class="alert alert-danger">
                            		No book found
                            	</div>
                            @endforelse
                        </div>
                    </div>
				<!-- Release Book Detail -->

				<!-- Thumbs -->
				<div class="release-thumb-holder">
						<ul id="release-thumb" class="release-thumb">
							@forelse($upcoming_books as $key => $upcoming_book)
							<li>
								<a data-slide-index="{{ $key }}" href="#">
									@if($upcoming_book->book_img == 'No image found')
										<img src="/assets/images/hello.png" width="94" height="122">
									@else
										<img src="/uploads/{{ $upcoming_book->book_img  }}" alt="{{ $upcoming_book->title }}">
									@endif
									<img class="b-shadow" src="/assets/images/upcoming-release/b-shadow.png" alt="">
									<span data-toggle="modal" data-target="#quick-view" class="plus-icon">+</span>
								</a>
							</li>
							@empty
                            	<div class="alert alert-danger">
                            		No Book found
                            	</div>
                            @endforelse
						</ul>
					</div>
				<!-- Thumbs -->

			</div>
		</div>
		<!-- Upcoming Release Slider -->

		</section>
	
		<!-- Best Seller Products -->
		<section class="best-seller tc-padding">
		<div class="container">
			
			<!-- Main Heading -->
			<div class="main-heading-holder">
				<div class="main-heading style-1">
					<h2>Best <span class="theme-color">Downloaded</span> Books</h2>
				</div>
			</div>
			<!-- Main Heading -->

			<!-- Best sellers Tabs -->
			<div id="best-sellers-tabs" class="best-sellers-tabs">
			  	<!-- Tab panes -->
			  	<div class="tab-content">

			  		<!-- Best Seller Slider -->
			    	<div id="tab-1">
			    		<div class="best-seller-slider">
                            @forelse($downloaded_books as $downloaded_book)
                            <!-- Product Box -->
			    			<div class="item">
			    				<div class="product-box">
			    					<div class="product-img">
                                        @if($downloaded_book->book_img == 'No image found')
                                            <img src="/assets/images/hello.png" width="132" height="197" alt="">
                                        @else
                                            <img src="/uploads/{{ $downloaded_book->book_img }}" width="132" height="197" alt="{{ $downloaded_book->title }}">
                                        @endif
			    						<ul class="product-cart-option position-center-x">
                                            <li><a href="#"><i class="fa fa-eye"></i></a></li>
                                            <li><a href="#"><i class="fa fa-cart-arrow-down"></i></a></li>
                                        	<li><a href="#"><i class="fa fa-share-alt"></i></a></li>
                                        </ul>
			    					</div>
			    					<div class="product-detail">
			    						<span>{{ $downloaded_book->category->title }}</span>
			    						<h5><a href="{{ route('front.book', [$downloaded_book->slug]) }}">{{ $downloaded_book->title }}</a></h5>
			    						<p>{{  str_limit($downloaded_book->description, '30') }}</p>
			    						<div class="rating-nd-price">
			    							<strong>Rs/ {{ $downloaded_book->price }}</strong>
			    						</div>
			    						<div class="aurthor-detail">
			    							<span>
                                                @if($downloaded_book->author->author_img == 'No image found')
                                                    <img src="/assets/images/hello.png" width="34" height="34" alt="">
                                                @else
                                                    <img src="/uploads/{{ $downloaded_book->author->author_img }}" width="34" height="34" alt="{{ $downloaded_book->author->title }}">
                                                @endif
                                               {{ $downloaded_book->author->title }}
                                           </span>
			    						</div>
			    					</div>
			    				</div>
			    			</div>
			    			<!-- Product Box -->
                            @empty
                                <div class="alert alert-danger">
                                    No book found!
                                </div>
                            @endforelse

			    		</div>
			    	</div>
			    	<!-- Best Seller Slider -->
			  	</div>
			  	<!-- Tab panes -->

				</div>
			<!-- Best sellers Tabs -->
		</div>
	</section>
		<!-- Best Seller Products -->

		<!-- Recomend products -->
		<div class="recomended-products tc-padding">
			<div class="container">
				<!-- Main Heading -->
				<div class="main-heading-holder">
					<div class="main-heading">
						<h2>Staff <span class="theme-color">Recomended </span> Books</h2>
						<p>Whether you’re a large or small employer, enterpreneur, educational institution, professional</p>
					</div>
				</div>
				<!-- Main Heading -->

				<!-- Recomend products Slider -->
				<div class="recomend-slider">
                <!-- Item -->
                @forelse($recomended_books as $recomended_book)
                <div class="item">
                    <a href="{{ route('front.book', [$recomended_book->slug]) }}">
                        @if($recomended_book->book_img == 'No image found')
                            <img src="/assets/images/hello.png" width="109" height="150">
                        @else
                            <img src="/uploads/{{ $recomended_book->book_img  }}" alt="{{ $recomended_book->title }}">
                        @endif
                    </a>
                </div>
                @empty
                    <div class="alert alert-danger">
                        No book found!
                    </div>
                @endforelse
                <!-- Item -->
            </div>
				<!-- Recomend products Slider -->

			</div>
		</div>
		<!-- Recomend products -->

		<!-- Book Collections -->
		<section class="book-collection">
			<div class="container">
				<div class="row">

					<!-- Book Collections Tabs -->
					<div>
						<!-- collection Name -->
						<div class="col-lg-3 col-sm-12">
							<div class="sidebar">
								<h4>Top Books Catagories</h4>
								@if($categories)
                                <ul>
                                    @foreach($categories as $category)
                                        <li><a href="{{ route('front.category' ,[ $category->slug ]) }}">{{ $category->title }}</a></li>
								    @endforeach
                                </ul>
                                @else
                                    <div class="alert alert-danger">
                                        No category found
                                    </div>
                                @endif
							</div>
						</div>
						<!-- collection Name -->

						<!-- Collection Content -->
						<div class="col-lg-9 col-sm-12">
							<div class="collection">

								<!-- Secondary heading -->
								<div class="sec-heading">
									<h3>Shop <span class="theme-color">Books</span> Collection</h3>
									<a class="view-all" href="#">View All<i class="fa fa-angle-double-right"></i></a>
								</div>
								<!-- Secondary heading -->

								<!-- Collection Content -->
								<div class="collection-content">
									<ul>
                                        @foreach($books as $book)
										<li>
                                            <div class="s-product">
                                                <div class="s-product-img">
                                                    @if($book->book_img == 'No image found')
                                                        <img src="/assets/images/hello.png" width="151" height="218">
                                                    @else
                                                        <img src="/uploads/{{ $book->book_img  }}" alt="{{ $book->title }}">
                                                    @endif
                                                    <div class="s-product-hover"></div>
                                                </div>
                                                <h6><a href="{{ route('front.book', [$book->slug]) }}">{{ str_limit($book->title, '18')  }}</a></h6>
                                                <span>{{ str_limit($book->author->title, '16')  }}</span>
                                            </div>
                                        </li>
                                        @endforeach
									</ul>
								</div>
								<!-- Collection Content -->

								<!-- Pagination -->
								<div class="pagination-holder">
									{{ $books->links('pagination.links') }}
								</div>
								<!-- Pagination -->

							</div>
						</div>
						<!-- Collection Content -->
					</div>
					<!-- Book Collections Tabs -->
				</div>
			</div>
		</section>
		<!-- Book Collections Tabs -->

				</div>
			</div>
		</section>
		<!-- Book Collections --> 

		<!-- Services -->
		<section>&nbsp;</section>
		<!-- Services --> 

		<!-- Timeline -->
		<section class="timeline-area tc-padding">
			<div class="container">
				<div class="row">
					<!-- Aurthor -->
					<div class="col-lg-3 col-sm-12">
						<div class="aurthor-img">
                            @if($author->author_img == 'No image found')
                                <img src="/assets/images/hello.png" width="278" height="394">
                            @else
                                <img src="/uploads/{{ $author->author_img  }}" alt="{{ $author->full_name }}">
                            @endif
						</div>
					</div>
					<!-- Aurthor -->

					<!-- Aurthor History -->
					<div class="col-lg-9 col-sm-12 h-white">
                <h2>Author <span class="theme-color">History</span> of Inovation</h2>
                <div id="timeline">
                    <ul id="issues">
                        <li id="1985">
                            <div class="text-box">
                                <div class="left-box">
                                    <h5><span class="theme-color">{{ $author->full_name }}</span> {{ $author->designation }}</h5>
                                    <p>{{ $author->description }}</p>
                                    <div class="follow">
                                        <ul class="social-icons">
                                            <li>Follow us</li>
                                            <li><a class="facebook" href="{{ $author->facebook_id }}" target="_blank"><i class="fa fa-facebook"></i></a></li>
                                            <li><a class="twitter" href="{{ $author->twitter_id }}" target="_blank"><i class="fa fa-twitter"></i></a></li>
                                            <li><a class="youtube" href="{{ $author->youtube_id }}" target="_blank"><i class="fa fa-youtube-play"></i></a></li>
                                            <li><a class="pinterest" href="{{ $author->pinterest_id }}" target="_blank"><i class="fa fa-pinterest-p"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                                <ul class="s-related-products">
                                    @foreach($author->author_books as $key => $author_book)
                                    @if ($key < 3 )
                                        <li>
                                            @if($author_book->book_img == 'No image found')
                                            <img src="/assets/images/hello.png" width="89" height="119">
                                        @else
                                            <img src="/uploads/{{ $author_book->book_img  }}" alt="{{ $author_book->title }}">
                                        @endif
                                            <h6 class="name">{{ $author_book->title }}</h6> 
                                        </li>
                                    @endif
                                    @endforeach                                 
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
					<!-- Aurthor History -->

				</div>
			</div>
		</section>
		<!-- Timeline --> 

		<!-- Blog Nd Gallery-->
		<section class="tc-padding">
			<div class="container">
		      <div class="row">
		      	<!-- Blog -->
		        	<div class="col-lg-4 col-xs-12">
		            <!-- Secondary heading -->
		      		<div class="sec-heading">
		      			<h3>Latest <span class="theme-color">Blog</span> Post</h3>
		      		</div>
		      		<!-- Secondary heading -->

		      		<!-- Blog list -->
		            <div class="blog-style-1">
			             <div class="post-box">
			                <div class="thumb"><img src="/assets/images/blog/img-01.jpg" alt=""></div>
			                <div class="text-column"> <strong><i class="fa fa-user" aria-hidden="true"></i>Justin Greene</strong>
			                <a href="blog-detail.html">24 Images About Bookstores That Every Reader </a> <span><i class="fa fa-clock-o" aria-hidden="true"></i>2 hour ago</span>
			                <em><i class="fa fa-heart" aria-hidden="true"></i>125</em> </div>
			             </div>
			             
			             
		            </div>
		            <!-- Blog list -->

		        	</div>
		        	<!-- Blog -->

		        	<!-- Gallery -->
		        	<div class="col-lg-8 col-xs-12">
		            <div class="gallery">

		              	<!-- Secondary heading -->
		        		<div class="sec-heading">
		        			<h3>Gallery <span class="theme-color">Bookshop</span></h3>
		        			<a class="view-all" href="#">View All<i class="fa fa-angle-double-right"></i></a>
		        		</div>
		        		<!-- Secondary heading -->

		        		<!-- Gallery List -->
			            <ul>
                            @forelse($galleries as $gallery)
                            <li>
                                <div class="gallery-figure">
                                    @if($gallery->media_img == 'No image found')
                                        <img src="/assets/images/hello.png" width="250" height="193">
                                    @else
                                        <img src="/uploads/{{ $gallery->media_img  }}" alt="{{ $gallery->title }}">
                                    @endif 
                                    <div class="overlay">
                                        <ul class="position-center-x">
                                            <li>
                                                <a href="/assets/images/hello.png" data-rel="prettyPhoto[gallery]"><i class="fa fa-plus"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </li>
                            @empty
                                <div class="alert alert-danger">
                                    No Gallery found
                                </div>
                            @endforelse
                        </ul>
			            <!-- Gallery List -->

		            </div>
		        	</div>
		        	<!-- Gallery -->

		      </div>
		  	</div>
		</section>
		<!-- Blog Nd Gallery--> 
	</main>
@endsection