<?php

/*
**
* Jobs Enqueue
*/
function softuni_enqueue_scripts() {
   wp_enqueue_script( 'softuni-script', plugins_url( 'assets/js/scripts.js', __FILE__ ), array( 'jquery' ), 1.1 );
   wp_localize_script( 'softuni-script', 'my_ajax_object', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );

}
add_action( 'wp_enqueue_scripts', 'softuni_enqueue_scripts' );

/**
* Functions takes care of the like of the job
*
* @return void
*/
function softuni_home_like() {
   $home_id = esc_attr( $_POST['home_id'] );
   if ( empty($home_id) ) {
       return wp_send_json( array( 'invalid_home_id' => true ) ); 
   }
   $post_type = get_post_type($home_id);
   if ( $post_type !== 'home' ) {
       return wp_send_json( array( 'post_type' => $post_type ) );
   }

   $like_number = get_post_meta( $home_id, 'likes', true );

   if ( empty( $like_number ) ) {
       update_post_meta( $home_id, 'likes', 1 );
   } else {
       $like_number = $like_number + 1;
       update_post_meta( $home_id, 'likes', $like_number );
   }

   wp_send_json(array('likes' => $like_number));
}
add_action( 'wp_ajax_nopriv_softuni_home_like', 'softuni_home_like' );
add_action( 'wp_ajax_softuni_home_like', 'softuni_home_like' );

function softuni_update_home_visit_count( $post_id = 0 ) {
    if ( empty( $post_id ) ) {
        return;
    }

    $visit_count = get_post_meta( $post_id, 'visits_count', true );

    if ( ! empty( $visit_count ) ) {
        $visit_count = $visit_count + 1;

        update_post_meta( $post_id, 'visits_count', $visit_count );
    } else {
        update_post_meta( $post_id, 'visits_count', 1 );
    }
}

/**
 * Displays details for home ad
 *
 * @return string
 */
function softuni_display_home_ad($atts = array(), $content = null, $tag = '') {
    // normalize attribute keys, lowercase
	$atts = array_change_key_case( (array) $atts, CASE_LOWER );

	// override default attributes with user attributes
	$parsed_atts = shortcode_atts(
		array(
			'home_id' => '',
		), $atts, $tag
	);

    $output = '';

    $home_id = $parsed_atts['home_id'];

    if (empty($home_id)) {
        return $output;
    }

    $options = array(
        'post_type'     => 'home',
        'p'             => $home_id,
        'post_status'   => 'publish'
    );

    $query = new WP_Query( $options );
    if ( $query->have_posts() ) {
        $output .= '<ul class="properties-listing">';
        while ( $query->have_posts() ) : $query->the_post();
            $visit_count = get_post_meta( get_the_ID(), 'visits_count', true );
            if (empty($visit_count)) {
                $visit_count = 0;
            }
            $output .= '<li class="property-card">';
            $output .= '<div class="property-primary">';
            $output .= '<h2 class="property-title"><a href="'. get_the_permalink() .'">'. get_the_title() .'</a></h2>';
            $output .= '<div class="property-meta">';
            $output .= '    <span class="meta-location">Ovcha Kupel, Sofia</span>';
            $output .= '    <span class="meta-total-area">Total area: 91.65 sq.m</span>';
            $output .= '    <span class="meta-visits-count">Visits: '. $visit_count .'</span>';
            $output .= '</div>';
            $output .= '<div class="property-details">';
            $output .= '    <span class="property-price">€ 100,815</span>';
            $output .= '    <span class="property-date">';
            $output .= '        '. get_the_date();
            $output .= '    </span>';
            $output .= '    <span class="property-date">';
            $output .= '        '. get_the_author();
            $output .= '    </span>';
            $output .= '</div>';
            $output .= '        </div>';
            $output .= '        <div class="property-image">';
            $output .= '            <div class="property-image-box">';
            $output .= '                <img src="'. has_post_thumbnail() ? get_the_post_thumbnail() : get_stylesheet_directory_uri() .'/assets/images/bedroom.jpg" alt="property image">';
            $output .= '            </div>';
            $output .= '        </div>';
            $output .= '</li>';
        endwhile;
        $output .= '</ul>';
    } else {
        $output .= '<p>Home ' . $home_id . ' does not exist';
    }

    return $output;
}
add_shortcode( 'display_home', 'softuni_display_home_ad' );

/**
 * Adds locations hashtags of a home to the title.
 *
 * @param string $title
 * @param string $post_id
 * @return string
 */
function change_title_text( $title, $post_id ) {
    if ( is_admin() ) {
        return $title;
    }
    $post_type = get_post_type($post_id);
    if ( $post_type !== 'home' ) {
        return $title;
    }
    $taxonomies = get_object_taxonomies($post_type);   
    $taxonomy_names = wp_get_object_terms($post_id, $taxonomies,  array("fields" => "names"));

    if ( !empty( $taxonomy_names ) ) {
        $title .= ' #offer ' . join(' ', array_map(function($item) {
            return '#' . $item;
        }, $taxonomy_names));
    }
    return $title;
}
add_filter( 'the_title', 'change_title_text', 10, 2 );
