<li class="property-card">
    <div class="property-primary">
        <h2 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="property-details">
            <span class="meta-location"><?php the_category(); ?></span>
            <span class="property-date"><?php echo get_the_date(); ?></span>
        </div>
    </div>
    <div class="property-image">
        <div class="property-image-box">
            <img src="<?php echo has_post_thumbnail() ? the_post_thumbnail() : get_template_directory_uri(); ?>/assets/images/bedroom.jpg" alt="property image">
        </div>
    </div>
</li>
