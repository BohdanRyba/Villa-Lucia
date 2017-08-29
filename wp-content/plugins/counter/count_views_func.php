<?php

add_action( 'admin_menu', 'my_admin_menu' );

function my_admin_menu() {
	add_menu_page( 'Counter Settings', 'Counter Settings', 'manage_options', 'myplugin/myplugin-admin-page.php', 'myplguin_admin_page', 'dashicons-admin-site', 6  );
}

function myplguin_admin_page() {
	?>
	<div class="wrap">
		<h2>Очистити перелік відвідувань?</h2>
	</div>

	<form action="<?php echo '../wp-content/plugins/counter/'?>counter_cleaner.php" method="post">

		<input type="hidden" name="clear_views" value="Clear All">
		<input type="submit" value="Clear All">
	</form>

	<?php
}
//add_action( 'admin_menu', 'my_admin_menu' );

