<?php 
/*
Template Name: Contacts
*/
get_header();
?>

<div class="main">
    <section class="pageContact imageCover" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/homeTop.jpg')">
        <div class="container">
            <div class="pageContact__cell1">
                <div class="pageContact__cell11"></div>
                <h2>Contact Us</h2>
            </div>
            <div class="pageContact__cell2"></div>
            <div class="pageContact__cell3"></div>
            <div class="pageContact__cell4">
            
			<div class="pageContact__cell41"></div>
                
				<div class="pageContact__info">
				<?php if( have_rows('contact') ): ?>
						<?php while( have_rows('contact') ): the_row(); 
								$name = get_sub_field('name');
								$mobile = get_sub_field('mobile');
								$mobile2 = get_sub_field('mobile2');
								$email = get_sub_field('email');
								$loc = get_sub_field('location');
								?>  
								<h3><?php echo $name; ?></h3>
								<div><?php echo $loc; ?></div>
								<div><?php echo $mobile; ?></div>
								<div><?php echo $mobile2; ?> </div>
								<div><?php echo $email; ?></div>
						<?php endwhile; ?>
				<?php endif; ?>           	
				</div>
				
            </div>
            <div class="pageContact__cell5">
                <div class="pageContact__info">
                    <?php if( have_rows('contact_2') ): ?>
						<?php while( have_rows('contact_2') ): the_row(); 
								$name = get_sub_field('name');
								$mobile = get_sub_field('mobile');
								$mobile2 = get_sub_field('mobile2');
								$email = get_sub_field('email');
								$loc = get_sub_field('location');
								?>  
								<h3><?php echo $name; ?></h3>
								<div><?php echo $loc; ?></div>
								<div><?php echo $mobile; ?></div>
								<div><?php echo $mobile2; ?> </div>
								<div><?php echo $email; ?></div>
						<?php endwhile; ?>
					<?php endif; ?>        
                </div>
            </div>
            <div class="pageContact__cell6">
                <div class="pageContact__cell61"></div>
                <div class="pageContact__info">
					<?php if( have_rows('contact_3') ): ?>
						<?php while( have_rows('contact_3') ): the_row(); 
								$name = get_sub_field('name');
								$mobile = get_sub_field('mobile');
								$mobile2 = get_sub_field('mobile2');
								$email = get_sub_field('email');
								$loc = get_sub_field('location');
								?>  
								<h3><?php echo $name; ?></h3>
								<div><?php echo $loc; ?></div>
								<div><?php echo $mobile; ?></div>
								<div><?php echo $mobile2; ?> </div>
								<div><?php echo $email; ?></div>
						<?php endwhile; ?>
					<?php endif; ?>  
                </div>
            </div>
            <div class="pageContact__cell7 imageCover" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/contFon1.jpg')">
            	<div class="pageContact__info">
					<?php if( have_rows('address') ): ?>
						<?php while( have_rows('address') ): the_row(); 
								$name = get_sub_field('name');
								$address = get_sub_field('address');
								?>  
								<h3><?php echo $name; ?></h3>
								<div><?php echo $address; ?></div>
						<?php endwhile; ?>
					<?php endif; ?>  
                </div>
            </div>
            <div class="pageContact__cell8 imageCover" style="background-image: url('<?php echo get_template_directory_uri(); ?>/img/contFon2.jpg')">
            	<div class="pageContact__info">
					<?php if( have_rows('address_1') ): ?>
						<?php while( have_rows('address_1') ): the_row(); 
								$name = get_sub_field('name');
								$address = get_sub_field('address');
								?>  
								<h3><?php echo $name; ?></h3>
								<div><?php echo $address; ?></div>
						<?php endwhile; ?>
					<?php endif; ?>  
                </div>
            </div>
            <div class="pageContact__cell9">
                <!--<div class="pageContact__form">
                    <input type="text" placeholder="Name">
                    <input type="tel" placeholder="Phone">
                    <input type="email" placeholder="Email">
                    <input class="white__button" type="submit" value="Send">
                </div>-->
				<?php echo do_shortcode('[contact-form-7 id="63" title="Contact" html_class="pageContact__form"]');?>
            </div>
        </div>
    </section>
</div>
<?php get_footer();?>