<?php
function register_mein_menu() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
}
add_action( 'init', 'register_mein_menu' );

	add_theme_support( 'post-thumbnails' );
    add_image_size( 'thumbnail', 268, 180,true );
   register_sidebar(array(
       'name' => 'ابزارک' ,
       'description' => 'ابزارک',
       'id' => 'sidebar',
       'before_widget' => '',
       'after_widget'  => '',
       'before_title'  => '<h2>',
       'after_title'   => '</h2>',
      ));

function check_image_exists($url){
    /*
	$imageArray = getimagesize($url);
	if($imageArray[0]){
	    return true;
	}
	else{
	    return false;
	} */
	if(preg_match('/\.(jpeg|jpg|png|gif)$/i', $url)) {
	    return true;
	}
	else{
	    return false;
	}
}

 #******************************************************
#           PAGINATION cat
#******************************************************
function pagination_posts_nav_cat() {

    if( is_singular() )
    return;
    global $wp_query;
    if( $wp_query->max_num_pages <= 1 )
        return;
    echo '<div class="text-right"><ul class="pagination">';
    $paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
    $max   = intval( $wp_query->max_num_pages );
    if ( $paged >= 1 )
        $links[] = $paged;
    if ( $paged >= 3 ) {
        $links[] = $paged - 1;
        $links[] = $paged - 2;
    }
    if ( ( $paged + 2 ) <= $max ) {
        $links[] = $paged + 2;
        $links[] = $paged + 1;
    }?>

    <?php
    //if ( get_previous_posts_link() ){

        if(get_previous_posts_link()){
        echo "<li>";
        printf( '%s' . "\n", get_previous_posts_link(__( '<span aria-hidden="true">&laquo;</span>', 'language' )) );
        } else {
            echo '<li class="disabled"><a><span aria-hidden="true">&laquo;</span></a></li>';
        }
        echo "</li>";
   // }
    if ( ! in_array( 1, $links ) ) {
        $class = 1 == $paged ? ' class="active"' : 'class=""';
        printf( '<li %s ><a href="%s" >%s</a></li>' . "\n", $class,esc_url( get_pagenum_link( 1 ) ),  '1' );
        if ( ! in_array( 2, $links ) )
            echo '<li><a lass="btn border" >…</a><li>';
    }
    sort( $links );
    foreach ( (array) $links as $link ) {
        $class = $paged == $link ? ' class="active"' : 'class=""';
        printf( '<li %s ><a href="%s" >%s</a><li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
    }
    if ( ! in_array( $max, $links ) ) {
        if ( ! in_array( $max - 1, $links ) )
        echo '<li><a class="">...</a><li>' . "\n";
        $class = $paged == $max ? ' class="active"' : ' class=""';
        printf( '<li %s ><a href="%s" >%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ),  $max );
    }
   // if ( get_next_posts_link() ){
       if( get_next_posts_link()){
        echo "<li>";
        printf( '%s' . "\n", get_next_posts_link( __( '<span aria-hidden="true">&raquo;</span>', 'language' )) );
       }else{
            echo '<li class="disabled"><a><span aria-hidden="true">&raquo;</span></a></li>';
       }
        echo "</li>";
   // }
   echo "</nav></div>";
}




/*
$ch = curl_init("http://api.meetup.com/tehran-wordpress-meetup/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($ch);
curl_close($ch);
$results = json_decode($result);
//echo $results->members;
//echo $results->pro_network->number_of_groups;*/

//------------------------------------------------------------------------
//---------------------------------------------------------------------------
wp_enqueue_script( 'save-image-js', get_template_directory_uri() . '/dev/js/save_image.js', array( 'jquery' ) );
wp_localize_script( 'save-image-js', 'the_ajax_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );
//----------------
function image_metabox(){
    add_meta_box('image_metabox_title','مشخصات رویداد','add_image_metabox','post','normal','high');
}
add_action('add_meta_boxes','image_metabox');
function add_image_metabox(){
  global $post;
?>
	<table>
		<tr><td colspan="2">دریافت نمایه شرکت کنندگان</td></tr>
		<tr>
	        <td>شناسه گروه</td>
	        <td>
	            <input type="text" class='name1' name="name1" value="" />
	        </td>
	    </tr>
	   <tr>
	        <td>شناسه رویداد</td>
	        <td>
	            <input type="text" class='name2' name="name2" value="" />
	        </td>
	    </tr>
	    <tr>
	        <td colspan='2'>
	            <input type="button" data-id="<?php echo $post->ID; ?>" name="save_btn" class="button-primary save_btn" value="دریافت" />
	        </td>
	    </tr>
	    <tr>
	        <td colspan="2">
	            <p class="res"></p>
	        </td>
	    </tr>
	</table>
	<table>
	   <tr>
	        <td>آدرس عکس نقشه</td>
	        <td>
	            <input type="text" value="<?php echo get_post_meta($post->ID, 'mapimg', true); ?>" name="mapimg" />
	        </td>
	    </tr>
	    <tr>
	        <td>توضیحات و آدرس کناری</td>
	        <td>
	            <textarea name="maptext"><?php echo get_post_meta($post->ID, 'maptext', true); ?></textarea>
	        </td>
	    </tr>
	    <tr>
	        <td>اسپانسرها</td>
	        <td>
	            <textarea name="sponsors"><?php echo get_post_meta($post->ID, 'sponsors', true); ?></textarea>
	            <p><small>img address|url address</small></p>
	        </td>
	    </tr>
	</table>
<?php } 

//------------------
add_action( 'wp_ajax_save_image_function', 'save_image_function' );
function save_image_function(){
	$name1   = $_POST['name1'];
	$name2   = $_POST['name2'];

	$upload_dir = wp_upload_dir();
	
	if (! is_dir($upload_dir['basedir']."/events")) {
		mkdir( $upload_dir['basedir']."/events", 0755 );
	}
    $dir         = $upload_dir['basedir']."/events/".$_POST['name1'].'/'.$_POST['name2'];
    $dirtobuild1 = $upload_dir['basedir']."/events/".$_POST['name1'];
    $dirtobuild2 = $dirtobuild1.'/'.$_POST['name2'];
    if (! is_dir($dir)) {
		mkdir( $dirtobuild1, 0755 );
		mkdir( $dirtobuild2, 0755 );
	}
    $img_url_array = array();

	$ch  = curl_init();
	$url = "http://api.meetup.com/".$_POST['name1']."/events/".$_POST['name2']."/attendance";
	curl_setopt ($ch, CURLOPT_URL, $url);
	curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
	curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
	$result  = curl_exec ($ch);
	$results = json_decode($result, true);
	$atcnt = 0;
	foreach($results as $res){
	        $atcnt++;
	     	$img_url         = $res['member']['photo']['thumb_link'];
		   	$img_url_array[] = $upload_dir['baseurl']."/events/".$_POST['name1'].'/'.$_POST['name2']."/".basename($img_url);
		     
			$in  = fopen($img_url, "rb");
			$out = fopen($dir .'/'. basename($img_url), "wb");
			while ($chunk = fread($in,8192)){
			    fwrite($out, $chunk, 8192);
			}
			fclose($in);
			fclose($out);
	}
	curl_close ($ch);
	
	update_post_meta($_POST['postid'],'_atcnt',$atcnt);
	update_post_meta($_POST['postid'],'_imgurl',$img_url_array);
	echo "عکس ها با موفقیت ذخیره شد.";
	die();
}

function save_event_meta_box($post_id, $post, $update){
	$mapimg  = $_POST['mapimg'];
	$maptext = $_POST['maptext'];
	$sponsors = $_POST['sponsors'];

    update_post_meta($post_id, "mapimg", $mapimg);
    update_post_meta($post_id, "maptext", $maptext);
    update_post_meta($post_id, "sponsors", $sponsors);
}
add_action("save_post", "save_event_meta_box", 10, 3);
