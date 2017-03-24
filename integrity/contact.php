<?php 
/*Template Name: contact*/
get_header();?>
            <section class="pageTop">
                <div class="container">
                    <h2 class="section_title">Contact us</h2>
                </div>
            </section>
            <section class="contactMap">
                <div id="map">
                    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKs-faRxCgEb3sPV1EULg_xDftoBE3G88&callback=initMap"></script>
                </div>
                <div class="contactMap__info">
                    <div class="contactMap__content">
                        <h5 class="contactMap__title">HEAD OFFICE</h5>
                        <ul class="contactMap__list">
                            <li><i class="fa fa-map-marker"></i>
                                <?php the_field('address','option');?></li>
                            <li><i class="fa fa-phone"></i><?php the_field('phone','option');?></li>
                            <li><i class="fa fa-phone-square"></i><?php the_field('phone_second','option');?></li>
                            <li><i class="fa fa-envelope"></i><?php the_field('email','option');?></li>
                        </ul>
                    </div>
                    <div class="contactMap__content">
                        <h5 class="contactMap__title">CALGARY</h5>
                        <ul class="contactMap__list">
                            <li><i class="fa fa-user"></i><?php the_field('name','option');?></li>
                            <li><i class="fa fa-phone"></i><?php the_field('phone_calgary','option');?></li>
                            <li><i class="fa fa-envelope"></i><?php the_field('email_calgary','option');?></li>
                        </ul>
                    </div>
                </div>
            </section>
 <?php get_footer(); ?>