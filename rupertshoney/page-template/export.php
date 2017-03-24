<?php 
/*Template Name: Export Page*/
get_header();?>
        <div class="main">
            <section class="wrapForModule container">
                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images') ?>" alt="img"/>
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

                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images1') ?>" alt="img"/>
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <h2 class="moduleImgTable__title"><?php the_field('title1') ?></h2>
                            <div class="moduleImgTable__text">
                                <?php the_field('content1') ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->

                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images2') ?>" alt="img"/>
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <div class="moduleImgTable__text">
                                <?php the_field('content2') ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->
            </section>
            <section class="moduleTableSeparator decorationArrow container">
                <div class="moduleTableSeparator__img">
                    <img src="<?php the_field('images3') ?>" alt="img"/>
                </div>
                <div class="moduleTableSeparator__text">
                    <?php the_field('content3') ?>
                </div>
            </section>
        </div><!-- main -->
<?php get_footer();?>