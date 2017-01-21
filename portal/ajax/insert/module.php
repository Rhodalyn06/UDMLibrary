<?php
	include_once('../connection.php');
	include_once('../session.php');
	$module = $_POST['type'];
	$login = $_SESSION['logid'];
	$_SESSION['module'] = $module;

	$sql3 = $conn->query("INSERT into tb_module (moduleID, module, loginId) VALUES ('null', '$module', '" . $login . "')");
?>