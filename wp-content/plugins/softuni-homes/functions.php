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
       $like_number = 1;
       update_post_meta( $home_id, 'likes', $like_number );
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
        // start catching output
        ob_start();
        while ( $query->have_posts() ) : $query->the_post();
            get_template_part('partials/home', 'item');
        endwhile;
        // dump output into a variable
        $echoed = ob_get_clean();
        $output .= $echoed . '</ul>';
    } else {
        $output .= '<p>Home "' . $home_id . '" does not exist';
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

    if ( !empty( $taxonomy_names ) && is_array( $taxonomy_names ) ) {
        $title .= ' #offer ' . join(' ', array_map(function($item) {
            return '#' . $item;
        }, $taxonomy_names));
    }
    return $title;
}
add_filter( 'the_title', 'change_title_text', 10, 2 );

/**
 * Display a single post term
 *
 * @param integer $post_id
 * @param string $taxonomy
 * @return string
 */
function softuni_display_single_term( $post_id, $taxonomy ) {
    $output = '';

    if ( empty( $post_id ) || empty( $taxonomy ) ) {
        return $output;
    }

    $terms = get_the_terms( $post_id, $taxonomy );

    if ( ! empty( $terms ) && is_array( $terms ) ) {
        $output .= join(', ', array_map(function($item) {
            return '<a href="'.get_term_link($item).'">'.$item->name.'</a>';
        }, $terms));
    }

    return $output;
}

/**
 * Display related homes per location
 *
 * @param integer $home_id
 * @return object|null
 */
function softuni_display_other_home_per_locations( $home_id ) {
    if ( empty( $home_id ) ) {
        return;
    }

    $terms = get_the_terms( $home_id, 'location' );

    $homes_args = array(
        'post_type'         => 'home',
        'post_status'       => 'publish',
        'orderby'           => 'rand',
        'post__not_in'      => array($home_id),
        'posts_per_page'    => 2,
        'tax_query'         => array(
            array(
                'taxonomy'      => 'location',
                'field'         => 'term_id',
                'terms'         => array_map(function($item) {
                                    return $item->term_id;
                                }, $terms),
                'operator'      => 'IN',
            )
        )
    );

    $homes_query = new WP_Query( $homes_args );

    if ( ! empty( $homes_query ) ) {
        return $homes_query;
    }

    return null;
}
