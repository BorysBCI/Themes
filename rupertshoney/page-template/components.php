<?php 
/*Template Name: Components*/
get_header();?>
        <div class="main">
            <section class="moduleImgBanner container">
                <img src="<?php the_field('images') ?>" alt="img">
            </section>
            <section class="moduleThreeRow decorationArrow container">
                <h2><?php the_field('title') ?></h2>
                <div class="moduleThreeRow__row dotLine">
                    <div class="moduleThreeRow__column moduleThreeRow__padding">
                        <?php the_field('content') ?>
                    </div>
                    <div class="moduleThreeRow__column moduleThreeRow__padding">
                        <?php the_field('content1') ?>
                    </div>
                </div>
                <div class="moduleThreeRow__row">
                    <div class="moduleThreeRow__imgLayout"><img src="<?php the_field('images1') ?>" alt="img"/></div>
                    <?php the_field('content2') ?>
                </div>
            </section>
            <section class="wrapForModule container">
                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images2') ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <h2 class="moduleImgTable__title"><?php the_field('title1') ?></h2>
                            <div class="moduleImgTable__text">
                                <?php the_field('content3') ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->
            </section>
            <section class="moduleThreeRow decorationArrow container">
                <h2><?php the_field('title2') ?></h2>
                <div class="moduleThreeRow__img"><img src="<?php the_field('images3') ?>" alt="img"></div>
                <div class="moduleThreeRow__row dotLine">
                    <div class="moduleThreeRow__column moduleThreeRow__padding">
                        <h4><?php the_field('title3') ?></h4>
                        <?php the_field('content4') ?>
                    </div>
                    <div class="moduleThreeRow__column moduleThreeRow__padding">
                        <h4><?php the_field('title4') ?></h4>
                        <?php the_field('content5') ?>
                        <h4><?php the_field('title5') ?></h4>
                        <?php the_field('content6') ?>
                    </div>
                </div>
                <div class="moduleThreeRow__row">
                    <h4><?php the_field('title6') ?></h4>
                    <?php the_field('content7') ?>
                    <h4><?php the_field('title7') ?></h4>
                    <?php the_field('content8') ?>
                </div>
            </section>
            <section class="wrapForModule container">
                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images4') ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <h2 class="moduleImgTable__title"><?php the_field('title8') ?></h2>
                            <div class="moduleImgTable__text">
                                <?php the_field('content9') ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->

                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images5') ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <div class="moduleImgTable__text">
                                <?php the_field('content10') ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->
            </section>
            <section class="moduleTableSeparator__wrap container">
                <div class="moduleTableSeparator decorationArrow">
                    <div class="moduleTableSeparator__text">
                        <h2 class="moduleTableSeparator__title"><?php the_field('title9') ?></h2>
                        <?php the_field('content11') ?>
                    </div>
                    <div class="moduleTableSeparator__img">
                        <img src="<?php the_field('images6') ?>" alt="img">
                    </div>
                </div>
                <div class="moduleTableSeparator__row">
                    <?php the_field('content12') ?>
                </div>
            </section>
            <section class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title10') ?></h2>
                <?php the_field('content13') ?>
            </section>
            <section class="moduleImgBanner container">
                <img src="<?php the_field('images7') ?>" alt="img">
            </section>
            <section class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title11') ?></h2>
                <?php the_field('content14'); ?>
            </section>
        </div>
<?php get_footer();?>