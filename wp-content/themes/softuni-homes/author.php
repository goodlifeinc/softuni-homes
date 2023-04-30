<?php get_header(); ?>

<?php the_archive_title(); ?>

<p>Very custom author archive template</p>
<ul class="properties-listing">
	<?php if ( have_posts() ) : ?>

		<?php while( have_posts() ) : the_post(); ?>

			<?php get_template_part( 'partials/post', 'archive' ); ?>

		<?php endwhile; ?>

		<?php posts_nav_link(); ?>

	<?php endif; ?>

</ul>

<?php get_footer(); ?>
