<?php 
/*Template Name: support of Existing And Traditional Beekeepers*/
get_header();?>
        <div class="main">
            <section class="wrapForModule container">
                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('image') ?>" alt="img"/>
                    </div>
                    <div id="support" class="moduleImgTable__content decorationArrow">
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
                        <img src="<?php the_field('image1') ?>" alt="img"/>
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
                        <img src="<?php the_field('image2') ?>" alt="img"/>
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
        </div>
<?php get_footer();?>