<?php
	$conn = new mysqli("osp74.beget.tech", "osp74_kuznecov", "123qwe321!#", "osp74_kuznecov");
	if($conn->connect_error){
		die("Connection Failed!".$conn->connect_error);
	}
?>