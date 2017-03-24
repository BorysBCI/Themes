<?php get_header(); ?>
        <?php 
            $top_slider = get_field('top_slider', 66); 
            if ($top_slider):
        ?>
        <section class="slider border-bottom tp-banner-container">
            <div class="tp-banner">
                <ul>
                <?php foreach ($top_slider as $slide): ?>
                    <li data-delay="7000" data-transition="fade" data-slotamount="7" data-masterspeed="2000">
                        <div class="elements">
                            <div class="tp-caption tp-resizeme lfr" data-x="right" data-y="0" data-speed="1000" data-start="2040"
                            data-easing="Power4.easeOut" data-endspeed="500" data-endeasing="Power1.easeIn"
                            style="z-index: 4; text-align:right; margin-right:-200px;">
                                <img src="<?php echo $slide['image']; ?>" width="800" height="600" alt="" />
                            </div>
                            <h2 class="tp-caption tp-resizeme lft skewtotop title bold white" data-x="25" data-y="18" data-speed="1000" data-start="1700" data-easing="Power4.easeOut" data-endspeed="500" data-endeasing="Power1.easeIn">
                                <strong><?php echo wordwrap($slide['text_top'], 55, "<br />\n"); ?></strong>
                            </h2>
                            <h2 class="tp-caption tp-resizeme lft skewtotop title bold white" data-x="left" data-y="42" data-speed="1200"
                            data-start="1900" data-easing="Power4.easeOut" data-endspeed="500" data-endeasing="Power1.easeIn">
                                <strong class="add-text"><?php echo $slide['bott_text']; ?></strong>
                            </h2>

                            <a href="<?php echo $slide['link']; ?>" class="tp-caption tp-resizeme lft skewtotop button_slider_top" data-x="25" data-y="140" data-speed="1200" data-start="1900" data-easing="Power4.easeOut" data-endspeed="500" data-endeasing="Power1.easeIn">
                            <!-- <p>GRATIS DAKINSPECTIE</p> -->
                            </a>
                        </div>	
                        <img src="<?php echo $slide['background']; ?>" style="background-color:<?php echo $slide['background_color']; ?>" alt="" data-bgfit="normal"
                        data-bgposition="top left" data-bgrepeat="repeat" />
                    </li>
                <?php endforeach; ?>
                </ul>
                <div class="tp-bannertimer"></div>
            </div>
        </section>
        <?php endif; ?>

        <!-- slider -->
        <section id="services" class="page-section transparent slider-block1 top-up" data-animation="fadeInUp">
            <div class="container">
                <div class="row">
                    <div class="owl-carousel navigation-1 light-switch text-left" data-pagination="true" data-items="3"
                    data-autoplay="true" data-navigation="false">
                    <?php
                        $args = array(
                                'sort_order'   => 'ASC',
                                'sort_column'  => 'post_title',
                                'hierarchical' => 1,
                                'exclude'      => '',
                                'include'      => '',
                                'meta_key'     => '',
                                'meta_value'   => '',
                                'authors'      => '',
                                'child_of'     => 7,
                                'parent'       => -1,
                                'exclude_tree' => '',
                                'number'       => '',
                                'offset'       => 0,
                                'post_type'    => 'page',
                                'post_status'  => 'publish',
                            ); 
                            $pages = get_pages($args);

                            foreach($pages as $post){ setup_postdata($post); ?> 
                                <div class="col-sm-4 col-md-4 col-xs-12">
                                    <p class="service-image">
                                    <?php $url_img = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
                                        <a href="<?php echo $url_img; ?>" data-rel="prettyPhoto[portfolio]">
                                            <?php echo get_the_post_thumbnail($page->ID, array(318, 206)); ?>
                                        </a>
                                    </p>
                                    <div class="service-details">
                                        <h3>
                                            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                        </h3>
                                        <?php
                                            $excertp = get_the_excerpt();
                                            $excertp = substr($excertp, 0, 210);
                                            // var_dump($excertp);
                                        ?>
                                        <p><?php echo $excertp; ?></p>
                                        <a href="<?php the_permalink(); ?>" class="btn btn-default">Lees verder</a>
                                    </div>
                                </div>
                    <?php 
                            } wp_reset_postdata();
                    ?>
                    </div>
                </div>
            </div>
        </section>
        <!-- slider -->

        <!-- Services -->
        <?php 
            $services = get_field('services', 66); 
            if ($services):
        ?>
        <section id="who-we-are" class="page-section light-bg border-tb">
            <div class="container who-we-are">
            <?php foreach ($services as $value): ?>
                <div class="section-title">
                    <h2 class="title"><?php echo $value['title']; ?></h2>
                </div>
                <?php echo $value['text']; ?>
				&nbsp;
				&nbsp;
				&nbsp;
				&nbsp;
                <div class="row text-center">
                <?php foreach ($value['icon_block'] as $val): ?>
                    <div class="col-sm-3 col-md-3">
                        <i class="fa fa-<?php echo $val['icon'] ?> medium text-color fa-2x icons-circle border-color"></i>
                        <h4><?php echo $val['title_block'] ?></h4>
                        <p><?php echo $val['text_block'] ?></p>
                        <hr />
                    </div>
                <?php endforeach; ?>
            <?php endforeach; ?>
            </div>
        </section>
        <?php endif; ?>
        <!-- Services -->

        <!-- who-we-are -->
        <?php 
            $who_we_are = get_field('who_we_are', 66); 
            if ($who_we_are):
        ?>
        <section id="works" class="page-section bottom-pad-0">
            <?php foreach ($who_we_are as $value): ?>
            <div class="work-section">
                <div class="section-title my_custom_title">
                    <!-- Heading -->
                    <h2 class="title"><?php echo $value['title']; ?></h2>
                </div>
                <div id="mix-container" class="portfolio-grid custom no-item-pad">
                    <?php foreach ($value['image_block'] as $val): ?>
                    <div class="grids col-xs-12 col-sm-4 col-md-3 mix all commercial">
                        <div class="grid">
                            <img src="<?php echo $val['image'] ?>" height="270" alt="Recent Work"
                            class="img-responsive" />
                            <div class="figcaption">
                                <h4><?php echo $val['title_post'] ?></h4>
                                <!-- Image Popup--> 
                                <!--<a href="<?php //echo $val['link'] ?>">
                                    <i class="fa fa-link"></i>
                                </a>-->
                            </div>
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </section>
        <?php endif; ?>
<!-- index____.html -->
        <!-- news -->
        <?php 
            $news_post = get_posts( array(
                                'numberposts'     => 5, // тоже самое что posts_per_page
                                'offset'          => 0,
                                'category'        => '',
                                'orderby'         => 'post_date',
                                'order'           => 'DESC',
                                'include'         => '',
                                'exclude'         => '',
                                'meta_key'        => '',
                                'meta_value'      => '',
                                'post_type'       => 'news',
                                'post_mime_type'  => '', // image, video, video/mp4
                                'post_parent'     => '',
                                'post_status'     => 'publish'
                            ) );
        if ($news_post):
        ?>
        <section id="testimonials" class="page-section light-bg border-tb">
            <div class="container">
                <div class="row">
                    <div class="col-sm-12 col-md-12 testimonials">
                        <div class="owl-carousel pagination-2 text-center color-switch" data-pagination="true" data-autoplay="true"
                        data-navigation="false" data-singleitem="true">
                        <?php foreach($news_post as $post): setup_postdata($post); ?>
                            <?php $author_block = get_field('author_block'); ?>
                            <div class="item">
                                <div class="quote">
                                    <?php the_content(); ?>
                                </div>
                                <div class="client-details text-center left-align">
                                    <div class="client-image">
                                        <!-- Image -->
                                        <img class="img-circle" src="<?php echo $author_block[0]['avatar'] ?>" width="80" height="80"
                                        alt="" />
                                    </div>
                                    <div class="client-details">
                                    <!-- Name -->
                                    <strong class="text-color"><?php echo $author_block[0]['name_and_sname'] ?></strong> 
                                    <!-- Company -->
                                    <span><?php echo $author_block[0]['role'] ?></span></div>
                                </div>
                            </div>
                        <?php endforeach; wp_reset_postdata(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <?php  endif; ?>
        <!-- testimonials -->

        <!-- clients -->
        <?php require_once('partners_block.php'); ?>
        <!-- clients -->
		
<?php if(is_home()):?>		
<style>
#services{position:relative;margin-top:-265px;}
#services .container{position:relative;}
#services:before{
position:absolute;
left:0;
top:140px;
content:"";
height:100%;
width:100%;
background:#fff;
/*border-top:3px solid  #3fa535;*/

}

#services{position:relative;margin-top:-265px;}
#services.page-section{position:relative;margin-top:-265px;}


/* .video-responsive{
    overflow:hidden;
    padding-bottom:46.25%;
    position:relative;
    height:0;
}
.video-responsive iframe{
    left:0;
    top:0;
    height:420px;
    width:315px;
    position:absolute;
} */

/* @media only screen 
and (min-device-width : 375px) 
and (max-device-width : 667px) 
and (orientation : portrait) { .video-responsive{
  
    padding-bottom:46.25%;
    position:relative;
    height:0;
}
.video-responsive iframe{
    left:0;
    top:0;
    height:420px;
    width:315px;
    position:absolute;
} }


@media only screen 
and (min-device-width : 414px) 
and (max-device-width : 736px) { .video-responsive{
    
    padding-bottom:46.25%;
    position:relative;
    height:0;
}
.video-responsive iframe{
    left:0;
    top:0;
    height:420px;
    width:315px;
    position:absolute;
}}

@media only screen 
and (min-device-width : 320px) 
and (max-device-width : 568px) { .video-responsive{
    padding-bottom: 50%;
    position: relative;
    height: 370px;
    top: -60px;
    margin: 0% 10% 6% 1%;
}
.video-responsive iframe{
    left:0;
    top:0;
    height:420px;
    width:315px;
    position:absolute;
}}

@media only screen 
and (min-device-width : 320px) 
and (max-device-width : 568px) 
and (orientation : landscape) { .video-responsive{
    
    padding-bottom:50%;
    position:relative;
    height:0;
}
.video-responsive iframe{
    left:0;
    top:0;
    height:420px;
    width:315px;
    position:absolute;
}}

@media only screen 
and (min-device-width : 320px) 
and (max-device-width : 568px) 
and (orientation : portrait) { .video-responsive{
    
    padding-bottom:46.25%;
    position:relative;
    height:0;
}
.video-responsive iframe{
    left:0;
    top:0;
    height:420px;
    width:315px;
    position:absolute;
} } */


@media screen and (device-width: 320px) and (device-height: 568px) and (-webkit-device-pixel-ratio: 2){.video-responsive{
	padding-bottom: 50%;
    position: relative;
    height: 260px;
    top: -60px;
    margin: 0% 10% 6% 1%;
}}

.video-container {
	position:relative;
	padding-bottom:56.25%;
	padding-top:30px;
	height:0;
	overflow:hidden;
}

.video-container iframe, .video-container object, .video-container embed {
	position:absolute;
	top:0;
	left:0;
	width:100%;
	height:100%;
}

.youtubevideowrap {
    width: 100%;
    max-width: 560px;
    margin: 0 auto;
	padding: 0% 0% 5% 0%;
}
</style>
<?php endif;?>	


<?php if ( is_front_page() && is_home() ) {?>
<div class="youtubevideowrap">
<div class="video-container"><iframe width="560" height="315" src="http://www.youtube.com/embed/UavVkTnDCNc" frameborder="0" allowfullscreen></iframe></div>
</div>

<?php } ?>  

<?php get_footer(); ?>