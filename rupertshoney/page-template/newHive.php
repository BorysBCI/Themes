<?php 
/*Template Name: new Hive*/
get_header();?>
        <div class="main">
            <section class="moduleImgBanner container">
                <img src="<?php the_field('images') ?>" alt="img">
            </section>
            <section class="moduleTableTwoColumn container">
                <div class="moduleTableTwoColumn__column decorationArrow">
                    <h2 class="moduleTableTwoColumn__title"><?php the_field('title') ?></h2>
                    <?php the_field('content') ?>
                </div>
                <div class="moduleTableTwoColumn__separator"></div>
                <div class="moduleTableTwoColumn__column decorationArrow">
                    <?php the_field('content1') ?>
                </div>
            </section>
            <section class="moduleImgBanner container">
                <img src="<?php the_field('images1') ?>" alt="img">
            </section>
            <section class="moduleText decorationArrow container">
                <?php the_field('content2') ?>
            </section>
        </div>
<?php get_footer();?>