<?php 
/*Template Name: about*/
get_header();?>
            <section class="aboutTop">
                <div class="aboutTop__title">
                    <div class="container">
                        <h2 class="section_title"><?php the_title();?></h2>
                    </div>
                </div>
                <div class="aboutTop__bottom image" style="background-image: url('<?php the_field('background');?>');"></div>
            </section>
            <section class="aboutText">
                <div class="container">
                    <div class="aboutText__content">
                        <h4 class="aboutText__subtitle"><?php the_title();?></h4>
                        <?php 
							if ( have_posts() ) {
								while ( have_posts() ) {
									the_post(); 
									the_content();
								}
							} 
							?>
                    </div>
                </div>
            </section>
            <section class="ourTeam">
                <div class="container">
					<div class="ourTeam__title">Our Vision: “To Be The Best At Everything We do” </div>
                    <div class="ourTeam__title">Our team:</div>
                    <div class="ourTeam__container">
                   <?php if(get_field('our_team')): ?>
					<?php while(has_sub_field('our_team')): ?>
						<div class="ourTeam__box">
                            <div class="ourTeam__name">
                                <p><?php the_sub_field('name'); ?> – <span><?php the_sub_field('position'); ?></span></p>
                            </div>
                            <div class="ourTeam__desc">
                                <?php the_sub_field('description'); ?>
                            </div>
                        </div>
					<?php endwhile; ?>
					<?php endif; ?>
                    </div>
                </div>
            </section>
<?php get_footer();?>