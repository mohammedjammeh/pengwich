<?php
	require_once 'core/ini.php';

	if (isset($_POST['token'])) {
		echo Token::generate($_POST['token']);
	}
?>