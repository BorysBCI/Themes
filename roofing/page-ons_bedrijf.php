<?php
/**
 * Template Name: Ons Bedrijf
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
            $custom_title = get_field('custom_title', 5);
            $right_block = get_field('right_block');
        ?>
            <!-- Title -->
            <h2 class="title"><?php echo $custom_title; ?></h2>
        </div>
        <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-md-8">
                <?php the_content(); ?>
                <div class="row">
                    <div class="col-md-6">
                    <?php if ($list): ?>
                        <ul class="arrow-style">
                            <?php foreach ($list as $val): ?>
                                <li><?php echo $val['text']; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php if ($right_block): ?>
                <?php
                    foreach ($right_block as $key => $value) {
                        if (is_array($value)) {
                            foreach ($value as $key => $img_url) { ?>
                            <div class="col-md-4"> 
                                <img src="<?php echo $img_url; ?>" width="360px">
                            </div>
                        <?php  
                            }
                        }
                    }
                ?>
        <?php 
            endif;
        	endwhile;
        	if ( function_exists('register_my_widgets') )
                dynamic_sidebar('right_sidebar');
        ?>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- clients -->
	<?php require_once('partners_block.php'); ?>
<!-- clients -->


<?php get_footer(); ?>