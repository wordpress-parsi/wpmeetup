<?php get_header(); ?>

	<div class="container columns">
		<!-- Example row of columns -->
		<div class="row">
			<div class="col-md-4">
				<h2>میتاپ های وردپرسی</h2>
				<p>میتاپ‌ها و دورهمی‌های وردپرسی در سراسر دنیا و در کشورهای مختلف به صورت آزاد در حال برگزاری است، ما نیز بعد از برگزاری اولین همایش وردپرس در ایران، در صدد تشکیل جامعه کاربری وردپرسی فارسی زبان و ایجاد گروهی به صورت باز تحت این عنوان برآمدیم.

میتاپ وردپرس یک جامعه کاربری باز و خود گردان می‌باشد که با مشارکت اعضا اقدام به برگزاری رویدادهای وردپرسی در ایران می‌کند. این فعالیت‌ها در مسیر توسعه و گسترش وردپرس و کمک به استفاده کنندگان و علاقمندان آن است.
				</p><!--p class="pull-left"><a class="btn btn-default" href="#" role="button">بیشتر بخوانید</a></p-->
			</div>
			<div class="col-md-4">
				<h2>آمار کلی</h2>
				<p></p>
				<div class="panel panel-default">
					<div class="panel-body">
						<div class="statistic-group">
							<div class="statistic col-lg-4 col-md-4 col-sm-4 col-xs-4">
								<div class="value">
									<i class="fas fa-user-friends"></i> ۸۱۹
								</div>
								<div class="label">
									وردپرسی
								</div>
							</div><!-- /.statistic -->
							<div class="statistic col-lg-4 col-md-4 col-sm-4 col-xs-4">
								<div class="value">
									<i aria-hidden="true" class="fab fa-meetup"></i> ۴
								</div>
								<div class="label">
									میتاپ
								</div>
							</div><!-- /.statistic -->
							<div class="statistic col-lg-4 col-md-4 col-sm-4 col-xs-4">
								<div class="value">
									<i class="fab fa-wordpress"></i> ۶۹۱
								</div>
								<div class="label">
									گروه جهانی
								</div>
							</div><!-- /.statistic -->
						</div><!-- /.statistic-group -->
					</div><!-- /.panel-body -->
				</div><!-- /.panel -->
				<p></p><!--p class="pull-left"><a class="btn btn-default" href="#" role="button">بیشتر بخوانید</a></p-->
			</div>
			<div class="col-md-4">
				<?php query_posts('showposts=1&cat=1'); if(have_posts()): while(have_posts()): the_post(); ?>
				<h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
				<p><?php the_excerpt(); ?></p>
				<p class="text-left ltr"><?php the_time("l, d F Y, H:i A"); ?></p>
				<hr>
				<div class="clearfix">
					<p class="pull-left attendees">
					    
				        <span><strong>
						<?php
						    $atcnt    = get_post_meta(get_the_ID(), "_atcnt", true);
						    //$matches  = preg_grep ('/jpeg/i', get_post_meta(get_the_ID(), "_imgurl", true));
						    echo per_number($atcnt - 10);
						?></strong> شرکت‌کننده‌دیگر + </span>

						<?php 
							if(get_post_meta(get_the_ID(), "_imgurl", true)){
								$i = 0;
								foreach(get_post_meta(get_the_ID(), "_imgurl", true) as $img){
									if($i > 10)
										break;
									
									if(check_image_exists($img))
										echo '<img class="rounded-100-32" src="'.$img.'">';
									
									$i++;
								}
							}
						?>
					</p>
				</div><!--p class="pull-left"><a class="btn btn-default" href="#" role="button">بیشتر بخوانید</a></p-->
				<?php endwhile; endif; wp_reset_query(); ?>
			</div>
		</div>
	</div><!-- /container -->
<?php get_footer(); ?>