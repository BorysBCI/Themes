<?php 
/*Template Name: The Team*/
get_header();?>
        <div class="main">
            <section class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title'); ?></h2>
                <?php the_field('content'); ?>
            </section>
            <section class="wrapForModule container">
                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images'); ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <div class="moduleImgTable__text">
                                <?php the_field('content2'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images1'); ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <div class="moduleImgTable__text">
                                <?php the_field('content3'); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images2'); ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <div class="moduleImgTable__text">
                                <?php the_field('content4'); ?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <section class="moduleText decorationArrow container">
                <?php the_field('content5'); ?>
            </section>
            <section class="moduleImgBanner container">
                <img src="<?php the_field('images3'); ?>" alt="img">
            </section>
        </div>
<?php get_footer();?>