<?php 
/*Template Name: safety*/
get_header();?>
            <section class="pageTop">
                <div class="container">
                    <h2 class="section_title">Safety/Environment</h2>
                </div>
            </section>
            <section class="safety">
                
                <div class="safety__img">
                    <div>
                        <img src="<?php the_field('images');?>" alt="safety"/>
                    </div>
                </div>
				<div class="safety__info">
                    <div class="safety__content">
                        <h5 class="safety__title"><?php the_field('title');?></h5>
                        <div class="safety__text">
                            <?php the_field('content');?>
                        </div>
                    </div>
                </div>
            </section>
            <section class="policies">
                <div class="container">
                    <h5>Our Policies</h5>
                    <div class="policies__container">
                        <div class="policies__img">
						<?php if( get_field('pdf_url') ): ?>
							<a href="<?php the_field('pdf_url'); ?>"><img src="<?php the_field('our_policies');?>" alt="doc"/></a>
						<?php endif; ?>
                        </div>
                        <div class="policies__slider">
                            <ul>
							<?php 
						if( have_rows('slider') ): ?>
						<?php 
						while( have_rows('slider') ): the_row(); ?>
                                <li>
                                    <a target="_blank" href="<?php if( get_sub_field('pdf') ): ?><?php the_sub_field('pdf'); ?><?php endif; ?>">
                                        <img src="<?php the_sub_field('images'); ?>" alt="doc"/>
                                    </a>
                                </li>  
								<?php endwhile;  ?>
						<?php endif; ?>	
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </section>
			<section class="safetyLogo">
                <div class="container">
                    <ul>
					<?php 
						if( have_rows('safety_logos') ): ?>
						<?php 
						while( have_rows('safety_logos') ): the_row(); ?>
                        <li><a href="javascript:void(0);"><img src="<?php the_sub_field('images'); ?>" alt="img"/></a></li>
                   <?php endwhile;  ?>
						<?php endif; ?>	
						<!--<li><a href="javascript:void(0);"><img src="img/logos/AvettaNew.png" alt="img"/></a></li>
                        <li><a href="javascript:void(0);"><img src="img/logos/CAGCNew.jpg" alt="img"/></a></li>
                        <li><a href="javascript:void(0);"><img src="img/logos/Complynew.png" alt="img"/></a></li>
                        <li><a href="javascript:void(0);"><img src="img/logos/CORNew.gif" alt="img"/></a></li>
                        <li><a href="javascript:void(0);"><img src="img/logos/ISNNew.png" alt="img"/></a></li>-->
                    </ul>
                </div>
            </section>
 <?php get_footer();?>