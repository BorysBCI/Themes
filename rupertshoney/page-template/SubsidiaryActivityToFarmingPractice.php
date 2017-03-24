<?php 
/*Template Name: Subsidiary Activity to Farming Practice*/
get_header();?>
        <div class="main">
            <section class="moduleImgBanner container">
                <img src="<?php the_field('image') ?>" alt="img"/>
            </section>
            <section class="moduleTableTwoColumn container">
                <div id="subsidiary" class="moduleTableTwoColumn__column decorationArrow">
                    <h2 class="moduleTableTwoColumn__title"><?php the_field('title') ?></h2>
                    <?php the_field('content') ?>
                </div>
                <div class="moduleTableTwoColumn__separator"></div>
                <div id="landless" class="moduleTableTwoColumn__column decorationArrow">
                    <h2 class="moduleTableTwoColumn__title"><?php the_field('title1') ?></h2>
                    <?php the_field('content1') ?>
                </div>
            </section>
            <section class="moduleImgBanner container">
                <img src="<?php the_field('image1') ?>" alt="img"/>
            </section>
            <section id="creating" class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title2') ?></h2>
                <?php the_field('content2') ?>
            </section>
        </div>
<?php get_footer();?>