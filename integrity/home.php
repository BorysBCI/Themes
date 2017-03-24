<?php 
/*Template Name: home*/
get_header();?>
        
            <section class="top_home image" style="background-image: url('<?php the_field('background_image');?>')">
                <div>
                    <div class="info container">
                        <h1><?php the_field('title');?></h1>
                        <p><?php the_field('description');?></p>
                        <a class="blue_button" href="<?php the_field('button_url');?>"><?php the_field('button_title');?></a>
                        <div class="img_scroll"><img src="<?php echo get_template_directory_uri();?>/img/scroll.png" alt="scroll_png"/></div>
                    </div>
                </div>
            </section>
            <section class="success_project">
                <div class="container">
                    <strong>For the success of your project, Integrity Industries North has the:</strong>
                    <ul>
                        <li><a href="#expertise">Expertise</a></li>
                        <li><a href="#experience">Experience</a></li>
                        <li><a href="#resources">Resources</a></li>
                        <li><a href="#technology">Technology</a></li>
                    </ul>
                </div>
            </section>
            <div class="expertise" name="expertise">
                <div class="container">
                    <?php $cat=3; $yourcat = get_category($cat); if ($yourcat) {echo '<h2 class="section_title right">' . $yourcat->name . '</h2>'; } ?>
                    <?php
						//$current_cat_id  = get_query_var('cat');
						$showposts = 1;
						$args = array('cat' => 3, 'orderby' => 'post_date', 'order' => 'DESC', 'posts_per_page' => $showposts,'post_status' => 'publish');
						query_posts($args);
							if (have_posts()) : while (have_posts()) : the_post(); ?>  
					<div class="expertise_content">
                        <!--<img src="<?php echo get_template_directory_uri();?>/img/expertise.jpg" alt="expertise"/>-->
						<?php the_post_thumbnail('full');?>
                        <div class="text_block">
                            <div>
                                <div>
                                    <div class="text">
                                        <?php the_content();?>
                                        <div class="for_button"><a class="white_button" href="<?php echo home_url();?>/about-us/">Read more</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<?php endwhile; ?>
				<?php endif; ?>
					
                </div>
            </div>

            <div class="experience" name="experience">
                <div class="container">

					<?php $cat=4; $yourcat = get_category($cat); if ($yourcat) {echo '<h2 class="section_title">' . $yourcat->name . '</h2>'; } ?>
                    <div class="experience_content">
                        
						<?php $posts = new WP_Query(array(
							'post_type'=>'post',
							'showposts' => 1,
							'order' => 'DESC',
							'p' => 32,
							'tax_query'	=> array(
								array(
									'taxonomy'	=> 'category',
									'field'		=> 'term_id',
									'terms' => 4,
							),
						),
					)); 

					if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
						
						<div>
                            <?php the_post_thumbnail('full');?>
                            <div class="text_block">
                                <div class="title"><?php the_title();?></div>
                                <?php the_content();?>
                            </div>
                        </div>
                        <?php  endwhile; ?>
					<?php endif;?>
					<?php $posts = new WP_Query(array(
							'post_type'=>'post',
							'showposts' => 1,
							'order' => 'DESC',
							'p' => 29,
							'tax_query'	=> array(
								array(
									'taxonomy'	=> 'category',
									'field'		=> 'term_id',
									'terms' => 4,
							),
						),
					)); 

					if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
						<div>
                            <div class="text_block">
                                <h3 class="content_title"><?php the_title();?></h3>
                                <?php the_content();?>
                            </div>
                            <?php the_post_thumbnail('full');?>
                            <a class="fill_blue_button" href="<?php echo home_url(); ?>/services/">Read more</a>
                        </div>
					<?php  endwhile; ?>
					<?php endif;?>
						
						
                    </div>
                </div>
            </div>

            <div class="resources" name="resources">
                <div class="container">
                    <?php $cat=5; $yourcat = get_category($cat); if ($yourcat) {echo '<h2 class="section_title right">' . $yourcat->name . '</h2>'; } ?>
                    <div class="resources_content">
                  
					

					
					<?php $posts = new WP_Query(array(
							'post_type'=>'post',
							'showposts' => 1,
							'order' => 'DESC',
							'p' => 36,
							'tax_query'	=> array(
								array(
									'taxonomy'	=> 'category',
									'field'		=> 'term_id',
									'terms' => 5,
							),
						),
					)); 

					if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>
					   <div>
                            <?php the_post_thumbnail('full');?>
                            <div class="text">
                                <h3 class="title"><?php the_title();?>/<span><?php the_field('subtitle');?></span></h3>
                                <?php the_content();?>
                            </div>
                            <div class="for_button"><a class="black_button" href="<?php echo home_url() ?>/safetyenvironment/ ">Read more</a></div>
                        </div>
					<?php  endwhile; ?>
					<?php endif;?>	
					  <?php $posts = new WP_Query(array(
							'post_type'=>'post',
							'showposts' => 1,
							'order' => 'DESC',
							'p' => 39,
							'tax_query'	=> array(
								array(
									'taxonomy'	=> 'category',
									'field'		=> 'term_id',
									'terms' => 5,
							),
						),
					)); 

					if ( $posts->have_posts() ) : while ( $posts->have_posts() ) : $posts->the_post(); ?>	
						
                        <div>
                            <?php the_post_thumbnail('full');?>
                            <div class="text">
                                <h3 class="title"><?php the_title();?></h3>
                                <?php the_content();?>
                            </div>
                            <div class="for_button"><a class="black_button" href="<?php the_permalink(); ?>">Read more</a></div>
                        </div>
						<?php  endwhile; ?>
					<?php endif;?>
						
                    </div>
                </div>
            </div>

            <div class="technology image" name="technology" style="background-image: url('<?php echo get_template_directory_uri();?>/img/technology_fon.jpg');">
                <div class="container">
                    <h2 class="section_title white">Technology</h2>
                    <div class="tehnology_slider">
                        <ul>
                            
					<?php
					$type = 'technology';
					$args=array(
					  'post_type' => $type,
					  'post_status' => 'publish',
					  'showposts' => -1,
					  'order' => 'ASC'
					);
					$my_query = new WP_Query($args);
					if( $my_query->have_posts() ) {
					  while ($my_query->have_posts()) : $my_query->the_post(); ?>
							
							<li>
                                <?php the_post_thumbnail('full');?>
                                <?php the_content();?>
                            </li>
					<?php
					  endwhile;
					}
					wp_reset_query();
					?>		
                         
                        </ul>
                    </div>
                </div>
            </div>
            <section class="section_map">
                <div id="map">
                    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyB5m5YS3XlqqYPzoVMNJjdnY_eUKtlEQ9M&sensor=false&amp;language=en&amp;callback=initMap"></script>
                </div>
            </section>
<?php get_footer();?>