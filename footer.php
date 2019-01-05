	<footer>
		<hr>
		<div class="container">
    		<div class="row">
    		    <div class="col-lg-12">
        		    <small class="pull-right">حق نشر برای عموم آزاد است</small>
        		    <small class="pull-left">قدرت گرفته از <a href="https://wordpress.org" title="WordPress.org" target="_blank">وردپرس</a></small>
    		    </div>
    		</div>
		</div>
	</footer>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script> 
	<script src="<?php echo get_template_directory_uri(); ?>/dev/js/fullHeight.js"></script> 
	<script src="<?php echo get_template_directory_uri(); ?>/dev/js/bootstrap.min.js"></script> 
	<?php if(is_home()){ ?>
	<script>
	       jQuery(document).ready(function() {
	           jQuery('header').fullHeight();
	           
	           headerHeight = jQuery("header").height();
	           navHeight = jQuery("nav").height();
	           jumbotronHeight = jQuery(".jumbotron").height();
	           HH = headerHeight-(navHeight+jumbotronHeight+navHeight);
	           marginTop = (HH/2)-30;
	           jQuery(".jumbotron").css({"margin-top":marginTop+"px"});
	       });
	</script>
	<?php
		}
        if(is_singular()){ ?>
	<script>
	       jQuery(document).ready(function() {

                jQuery('#comments input[type="text"], #comments textarea').each(function(){
                    jQuery(this).attr("placeholder", jQuery(this).prev('label').text());
                });
                jQuery('#url').remove();
	       });
	</script>
        <?php
        }
		wp_footer();
	?>
</body>
</html>