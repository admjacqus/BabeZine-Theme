<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>" />
<meta name="theme-color" content="#ffffff"/>
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" />
<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-TN84JK3');</script>
<!-- End Google Tag Manager -->
<?php wp_head(); ?>
<title><?php wp_title(''); ?></title>
</head>
<body <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-TN84JK3"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- facebook SDK -->
	<script>
	  window.fbAsyncInit = function() {
	    FB.init({
	      appId      : '308963686216256',
	      xfbml      : true,
	      version    : 'v2.10'
	    });
	    FB.AppEvents.logPageView();
	  };

	  (function(d, s, id){
	     var js, fjs = d.getElementsByTagName(s)[0];
	     if (d.getElementById(id)) {return;}
	     js = d.createElement(s); js.id = id;
	     js.src = "//connect.facebook.net/en_US/sdk.js";
	     fjs.parentNode.insertBefore(js, fjs);
	   }(document, 'script', 'facebook-jssdk'));
	</script>
	<!-- end facebook SDK -->
<div id="wrapper" class="hfeed">

<header id="header" role="banner">
<div class="navigation">
	<ul>
		<li>
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><h5>back to babe zine</h5></a>
		</li>
		<li>
			<a href="https://www.missguided.co.uk/"><h5>shop missguided</h5></a>
		</li>
	</ul>
</div>
<div class="categories">
	<?php wp_nav_menu(array(
				'theme_location' => 'top-menu',
				'container' => '',
				'echo' => true,
				'depth' => 1 )
			);
			?>
	<div class="grad"></div>
</div>
<!-- < ?php get_search_form(); ?> -->
</header>

