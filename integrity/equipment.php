<?php 
/*Template Name: equipment*/
get_header();?>
            <div class="container">
                <section class="pageTop">
                    <h2 class="section_title"><?php the_title();?></h2>
                </section>
                <section class="equipmentList">
                    
					<?php 
				if( have_rows('equipment') ): ?>
					<?php 
					
					while( have_rows('equipment') ): the_row(); ?>
					<div class="equipment">
                         <img src="<?php the_sub_field('images'); ?>" alt="equipment"/>
                        <div class="equipment__content">

					<div class="equipment__text">
					 <h4 class="equipment__title"><?php the_sub_field('title'); ?>:</h4>
							<ul class="equipment__list">
							<?php 
							if( have_rows('list_item') ): ?>
								<?php 
								while( have_rows('list_item') ): the_row();	?>
									<li><?php the_sub_field('item'); ?></li>
								<?php endwhile; ?>
							</ul>
							<?php endif;?>
						</div>	
                        </div>
                    </div>
						<?php endwhile;  ?>
				<?php endif; ?>		
                </section>
            </div>
<?php get_footer();?>