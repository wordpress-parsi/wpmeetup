<?php
/*Template Name: برگه کاربری*/
get_header();
$userid = get_current_user_id();
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
										<td><?php echo get_avatar( userid, 32 ); ?></td>
									</tr>
									<tr>
										<td><?php the_author_meta( 'first_name', $userid ); ?></td>
									</tr>
									<tr>
										<td><?php the_author_meta( 'last_name', $userid ); ?></td>
									</tr>
									<tr>
										<td><?php the_author_meta( 'user_email', $userid ); ?></td>
									</tr>
									<tr>
										<td><?php echo esc_html( get_user_meta( $userid, 'uphone', true ) ); ?></td>
									</tr>
									<tr>
										<td><?php the_author_meta( 'description', $userid ); ?></td>
									</tr>
									<tr>
										<td><?php echo esc_html( get_user_meta( $userid, 'uwpurl', true ) ); ?></td>
									</tr>
								</table>
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