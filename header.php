<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta content="IE=edge" http-equiv="X-UA-Compatible">
	<meta content="width=device-width, initial-scale=1" name="viewport">
	<meta name="google-site-verification" content="j96S1LNyqp-1jYRG2KpbaF0xnNIpWbzRT9tGgOXxEms" />
	<title><?php wp_title(); ?></title>
	<link href="<?php echo get_template_directory_uri(); ?>/dev/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/dev/css/all.min.css" rel="stylesheet">
	<link href="<?php echo get_template_directory_uri(); ?>/dev/css/custom.css" rel="stylesheet">
	<?php wp_head(); if ( is_singular() ){ wp_enqueue_script( 'comment-reply' ); } ?>

</head>
<body>
	<header<?php if(is_home()){ echo ' class="home"'; } ?>>
		<nav class="navbar navbar-inverse<?php if(is_home()){ echo ' home'; } ?>">
			<div class="container">
				<div class="navbar-header">
					<button aria-controls="navbar" aria-expanded="false" class="navbar-toggle collapsed" data-target="#navbar" data-toggle="collapse" type="button"><span class="sr-only">فهرست</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span></button> <a class="navbar-brand" href="<?php echo home_url(); ?>">میتاپ وردپرس</a>
				</div>
				<div class="collapse navbar-collapse" id="navbar">
					<?php
						$navclass = "nav navbar-nav";
						if(is_home()){
							$navclass .= ' home';
						}
						wp_nav_menu( array(
						    'theme_location' => 'header-menu',
							'container' => 'ul',
							'menu_class' => $navclass,
						) );
						?>
				</div><!--/.nav-collapse -->
			</div>
		</nav>
		<?php if(is_home()){ ?><!-- Main jumbotron for a primary marketing message or call to action -->
		<div class="jumbotron">
			<div class="container text-center">
				<h1>میتاپ وردپرس ایران</h1>
				<p>
					
					میتاپ وردپرس یک جامعه کاربری باز و خود گردان می‌باشد که با مشارکت اعضا اقدام به برگزاری رویدادهای وردپرسی در ایران می‌کند. این فعالیت‌ها در مسیر توسعه و گسترش وردپرس و کمک به استفاده کنندگان و علاقمندان آن است.
				</p>
				<p>
				    <a class="btn btn-primary btn-lg" href="https://wpmeetup.ir/about/" role="button">درباره ما</a>&nbsp;
				    <a class="btn btn-primary btn-lg orange" href="https://www.meetup.com/tehran-wordpress-meetup/" role="button">عضویت در میتاپ</a>
				</p>
			</div>
		</div>
		<div class="scrollit">
			<span class="scroll-icon">
			    <span class="scroll-icon__dot"></span>
			</span>
		</div>
      <?php } ?>
	</header>