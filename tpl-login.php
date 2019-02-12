<?php
/*Template Name: برگه ورود*/
if(is_user_logged_in())
	wp_redirect(home_url());

get_header();
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
							<?php the_content(); wp_login_form(); ?>
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