<?php 
get_header();?>
    <div class="container content">
        <div class="row text_img">
             <?php the_post_thumbnail('full'); ?>
            <?php
				while ( have_posts() ) : the_post(); ?> 
					<?php the_content(); ?>
				<?php
				endwhile; 
				wp_reset_query();?>
        </div>

        <div class="row">
            <div class="hr"></div>
        </div>

        <div class="row box">
           
			<?php if(get_field('block_left',13)): ?>
			<?php while(has_sub_field('block_left',13)): ?> 
			<?php 
				$image = get_sub_field('image');
				$url = get_sub_field('url');
				$title = get_sub_field('title');
				$description = get_sub_field('description');
			?>
		   <div class="col-md-6">
                <div class="box__img">
                    <img src="<?php echo $image;?>" alt="image">
                </div>
                <div class="box__text">
                    <h3 class="title"><a href="<?php echo $url;?>"><?php echo $title;?></a></h3>
                    <p><?php echo $description;?></p>
                </div>
            </div>
			
			<?php endwhile;?>
			<?php endif; wp_reset_postdata();?> 

        </div> <!-- .box -->
        <div class="row box">
            <?php if(get_field('block_right',13)): ?>
			<?php while(has_sub_field('block_right',13)): ?> 
			<?php 
				$image = get_sub_field('image');
				$url = get_sub_field('url');
				$title = get_sub_field('title');
				$description = get_sub_field('description');
			?>
			
			<div class="col-md-6">
                <div class="box__img">
                    <img src="<?php echo $image;?>" alt="image">
                </div>
                <div class="box__text">
                    <h3 class="title"><a href="<?php echo $url;?>"><?php echo $title;?></a></h3>
                    <p><?php echo $description;?></p>
                </div>
            </div>
			
			<?php endwhile;?>
			<?php endif; wp_reset_postdata();?> 

        </div> <!-- .box -->

    </div> <!-- .container -->

<?php get_footer();?>