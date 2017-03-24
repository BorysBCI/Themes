<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Rhdakwerken.nl</title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="keywords" content="HTML5 Template" />
        <meta name="description" content="Metal — A Construction Company Template" />
        <meta name="author" content="zozothemes.com" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <!-- Favicon -->
        <link rel="shortcut icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon-32x32.png" />

        <?php wp_head(); ?>
		
		<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
		(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
		m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)

		})(window,document,'script','https://www.google-analytics.com/analytics.js','ga');

		ga('create', 'UA-89237478-1', 'auto');
		ga('send', 'pageview');

	</script>
    </head>
    <body>
    <div id="page <?php if (is_page('diensten')): ?>diensten<?php endif;?>">
        <!-- Page Loader -->
        <div id="pageloader">
            <div class="loader-item fa fa-spin text-color"></div>
        </div>
        <!-- Top Bar -->
        <div id="top-bar" class="top-bar-section top-bar-bg-light">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12">
                        <!-- Top Contact -->
                        <div class="top-contact link-hover-black">
                            <p>
                                Bel direct voor een gratis offerte 
                                <a href="tel:0736898222">
                                    <i class="fa fa-phone"></i>073-6898222
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar -->
        <!-- Sticky Navbar -->
        <header id="sticker" class="sticky-navigation">
            <!-- Sticky Menu -->
            <div class="sticky-menu relative">
                <!-- navbar -->
                <div class="navbar navbar-default navbar-bg-light" role="navigation">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="navbar-header">
                                    <!-- Button For Responsive toggle -->
                                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                    <span class="sr-only">Toggle navigation</span> 
                                    <span class="icon-bar"></span> 
                                    <span class="icon-bar"></span> 
                                    <span class="icon-bar"></span></button> 
                                    <!-- Logo -->
                                     
                                    <a class="navbar-brand" href="<?php echo get_home_url(); ?>">
                                        <img class="site_logo" alt="Site Logo" src="<?php echo get_template_directory_uri(); ?>/img/Logo.png"  />
                                    </a>
                                </div>
                                <!-- Navbar Collapse -->
                                <div class="navbar-collapse collapse">
                                <?php 
                                    $args = array(
                                        'theme_location'    => 'header_menu',
                                        'menu'              => 'Header Menu',
                                        'container'         => 'div',
                                        'container_id'      => 'top-navigation-primary',
                                        'conatiner_class'   => 'navbar-collapse collapse',
                                        'menu_class'        => 'nav navbar-nav', 
                                        'echo'              => true,
                                        'items_wrap'        => '<ul id="%1$s" class="%2$s">%3$s</ul>',
                                        'depth'             => 10, 
                                        'walker'            => new custom_classes_sub_menu
                                    );

                                    wp_nav_menu( $args );
                                ?>
                                </div>
                            </div>
                            <!-- /.col-md-12 -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- /.container -->
                </div>
                <!-- navbar -->
            </div>
            <!-- Sticky Menu -->
        </header>
        <!-- Sticky Navbar -->