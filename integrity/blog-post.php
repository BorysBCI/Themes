<?php /*Template Name: Blog Post*/
get_header();?>
            <section class="pageTop">
                <div class="container">
                    <h2 class="section_title">Blog</h2>
                </div>
            </section>
            <section class="blogList container">
                 <?php
					$showposts = -1;
					$args = array('cat' => 7, 'orderby' => 'post_date', 'order' => 'DESC', 'posts_per_page' => $showposts);
					$category_posts = new WP_Query($args);
					 if($category_posts->have_posts()) : 
      while($category_posts->have_posts()) : 
         $category_posts->the_post(); ?>  
				<article class="article">
                    <div class="article__img"><?php the_post_thumbnail( 'custom-size' );?></div>
                    <div class="article__info">
                        <a href="javascript:void(0);" class="article__title"><?php the_title();?></a>
                        <span class="article__data"><?php the_time('F j, Y') ?></span>
                        <div class="article__text">
							<?php echo wp_trim_words( get_the_content(), 80, '...' ); ?>
							
                        </div>
                        <div class="article__footer">
                            <ul class="socLink">
                                <li><a class="fa fa-twitter fa-fw fa-lg" href="http://twitter.com/home?status=Reading:<?php the_permalink(); ?>&amp;t=<?php get_the_title(); ?>"></a></li>
                                <li><a class="fa fa-facebook fa-fw fa-lg" href="http://www.facebook.com/sharer.php?u=<?php the_permalink();?>&amp;t=<?php get_the_title(); ?>"></a></li>
                            </ul>
                            <a class="read_more" href="<?php the_permalink();?>">read more <i class="fa fa-angle-right"></i></a>
                        </div>
                    </div>
                </article>
				<?php endwhile; ?>
				<?php endif; ?>
            </section>
            <!--<section class="page_nav">
                <div class="nav-previous"><i class="fa fa-angle-left"></i></div>
                <div class="nav-next"><i class="fa fa-angle-right "></i></div>
            </section>-->
<?php get_footer();?>