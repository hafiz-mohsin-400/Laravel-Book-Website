<!doctype html>
<html class="no-js" lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<meta name="author" content=""/>
<!-- Document Title -->
<title>@yield('page-title') | American Books</title>

<!-- StyleSheets -->
<link rel="stylesheet" href="/assets/css/bootstrap/bootstrap.min.css">
<link rel="stylesheet" href="/assets/css/font-awesome.min.css">
<link rel="stylesheet" href="/assets/css/animate.css">
<link rel="stylesheet" href="/assets/css/icomoon.css">
<link rel="stylesheet" href="/assets/css/main.css">
<link rel="stylesheet" href="/assets/css/color-1.css">
<link rel="stylesheet" href="/assets/css/style.css">
<link rel="stylesheet" href="/assets/css/responsive.css">
<link rel="stylesheet" href="/assets/css/transition.css">

<!-- FontsOnline -->
<link href='https://fonts.googleapis.com/css?family=Merriweather:300,300italic,400italic,400,700,700italic,900,900italic' rel='stylesheet' type='text/css'>
<link href='https://fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900italic,900,100italic,100' rel='stylesheet' type='text/css'>

<!-- JavaScripts -->
<script src="/assets/js/vendor/modernizr.js"></script>
</head>
<body>

<!-- Preloader -->
<!-- <div id="status">
	<div id="preloader">
		<div class="preloader position-center-center">
			<span></span>
			<span></span>
			<span></span>
			<span></span>
		</div>
	</div>
</div> -->
<!-- Preloader -->

<!-- Wrapper -->
<div class="wrapper push-wrapper">
	<!-- Header -->
	<header id="header">
		<!-- Top Bar -->
		<div class="topbar">
			<div class="container">
				
				<!-- Online Option -->
				<div class="online-option">
					<ul>
						<li><a href="#">online store</a></li>
						<li><a href="#">Payment</a></li>
						<li><a href="#">shipping</a></li>
						<li><a href="#">Return</a></li>
					</ul>
				</div>
				<!-- Online Option -->

				<!-- Social Icons -->
				<div class="social-icons pull-right">
					<ul>
						<li><a class="fa fa-facebook" href="#"></a></li>	
						<li><a class="fa fa-twitter" href="#"></a></li>	
						<li><a class="fa fa-google-plus" href="#"></a></li>	
						<li><a class="fa fa-pinterest-p" href="#"></a></li>	
					</ul>
				</div>
				<!-- Social Icons -->

				<!-- Cart Option -->
				<div class="cart-option">
					<ul>
						<li class="add-cart"><a href="#"><i class="fa fa-shopping-bag"></i><span>3</span></a></li>
						<li><a href="#"><i class="fa fa-heart-o"></i>wish List 0 items</a></li>
						<li><a href="#" data-toggle="modal" data-target="#login-modal"><i class="fa fa-user"></i>Login / Register</a></li>
					</ul>
				</div>
				<!-- Cart Option -->

			</div>
		</div>
		<!-- Top Bar -->

		<!-- Nav -->
		<nav class="nav-holder style-1">
			<div class="container">
				<div class="mega-dropdown-wrapper">

					<!-- Logo -->
					<div class="logo">
						<a href="index.html"><img src="/assets/images/logo-1.png" alt=""></a>
					</div>
					<!-- Logo -->

					<!-- Search bar -->
					<div class="search-bar">
						<a href="#"><i class="fa fa-search"></i></a>
					</div>
					<!-- Search bar -->

					<!-- Responsive Button -->
					<div class="responsive-btn">
						<a href="#menu" class="menu-link circle-btn"><i class="fa fa-bars"></i></a>
					</div>
					<!-- Responsive Button -->

					<!-- Navigation -->
					<div class="navigation">
						<ul>
							<li class="{{ Request::is('/') ? 'active' : null }}"><a href="/"><i class="fa fa-home"></i>Home</a></li>
							<li class="{{ Request::is('about') ? 'active' : null }}"><a href="/about"><i class="fa fa-users"></i>About</a></li>
							<li class="{{ Request::is('blog') ? 'active' : null }}"><a href="/blog"><i class="fa fa-th-large"></i>Blog</a></li>
							<li class="{{ Request::is('gallery') ? 'active' : null }}"><a href="/gallery"><i class="fa fa-image"></i>gallery</a></li>
							<li class="{{ Request::is('author') ? 'active' : null }}"><a href="/author"><i class="fa fa-user-plus"></i>author</a></li>
							<li class="{{ Request::is('contact') ? 'active' : null }}"><a href="/contact"><i class="fa fa-fax"></i>contact</a></li>
						</ul>
					</div>				
					<!-- Navigation -->
				</div>
			</div>
		</nav>
		<!-- Nav -->
	</header>
	<!-- Header -->

	<!-- BEGIN MAIN CONTENT -->
		@yield('main-content')
	<!-- END MAIN CONTENT -->

	<!-- Footer -->
	<footer id="footer"> 
	    <!-- Footer columns -->
	    <div class="footer-columns">
	    	<div class="container">

	    		<!-- Add banner -->
	    		<div class="footer-ad-banner">
	    			<a href="#"><img src="/assets/images/footer-ad-banner.jpg" alt=""></a>
	    		</div>
	    		<!-- Add banner -->

	    		<!-- Columns Row -->
	    		<div class="row">
	    			
		    		<!-- Footer Column -->
		    		<div class="col-lg-4 col-sm-6">
		    			<div class="footer-column logo-column">
		    				<a href="index-1.html"><img src="/assets/images/logo-2.png" alt=""></a>
		    				<p>Find out how to prepare your book for an editor with these 4 writing tips! The editing process can be a wonderful opportunity for writers.</p>
		    				<ul class="address-list">
		    					<li><i class="fa fa-home"></i>888 South Avenue Street, New York City.</li>
		    					<li><i class="fa fa-phone"></i>00+123-456-789</li>
		    					<li><i class="fa fa-envelope"></i>contact@onlinbookshops.com</li>
		    				</ul>
		    			</div>
		    		</div>
		    		<!-- Footer Column -->

		    		<!-- Footer Column -->
		    		<div class="col-lg-2 col-sm-6">
		    			<div class="footer-column footer-links">
		    				<h4>Information</h4>
		    				<ul>
		    					<li><a href="#">Home</a></li>
		    					<li><a href="#">shop</a></li>
		    					<li><a href="#">blog</a></li>
		    					<li><a href="#">categories</a></li>
		    					<li><a href="#">Pages</a></li>
		    					<li><a href="#">contact</a></li>
		    				</ul>
		    			</div>
		    		</div>
		    		<!-- Footer Column -->

		    		<!-- Footer Column -->
		    		<div class="col-lg-2 col-sm-6">
		    			<div class="footer-column footer-links">
		    				<h4>Shipping info</h4>
		    				<ul>
		    					<li><a href="#">New Products</a></li>
		    					<li><a href="#">top Sellers</a></li>
		    					<li><a href="#">Manufactirers</a></li>
		    					<li><a href="#">Suppliers</a></li>
		    					<li><a href="#">Special</a></li>
		    					<li><a href="#">Imported</a></li>
		    				</ul>
		    			</div>
		    		</div>
		    		<!-- Footer Column -->

						<!-- Footer Column -->
						<div class="col-lg-4 col-sm-6">
							<div class="footer-column newsletter">
								<h4>Weekly Newsletter</h4>
								<p>Get our awesome releases and latest updates with exclusive news and offers in your inbox.</p>
								<form class="newsletter-input">
									<i class="fa fa-envelope-o"></i>
									<input class="form-control.newsletter" type="text" placeholder="Enter Your Email">
									<button>SUBSCRIBE</button>
								</form>
								<p>We're on Social Networks. Follow us &amp; get in touch!</p>
								<ul class="social-icons">
									<li><a class="facebook" href="#"><i class="fa fa-facebook"></i></a></li>
									<li><a class="twitter" href="#"><i class="fa fa-twitter"></i></a></li>
									<li><a class="youtube" href="#"><i class="fa fa-youtube-play"></i></a></li>
									<li><a class="pinterest" href="#"><i class="fa fa-pinterest-p"></i></a></li>
								</ul>
							</div>
						</div>
						<!-- Footer Column -->

	    		</div>
	    		<!-- Columns Row -->

	    	</div>
	    </div>
	    <!-- Footer columns -->
	    
	    <!-- Sub Footer -->
	   	<div class="sub-foorer">
	   		<div class="container">
	   			<div class="row">
		   			<div class="col-sm-6">
		   				<p>Copyright <i class="fa fa-copyright"></i> 2005-2016 <span class="theme-color">FineLayers</span> All Rights Reserved.</p>
		   			</div>
		   			<div class="col-sm-6">
		   				<a class="back-top" href="#">Back to Top<i class="fa fa-caret-up"></i></a>
		   				<ul class="cards-list">
		   					<li><img src="/assets/images/cards/img-01.jpg" alt=""></li>
		   					<li><img src="/assets/images/cards/img-02.jpg" alt=""></li>
		   					<li><img src="/assets/images/cards/img-03.jpg" alt=""></li>
		   					<li><img src="/assets/images/cards/img-04.jpg" alt=""></li>
		   				</ul>
		   			</div>
	   			</div>
	   		</div>
	   	</div>
	    <!-- Sub Footer -->
	</footer>
	<!-- Footer -->

</div>
<!-- Wrapper -->

<!-- Slide Menu -->
<nav id="menu" class="responive-nav">
	<a class="r-nav-logo" href="index.html"><img src="/assets/images/logo-1.png" alt=""></a>
	<ul class="respoinve-nav-list">
		<li>
			<a class="triple-eff" data-toggle="collapse" href="#list-1"><i class="pull-right fa fa-angle-down"></i>Home</a>
			<ul class="collapse" id="list-1">
				<li><a href="index.html">home 1</a></li>
				<li><a href="index-2.html">home 2</a></li>
			</ul>
		</li>
		<li>
			<a class="triple-eff" data-toggle="collapse" href="#list-2"><i class="pull-right fa fa-angle-down"></i>Shop</a>
			<ul class="collapse" id="list-2">
				<li><a href="shop.html">shop</a></li>
				<li><a href="shop-detail.html">shop Detail</a></li>
			</ul>
		</li>
		<li>
			<a class="triple-eff" data-toggle="collapse" href="#list-3"><i class="pull-right fa fa-angle-down"></i>Blog</a>
			<ul class="collapse" id="list-3">
				<li><a href="blog-all-views.html">blog all views</a></li>
				<li><a href="blog-larg.html">blog Larg</a></li>
				<li><a href="blog-list.html">blog List</a></li>
				<li><a href="blog-grid.html">blog Grid</a></li>
				<li><a href="blog-detail.html">blog detail</a></li>
			</ul>
		</li>
		<li>
			<a class="triple-eff" data-toggle="collapse" href="#list-4"><i class="pull-right fa fa-angle-down"></i>Pages</a>
			<ul class="collapse" id="list-4">
				<li><a href="about.html">about</a></li>
				<li><a href="gallery.html">gallery</a></li>
				<li><a href="event-list.html">event list</a></li>
				<li><a href="event-detail.html">event detail</a></li>
				<li><a href="book-list.html">blog list</a></li>
				<li><a href="book-detail.html">book detail</a></li>
				<li><a href="404.html">404</a></li>
			</ul>
		</li>
		<li>
			<a class="triple-eff" data-toggle="collapse" href="#list-5"><i class="pull-right fa fa-angle-down"></i>author</a>
			<ul class="collapse" id="list-5">
				<li><a href="author.html">author</a></li>
				<li><a href="author-detail.html">author detail</a></li>
			</ul>
		</li>
		<li><a href="contact.html">Contact</a></li>                       
	</ul>
</nav>
<!-- Slide Menu -->

<!-- Login Modal -->
<div class="modal fade login-modal" id="login-modal" role="dialog">
	<div class="position-center-center" role="document">
		<div class="modal-content">
			<strong>Register</strong>
			<button class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
			<div class="social-options">
				<ul>
					<li><a class="facebook" href="#"><i class="fa fa-facebook"></i>Login with facebook</a></li>
					<li><a class="twitter" href="#"><i class="fa fa-twitter"></i>Login with twitter</a></li>
					<li><a class="google" href="#"><i class="fa fa-google-plus"></i>Login with gmail+</a></li>
				</ul>
			</div>
			<form class="sending-form" style="display: none;">
				<div class="form-group">
					<input class="form-control" required="required" placeholder="Full name">
					<i class="fa fa-user"></i>
				</div>
				<div class="form-group">
					<input class="form-control" required="required" placeholder="Email Address">
					<i class="fa fa-user"></i>
				</div>
				<div class="form-group">
					<input class="form-control" type="password" required="required" placeholder="Password">
					<i class="fa fa-user"></i>
				</div>
				<p class="terms">You agree to the hldy.hr <a href="#">Terms &amp; Conditions</a></p>
				<button class="btn-1 shadow-0 full-width">Register account</button>
			</form>

			<form class="sending-form show">
				<div class="form-group">
					<input class="form-control" required="required" placeholder="Email Address">
					<i class="fa fa-user"></i>
				</div>
				<div class="form-group">
					<input class="form-control" type="password" required="required" placeholder="Password">
					<i class="fa fa-key"></i>
				</div>
				<p class="terms">You agree to the hldy.hr <a href="#">Terms &amp; Conditions</a> <br><br><a href="">Already Register</a></p>
				
				<button class="btn-1 shadow-0 full-width">Login</button>
			</form>
		</div>
	</div>
</div>
<!-- Login Modal -->

<!-- Switcher  Panel -->
<div class="switcher"></div>  
<!-- Switcher Panel -->

<!-- Java Script -->

<script src="/assets/js/vendor/jquery.js"></script>        
<script src="/assets/js/vendor/bootstrap.min.js"></script>
<script src="http://maps.google.com/maps/api/js?sensor=false"></script>
<script src="/assets/js/gmap3.min.js"></script>					
<script src="/assets/js/datepicker.js"></script>					
<script src="/assets/js/contact-form.js"></script>					
<script src="/assets/js/bigslide.js"></script>							
<script src="/assets/js/3d-book-showcase.js"></script>					
<script src="/assets/js/turn.js"></script>							
<script src="/assets/js/jquery-ui.js"></script>								
<script src="/assets/js/mcustom-scrollbar.js"></script>					
<script src="/assets/js/timeliner.js"></script>					
<script src="/assets/js/parallax.js"></script>			   	 
<script src="/assets/js/countdown.js"></script>	
<script src="/assets/js/countTo.js"></script>		
<script src="/assets/js/owl-carousel.js"></script>	
<script src="/assets/js/bxslider.js"></script>	
<script src="/assets/js/appear.js"></script>		 		
<script src="/assets/js/sticky.js"></script>			 		
<script src="/assets/js/prettyPhoto.js"></script>			
<script src="/assets/js/isotope.pkgd.js"></script>					 
<script src="/assets/js/wow-min.js"></script>			
<script src="/assets/js/classie.js"></script>					
<script src="/assets/js/main.js"></script>	
<script src="/assets/js/myscript.js"></script>		

</body>
</html