<?php
$likes = get_post_meta( get_the_ID(), 'likes', true );
if (empty($likes)) {
    $likes = 0;
}
?>
<div class="property-single">
    <main class="property-main">
        <div class="property-card">
            <div class="property-primary">
                <header class="property-header">
                    <h2 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="property-meta">
                        <span class="meta-location">Location: <?php echo softuni_display_single_term( get_the_ID(), 'location' ); ?></span>
                        <span class="meta-total-area">Price: 1,100 €/sq.m</span>
                    </div>

                    <div class="property-details grid">
                        <div class="property-details-card">
                            <div class="property-details-card-title">
                                <h3>Rooms</h3>
                            </div>
                            <div class="property-details-card-body">
                                <ul>
                                    <li>2 Bedrooms</li>
                                    <li>1 Bathroom</li>
                                    <li>1 Living room</li>
                                    <li>Separated kitchen</li>
                                </ul>
                            </div>
                        </div>
                        <div class="property-details-card">
                            <div class="property-details-card-title">
                                <h3>Additional Details</h3>
                            </div>
                            <div class="property-details-card-body">
                                <ul>
                                    <li>Floor: 6</li>
                                    <li>Elevator/Lift</li>
                                    <li>Brick-built</li>
                                    <li>Electricity</li>
                                    <li>Water Supply</li>
                                    <li>Heating</li>
                                </ul>
                            </div>
                        </div>
                    </div>
        
                </header>

                <div class="property-body">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
    </main>
    <aside class="property-secondary">
        <div class="property-image property-image-single">
            <div class="property-image-box property-image-box-single">
                <img src="<?php echo has_post_thumbnail() ? the_post_thumbnail() : get_template_directory_uri(); ?>/assets/images/bedroom.jpg" alt="property image">
            </div>
        </div>
        <a id="<?php echo get_the_ID(); ?>" href="#" class="button button-wide like-button">Like the property (<span id="likes-count"><?php echo $likes; ?></span>)</a>
    </aside>
</div>
