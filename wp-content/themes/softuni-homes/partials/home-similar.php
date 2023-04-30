<?php
$homes_query = softuni_display_other_home_per_locations( get_the_ID() );

if ( $homes_query->have_posts() ) :
?>

<h2 class="section-heading">Other similar properties:</h2>

<ul class="properties-listing">

	<?php while( $homes_query->have_posts() ) : $homes_query->the_post(); ?>

		<?php get_template_part( 'partials/home', 'item' ); ?>

	<?php endwhile; ?>

<?php endif; ?>

<?php wp_reset_postdata(); ?>

</ul>