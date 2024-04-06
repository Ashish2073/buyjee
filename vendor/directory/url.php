<?php
// vendor Url
function get_template_directory(){
	global $conn;
	$path = "https://buyjee.com/vendor/";
	return $path;
}

// Admin URL
function get_template_directory_admin(){
	global $conn;
	$path = "https://buyjee.com/admin/";
	return $path;
}

// Home URL
function get_template_directory_main(){
	global $conn;
	$path = "https://buyjee.com/";
	return $path;
}
?>