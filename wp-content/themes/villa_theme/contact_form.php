<?php
/**
 * Template Name: contact_form
 * Created by PhpStorm.
 * User: Asoft
 * Date: 02.08.2017
 * Time: 16:54
 */
//
//if ($_POST){
////	$post_meta = get_post_meta($_POST['post_id'],'rating',false);
////	$post_meta = intval($post_meta[0]);
////	if ($post_meta){
////		$post_meta--;
////		update_post_meta($_POST['post_id'],'rating',$post_meta);
////		$post_meta = get_post_meta($_POST['post_id'],'rating',false);
////		$post_meta = intval($post_meta[0]);
////	}
//	var_dump($_POST);
//	exit;
//}
if($_POST){
	$name = htmlspecialchars($_POST['uname']);
	$content = htmlspecialchars($_POST['comments']);
	$email = htmlspecialchars($_POST['email']);
//	dd($content);
	$subject = htmlspecialchars($_POST['subject']);
	$post_data = array(
		'post_title'    => $subject."($name)",
		'post_content'  => $content.'<br><hr><h5>Email:</h5><b>'.$email.'</b>',
		'post_status'   => 'publish',
		'post_type'     =>'contact_form',
	);
	$post_id = wp_insert_post( $post_data );
	wp_mail($email,$subject,$name.'<br><hr>'.$content);
	wp_redirect($_SERVER['HTTP_REFERER'],301);
	exit;
}