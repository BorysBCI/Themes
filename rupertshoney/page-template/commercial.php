<?php 
/*Template Name: Commercial*/
get_header();?>
        <div class="main">
            <section class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title') ?></h2>
                <?php the_field('content') ?>
            </section>
            <section class="wrapForModule container">
                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('image') ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <div class="moduleImgTable__text">
                                <?php the_field('content1') ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->

                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('image1') ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <div class="moduleImgTable__text">
                                <?php the_field('content2') ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->

                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('image2') ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <div class="moduleImgTable__text">
                                <?php the_field('content3') ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->

                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('image3') ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <div class="moduleImgTable__text">
                                <?php the_field('content4') ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->
            </section>
        </div>
<?php get_footer();?>