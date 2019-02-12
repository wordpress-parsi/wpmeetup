<?php
/*Template Name: برگه ثبت نام*/
get_header();

if( isset( $_POST['foundation_reg_nonce'] ) ){
	if( wp_verify_nonce( $_POST['foundation_reg_nonce'], 'foundation_reg_action' ) || check_admin_referer( 'foundation_reg_action', 'foundation_reg_nonce' ) ){

		$userdata = array(
		    'user_pass'             => sanitize_text_field( $_POST['upass'] ),   //(string) The plain-text user password.
		    'user_login'            => sanitize_text_field( $_POST['umail'] ),   //(string) The user's login username.
		    //'user_nicename'         => '',   //(string) The URL-friendly user name.
		    //'user_url'              => sanitize_text_field( $_POST[''] ),   //(string) The user URL.
		    'user_email'            => sanitize_text_field( $_POST['umail'] ),   //(string) The user email address.
		    //'display_name'          => '',   //(string) The user's display name. Default is the user's username.
		    //'nickname'              => '',   //(string) The user's nickname. Default is the user's username.
		    'first_name'            => sanitize_text_field( $_POST['uname'] ),   //(string) The user's first name. For new users, will be used to build the first part of the user's display name if $display_name is not specified.
		    'last_name'             => sanitize_text_field( $_POST['ufamily'] ),   //(string) The user's last name. For new users, will be used to build the second part of the user's display name if $display_name is not specified.
		    'description'           => sanitize_textarea_field( $_POST['uskills'] ),   //(string) The user's biographical description.
		 
		);
		$user_id = wp_insert_user( $userdata ) ;
		 
		// On success.
		if ( ! is_wp_error( $user_id ) ) {
		    add_user_meta( $user_id, 'uphone', sanitize_text_field( $_POST['uphone'] ) );
		    add_user_meta( $user_id, 'uwpurl', sanitize_text_field( $_POST['uwpurl'] ) );
		    
		    echo "کاربری شما با موفقیت ایجاد شد.";//. $user_id;
		}
		
	}else{
		wp_die( 'خطایی رخ داده است!' );
	}
}

?>
	<div class="container columns">
		<div class="row">
		    
			<div class="col-md-9 pull-right">
				<div class="events">
					<div class="event clearfix">
                  		<?php if(have_posts()): while(have_posts()): the_post(); ?>
						<div class="col-md-12">
							<h2><?php the_title(); ?></h2>
							<p class="text-left ltr"><?php //the_time("l, d F Y, H:i A"); ?></p>
							<hr>
						</div>
						<div class="content col-lg-12">
							<?php the_content(); ?>

								<form method="post">
									<table>
										<tr>
											<td><input type="text" name="uname" placeholder="نام شما"></td>
										</tr>
										<tr>
											<td><input type="text" name="ufamily" placeholder="نام خانوادگی" required></td>
										</tr>
										<tr>
											<td><input type="text" name="umail" placeholder="آدرس ایمیل" required></td>
										</tr>
										<tr>
											<td><input type="text" name="uphone" placeholder="شماره همراه"></td>
										</tr>
										<tr>
											<td><textarea name="uskills" placeholder="مهارتهای شما"></textarea></td>
										</tr>
										<tr>
											<td><input type="text" name="uwpurl" placeholder="آدرس کاربری در وردپرس"></td>
										</tr>
										<tr>
											<td><input type="password" name="upass" placeholder="رمزعبور" required></td>
										</tr>
										<tr>
											<td><input type="password" name="urepass" placeholder="تایید رمزعبور" required></td>
										</tr>
										<tr>
											<td><input type="submit" name="usubmit" value="Submit"></td>
										</tr>
									</table>
									<?php wp_nonce_field( 'foundation_reg_action', 'foundation_reg_nonce'); ?>
								</form>

						</div>
						<?php endwhile; endif; ?>
					</div><!--./event-->
				</div><!--./events-->
			</div><!--./col-md-9-->

			<div class="col-md-3 pull-left">
				<aside>
					<?php if ( is_active_sidebar( 'sidebar' ) ) : dynamic_sidebar( 'sidebar' ); endif; ?>
				</aside>
			</div>

		</div>
	</div><!-- /container -->
<?php get_footer(); ?>