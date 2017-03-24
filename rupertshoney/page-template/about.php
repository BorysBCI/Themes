<?php 
/*Template Name: about page*/
get_header();?>
        <div class="main">
            <section class="moduleImgBanner container">
                <img src="<?php the_field('images'); ?>" alt="img">
            </section>
            <section class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title'); ?></h2>
                <?php the_field('content'); ?>
            </section>
        </div>
<?php get_footer();?>    