<?php 
/*Template Name: Sustained Economic Growth*/
get_header();?>
        <div class="main">
            <section class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title') ?></h2>
                <?php the_field('content') ?>
            </section>
            <section class="moduleImgBanner container">
                <img src="<?php the_field('image') ?>" alt="img">
            </section>
            <section class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title2') ?></h2>
                <?php the_field('content2') ?>
            </section>
        </div>
<?php get_footer();?>