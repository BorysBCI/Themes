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
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&amp;subset=latin,cyrillic-ext,latin-ext,cyrillic' rel='stylesheet' type='text/css'>
  <link rel="apple-touch-icon" href="apple-touch-icon.png">
  <!-- Place favicon.ico in the root directory -->

  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri();?>/css/style.css"/>

  <script src="<?php echo get_template_directory_uri();?>/js/jquery-2.2.2.min.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/js/device.min.js"></script>
  <script src="<?php echo get_template_directory_uri();?>/js/main.js"></script>
  <?php wp_head();?>
</head>

<?php if(is_page('job')):?><body class="jobCr"><?php else:?><body><?php endif;?>
<div class="wrap">
<header class="header">
  <div class="container">
    <a class="logo" href="<?php echo home_url();?>">
      <img src="<?php echo get_template_directory_uri();?>/img/logo.png" alt="logo"/>
    </a>
    <nav class="nav">
      <a  class="nav__open fa fa-bars" href="javascript:void(0);"></a>
      <div class="nav__wrap">
		<?php wp_nav_menu( array('theme_location'  => 'header_menu',  'container' =>false, 'menu_class' => 'nav__list', 'echo' => true, 'before' => '', 'after' => '', 'link_before' => '', 'link_after' => '', 'depth' => 2, 'walker' => new Delight_Walker_Menu()));?>
		
      </div>
    </nav>
  </div>
</header>
