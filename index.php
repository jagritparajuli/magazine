<?php 
	include $_SERVER['DOCUMENT_ROOT'].'config/init.php';
	//debugger($_SERVER);
	//redirect('cms/index.php');

	$user = new user();
	$data = array(
		'username' => 'Khwopa',
		'session_token'=>tokenize()
	);
	$user->deleteUserByEmail('khwopa@magazine.com');
 ?>