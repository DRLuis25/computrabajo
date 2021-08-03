<!DOCTYPE html>
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="ie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<!-- Basic Page Needs -->
	<meta charset="utf-8">
	<title>Ori – Multi-purpose Business HTML Template</title>
	<meta name="description" content="Ori – Multi-purpose Business HTML Template">
	<meta name="author" content="2code.info">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Main Style -->
	<link rel="stylesheet" href="/ori/style.css">

	<!-- Skins -->
	<link rel="stylesheet" href="/ori/css/skins/skins.css">

	<!-- Responsive Style -->
	<link rel="stylesheet" href="/ori/css/responsive.css">

	<!-- Favicons -->
	<link rel="shortcut icon" href="/ori/images/favicon.png">

</head>
<body>

<div class="loader"><div class="loader_html"></div></div>

<div id="wrap" class="grid_1200">

	{{-- <header id="header-top">
		<div class="container clearfix">
			<div class="row">
				<div class="col-md-6">
					<div class="phone-email"><i class="fa fa-phone"></i>+ 2 0106 5370701</div>
					<div class="phone-email phone-email-2"><i class="fa fa-envelope"></i>7oroof@7oroof.com</div>
				</div>
				<div class="col-md-6">
					<div class="social-ul">
						<ul>
							<li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
							<li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
							<li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
							<li class="social-pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
							<li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
							<li class="social-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
							<li class="social-dribbble"><a href="#"><i class="fa fa-dribbble"></i></a></li>
							<li class="social-youtube"><a href="#"><i class="fa fa-youtube-play"></i></a></li>
							<li class="social-rss"><a href="#"><i class="fa fa-rss"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- End container -->
	</header><!-- End header --> --}}
    @include('layouts.header')

	<div class="clearfix"></div>

    <section class="content">
        @yield('content')
    </section>

	<footer id="footer" >
		<div class="container">
			<div class="row">
				<div class="col-md-3">
					<div class="footer-widget">
						<div class="widget-title"><h6>About Ori</h6></div>
						<div class="widget-about">
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer lorem quam, adipiscing condimentum tristique vel, eleifend sed turpis. Pellentesque cursus arcu id magna euismod in elementum purus molestie.</p>
							<div class="social-ul">
								<ul>
									<li class="social-facebook"><a href="#"><i class="fa fa-facebook"></i></a></li>
									<li class="social-twitter"><a href="#"><i class="fa fa-twitter"></i></a></li>
									<li class="social-google"><a href="#"><i class="fa fa-google-plus"></i></a></li>
									<li class="social-pinterest"><a href="#"><i class="fa fa-pinterest"></i></a></li>
									<li class="social-vimeo"><a href="#"><i class="fa fa-vimeo-square"></i></a></li>
									<li class="social-linkedin"><a href="#"><i class="fa fa-linkedin"></i></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<div class="widget-title"><h6>Get In Touch</h6></div>
						<div class="widget-about-2">
							<ul>
								<li>
									<i class="fa fa-map-marker"></i>
									<div>7oroof.com Network , 2 AlBahr St, Tanta , AlGharbia, Egypt.</div>
								</li>
								<li>
									<i class="fa fa-phone"></i>
									<div>Ori Sales Telephone No : 002 01065370701</div>
								</li>
								<li>
									<i class="fa fa-envelope"></i>
									<div>Ori Sales Email Account : Sales@ori.com</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<div class="widget-title"><h6>Latest Posts</h6></div>
						<div class="widget-posts">
							<ul>
								<li>
									<div class="widget-post-img"><img alt="" src="http://placehold.it/70x70/FFF/171717/"></div>
									<div class="widget-post-content">
										<h6><a href="#">Integer lorem quam, adiscing contum.</a></h6>
										<span>Date : July 1, 2014</span>
									</div>
								</li>
								<li>
									<div class="widget-post-img"><img alt="" src="http://placehold.it/70x70/FFF/171717/"></div>
									<div class="widget-post-content">
										<h6><a href="#">Integer lorem quam, adiscing contum.</a></h6>
										<span>Date : July 1, 2014</span>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="footer-widget">
						<div class="widget-title"><h6>Latest Tweets</h6></div>
						<div class="widget-twitter">
							<div class="footer-tweet"></div>
						</div>
					</div>
				</div>
			</div><!-- End row -->
		</div><!-- End container -->
	</footer><!-- End footer -->
	<footer id="footer-bottom">
		<div class="container">
			<div class="copyrights">Copyright 2014 Ori | Designer By <a target="_blank" href="http://7oroof.com/">7oroof</a> | Developer By <a target="_blank" href="http://2code.info/">2code</a></div>
			<nav class="navigation-footer">
				<ul>
					<li><a href="index.html">Home</a></li>
					<li><a href="features.html">Features</a></li>
					<li><a href="services.html">Services</a></li>
					<li><a href="portfolio-description.html">Portfolio</a></li>
					<li><a href="blog.html">Blog</a></li>
					<li><a href="shortcodes.html">Shortcodes</a></li>
					<li><a href="contact.html">Contact</a></li>
				</ul>
			</nav>
		</div><!-- End container -->
	</footer><!-- End footer-bottom -->

</div><!-- End wrap -->

<div class="go-up"><i class="fa fa-chevron-up"></i></div>

<!-- js -->
<script src="/ori/js/jquery.min.js"></script>
<script src="/ori/js/html5.js"></script>
<script src="/ori/js/jquery.isotope.min.js"></script>
<script src="/ori/js/jquery.nicescroll.min.js"></script>
<script src="/ori/js/jquery.appear.js"></script>
<script src="/ori/js/count-to.js"></script>
<script src="/ori/js/twitter/jquery.tweet.js"></script>
<script src="/ori/js/jquery.inview.min.js"></script>
<script src="/ori/js/jquery.prettyPhoto.js"></script>
<script src="/ori/js/jquery.bxslider.min.js"></script>
<script src="/ori/js/jquery.themepunch.plugins.min.js"></script>
<script src="/ori/js/jquery.themepunch.revolution.min.js"></script>
<script src="/ori/js/custom.js"></script>
<!-- End js -->
</body>
</html>
