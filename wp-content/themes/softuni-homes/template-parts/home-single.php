<div class="property-single">
    <main class="property-main">
        <div class="property-card">
            <div class="property-primary">
                <header class="property-header">
                    <h2 class="property-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                    <div class="property-meta">
                        <span class="meta-location">Ovcha Kupel, Sofia</span>
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
                    <p>Real estate agency "New Home" presents you a two-room apartment in a newly built building in Ovcha Kupel. With quick access to the Ring Road, close to public transport stops, shops and restaurants, a kindergarten.</p>
                    <p>The apartment has an entrance hall, living room with kitchenette, bedroom, bathroom with toilet, terrace.</p>
                    <p>The exposure is east/north.<br>There is an opportunity to purchase a garage in the building.</p>
                    <p>The building will be completed with luxury common areas, staircases and a lobby. Commercial areas include a restaurant, gym, a beauty salon, a shop, and a pharmacy.</p>
                </div>
            </div>
        </div>
    </main>
    <aside class="property-secondary">
        <div class="property-image property-image-single">
            <div class="property-image-box property-image-box-single">
                <img src="<?php echo has_post_thumbnail() ? the_post_thumbnail() : get_stylesheet_directory_uri(); ?>/assets/images/bedroom.jpg" alt="property image">
            </div>
        </div>
        <a href="#" class="button button-wide">Like the property</a>
    </aside>
</div>
