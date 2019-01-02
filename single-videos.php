<?php get_header(); ?>

	<div class="container columns">
		<!-- Example row of columns -->
		<div class="row">
		    
			<div class="col-md-9 pull-right">
				<div class="events">
					<div class="event clearfix">
						<!--div class="col-md-4 pull-right">
                    <img class="img-rounded thumbnail" src="dev/images/dummy.png">
                  </div-->
                  		<?php if(have_posts()): while(have_posts()): the_post(); ?>
						<div class="col-md-12">
							<h2><?php the_title(); ?></h2>
							<p class="text-left ltr"><?php the_time("l, d F Y, H:i A"); ?></p>
							<hr>
						</div>
						<div class="content col-lg-12">
							<?php the_content(); ?>
						</div>
						<?php
						endwhile; endif;
                        if ( comments_open() || get_comments_number() ) : ?>
                        <div class="col-lg-12"><?php comments_template(); ?></div>
                        <?php endif; ?>
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