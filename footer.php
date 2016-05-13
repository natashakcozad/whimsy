			<?php hybrid_get_sidebar( 'primary' ); // Loads the sidebar/primary.php template. ?>

		</div><!-- #main -->

		<?php hybrid_get_sidebar( 'subsidiary' ); // Loads the sidebar/subsidiary.php template. ?>

		<?php hybrid_get_menu( 'subsidiary' ); // Loads the menu/subsidiary.php template. ?>

		<footer <?php hybrid_attr( 'footer' ); ?>>

			<p class="credit">
				<?php printf(
					/* Translators: 1 is current year, 2 is site name/link. */
					__( 'Copyright &#169; %1$s %2$s.', 'whimsy' ), 
					date_i18n( 'Y' ), hybrid_get_site_link()
				); ?>
			</p><!-- .credit -->
            
			<p class="theme">
				<?php printf(
					/* Translators: 1 is WordPress name/link, and 2 is theme name/link. */
					__( '%1$s+%2$s', 'whimsy' ), 
					hybrid_get_wp_link(), hybrid_get_theme_link()
				); ?>
			</p><!-- .credit -->

		</footer><!-- #footer -->

	</div><!-- #container -->

	<?php wp_footer(); // WordPress hook for loading JavaScript, toolbar, and other things in the footer. ?>

</body>
</html>