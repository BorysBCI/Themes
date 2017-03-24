<?php 
/*Template Name: advantage to rual communities*/
get_header();?>

        <div class="main">
            <section class="wrapForModule container">
                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images1'); ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <h2 class="moduleImgTable__title"><?php the_field('title1'); ?></h2>
                            <div class="moduleImgTable__text">
                                <?php the_field('content1'); ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->
            </section>
            <section class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title2'); ?></h2>
                <?php the_field('content2'); ?>
            </section>
            <section class="wrapForModule container">
                <section class="moduleTableSeparator decorationArrow container">
                    <div class="moduleTableSeparator__img">
                        <img src="<?php the_field('images2'); ?>" alt="img">
                    </div>
                    <div class="moduleTableSeparator__text">
                        <h2 class="moduleTableSeparator__title"><?php the_field('title3'); ?></h2>
                        <?php the_field('content3'); ?>
                    </div>
                </section>

                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images3'); ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <h2 class="moduleImgTable__title"><?php the_field('title4'); ?></h2>
                            <div class="moduleImgTable__text">
                                <?php the_field('content4'); ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->
            </section>
            <section class="moduleText decorationArrow container">
                <h2 class="moduleText__title"><?php the_field('title5'); ?></h2>
                <?php the_field('content5'); ?>
            </section>
            <section class="moduleThreeRow moduleThreeRow__rowLine container">
                <div class="moduleThreeRow__row">
                    <h2><?php the_field('title6'); ?></h2>
                    <?php the_field('content6'); ?>
                </div>
                <div class="moduleThreeRow__row dottedLine">
                    <div class="moduleThreeRow__column">
                        <ul class="moduleThreeRow__list">
                            <li><a href="<?php echo home_url();?>/job-creation-food-security-and-crop-protection#creation">Job creation</a></li>
                            <li><a href="<?php echo home_url();?>/job-creation-food-security-and-crop-protection#foods">Increased food security</a></li>
                            <li><a href="<?php echo home_url();?>/job-creation-food-security-and-crop-protection#protection">Crop protection from raiding wild animals</a></li>
                            <li><a href="<?php echo home_url();?>/gender-equality#gender">Gender Equality and the empowerment of women</a></li>
                            <li><a href="<?php echo home_url();?>/subsidiary-to-farming-practices-landless-agriculture-and-creating-value-from-inaccessible-land#subsidiary">Subsidiary activity to faming practice</a></li>
                            <li><a href="<?php echo home_url();?>/subsidiary-to-farming-practices-landless-agriculture-and-creating-value-from-inaccessible-land#landless">Landless Agriculture</a></li>
                        </ul>
                    </div>
                    <div class="moduleThreeRow__column">
                        <ul class="moduleThreeRow__list">
                            <li><a href="<?php echo home_url();?>/subsidiary-to-farming-practices-landless-agriculture-and-creating-value-from-inaccessible-land#creating">Creating value from inaccessible land</a></li>
                            <li><a href="<?php echo home_url();?>/supporting-existing-and-traditional-beekeeping#support">Support of existing and traditional beekeepers</a></li>
                            <li>Extended shelf life of honey and bees wax</li>
                            <li>Honey used in Medicinal Practices</li>
                            <li>Reversing the global trend of Urbanisation</li>
                            <li>Slowing Deforestation</li>
                        </ul>
                    </div>
                </div>
                <div class="moduleThreeRow__row">
                    <h2><?php the_field('title7'); ?></h2>
                    <?php the_field('content7'); ?>
                </div>
            </section>
            <section class="wrapForModule container">
                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images3'); ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <h2 class="moduleImgTable__title"><?php the_field('title8'); ?></h2>
                            <div class="moduleImgTable__text">
                                <?php the_field('content8'); ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->

                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images4'); ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <h2 class="moduleImgTable__title"><?php the_field('title9'); ?></h2>
                            <div class="moduleImgTable__text">
                                <?php the_field('content9'); ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->

                <div class="moduleImgTable">
                    <div class="moduleImgTable__img">
                        <img src="<?php the_field('images5'); ?>" alt="img">
                    </div>
                    <div class="moduleImgTable__content decorationArrow">
                        <div class="moduleImgTable__wrapText">
                            <h2 class="moduleImgTable__title"><?php the_field('title10'); ?></h2>
                            <div class="moduleImgTable__text">
                                <?php the_field('content10'); ?>
                            </div>
                        </div>
                    </div>
                </div><!-- wrapForModule -->
            </section>
        </div>
    <?php get_footer();?>