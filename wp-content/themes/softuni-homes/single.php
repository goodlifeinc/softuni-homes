<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php softuni_update_home_visit_count( get_the_ID() ); ?>

	<?php while( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'partials/post', 'single' ); ?>

	<?php endwhile; ?>

<?php endif; ?>

<?php get_footer(); ?>
