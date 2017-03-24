<?php
/*
Template Name: Forget
*/
global $wpdb, $user_ID;

function tg_validate_url() {
	global $post;
	$page_url = esc_url(get_permalink( $post->ID ));
	$urlget = strpos($page_url, "?");
	if ($urlget === false) {
		$concate = "?";
	} else {
		$concate = "&";
	}
	return $page_url.$concate;
}

if (!$user_ID) { 

	if(isset($_GET['key']) && $_GET['action'] == "reset_pwd") {
		$reset_key = $_GET['key'];
		$user_login = $_GET['login'];
		$user_data = $wpdb->get_row($wpdb->prepare("SELECT ID, user_login, user_email FROM $wpdb->users WHERE user_activation_key = %s AND user_login = %s", $reset_key, $user_login));
		
		$user_login = $user_data->user_login;
		$user_email = $user_data->user_email;
		
		if(!empty($reset_key) && !empty($user_data)) {
			$new_password = wp_generate_password(7, false);
				
				wp_set_password( $new_password, $user_data->ID );
				
			$message = __('Your new password for the account at:') . "\r\n\r\n";
			$message .= get_option('siteurl') . "\r\n\r\n";
			$message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
			$message .= sprintf(__('Password: %s'), $new_password) . "\r\n\r\n";
			$message .= __('You can now login with your new password at: ') . get_option('siteurl')."/research/tandemnsi-cybersecurity-industry-list/" . "\r\n\r\n";
			
			if ( $message && !wp_mail($user_email, 'Password Reset Request', $message) ) {
				echo "<div class='error'>Email failed to send for some unknown reason</div>";
				exit();
			}
			else {
				$redirect_to = get_bloginfo('url')."/research/tandemnsi-cybersecurity-industry-list/";
				wp_safe_redirect($redirect_to);
				exit();
			}
		} 
		else exit('Not a Valid Key.');
		
	}
	

	if($_POST['action'] == "tg_pwd_reset"){
		if ( !wp_verify_nonce( $_POST['tg_pwd_nonce'], "tg_pwd_nonce")) {
		  exit("No trick please");
	   }  
		if(empty($_POST['user_input'])) {
			echo "<div class='error'>Please enter your Username or E-mail address</div>";
			exit();
		}
		
		$user_input = $wpdb->escape(trim($_POST['user_input']));
		
		if ( strpos($user_input, '@') ) {
			$user_data = get_user_by_email($user_input);
			if(empty($user_data) || $user_data->caps[administrator] == 1) { 
				echo "<div class='error'>Invalid E-mail address!</div>";
				exit();
			}
		}
		else {
			$user_data = get_userdatabylogin($user_input);
			if(empty($user_data) || $user_data->caps[administrator] == 1) { 
				echo "<div class='error'>Invalid Username!</div>";
				exit();
			}
		}
		
		$user_login = $user_data->user_login;
		$user_email = $user_data->user_email;
		
		$key = $wpdb->get_var($wpdb->prepare("SELECT user_activation_key FROM $wpdb->users WHERE user_login = %s", $user_login));
		if(empty($key)) {
			
			$key = wp_generate_password(20, false);
			$wpdb->update($wpdb->users, array('user_activation_key' => $key), array('user_login' => $user_login));	
		}
		
		
		$message = __('Someone requested that the password be reset for the following account:') . "\r\n\r\n";
		$message .= get_option('siteurl') . "\r\n\r\n";
		$message .= sprintf(__('Username: %s'), $user_login) . "\r\n\r\n";
		$message .= __('If this was a mistake, just ignore this email and nothing will happen.') . "\r\n\r\n";
		$message .= __('To reset your password, visit the following address (New password will be emailed to you momentarily):') . "\r\n\r\n";
		$message .= tg_validate_url() . "action=reset_pwd&key=$key&login=" . rawurlencode($user_login) . "\r\n";
		
		if ( $message && !wp_mail($user_email, 'Password Reset Request', $message) ) {
			echo "<div class='error'>Email failed to send for some unknown reason.</div>";
			exit();
		}
		else {
			echo "<div class='success'>Your new password was sent to your registered email. Please try to <a href='http://www.tandemnsi.com/research/tandemnsi-cybersecurity-industry-list/'>log in</a> again</div>";
			exit();
		}
		
	} else { 

get_header(); ?>
<div id="content" class="product-content-wrapper" role="main">
<section class="product-section basis-list first text next-profile">
Please provide your registered email
	<?php if ( have_posts() ) : ?>
	
		<?php while ( have_posts() ) : the_post(); ?>
			
			<form class="user_form" id="wp_pass_reset" action="" method="post">			
			<input type="text" class="text" name="user_input" value="" /><br />
			<input type="hidden" name="action" value="tg_pwd_reset" />
			<input type="hidden" name="tg_pwd_nonce" value="<?php echo wp_create_nonce("tg_pwd_nonce"); ?>" />
			<input type="submit" id="submitbtn" class="reset_password" name="submit" value="Reset Password" />					
			</form>
			<div id="result"></div>
			<script type="text/javascript">  						
			jQuery("#wp_pass_reset").submit(function() {			
			jQuery('#result').html('<span class="loading">Validating...</span>').fadeIn();
			var input_data = jQuery('#wp_pass_reset').serialize();
			jQuery.ajax({
			type: "POST",
			url:  "<?php echo get_permalink( $post->ID ); ?>",
			data: input_data,
			success: function(msg){
			jQuery('.loading').remove();
			jQuery('<div>').html(msg).appendTo('div#result').hide().fadeIn('slow');
			}
			});
			return false;
			
			});
			</script>
			
	<?php endwhile; ?>
		
	<?php else : ?>
		
			<h2><?php _e('Not Found'); ?></h1>
			
	<?php endif; ?>
</section>	
</div><!-- content -->
<?php

get_footer();
	}
}
else {
	wp_redirect( home_url() ); exit;
	
}
?>