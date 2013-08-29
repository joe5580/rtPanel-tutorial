<?php
/**
 * The Header for rtPanel
 *
 * Displays all of the <head> section and everything up till <div id="content-wrapper">
 *
 * @package rtPanel
 * 
 * @since rtPanel 2.0
 */
global $rtp_general; ?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" <?php language_attributes(); ?>>
<head>
<meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
<title>
<?php wp_title( '' ); ?>
</title>

<!-- Mobile Viewport Fix ( j.mp/mobileviewport & davidbcalhoun.com/2010/viewport-metatag ) -->
<meta name="viewport" content="<?php echo apply_filters( 'rtp_viewport', 'width=device-width, initial-scale=1.0, maximum-scale=1.0' ); ?>" />
<link rel="profile" href="http://gmpg.org/xfn/11" />
<?php if ( 'disable' != $rtp_general['favicon_use'] ) { ?>
<link rel="shortcut icon" type="image/x-icon" href="<?php echo $rtp_general['favicon_upload']; ?>" />
<?php } ?>
<link rel="pingback" href="<?php  bloginfo('pingback_url'); ?>" />
<link rel="stylesheet" href="<?php // bloginfo( 'stylesheet_url' ); ?>" type="text/css" media="all" />
<link rel="apple-touch-icon-precomposed" sizes="144x144" href="">
<link rel="apple-touch-icon-precomposed" sizes="114x114" href="">
<link rel="apple-touch-icon-precomposed" sizes="72x72" href="">
<link id="page_favicon" href="images/favicon.ico" rel="icon" type="" />
<link href='http://fonts.googleapis.com/css?family=Droid+Serif:700' rel='stylesheet' type='text/css'>
<!-- bootstrap CSS file -->
<link href="<?php  bloginfo( 'template_url' ); ?>/css/bootstrap.css" rel="stylesheet">
<link href="<?php  bloginfo( 'template_url' ); ?>/css/bootstrap-responsive.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="<?php  bloginfo( 'stylesheet_directory' ); ?>/css/main.css">
<!-- bxSlider CSS file -->
<link href="<?php  bloginfo( 'template_url' ); ?>/css/jquery.bxslider.css" rel="stylesheet" />
<!-- thickbox CSS file -->
<link rel="stylesheet" href="<?php  bloginfo( 'template_url' ); ?>/css/thickbox.css" type="text/css" media="screen" />
<!-- jqery  min-->
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>

<!-- bxSlider Javascript file -->
<script src="<?php  bloginfo( 'template_url' ); ?>/js/jquery.bxslider.min.js"></script>
<script language="javascript" type="text/javascript" src="<?php  bloginfo( 'template_url' ); ?>/js/thickbox.js"></script>
<script>
		$(document).ready(function(e) {
		$('.bxslider').bxSlider({ minSlides:5,maxSlides: 100,slideWidth: 170,slideMargin:5});
		$('.main_slider').bxSlider({autoControls:true});
		});
		</script>
<script>
$(window).load(function () {
	 function loadData(page){
                    $.ajax
                    ({
                        type: "POST",
                        url: "<?php bloginfo('template_url') ?>/load_data.php",
                        data: "page="+page,
                        success: function(msg)
                        {
                            $("#container_news1").html(msg);
                        }
                    });
                }
                loadData(1);  // For first time page load default results
                $('#container_news1 .pagination li.active').live('click',function(){
                    var page = $(this).attr('p');
                    loadData(page);
                });    
});
</script>

<!--<script type=”text/javascript”> var tb_pathToImage = "<?php  bloginfo( 'stylesheet_directory' ); ?>/images/loadingAnimation.gif";</script>-->

<!--[if lt IE 9]>
            <script src="<?php // echo get_template_directory_uri(); ?>/js/html5.js"></script>
        <![endif]-->

<?php wp_head(); ?>
<?php   rtp_head(); ?>
</head>
<body>
<!-- ends in footer.php -->

<header class="headBg">
  <div class="container">
    <div class="container-fluid">
      <div class="row-fluid"> 
        
        <!-- Logo -->
        <div class="span4">
          <div class="logo"> <a role="link" href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name' ); ?>"><?php echo ( 'image' == $rtp_general['logo_use'] ) ? '<img role="img" alt="' . get_bloginfo( 'name' ) . '" ' . rtp_get_image_dimensions( $rtp_general['logo_upload'] ) . ' src="' . $rtp_general['logo_upload'] . '" />' : get_bloginfo( 'name' ); ?></a>
            <?php // rtp_hook_after_logo(); ?>
          </div>
        </div>
        <!-- Logo --> 
        
        <!-- Top Menu -->
        <div class="span8">
          <div class="rightHeader">
            <div class="topList">
              <?php wp_nav_menu(array('menu' => 'Top Menu') ); ?>
              <div class="clearfix"></div>
            </div>
            <!-- Search Box -->
            <div class="search">
              <?php if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('Search Widget') ) : ?>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <nav class="navbg">
    <div class="container">
      <div class="container-fluid">
        <div class="row-fluid"> 
          
          <!-- Primary Menu--> 
          
          <a class="toggleMenu" href="#">Menu</a>
          <?php wp_nav_menu(array('menu_class' => 'nav') ); ?>
          <div class="clearfix"></div>
        </div>
      </div>
    </div>
    </div>
  </nav>
</header>
<!-- Header Over --->