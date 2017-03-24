</div><!-- wrap -->
    <footer class="footer">
    <div class="container">
        <ul class="footer__soc">
            <li><a class="fa fa-fw fa-twitter" href="<?php the_field('twitter','option');?>"></a></li>
            <li><a class="fa fa-fw fa-facebook" href="<?php the_field('facebook','option');?>"></a></li>
            <li><a class="fa fa-fw fa-instagram" href="<?php the_field('instagram','option');?>"></a></li>
        </ul>
        <ul class="footer__nav">
            <?php  wp_nav_menu_no_ul(); ?>
        </ul>
        <p class="copyright">&copy; Copyright  <?php echo date('Y')?> Rupert’s Honey</p>
    </div>
</footer>
<?php wp_footer();?>
</body>
</html>