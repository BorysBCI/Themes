<?php 
    $block_partner = get_field('block_partner', 66); 
    if ($block_partner):
?>
<section id="clients" class="page-section tb-pad-20">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <div class="owl-carousel" data-pagination="false" data-items="4" data-autoplay="true" data-navigation="false">
                <?php foreach ($block_partner as $value): ?>
                    <a href="javascript:void(0)" class="partners_link_bott">
                        <!-- <img src="<?php echo get_template_directory_uri(); ?>/img/sections/clients/1.png" width="170" height="90" alt="" />  -->
                        <img src="<?php echo $value['image']; ?>" class="partner_link_block" width="170" height="90" alt="" />
                        <p><?php echo $value['link']; ?></p>
                    </a>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>
<?php  endif; ?>