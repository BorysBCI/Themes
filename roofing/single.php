<?php
/**
 * Template Name: Default Post
 */

get_header(); 

?>
        <div class="clearfix"></div>
        <?php if ( have_posts() ) : ?>
            <?php while ( have_posts() ) : the_post(); ?>
            <?php
                $slider = get_field('slider');
                $text_block_left = get_field('text_block_left');
                $text_block_center = get_field('text_block_center');
                $text_block_right = get_field('text_block_right');
                $social_link = get_field('social_link');
                $i = 0;
            ?>
                <section id="portfolio-header" class="no-pad">
                    <div id="carousel-example-generic1" class="carousel slide carousel-fade" data-ride="carousel">
                        <!-- Wrapper for slides -->
                        <div class="carousel-inner" role="listbox">
                        <?php foreach ($slider as $img): ?>
                            <?php if ($i == 0): ?>
                                <div class="item active">
                                    <img src="<?php echo $img['image']; ?>" alt="" title="" width="2000" height="1080" />
                                </div>
                            <?php else: ?>
                                <div class="item ">
                                    <img src="<?php echo $img['image']; ?>" alt="" title="" width="2000" height="1080" />
                                </div>
                            <?php endif; ?>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                        <!-- <div class="item active">
                            <img src="img/sections/portfolio/single/1.jpg" tppabs="http://zozothemes.com/html/metal/demo-light/img/sections/portfolio/single/1.jpg" alt="" title="" width="2000" height="1080" />
                        </div>
                        <div class="item">
                            <img src="img/sections/portfolio/single/2.jpg" tppabs="http://zozothemes.com/html/metal/demo-light/img/sections/portfolio/single/2.jpg" alt="" title="" width="2000" height="1080" />
                        </div> -->
                        <!-- Controls -->
                        <a class="left carousel-control" href="#carousel-example-generic1" role="button" data-slide="prev">
                        <span class="fa fa-angle-left fa-2x" aria-hidden="true"></span> 
                        <span class="sr-only">Previous</span></a> 
                        <a class="right carousel-control" href="#carousel-example-generic1" role="button" data-slide="next">
                        <span class="fa fa-angle-right fa-2x" aria-hidden="true"></span> 
                        <span class="sr-only">Next</span></a></div>
                    </div>
                </section>
                <section id="works" class="page-section">
                    <div class="container">
                        <div class="section-title text-left">
                            <!-- Heading -->
                            <h2 class="title"><?php the_title(); ?></h2>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <?php echo $text_block_left; ?>
                                <div class="icon-3 static-color-icons hover-color">
                                    <?php
                                        foreach ($social_link as $key => $value) {
                                            if ($value['on_off'] == 'on') {
                                                echo '<a href="'.$value['link'].'">';
                                                    echo '<span class="pe-so-'.str_replace(' ', '-', $value['title']).'"></span>';
                                                echo '</a>';
                                            }
                                        }

                                    ?>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <?php echo $text_block_center; ?>
                            </div>
                            <div class="col-md-4">
                                <?php echo $text_block_right; ?>
                                <!-- <a href="#" class="btn btn-default">Contact Us</a> -->
                            </div>
                        </div>
                    </div>
                </section>
            <?php endwhile; ?>
        <?php endif; ?>
        <!-- works -->
        <section id="related-projects" class="page-section light-bg border-tb">
            <div class="container">
                <div class="section-title">
                    <!-- Heading -->
                    <h2 class="title">Related Projects</h2>
                </div>
                <div class="row">
                    <div class="col-md-12 portfolio-grid text-center">
                        <div class="owl-carousel pagination-1 light-switch" data-pagination="true" data-items="4"
                        data-autoplay="true" data-navigation="false">
                            <?php 
                                $posts = get_posts( array(
                                    'numberposts'     => 10, // тоже самое что posts_per_page
                                    'offset'          => 0,
                                    'category'        => '',
                                    'orderby'         => 'post_date',
                                    'order'           => 'DESC',
                                    'include'         => '',
                                    'exclude'         => '',
                                    'meta_key'        => '',
                                    'meta_value'      => '',
                                    'post_type'       => 'post',
                                    'post_mime_type'  => '', // image, video, video/mp4
                                    'post_parent'     => '',
                                    'post_status'     => 'publish'
                                ) );
                            foreach($posts as $post){ setup_postdata($post); ?>
                                <div class="grids col-xs-12 col-sm-4 col-md-3">
                                    <div class="grid non_grey">
                                        <?php 
                                            $url_img = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); 
                                        ?>

                                        <img src="<?php echo $url_img; ?>" width="400" height="273" alt="Recent Work"
                                        class="img-responsive" />
                                        <div class="figcaption">
                                            <h4><?php the_title(); ?></h4>
                                            <!-- Image Popup-->
                                            <a href="<?php the_permalink(); ?>">
                                                <i class="fa fa-link"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            <?php
                            }
                            wp_reset_postdata();
                            ?>
                            

                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- clients -->


<?php get_footer(); ?>