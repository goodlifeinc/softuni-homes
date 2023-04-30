<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php softuni_update_home_visit_count( get_the_ID() ); ?>

	<?php while( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'partials/home', 'single' ); ?>

	<?php endwhile; ?>

	<?php get_template_part( 'partials/home', 'similar' ) ?>

<?php endif; ?>

<?php get_footer(); ?>
