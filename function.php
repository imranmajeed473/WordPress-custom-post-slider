<?php
// Testimonials - custome post
register_post_type( 'testimonials',
array(
'labels' => array(
'name' 					=> __( 'Testimonials' ),
'singular_name' 		=> __( 'Testimonials' ),
'add_new' 				=> __( 'Add new Testimonial' ),
'add_new_item'			=> __( 'Add new Testimonial' ),
'new_item' 				=> __( 'New Testimonial' ),
'view_item' 			=> __( 'View Testimonial' ),
'search_items'			=> __( 'Search Testimonials' ),
'not_found_in_trash' 	=> __( 'No Testimonials Found in Trash' ),
'capability_type'     => array('Testimonials'),
'map_meta_cap'          => true,
),
'public' => true,
'supports' => array( 'title','editor','thumbnail' ),
)
);

// Testimonials - shortcode [testimonials_posts]
add_shortcode( 'testimonials_posts', 'testimonials' );
function testimonials( $atts ){
  global $post;
  $default = array(
    'type'      => 'post',
    'post_type' => '',
    'limit'     => 10,
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
      $return .= '<div class="item">';
      $return .= '<i>'.get_the_post_thumbnail().'</i>';
      $return .= '<div class="innr">';
      $return .= '<h5>'.get_the_title() .'</h5>';
      $return .= '<p>'.get_the_content().'</p>';
      $return .= '</div><!-- .inner --></div><!-- .item -->';
    endforeach; wp_reset_postdata();
    $return .= '</div>';
  else :
    $return .= '<p>No posts found.</p>';
  endif;
  return $return;
}

?>
