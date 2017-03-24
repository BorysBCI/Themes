<?php
/**
 * Template Name: Page Oferte
 */

get_header(); 

if (!empty($_POST)) {
    $send_res = sendMailOfertePage($_POST);
}

if (is_null($send_res)) {
    $stat_send = 'none';
} else {
    $stat_send = 'block';
}
// var_dump($send_res);

?>

<!-- Sticky Navbar -->
<?php require_once('page_title.php'); ?>
<!-- page-header -->
<?php if ( have_posts() ) : ?>
<section id="who-we-are" class="page-section border-tb">
    <div class="container who-we-are">
        <div class="section-title text-left">
        <?php 
            $custom_title = get_field('custom_title');
            $right_block_1 = get_field('right_block_1');
            $right_block_2 = get_field('right_block_2');
        ?>
            <!-- Title -->
            <?php if ($custom_title): ?>
                <h2 class="title"><?php echo $custom_title; ?></h2>
            <?php else: ?>
                <h2 class="title"><?php the_title(); ?></h2>
            <?php endif; ?>
        </div>
        <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-md-8">
                <?php //the_content(); ?>
            </div>
        <?php endwhile; ?>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="senq_msg" style="display: <?php echo $stat_send; ?>">
                    <p>Bedankt voor het aanvragen van een offerte bij R & H Dakwerken.</p>
                    <p>Wij nemen spoedig contact met u op.</p>
                </div>
                <div class="form_oferte">
                    <!--<form class="form-inline" role="form" method="post" action="">
                        <div class="form-group">
                            <label for="naam">Naam:</label>
                            <input type="text" name="oferte_name" value="" class="input-name form-control" required placeholder="Naam" />
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="tel">Telefoonnummer:</label>
                            <input type="text" name="oferte_tel" value="" class="input-name form-control" required placeholder="Telefoonnummer" />
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="e-mail">E-mail:</label>
                            <input type="email" name="oferte_email" value="" class="input-name form-control" required placeholder="E-mail" />
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="postcode">Postcode:</label>
                            <input type="text" name="oferte_postcode" value="" class="input-name form-control" required placeholder="Postcode" />
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="adres">Adres:</label>
                            <input type="text" name="oferte_adres" value="" class="input-name form-control" required placeholder="Adres" />
                        </div>
                        <br/>
                        <div class="form-group">
                            <label for="woon">Woonplaats:</label>
                            <input type="text" name="oferte_woon" value="" class="input-name form-control" required placeholder="Woonplaats" />
                        </div>
                        <div class="form-group">
                            <label for="sel1">Type werkzaamheden:</label>
                                <select name="oferte_werk" class="form-control" id="sel1">
                                <option value="Dakbedekking">Dakbedekking</option>
                                <option value="Dakreparatie">Dakreparatie</option>
                                <option value="Dakisolatie">Dakisolatie</option>
                                <option value="Dakgoten">Dakgoten</option>
                                 <option value="Schoorstenen">Schoorstenen</option>
                                  <option value="Lood-Koper & Zinkwerk">Lood-Koper & Zinkwerk</option>
                                   <option value="Totaalonderhoud">Totaalonderhoud</option>
                            </select>
                        </div>
                        <div class="form-group coment_oferte">
                            <label for="comment">Stuur mij een offerte voor:</label>
                            <textarea  name="oferte_masage" value="" class="form-control" rows="5" ></textarea>
                        </div>
                        <button class="btn btn-default" type="submit">Verzenden 
                        <i class="icon-paper-plane"></i></button>
                    </form>-->
					<?php echo do_shortcode('[contact-form-7 id="286" title="Offerte" html_class="form-inline"]');?>
					
                </div>
            </div>
            <div class="col-md-4"> 
                <?php echo $right_block_1; ?>
            </div>
            <div class="col-md-4"> 
                <?php echo $right_block_2; ?>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>

<!-- clients -->
	<?php //require_once('partners_block.php'); ?>
<!-- clients -->


<?php get_footer(); ?>