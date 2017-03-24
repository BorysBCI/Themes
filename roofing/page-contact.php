<?php
/**
 * Template Name: Contact
 */
session_start();
get_header(); 


if (!empty($_POST)) {
    if($_POST['kapcha'] === $_SESSION['rand_code']){
    	$send_res = sendMailContactPage($_POST);
    } else {
        $cap_res = '<p>Captcha entered incorrectly!</p>';
    }
}

if ($send_res == null) {
    $stat_send = 'none';
} else {
    $stat_send = 'block';
}

?>

<!-- Sticky Navbar -->
<?php require_once('page_title.php'); ?>
<!-- page-header -->
<?php if ( have_posts() ) : ?>
<section id="contact-us" class="page-section">
    <div class="container">
        <div class="row">
        <?php while ( have_posts() ) : the_post(); ?>
            <div class="col-sm-4 col-md-4">
                <div class="row">
                <?php 
                	$contact_widjet = get_field('contact_widjet', 45);
                ?>

                    <div class="col-md-6">
                        <h5 class="title">
                        <i class="icon-address text-color"></i><?php echo $contact_widjet[0]['title']; ?></h5>
                        <address>
                        <?php foreach($contact_widjet[0]['adres:'] as $val): ?>
                        	<?php echo $val['text'].'<br/>'; ?>
                    	<?php endforeach; ?>
                    	<br/>
                    	<?php foreach($contact_widjet[0]['postadres:'] as $val): ?>
                        	<div><?php echo $val['text']; ?></div>
                    	<?php endforeach; ?>
                    	</address>
                    </div>
                    
                    <div class="col-md-6">
                        <h5 class="title">
                        <i class="icon-contacts text-color"></i><?php echo $contact_widjet[0]['title_2']; ?></h5>
                        <?php foreach($contact_widjet[0]['contact_info'] as $val): ?>
                        	<div><?php echo $val['text']; ?></div>
                    	<?php endforeach; ?>
                    </div>
                </div>
                <hr />
                <?php the_content(); ?>
            </div>
        <?php endwhile; ?>
            <div class="col-md-8 col-md-8">
                <h3 class="title">Contactformulier</h3>
                <div class="senq_msg" style="display: <?php echo $stat_send; ?>">
                    <p>Bedankt voor het aanvragen van een offerte bij R & H Dakwerken.</p>
                    <p>Wij nemen spoedig contact met u op.</p>
                </div>
                <div class="contact-form">
                    <!-- Form Begins -->
                    <!--<form role="form" name="contactform" id="contactform" method="post" action="">
                        <div class="row">
                            <div class="col-md-6">
                                <!-- Field 1 -->
                           <!--     <div class="input-text form-group">
                                    <input type="text" name="contact_name" value="" class="input-name form-control"
                                    placeholder="Naam" />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <!-- Field 2 -->
                               <!-- <div class="input-email form-group">
                                    <input type="email" name="contact_email" value="" class="input-email form-control"
                                    placeholder="E-mail" />
                                </div>
                            </div>
                        </div>
                        <!-- Field 3 -->
                     <!--   <div class="input-email form-group">
                            <input type="text" name="contact_phone" value="" class="input-phone form-control" placeholder="Telefoonnummer" />
                        </div>
                        <!-- Field 4 -->
                      <!--  <div class="textarea-message form-group">
                            <textarea name="contact_message" value="" class="textarea-message form-control" placeholder="Bericht"
                            rows="6"></textarea>
                        </div>

                        <div class="input-text form-group">   
                            <img src = "<?php echo get_template_directory_uri(); ?>/capcha/captcha.php" />
                            <input type="text" name="kapcha" required class="input_capca_cot form-control" />
                            <?php
                                /*if($cap_res){
                                    echo $cap_res;   
                                }*/
                            ?>
                        </div>

                        <!-- Button -->
                       <!-- <button class="btn btn-default" type="submit">Verzenden 
                        <i class="icon-paper-plane"></i></button>
                    </form>-->
					
					<?php echo  do_shortcode('[contact-form-7 id="238" title="Contact form 1"]');?>
                    <!-- Form Ends -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php endif; ?>
<!-- page-section -->
<section id="map">
    <div class="map-section">
        <div id="map_my" class="map-canvas" data-zoom="17" data-lat="51.6463181" data-lng="5.2929132" data-type="roadmap" style="height: 376px;"></div>
        <div id="map_canvas"></div>
    </div>
</section>
<!-- map -->

<!-- clients -->
    <?php //require_once('partners_block.php'); ?>
<!-- clients -->

<?php get_footer(); ?>