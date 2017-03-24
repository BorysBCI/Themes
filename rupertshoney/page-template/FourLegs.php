<?php 
/*Template Name: Four Lengs*/
get_header();?>
        <div class="main">
            <section class="wrapForModule container">
                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images') ?>" alt="img">
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
            <section class="moduleImgBanner container">
                <img src="<?php the_field('images1') ?>" alt="img">
            </section>
            <section class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title1') ?></h2>
                <?php the_field('content1') ?>
            </section>
            <section class="wrapForModule container">
                <section class="moduleTableSeparator decorationArrow container">
                    <div class="moduleTableSeparator__img">
                        <img src="<?php the_field('images2') ?>" alt="img">
                    </div>
                    <div class="moduleTableSeparator__text">
                        <h2 class="moduleTableSeparator__title"><?php the_field('title2') ?></h2>
                        <?php the_field('content2') ?>
                    </div>
                </section>

                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images3') ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <h2 class="moduleImgTable__title"><?php the_field('title3') ?></h2>
                            <div class="moduleImgTable__text">
                                <?php the_field('content3') ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->

                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images4') ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <h2 class="moduleImgTable__title"><?php the_field('title4') ?></h2>
                            <div class="moduleImgTable__text">
                                <?php the_field('content4') ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->
            </section>
            <section class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title5') ?></h2>
                <?php the_field('content5') ?>
            </section>
        </div>
<?php get_footer();?>