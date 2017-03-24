<?php 
/*Template Name: Aggressive African Bees*/
get_header();?>
        <div class="main">
            <section class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title');?></h2>
                <?php the_field('content');?>
            </section>
            <section class="wrapForModule container">
                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images');?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <div class="moduleImgTable__text">
                                <?php the_field('content2');?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->

                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images2');?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <div class="moduleImgTable__text">
                                <?php the_field('content3');?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->
            </section>
            <section class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title2');?></h2>
                <?php the_field('content4');?>
            </section>
            <section class="moduleImgBanner container">
                <img src="<?php the_field('images3');?>" alt="img">
            </section>
            <section class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title3');?></h2>
                <?php the_field('content5');?>
            </section>
            <section class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title4');?></h2>
                <?php the_field('content6');?>
            </section>
            <section class="moduleTableTwoColumn container">
                <div class="moduleTableTwoColumn__column decorationArrow">
                    <?php the_field('content7');?>
                </div>
                <div class="moduleTableTwoColumn__separator"></div>
                <div class="moduleTableTwoColumn__column decorationArrow">
                    <?php the_field('content8');?>
                    <p></p>
                </div>
            </section>
        </div>
<?php get_footer();?>