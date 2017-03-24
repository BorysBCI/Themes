<?php 
/*Template Name: Contact*/
get_header();?>
        <div class="main">
            <section class="moduleImgBanner container contactImg">
                <img src="<?php the_field('images');?>" alt="img">
            </section>
            <section class="pageContact">
                <div class="container">
                    <div class="pageContact__wrap">
						<?php echo do_shortcode('[contact-form-7 id="174" title="Contact form 1" html_class="pageContact__form"]');?>
                        <div class="pageContact__left decorationArrow">
                            <div class="pageContact__col1">
                                <h3><?php the_field('title');?></h3>
                                <?php the_field('contact_info');?>
                            </div>
                            <div class="pageContact__col2">
                                <h3><?php the_field('title2');?></h3>
                                <?php the_field('contact_info2');?>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
<?php get_footer();?>