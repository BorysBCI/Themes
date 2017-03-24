<?php 
/*
Template Name: Technology
*/
get_header();
?>

<div class="main">
    <section class="pageTechnology">
        <div class="container">
            <h2>Technology</h2>
            <div class="pageTechnology__container">
                <div class="pageTechnology__img"><?php the_post_thumbnail('full'); ?></div>
                <div class="pageTechnology__content">
                    <h3><?php the_field('header')?></h3>
					<?php 
					if ( have_posts() ) {
						while ( have_posts() ) {
							the_post(); 
							the_content();
						} 
					} 
					?>
					
					
                    <p style="display: none;">We have an industry veteran who is familiar with clean sheet supply chain network design, DC design and build, process and standards Management as well as Managing xxxx people and knowing the challenges which this presents. Complementing this experience is a team of Gen Y supply chain up and comers who constantly challenge and ask why. Combined P2P make use of the latest technology and in house built applications to simplify and increase visibility, whilst reducing costs123.</p>
                </div>
            </div>
        </div>
    </section>
</div>
<?php get_footer();?>