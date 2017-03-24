    	</div><!-- main -->
    </div><!-- wrap -->
   	<footer class="footer">
    <div class="container">
        <a class="logo" href="<?php echo home_url();?>">
            <img class="logoImg" src="<?php echo get_template_directory_uri();?>/img/logofW.png" alt="logo"/>
            <img class="logoImgHome" src="<?php echo get_template_directory_uri();?>/img/logof.png" alt="logo"/>
        </a>
        <div class="phones">
            <span class="phones__list">
                <span class="fa-stack">
                  <i class="fa fa-circle-thin fa-stack-2x"></i>
                  <i class="fa fa-phone fa-stack-1x"></i>
                </span>
                <?php the_field('phone_social','option');?>
            </span>
            <span class="phones__list">
                <span class="fa-stack">
                  <i class="fa fa-circle-thin fa-stack-2x"></i>
                  <a class="fa fa-linkedin fa-stack-1x" href="https://www.linkedin.com/company/integrity-general"></a>
                </span>
                /company/integrity-general
            </span>
        </div>
    </div>
</footer>
<?php wp_footer();?>
</body>
</html>