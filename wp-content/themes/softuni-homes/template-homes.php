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

		<?php posts_nav_link(); ?>

	<?php endif; ?>

	<?php wp_reset_postdata(); ?>
</ul>

<?php get_footer(); ?>
