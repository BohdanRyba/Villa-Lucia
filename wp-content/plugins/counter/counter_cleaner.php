<?php
include_once($_SERVER['DOCUMENT_ROOT'].'/wp-config.php' );

function dd($arr,$bool = true){
	echo '<pre>';
	var_dump($arr);
	echo '<pre>';
	if ($bool){
		die();
	}

}
global $wpdb;

if (isset($_POST['clear_views'])){
	$table_name = $wpdb->prefix.'count_page_views';
	$delete = $wpdb->query("TRUNCATE TABLE $table_name");
	wp_redirect('http://villa.loc:8080/wp-admin/admin.php?page=myplugin%2Fmyplugin-admin-page.php');
	exit();
}