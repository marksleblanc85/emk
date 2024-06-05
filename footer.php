</main>

<footer class="site-footer bg-base-blue text-white">
	<div class="container lg:flex lg:justify-center lg:items-center">
		<?php
			if (has_nav_menu('footer-links')) :
				wp_nav_menu([
					'menu_class' => 'flex footer-menu',
					'container' => false,
					'walker' => new CustomMenu(),
					'theme_location' => 'footer-links'
				]);
			endif;
		?>		
		<div class="flex flex-col items-center mb-8 lg:mb-0 footer-bottom">
			<a href="/" class="logo mb-4">
				<?= file_get_contents(get_template_directory() . '/assets/images/logo.svg'); ?>
			</a>

			<?php
				if (has_nav_menu('social-menu')) :
					wp_nav_menu([
						'menu_class' => 'social-nav-items flex items-center space-x-4 justify-center',
						'container' => false,
						'walker' => new SocialMenuWalker(),
						'theme_location' => 'social-menu'
					]);
				endif;
				?>
		</div>
	</div>
	<!-- /.container -->

	<div class="bg-black">
		<div class="container flex items-center">
			<?php
			//
							// check for existence of menu
			//
							if (has_nav_menu('legal-menu')) :

								wp_nav_menu([
									//'menu' => 'Main Menu',
									'menu_class' => 'legal-nav-items flex items-center py-4 divide-x divide-white space-x-4 text-sm',
									'container' => false,
									'walker' => new CustomMenu(),
									'theme_location' => 'legal-menu'
								]);

							else :
								echo '<!-- Legal menu not found -->';
							endif;
				?>
		</div>
		<!-- /.container -->
	</div>
	<!-- /.footer-legal -->

</footer>
<?php
wp_footer();
				include_once 'modals.php';
				?>
<?= get_field_safe('global_footer_scripts', 'option'); ?>
<?= get_field_safe('content_footer_scripts'); ?>
</body>

</html>