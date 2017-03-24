<?php
/**
 * Template Name: Diensten
 */

get_header(); 

?>

<!-- Sticky Navbar -->
<?php require_once('page_title.php'); ?>
<!-- page-header -->

<!-- page-header -->

<section id="services" class="page-section">
    <div class="container">
    <?php
        $args = array(
                'sort_order'   => 'ASC',
                'sort_column'  => 'post_title',
                'hierarchical' => 1,
                'exclude'      => '',
                'include'      => '',
                'meta_key'     => '',
                'meta_value'   => '',
                'authors'      => '',
                'child_of'     => 7,
                'parent'       => -1,
                'exclude_tree' => '',
                'number'       => '',
                'offset'       => 0,
                'post_type'    => 'page',
                'post_status'  => 'publish',
            ); 
            $pages = get_pages($args);

            
            // var_dump(iconv_strlen($str));
            $i = 0;
            $q = 0;
            $post_count = count($pages);

            foreach($pages as $post): setup_postdata($post); 
                if ($i == 0) {
                   echo '<div class="row">';
                }
            ?>
                <div class="col-sm-6 col-md-4 col-xs-12 img_dien">
                    <p class="text-center">
                        <?php $url_img = wp_get_attachment_url(get_post_thumbnail_id($post->ID)); ?>
                        <!--<a href="<?php //echo $url_img; ?>" data-rel="prettyPhoto[portfolio]">
                            <?php //echo get_the_post_thumbnail($page->ID, array(420, 200)); ?>
                        </a>-->
						<a href="<?php the_permalink(); ?>" >
                            <?php echo get_the_post_thumbnail($page->ID, array(420, 200)); ?>
                        </a>
						
                    </p>
                    <h3>
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <?php 
                        $str = get_the_content();
                        $rest = substr($str, 0, 150);
                    ?>
                    <p><?php echo $rest.'...'; ?></p>
                    <a href="<?php the_permalink(); ?>" class="btn btn-default">Lees verder</a>
                </div>
                <?php 
                    $i++;
                    $q++;

                    if ($post_count == $q): echo '</div>'; endif;
                    if ($i == 3) {
                        echo '</div><hr class="tb-margin-30" />';
                        $i = 0;
                    }
                ?>
        <?php endforeach; wp_reset_postdata(); ?>
    </div>
</section>
<!-- Services -->
<!-- clients -->
    <?php //require_once('partners_block.php'); ?>
<!-- clients -->

<?php get_footer(); ?>