<?php 
/*
Template Name: Maarketing
*/
get_header();
?>

<div class="main">
    <section class="pageMarketing">
        <div class="container">
            <div class="pageMarketing__module1">
                <div class="pageMarketing__container1">
                    <h2><?php the_field('title')?></h2>
                    <p><?php the_field('content')?></p>
                </div>
            </div>
            <div class="pageMarketing__module2 imageCover" style="background-image: url('<?php the_field('image')?>')">
                <div class="pageMarketing__container2">
                    <div>
                    	<h3><?php the_field('sub_title')?></h3>
	                    <ul>
						<?php if( have_rows('listing') ): ?>
							<?php while( have_rows('listing') ): the_row(); 
									$item = get_sub_field('item');
									?>  
	                        <li><?php echo $item; ?></li>
							<?php endwhile; ?>
								<?php endif; ?>
	                    </ul>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
            <div class="pageMarketing__module3">
                <div class="pageMarketing__container3">
                    <h3><?php the_field('header')?></h3>
                    <p><?php the_field('main_content')?></p>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </section>
</div>
<?php get_footer();?>