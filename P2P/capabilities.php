<?php 
/*
Template Name: Capabilities
*/
get_header();
?>

        <div class="main">
            <section class="capabilities">
                <div class="container">
                    
					 <div class="capabilities__module">
                        <div class="capabilities__img"><img src="<?php the_field('image_block')?>" alt="img"/></div>
                        <div class="capabilities__text" style="background: <?php the_field('color_code')?>">
                            <div>
                            	<h2>Capabilities</h2>
	                            <h3><?php the_field('title_main')?></h3>
	                            <p><?php the_field('Content_main')?></p>
                            </div>
                        </div>
                    </div>
					
					
					<?php if( have_rows('page_setting') ): ?>
						<?php while( have_rows('page_setting') ): the_row(); 
								$image = get_sub_field('image');
								$background_color_code = get_sub_field('background_color_code');
								$title = get_sub_field('title');
								$content = get_sub_field('content');
								$title2 = get_sub_field('title2');
								$content2 = get_sub_field('content2');
								?>  
								<div class="capabilities__module">
									<div class="capabilities__img"><img src="<?php echo $image; ?>" alt="img"/></div>
									<div class="capabilities__text" style="background: <?php echo $background_color_code; ?>">
										<div>
											
											<h3><?php echo $title; ?></h3>
											<p><?php echo $content; ?></p>
											
											<h3><?php echo $title2; ?></h3>
											<p><?php echo $content2; ?></p>
											 
										</div>
									</div>
								</div>
								<?php endwhile; ?>
							<?php endif; ?>  
					
                    
					
                    
					
					
                </div>
            </section>
        </div>

<?php get_footer();?>