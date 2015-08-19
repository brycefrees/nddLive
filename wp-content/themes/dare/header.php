<!doctype html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html <?php language_attributes(); ?>> <!--<![endif]-->

<head>

	<meta charset="<?php bloginfo('charset'); ?>" />
	<title>Nakhshab Development & Design </title> 
	<meta name="description" content="An innovative design + build firm located in San Diego, California.">

	<!-- Mobile Specific Metas
    ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
	
	<link rel="shortcut icon" href="<?php echo get_theme_option('favicon'); ?>" />
	<link rel="apple-touch-icon" href="<?php echo get_theme_option('57_favicon'); ?>">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo get_theme_option('72_favicon'); ?>">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo get_theme_option('114_favicon'); ?>">
	
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo('name'); ?> RSS2 Feed" href="<?php bloginfo('rss2_url'); ?>" />
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
		
	<?php wp_head();  ?>
	<link rel="stylesheet" href="http://localhost:8888/NDD/wp-content/themes/dare/css/ndd.css" type="text/css" media="screen" />

	<!--[if lte IE 9]>
	<script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
	<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
			
	<title><?php tf_title(); ?></title>

<!--Heap Analytics-->
    <script type="text/javascript">
      window.heap=window.heap||[],heap.load=function(t,e){window.heap.appid=t,window.heap.config=e;var a=document.createElement("script");a.type="text/javascript",a.async=!0,a.src=("https:"===document.location.protocol?"https:":"http:")+"//cdn.heapanalytics.com/js/heap-"+t+".js";var n=document.getElementsByTagName("script")[0];n.parentNode.insertBefore(a,n);for(var o=function(t){return function(){heap.push([t].concat(Array.prototype.slice.call(arguments,0)))}},p=["clearEventProperties","identify","setEventProperties","track","unsetEventProperty"],c=0;c<p.length;c++)heap[p[c]]=o(p[c])};
      heap.load("2816603774");
    </script>
<!--end analytics-->



 <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>



    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->


<link rel="stylesheet" href="http://localhost:8888/NDD/wp-content/themes/NDD/library/css/carousel.css" type="text/css" media="screen" />
	
</head>


<body <?php body_class(get_theme_option('layout_type')); ?>>


	<div id="header" class="container container-twelve">
	
		<div class="twelve columns">

			<div id="logo" class="four columns alpha">
			
				<a title="<?php echo get_bloginfo('name'); ?>" href="<?php echo home_url( '/' ); ?>">
				
					<img src="<?php echo get_theme_option('logo_image'); ?>">
					
				</a>
			
			</div>

			<div id="nav" class="eight columns omega">
				<ul class="socialMediaIcons">
					<li><a href="http://www.houzz.com/pro/soheil-nakhshab/nakhshab-development-and-design"><img src="http://test.nddinc.net/images/houzz-icon.jpg"></a></li>
					<li><a href="https://www.facebook.com/pages/Nakhshab-Development-and-Design/175254289195269"><img src="http://test.nddinc.net/images/facebook-icon.jpg"></a></li>
				</ul>
				<div class="clearfix"></div>
				<?php wp_nav_menu( array( 'container' => false, 'theme_location' => 'main_nav')); ?>
						
			</div>
		
		</div>
		
		<div class="clear"></div>

	</div><!-- //header -->