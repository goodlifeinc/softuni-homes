<?php
$visit_count = get_post_meta( get_the_ID(), 'visits_count', true );
if (empty($visit_count)) {
    $visit_count = 0;
}
?>

<li class="property-card">
    <div class="property-primary">
        <h2 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="property-meta">
            <span class="meta-location">Location: <?php echo softuni_display_single_term( get_the_ID(), 'location' ); ?></span>
            <span class="meta-total-area">Total area: 91.65 sq.m</span>
            <span class="meta-visits-count">Visits: <?php echo $visit_count; ?></span>
        </div>
        <div class="property-details">
            <span class="property-price">€ 100,815</span>
            <span class="property-date">
                <?php echo get_the_date(); ?>
            </span>
            <span class="property-date">
                <?php echo get_the_author(); ?>
            </span>
        </div>
    </div>
    <div class="property-image">
        <div class="property-image-box">
            <img src="<?php echo has_post_thumbnail() ? the_post_thumbnail() : get_template_directory_uri(); ?>/assets/images/bedroom.jpg" alt="property image">
        </div>
    </div>
</li>
