<?php get_header(); ?>

<ul class="jobs-listing">
	<?php if ( have_posts() ) : ?>

		<?php softuni_update_home_visit_count( get_the_ID() ); ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'template-parts/home', 'item' ); ?>

		<?php endwhile; ?>

	<?php endif; ?>

</ul>

<?php get_footer(); ?>
