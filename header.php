<!DOCTYPE html>
<html lang="ja">
<head>

<meta charset="utf-8">
<meta name="viewport" content="width=device-width" />
<meta name="keywords" content="" />
<?php if(is_home()){ $description = get_bloginfo('name');
}else{ $description = get_bloginfo('name').' | '.trim(wp_title('',false)); } ?>
<meta name="description" content="<?php echo $description.' | '.get_bloginfo('description'); ?>" />

<title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>


<?php /*=======================================
Favicon
===============================================*/ ?>
<link rel="icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />
<link rel="Shortcut Icon" type="image/x-icon" href="<?php bloginfo('template_directory'); ?>/favicon.ico" />

<link rel="stylesheet" type="text/css" href="https://kit-pro.fontawesome.com/releases/v5.12.0/css/pro.min.css" />
<?php /*=======================================
CSS
===============================================*/ ?>
<?php //サイトに合わせて、1・2どちらかのCSS読み込みを使用 ?>

<?php // 1 PCサイトのみの場合 ?>
<link href="<?php bloginfo('stylesheet_url'); ?>?<?php echo filemtime(TEMPLATEPATH.'css/style.css'); ?>" rel="stylesheet" media="all" />


<?php // 2 PC・スマホ（レスポンシブ）サイトの場合 ?>
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/sass/style.css?v=<?php echo filemtime(TEMPLATEPATH.'/css/style.css'); ?>" media="screen and (min-width: 641px), print" />
<link rel="stylesheet" type="text/css" href="<?php bloginfo('template_directory'); ?>/sass/style-sp.css?v=<?php echo filemtime(TEMPLATEPATH.'/css/style-sp.css'); ?>" media="only screen and (max-width: 640px), only and (max-device-width: 735px) and (orientation : landscape)" />

<!--[if lt IE 9]>
<link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>?<?php echo filemtime(TEMPLATEPATH.'/style.css'); ?>" type="text/css" media="all" />
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/selectivizr-min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory'); ?>/js/respond.js"></script>
<![endif]-->


<?php /*=======================================
JavaScript
===============================================*/ ?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>


<script src="<?php bloginfo('template_directory'); ?>/js/swiper.min.js?<?php echo filemtime(TEMPLATEPATH.'/js/swiper.min.js'); ?>"></script>


<?php /* function.js */ ?>
<script src="<?php bloginfo('template_directory'); ?>/js/function.js?<?php echo filemtime(TEMPLATEPATH.'/js/function.js'); ?>"></script>


<?php wp_head(); ?>

</head>
<body <?php body_class(); ?>>

<?php /* Facebookを利用する場合 */ ?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.async = true;
  js.src = "//connect.facebook.net/ja_JP/sdk.js#xfbml=1&version=v2.7";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



<div id="container">

  <div class="l-header">
		<div class="logo"><a href="<?php echo home_url(); ?>/"><img src="<?php bloginfo('template_directory'); ?>/img/common/belleza-logo.png" alt="<?php bloginfo('name'); ?>/"></a></div>


		<!-- ADDING NAVIGATION CLASS -->
		<?php 
			wp_nav_menu( array( 
				'theme_location' => 'primary-menu', 
				'container_class' => 'navigation',
				'menu_class' => 'menu-items'
			) ); 
		?>
		<!-- //END ADDING NAVIGATION CLASS -->

		<!-- //ADDING SUB NAVIGATION CLASS -->
			<?php 
				function clean_custom_menus() {
					$menu_name = 'secondary-menu'; // specify custom menu slug
					if (($locations = get_nav_menu_locations()) && isset($locations[$menu_name])) {
						$menu = wp_get_nav_menu_object($locations[$menu_name]);
						$menu_items = wp_get_nav_menu_items($menu->term_id);
				
						$menu_list = '<div class="contact">' ."\n";
						$menu_list .= "\t\t\t\t". '' ."\n";
						foreach ((array) $menu_items as $key => $menu_item) {
							$title = $menu_item->title;
							$url = $menu_item->url;
							$class = esc_attr( implode( ' ', apply_filters( 'nav_menu_css_class', array_filter( $menu_item->classes ), $menu_item) ) );
							$menu_list .= "\t\t\t\t\t". '<div class="bt '. $class .'"><h6><a href="'. $url .'">'. $title .'</a></h6></div>' ."\n";
						}
						$menu_list .= "\t\t\t\t". '' ."\n";
						$menu_list .= "\t\t\t". '</div>' ."\n";
					} else {
						// $menu_list = '<!-- no list defined -->';
					}
					echo $menu_list;
				}
				echo clean_custom_menus();
			?>
		<!-- //END ADDING SUB NAVIGATION CLASS -->

		<div class="mobile-menu">
			<span><i class="fal fa-bars"></i></span>
		</div>

		<div class="search-icons">
			<div class="icons"></div>
		</div>

	</div><!-- /.l-header -->



	<div class="l-contents">
