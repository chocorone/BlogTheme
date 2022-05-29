</main>
</div>
<footer id="footer">
	<div class="footer-wrapper">
		<nav id="menu-footer">
			<?php wp_nav_menu(
				array(
					'theme_location' => 'footer'
				)
			); ?>
		</nav>
		<p>&nbsp</p>
		<img src="<?php echo get_template_directory_uri(); ?>/img/logo.png" id="footer-logo"></img>
		<p class="copyright" id="jump">&copy; 2022 <?php echo get_bloginfo('name'); ?>:all rights reserved.</p>
	</div>
</footer>

<?php wp_footer(); ?>
<script type="text/javascript">
	$(function() {
		$('a[href^="#"]').click(function() {
			var speed = 800;
			var href = $(this).attr("href");
			var target = $(href == "#" || href == "" ? 'html' : href);
			if (target != null) {
				var position = target.offset().top;
				$("html, body").animate({
					scrollTop: position
				}, speed, "swing");
			}

			return false;
		});
	});
</script>
</body>

</html>