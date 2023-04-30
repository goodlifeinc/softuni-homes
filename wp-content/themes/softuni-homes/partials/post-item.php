<?php 
$archive_year  = get_the_time( 'Y' ); 
$archive_month = get_the_time( 'm' ); 
?>
<li class="property-card">
    <div class="property-primary">
        <h2 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
        <div class="property-meta">
            <span><?php the_excerpt(); ?></span>
        </div>
        <div class="property-details">
            <span class="property-date">
                <a href="<?php echo esc_url( get_month_link( $archive_year, $archive_month ) ); ?>">
                    <?php echo get_the_date(); ?>
                </a>
            </span>
            <span class="property-date">
                <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" title="<?php echo esc_attr( get_the_author() ); ?>">
                    <?php echo get_the_author(); ?>
                </a>
            </span>
        </div>
    </div>
    <div class="property-image">
        <div class="property-image-box">
            <img src="<?php echo has_post_thumbnail() ? the_post_thumbnail() : get_stylesheet_directory_uri(); ?>/assets/images/bedroom.jpg" alt="property image">
        </div>
    </div>
</li>
