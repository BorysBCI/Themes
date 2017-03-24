<?php
/**
 * Template Name: Default Template
 */

get_header(); 

?>

<!-- Sticky Navbar -->
<?php require_once('page_title.php'); ?>
<!-- page-header -->
<?php if ( have_posts() ) : ?>
<section id="who-we-are" class="page-section border-tb">
    <div class="container who-we-are">
        <div class="section-title text-left">
        <?php 
            $custom_title = get_field('custom_title');
            $right_info_block = get_field('right_info_block');
            $list = get_field('list');
        ?>
            <!-- Title -->
            <?php if ($custom_title): ?>
                <h2 class="title"><?php echo $custom_title; ?></h2>
            <?php else: ?>
                <h2 class="title"><?php the_title(); ?></h2>
            <?php endif; ?>
        </div>
        <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-md-8">
                <?php the_content(); ?>
                <div class="row">
                    <div class="col-md-6">
                    
                    </div>
                </div>
            </div>
        <?php 
        	endwhile;

            if ( function_exists('register_my_widgets') )
                echo '<span class="iglonas">';
				dynamic_sidebar('_sidebar');
				echo '</span>';
                dynamic_sidebar('right_sidebar');
        ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- clients -->
	<?php //require_once('partners_block.php'); ?>
<!-- clients -->


<?php get_footer(); ?>