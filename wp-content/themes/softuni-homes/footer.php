        <footer class="site-footer">
			<p>&copy; Copyright <?php echo date( 'Y' ); ?> | Developer links: 
				<a href="/edits.html">Edits</a>,
				<a href="/index.html">Home</a>,
				<a href="/single.html">Single</a>
			</p>
            <div class="footer-nav-menu">
				<?php
                if ( has_nav_menu( 'footer_menu' ) ) {
                        wp_nav_menu(
                                array(
                                        'theme_location' => 'footer_menu',
                                )
                        );
                }
                ?>
            </div>
		</footer>
	</div>

    <?php wp_footer(); ?>

</body>
</html>