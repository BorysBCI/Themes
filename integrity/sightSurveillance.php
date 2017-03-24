<?php 
/*Template Name: Sight Surveillance*/
get_header();?>
            <section class="pageTop">
                <div class="container">
                    <h2 class="section_title"><?php the_title();?></h2>
                </div>
            </section>
            <section class="sightSurveillance">
                <div class="container">
                <?php if ( have_posts() ) {	while ( have_posts() ) { the_post(); ?>
					   
					<div class="sightSurveillance__img"><?php the_post_thumbnail('full'); ?> </div>
                    <div class="blockLogo">
                        <div class="blockLogo__logo"><img src="<?php the_field('logo');?>" alt="img"/></div>
                        <div class="blockLogo__content">
                            <h5><?php the_title();?></h5>
                            <?php the_content();?>
                        </div>
                    </div>
					<?php } } ?>
					
                </div>
            </section>
<?php get_footer();?>	