<?php 
/*
Template Name: Work
*/
get_header();
?>

<div class="main">
    <section class="pageWork imageCover" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/homeTop.jpg')">
        <div class="container">
            <div style="background: rgba(11,135,197,.7);">
                <div style="background: rgba(0,51,77,.51);"></div>
                <h2>Our Work</h2>
            </div>
            <div style="background: rgba(56,112,127,.7);"><img src="<?php the_field('image')?>" alt="img"/></div>
            <div style="background: rgba(16,78,109,.7);"><img src="<?php the_field('image_1')?>" alt="img"/></div>
            <div style="background: rgba(7,55,79,.7);">
                <div style="background: rgba(161,184,196,.7);"></div>
                <img src="<?php the_field('image_2')?>" alt="img"/>
            </div>
            <div style="background: #1b323e;"><img src="<?php the_field('image_3')?>" alt="img"/></div>
            <div style="background: rgba(161,184,196,.7);">
                <div style="background: rgba(56,165,219,.7);"></div>
                <img src="<?php the_field('image_4')?>" alt="img"/>
            </div>
            <div style="background: rgba(84,204,230,.7);"><img src="<?php the_field('image_5')?>" alt="img"/></div>
            <div style="background: rgba(0,51,77,.51);"><img src="<?php the_field('image_6')?>" alt="img"/></div>
            <div style="background: rgba(21,137,195,.7);"><img src="<?php the_field('image_7')?>" alt="img"/></div>
            
        </div>
    </section>
</div>
<?php get_footer();?>