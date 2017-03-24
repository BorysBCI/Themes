<!doctype html>
<html lang="en">
    <head lang="en">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php the_title(); ?></title>
  <meta name="author" content="GeekTeam">
  <meta name="description" content="">
  <meta name="keywords" content="">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,300italic,400italic,500,500italic,700,700italic,900,900italic&amp;subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style/font-awesome.min.css"/>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/style/style.css"/>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/resize.css"/>

  <script src="<?php echo get_template_directory_uri();?>/js/jquery-2.2.2.min.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/js/device.min.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/js/jquery.bxslider.min.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/js/main.js"></script>
  <script>
    var mapSettings = {
      centerCoord: {
        lat: 55.345966,
        lng: -118.775184
      },
      zoom: 16,
      scrollwheel: false,
      marker: {
        coord: {
          lat: 55.345966,
          lng: -118.775184
        },
        title: '',
        image: ''
      }
    };
  </script>
 
  <?php wp_head();?>
</head>

<?php if(is_front_page()):?><body class="homePage"><?php else:?><body>
<?php endif;?>
    <div class="wrap">
		<header class="header">
		  <div class="container">
		    <a class="logo" href="<?php echo home_url();?>">
		      <img class="logoImg" src="<?php echo get_template_directory_uri();?>/img/logo.png" alt="logo"/>
		      <img class="logoImgHome" src="<?php echo get_template_directory_uri();?>/img/logoHome.png" alt="logo"/>
		    </a>
		    <nav class="nav">
		      <a  class="open_nav fa fa-bars" href="javascript:void(0);"></a>
		      <ul>
			  <?php wp_nav_menu( array( 'theme_location' => 'header_menu', 'container' =>'', 'items_wrap' => '%3$s') ); ?>
		      <!--  <li><a class="active" href="javascript:void(0);">Home</a></li>
		        <li class="active"><a href="javascript:void(0);">About Us</a></li>
		        <li><a href="javascript:void(0);">Services</a></li>
		        <li><a href="javascript:void(0);">Safety/Environment</a></li>
		        <li><a href="javascript:void(0);">Equipment</a></li>
		        <li><a href="javascript:void(0);">Blog</a></li>
		        <li><a href="javascript:void(0);">Contact Us</a></li>-->
		      </ul>
		    </nav>
		  </div>
		</header>
		<div class="main">