<?php get_header(); ?>

<?php if ( have_posts() ) : ?>

	<?php softuni_update_home_visit_count( get_the_ID() ); ?>

	<?php while( have_posts() ) : the_post(); ?>

		<?php get_template_part( 'template-parts/home', 'single' ); ?>

	<?php endwhile; ?>

<?php endif; ?>

<h2 class="section-heading">Other similar properties:</h2>
<ul class="properties-listing">
	<li class="property-card">
		<div class="property-primary">
			<h2 class="property-title"><a href="#">Two-bedroom apartment</a></h2>
			<div class="property-meta">
				<span class="meta-location">Ovcha Kupel, Sofia</span>
				<span class="meta-total-area">Total area: 99.50 sq.m</span>
			</div>
			<div class="property-details">
				<span class="property-price">€ 100,815</span>
				<span class="property-date">Posted 14 days ago</span>
			</div>
		</div>
		<div class="property-image">
			<div class="property-image-box">
				<img src="images/bedroom.jpg" alt="property image">
			</div>
		</div>
	</li>

	<li class="property-card">
		<div class="property-primary">
			<h2 class="property-title"><a href="#">Two-bedroom apartment</a></h2>
			<div class="property-meta">
				<span class="meta-location">Ovcha Kupel, Sofia</span>
				<span class="meta-total-area">Total area: 91.65 sq.m</span>
			</div>
			<div class="property-details">
				<span class="property-price">€ 100,815</span>
				<span class="property-date">Posted 14 days ago</span>
			</div>
		</div>
		<div class="property-image">
			<div class="property-image-box">
				<img src="images/bedroom.jpg" alt="property image">
			</div>
		</div>
	</li>
</ul>

<?php get_footer(); ?>
