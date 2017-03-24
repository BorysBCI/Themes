<?php

// echo 1; die();
/*
Template Name: Template for map company page
*/
require_once "mapcompany_functions.php";

//logout without confirmation
function diww_menu_logout_link( $nav, $args ) {
     $logoutlink = '<li><a href="'.wp_logout_url().'">Logout</a></li>';
     if( $args->menu->term_id == '5' ) {
          return $nav.$logoutlink ;
     }
	 else
	 {
     return $nav;
     }
}
add_filter('wp_nav_menu_items','diww_menu_logout_link', 10, 2);




?>


<?php get_header(); ?>
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/mapcompany/css/font-awesome.css">
<link rel="stylesheet" href="<?php bloginfo('template_url'); ?>/mapcompany/css/mapcompany.css">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script src="<?php bloginfo('template_url'); ?>/mapcompany/js/jquery.cookie.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/mapcompany/js/mapcompany.js" type="text/javascript"></script>
<script src="<?php bloginfo('template_url'); ?>/mapcompany/js/search.js" type="text/javascript"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=<?php echo GOOGLE_MAP_API; ?>&callback=initMap"></script>




<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>
	<div class="post-content">
		<article id="page-<?php the_ID(); ?>" <?php post_class(); ?>>
			<?php
			// Show the featured image and its caption and description if they are available.
			if ( ! post_password_required() && '' !== $featured_image_id = get_post_thumbnail_id() ) :
				$attachment = get_post( $featured_image_id );
				?>
			<div class="page-header">
				<?php echo wp_get_attachment_image( $attachment->ID, 'basis-featured-page' ); ?>
				<?php if ( $attachment->post_content ) : ?>
				<div class="page-header-description">
					<?php echo wpautop( basis_allowed_tags( $attachment->post_content ) ); ?>
				</div>
				<?php endif; ?>
			</div>
			<?php endif; ?>
			<div class="entry basis-list">
				<?php get_template_part( '_post', 'title' ); ?>
                <div class="mapcompany_head_img">

                </div>
				<?php the_content(); ?>

				<div class="mapcompany_btns">
                    <?php
						if ( is_user_logged_in() ) {
					?>
					<a href="/Cybersecurity_Company_Census_Final.pdf" target="_blank">
    					<div class="mapcompany_btn mapcompany_btn_pdf" href="sadasd">
    						<i class="fa fa-file-text" aria-hidden="true"></i>
    						<p>Read White Paper<br> (PDF)</p>
    					</div>
                    </a>
					
					<?php
						}
						else
						{
					?>
					
				
					<!--<div class="mapcompany_btns mapcompany_btn_access">
						<i class="fa fa-file-text" aria-hidden="true"></i>
						<p>Read White Paper (PDF)</p>
					</div>-->
					
					<div class="mapcompany_btn mapcompany_btn_access2">
						<i class="fa fa-file-text" aria-hidden="true"></i>
						<p>Read White Paper<br> (PDF)</p>
					</div>
					
					<?php } ?>
					<?php
						if ( is_user_logged_in() ) {
					?>
					<div class="mapcompany_btn mapcompany_btn_access_disable">
						<i class="fa fa-table" aria-hidden="true"></i>
						<p>Access to Cyber Companies Directory</p>
					</div>
					<div class="mapcompany_btn_logout">
						<a href="<?php echo wp_logout_url('/research/tandemnsi-cybersecurity-industry-list/'); ?>" title="Log off">Log off</a>
					</div>
					<?php
						}
						else
						{
					?>
					<div class="mapcompany_btn mapcompany_btn_access">
						<i class="fa fa-table" aria-hidden="true"></i>
						<p>Access to Cyber Companies Directory</p>
					</div>
					<?php } ?>
				</div>

				<!--Visibility only registered users-->
				<?php
					if ( is_user_logged_in() ) {
				?>
                <script type="text/javascript">
                    localStorage.removeItem("modal_reg");
                    localStorage.removeItem("modal_log");
                </script>
				<div class="visibility_only_registered_users">
					<div class="mapcompany_search">
						<div class="mapcompany_search_functionality">
							<label for="mapcompany_search_state">Filter by State:
								<select class="mapcompany_search_state" name="mapcompany_search_state">
                                    <option value="">All</option>
									<?php foreach ($state_company as $key => $value) {?>
										<option value="<?php echo $value[state];?>"><?php echo $value[state];?></option>
									<?php } ?>
								</select>
							</label>
							<input type="text" class="mapcompany_search_input" name="search_input" placeholder="Search" value="">
							<button type="button" name="search_button"><i class="fa fa-search" aria-hidden="true"></i></button>
                            <label for="mapcompany_quantity">Show:
                                <select class="mapcompany_search_quantity" name="mapcompany_quantity">
                                    <option value="">All</option>
                                    <option value="1000">1000</option>
                                    <option value="500">500</option>
                                    <option value="250">250</option>
                                    <option value="100">100</option>
                                </select>
                            </label>
						</div>
						<div class="mapcompany_search_btns">
							<!-- <div class="mapcompany_search_btn_map">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
								<p>See Companies on the Map</p>
							</div> -->
                            <div id="modal_window_maps_inside"></div>
						</div>
						<?php
							//if ( current_user_can('manage_options') ) {
							//if(is_admin()	
						?>
						<?php 	if (!is_admin() ) {
							 //echo "You are viewing the theme";
						} else {?>
							 <div class="download_db_company">
							<form enctype="multipart/form-data" id="form_download_file" action="<?php bloginfo('template_url'); ?>/mapcompany/mapcompany_functions.php" method="POST">
								<input type="hidden" name="MAX_FILE_SIZE" value="100000000" />
								Attach companies DB (xls, xlsx): <input name="db_file" type="file"  accept=".xls,.xlsx" />
								<input id="download_file_btn" type="button" value="Upload File"/>
                                <input type="hidden" name="key" value="<?php echo md5(rand(0, 1000000)); ?>">
								<img class="loader_file" src="<?php bloginfo('template_url'); ?>/mapcompany/img/loader.gif" alt="" />
								<p class="upload_file">File is loaded successfully</p>
							</form>
						</div>
						<?php }?>
					
					
						
						<?php
							//}
						?>

						<div class="mapcompany_search_list">
							<table class="mapcompany_search_table">
								<thead>
									<tr>
										<td class="name_company">Company Name</td>
										<td class="city_company">City</td>
                                        <td class="state_company">State</td>
									</tr>
								</thead>
								<tbody>
									<?php foreach ($table_company as $key => $value) {?>
									<tr data-lat="<?php echo $value['lat']; ?>" data-lng="<?php echo $value['lng']; ?>" data-state="<?php echo strtoupper($value['state']); ?>" data-address="<?php echo $value[address];?>">
										<td class="name_company"><a href="http://<?php echo $value[website];?>"target="_blank"><?php echo $value[nameCompany];?></a></td>
										<td class="city_company"><?php echo $value['city']; ?></td>
                                        <td class="state_company"><?php echo strtoupper($value['state']); ?></td>
									</tr>
									<?php } ?>
								</tbody>
							</table>
                            <div class="show_all_row">
                                Show All
                            </div>
<!-- echo substr($value['city'], 1); -->

						</div>
					</div>
				</div>

				<?php
					}
					else
					{
				?>

				<div class="mapcompany_empty_block">
					<p>Please <span class="mapcompany_empty_block_login">login</span> or <span class="mapcompany_empty_block_register"><a href="<?php echo home_url();?>/registration">register</a></span><br><span class="mapcompany_empty_block_recovery"><a href="<?php echo home_url();?>/forget">Forgot password?</a></span></p>
				</div>

				<?php
					}
				?>
				<!--END visibility only registered users-->


			</div>
		</article>
		<?php get_sidebar( 'page' ); ?>

		<div class="modal_window_singin">
            <div class="modal_window_singin_inside">
                <?php login_with_ajax(); ?>
            </div>
		</div>

		<div class="modal_window_register">
			<div class="modal_window_register_inside">
                <?php custom_registration_function(); ?>
				<?php //echo do_shortcode('[dm_registration_form]'); ?>
				<?php //registration_form(); ?>
			</div>
		</div>
		
		

	</div>

	<div class="modal_window_wrapper"></div>

<?php endwhile; ?>


<?php get_footer(); ?>
