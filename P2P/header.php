<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <?php if ( is_front_page() && is_home() ) :L?>
  <title><?php bloginfo( 'name' ); ?> | Home</title>
  <?php else:?>
  <title><?php bloginfo( 'name' ); ?> | <?php the_title();?></title>
  <?php endif;?>
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link href='https://fonts.googleapis.com/css?family=Roboto:400,100,100italic,300,300italic,400italic,500,500italic,700,700italic,900,900italic&amp;subset=latin,cyrillic-ext,cyrillic' rel='stylesheet' type='text/css'>
  <link href="https://fonts.googleapis.com/css?family=Oswald:300,400,700&amp;subset=latin-ext" rel="stylesheet">
  <!-- &amp; -->
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <!-- Place favicon.ico in the root directory -->
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/font-awesome.min.css"/>
  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/css/style.css"/>
<?php wp_head(); ?>  
</head>

<?php if(is_page('contact')):?><body class="contactPage"><?php else:?><body><?php endif;?>
<div class="wrap">
<header class="header">
  <div class="container">
    <a class="logo" href="<?php echo home_url();?>">
      <img src="<?php echo get_template_directory_uri(); ?>/img/bigLogo.png" alt="logo"/>
    </a>
    <nav class="nav">
      <a  class="nav__open fa fa-bars" href="javascript:void(0);"></a>
      <div class="nav__wrap">
        <ul class="nav__list">
		  <?php wp_nav_menu( array('theme_location' => 'footer_menu', 'container' =>false, 'container_id' => '', 'items_wrap' => '%3$s') ); ?>
        </ul>
      </div>
    </nav>
  </div>
</header>