		
		      
		<div id="get-quote" class="bg-color black text-center">

            <div class="container">
                <div class="row get-a-quote">
                    <div class="col-md-12"><h4>Heeft u een dakspecialist nodig? Bel ons direct voor een gratis dakinspectie</h4>
                    	<a href="tel:0736898222">
                            <i class="fa fa-phone"></i>073-6898222
                        </a>
                    </div>
                </div>
                <div class="move-top bg-color page-scroll">
                    <a href="#page">
                        <i class="fa fa-arrow-up"></i>
                    </a>
                </div>
            </div>
        </div>
        <!-- request -->
        <footer id="footer">
            <div class="footer-widget">
                <div class="container">
                    <div class="row">
                        <?php
                            if ( function_exists('register_my_widgets') )
                                dynamic_sidebar('footer_sidebar');
                        ?>
                </div>
            </div>
            <!-- footer-top -->
            <div class="copyright">
                <div class="container">
                    <div class="row">
                        <!-- Copyrights -->
                        <div class="col-xs-12 col-sm-6 col-md-6"><span class="copir"><?php echo date('Y');?> &copy; Website ontworpen door <a class="text-color" href="http://www.alonamedia.com" target="blank"><strong>Alona Media</strong></a>
                    	   </span><br />
                        </div>
                        <div class="col-xs-12 text-center visible-xs-block page-scroll gray-bg icons-circle i-3x">
                            <!-- Goto Top -->
                            <a href="#page">
                                <i class="fa fa-arrow-up"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- footer-bottom -->
        </footer>
        <!-- footer -->
    </div>
    <!-- page -->
    <?php wp_footer(); ?>
    </body>
</html>
