<?php 
/*Template Name: Home*/
get_header();?>
<div class="main">
    <section class="pageHome">
        <div class="container">
            <div class="pageHome__img"><img src="<?php the_field('image'); ?>" alt="home"/></div>
            <div class="pageHome__content">
                <h2 class="pageHome__title"><?php the_field('title'); ?></h2>
                <?php the_field('content'); ?>
            </div>
        </div>
    </section>
    <section class="itemGallery">
        <div class="container decorationArrow">
            <div class="itemGallery__content">
                
				<?php if( have_rows('gallery') ): ?>
				<?php while( have_rows('gallery') ): the_row(); 
					$url = get_sub_field('url');
					$image = get_sub_field('image');
					$title = get_sub_field('title');
					?>
					<a class="item" href="<?php echo $url; ?>">
								<div class="item__img"><img src="<?php echo $image; ?>" alt="img"/></div>
								<span class="item__title"><span><?php echo $title; ?></span></span>
					</a>
				<?php endwhile; ?>
				<?php endif; ?>
            </div>
        </div>
    </section>
</div>
<?php get_footer();?>