@extends('layout.master')

@section('page-title')
	Gallery
@endsection

@section('main-content')
<main class="main-content">

		<!-- Gallery -->
        <div class="gallery tc-padding">
      		<div class="container">
      			<div class="row no-gutters">
      				@forelse($galleries as $gallery)
      				<div class="col-lg-3 col-xs-6 r-full-width">
      					<div class="gallery-figure style-2">
      						@if($gallery->media_img == 'No image found')
      							<img src="/assets/images/hello.png" width="291" height="291" alt="No Image">
      						@else
      							<img src="/uploads/{{ $gallery->media_img }}" width="291" height="291" alt="{{ $gallery->title }}">
      						@endif 
	                  		<div class="overlay">
	                  			<ul class="position-center-x">
	                  				<li><a href="/assets/images/noimage.png" data-rel="prettyPhoto[gallery]"><i class="fa fa-plus"></i></a></li>
	                  			</ul>
	                  		</div>
	                  	</div>
      				</div>
      				@empty
      					<div class="alert alert-danger">
      						No gallery found
      					</div>
      				@endforelse
      				<div class="col-xs-12">
      					<div class="pagination-holder">
      						{{ $galleries->links('pagination.links') }}
		           		</div>
      				</div>
      			</div>
            </div>
      	</div>
		<!-- Gallery -->

	</main>
@endsection