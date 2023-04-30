<?php
/* Template Name: Display Homes */

get_header();

$homes_args = array(
	'post_type'			=> 'home',
	'post_status'		=> 'publish',
	'orderby'			=> 'date',
	'order'				=> 'ASC',
);

$homes_query = new WP_Query( $homes_args );

if ( have_posts() ) {
	while ( have_posts() ) {
		the_post();

		the_content();
	}
}
?>

<ul class="properties-listing">
	<?php if ( $homes_query->have_posts() ) : ?>

		<?php while( $homes_query->have_posts() ) : $homes_query->the_post(); ?>

			<?php get_template_part( 'template-parts/home', 'item' ); ?>

		<?php endwhile; ?>

		<div class="pagination">
			<?php 
				echo paginate_links( array(
					'total'        => $homes_query->max_num_pages,
					'current'      => max( 1, get_query_var( 'paged' ) ),
					'format'       => '?paged=%#%',
					'prev_text'    => sprintf( '<i></i> %1$s', __( 'Previous Page', 'softuni' ) ),
					'next_text'    => sprintf( '%1$s <i></i>', __( 'Next Page', 'softuni' ) )
				) );
			?>
		</div>

	<?php endif; ?>

	<?php wp_reset_postdata(); ?>
</ul>

<?php get_footer(); ?>
