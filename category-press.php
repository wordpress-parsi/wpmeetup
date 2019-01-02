<?php get_header(); ?>

	<div class="container columns">
		<div class="row">

			<div class="col-md-9 col-sm-12 col-xs-12 pull-right">
				<div class="events">
					<?php if(have_posts()): while(have_posts()): the_post(); ?>
					<div class="event clearfix">
						<div class="col-md-4 col-sm-4 col-xs-12 pull-right">
						    <?php if(has_post_thumbnail()){ ?>
						    <?php the_post_thumbnail('thumbnail'); ?>
						    <?php }else{ ?>
						    <img class="img-rounded thumbnail" src="<?php echo get_template_directory_uri(); ?>/dev/images/dummy.png">
						    <?php } ?>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-12">
							<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
							<p><?php the_excerpt(); ?></p>
							<p class="text-left ltr"><?php the_time("l, d F Y, H:i A"); ?></p>
						</div>
					</div><!--./event-->
					<?php endwhile; pagination_posts_nav_cat(); endif; ?>

				</div><!--./events-->
			</div><!--./col-md-9-->

			<div class="col-md-3 col-sm-12 col-xs-12 pull-left">
				<aside>
					<?php if ( is_active_sidebar( 'sidebar' ) ) : dynamic_sidebar( 'sidebar' ); endif; ?>
				</aside>
			</div>
			
		</div>
	</div><!-- /container -->
<?php get_footer(); ?>