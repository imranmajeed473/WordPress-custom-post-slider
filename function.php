<?php

add_shortcode( 'testimonials_posts', 'testimonials' );
function testimonials( $atts ){
  global $post;
  $default = array(
    'type'      => 'post',
    'post_type' => '',
    'limit'     => 1000,
    'status'    => 'publish'
  );
  $r = shortcode_atts( $default, $atts );
  extract( $r );
  if( empty($post_type) )
    $post_type = $type;
  $post_type_ob = get_post_type_object( $post_type );
  if( !$post_type_ob )
    return '<div class="warning"><p>No such post type <em>' . $post_type . '</em> found.</p></div>';
  $args = array(
    'post_type'   => $post_type,
    'numberposts' => $limit,
    'post_status' => $status,
  );
  $posts = get_posts( $args );
  if( count($posts) ):
    $return .= '<div id="testi-slider" class="owl-carousel owl-theme">';
    foreach( $posts as $post ): setup_postdata( $post );
      $return .= '<div class="item"><i>'.get_the_post_thumbnail().'</i><div class="innr"><h5>'.get_the_title() .'</h5><p>'.get_the_content().'</p></div></div>';
    endforeach; wp_reset_postdata();
    $return .= '</div>';
  else :
    $return .= '<p>No posts found.</p>';
  endif;
  return $return;
}
