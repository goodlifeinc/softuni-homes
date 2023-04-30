<?php
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
        $output .= '<h4>hello</h4>';
        return $output;
    }

    $options = array(
        'post_type' => 'home',
        'p'         => $home_id,
        'status'    => 'published'
    );

    $query = new WP_Query( $options );
    if ( $query->have_posts() ) {
        $output .= '<ul class="">';
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
