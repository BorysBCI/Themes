<?php 
/*Template Name: Why Beekeeping*/
get_header();?>
        <div class="main">
            <section class="wrapForModule container">
                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('whybeekeeping') ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <h2 class="moduleImgTable__title"><?php the_field('title') ?></h2>
                            <div class="moduleImgTable__text">
                                <?php the_field('content') ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->
            </section>
            <section class="moduleText decorationArrow container">
                <?php the_field('content1') ?>
            </section>
            <section class="moduleImgBanner container">
                <img src="<?php the_field('image') ?>" alt="img">
            </section>
            <section class="moduleText decorationArrow container">
                <?php the_field('content2') ?>
            </section>
        </div>
<?php get_footer();?>