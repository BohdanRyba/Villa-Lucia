<footer>
	<div class="footer-bottom">
		<div class="container">
			<div class="row">
				<div class="col-xs-6"> &copy; <?php
					$true_options = get_option('true_options');
					echo $true_options['footer_reserved'];?></div>
				<div class="col-xs-6 text-right">
					<ul>
                        <?php $contact = get_post(13)?>
						<li><a href="<?php echo $contact->guid ?>"><?php echo $contact->post_title  ?></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
</footer>
<!-- Go-top Button -->
<div id="go-top"><i class="fa fa-angle-up fa-2x"></i></div>

<?php wp_footer(); ?>
</body>
</html>