<?php get_header(); ?>

	<div class="container columns">
		<div class="row">
			<div class="col-md-12">
				<div class="events">
					<div class="event clearfix">
						
                  		<?php if(have_posts()): while(have_posts()): the_post(); ?>
						<div class="col-md-12">
							<h2><?php the_title(); ?></h2>
						</div>
						<div class="content col-lg-12">
							<?php the_content(); ?>
						</div>
						<?php endwhile; endif; ?>
					</div><!--./event-->
				</div><!--./events-->
			</div><!--./col-md-9-->
		</div>
	</div><!-- /container -->
<?php get_footer(); ?>