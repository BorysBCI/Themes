<?php 
/*Template Name: gender Equality*/
get_header();?>
        <div class="main">
            <section class="moduleImgBanner container">
                <img src="<?php the_field('images') ?>" alt="img"/>
            </section>
            <section id="gender" class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title') ?></h2>
                <?php the_field('content') ?>
            </section>
            <section class="moduleImgBanner container">
                <img src="<?php the_field('images1') ?>" alt="img"/>
            </section>
            <section class="moduleText decorationArrow container">
                <?php the_field('content1') ?>
            </section>
        </div>
<?php get_footer();?>