<li class="property-card">
    <div class="property-primary">
        <h2 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="property-meta">
            <span class="meta-location">Ovcha Kupel, Sofia</span>
            <span class="meta-total-area">Total area: 91.65 sq.m</span>
        </div>
        <div class="property-details">
            <span class="property-price">€ 100,815</span>
            <span class="property-date">
                <?php the_date(); ?>
            </span>
            <span class="property-date">
                <?php the_author(); ?>
            </span>
        </div>
    </div>
    <div class="property-image">
        <div class="property-image-box">
            <img src="<?php echo has_post_thumbnail() ? the_post_thumbnail() : get_stylesheet_directory_uri(); ?>/assets/images/bedroom.jpg" alt="property image">
        </div>
    </div>
</li>
