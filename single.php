<?php
$post = $wp_query->post;

if ( in_category( 'press' ) ) {
  include( TEMPLATEPATH.'/single-press.php' );
} 
elseif( in_category( 'videos' ) ) {
  include( TEMPLATEPATH.'/single-videos.php' );
}
else {
  include( TEMPLATEPATH.'/single-event.php' );
}
?>