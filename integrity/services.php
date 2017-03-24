<?php 
/*Template Name: Services*/
get_header();?>
            <section class="pageTop">
                <div class="container">
                    <h2 class="section_title">Services</h2>
                </div>
            </section>
            <section class="serviceTop">
                <div class="container">
                    
					<?php if ( have_posts() ) {	while ( have_posts() ) { the_post(); ?>
					<?php the_post_thumbnail('full'); ?>
                    <div class="serviceTop__content">
                        <div class="serviceTop__text">
                            <?php the_content();?>
                        </div>
                    </div>
					<?php } } ?>
					
					
                </div>
            </section>
            <section class="specialities">
                <div class="container">
                    <h5 class="specialities__title">Our specialities include:</h5>
                    <ul class="blueSquareList">
                        <?php
		if( have_rows('our_specialist') ):
			while ( have_rows('our_specialist') ) : the_row();
			$item = get_sub_field('item');
			?> 
						<li><?php echo $item;?></li>
					<?php  endwhile; else : endif; ?>	
                    </ul>
                </div>
            </section>
            <section class="moreInformation">
                <div class="container">
                    <h5 class="moreInformation__title"><?php the_field('information');?></h5>
                    <div class="moreInformation__links">
                        
						<a class="nameAppears" href="<?php the_field('sight_surveillance_url');?>">
                            <img src="<?php the_field('sight_surveillance_image');?>" alt="img"/>
                            <div class="nameAppears__title">
                                <span class="nameAppears__text"><?php the_field('sight_surveillance_title');?></span>
                            </div>
                        </a>
                        
						<a class="nameAppears" href="<?php the_field('summit_geo_inc_url');?>">
                            <img src="<?php the_field('summit_geo_inc_image');?>" alt="img"/>
                            <div class="nameAppears__title">
                                <span class="nameAppears__text"><?php the_field('summit_geo_inc_title');?></span>
                            </div>
                        </a>
                    </div>
                </div>
            </section>
<?php get_footer();?>		