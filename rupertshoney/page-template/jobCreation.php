<?php 
/*Template Name: do Creation*/
get_header();?>
        <div class="main">
            <section class="moduleImgBanner container">
                <img src="<?php the_field('images') ?>" alt="img">
            </section>
            <section id="creation" class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title') ?></h2>
                <?php the_field('content') ?>
            </section>
            <section class="moduleTableTwoColumn container">
                <div id="foods" class="moduleTableTwoColumn__column decorationArrow">
                    <h2 class="moduleTableTwoColumn__title"><?php the_field('title1') ?></h2>
                    <?php the_field('content1') ?>
                </div>
                <div class="moduleTableTwoColumn__separator"></div>
                <div id="protection" class="moduleTableTwoColumn__column decorationArrow">
                    <h2 class="moduleTableTwoColumn__title"><?php the_field('title2') ?></h2>
                    <?php the_field('content2') ?>
                </div>
            </section>
            <section class="moduleImgBanner container">
                <img src="<?php the_field('images1') ?>" alt="img">
            </section>
        </div>
<?php get_footer();?>