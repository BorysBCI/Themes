<?php 
/*Template Name: Summit Geo Inc*/
get_header();?>
            <section class="pageTop">
                <div class="container">
                    <h2 class="section_title"><?php the_title();?> </h2>
                </div>
            </section>
            <section class="summitGeoInc">
                <div class="container">
                     <?php if ( have_posts() ) {	while ( have_posts() ) { the_post(); ?>
					<div class="summitGeoInc__img"><?php the_post_thumbnail('full'); ?> </div>
                    <div class="blockLogo">
                        <div class="blockLogo__logo"><img src="<?php the_field('logo');?>" alt="img"/></div>
                        <div class="blockLogo__content">
                            <h5><?php the_title();?> </h5>
                            <?php the_content();?>
                            
							<ul class="blueSquareList oneColumn">
                               <?php
									if( have_rows('squarelist') ):
										while ( have_rows('squarelist') ) : the_row();
											$item = get_sub_field('item');
								?> 
							   <li><?php echo $item;?></li>
								<?php  endwhile; else : endif; ?>	
                            </ul>
							
                        </div>
                    </div>
					<?php } } ?>
					
                </div>
            </section>
<?php get_footer();?>	