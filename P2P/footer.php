</div><!-- wrap -->
<footer class="footer">
    <div class="container">
        <a class="logo" href="<?php echo home_url();?>">
            <img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" alt="logo"/>
        </a>
        <ul class="footerNav">
			<?php wp_nav_menu( array( 'theme_location' => 'footer_menu', 'container' =>false, 'items_wrap' => '%3$s') ); ?>
        </ul>
		<?php echo do_shortcode('[contact-form-7 id="39" title="Contact form 1" html_class="footerContact"]');?>			
    </div>
</footer>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery-2.2.2.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/device.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/jquery.bxslider.min.js"></script>
<script src="<?php echo get_template_directory_uri(); ?>/js/main.min.js"></script>
 <?php wp_footer();?>
</body>
</html>							  