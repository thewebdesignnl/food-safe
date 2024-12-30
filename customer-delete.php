<?php require_once('header.php'); 

	$statement = $pdo->prepare("DELETE FROM tbl_customer WHERE cust_id =?");
	$statement->execute(array($_REQUEST['id']));

	header('location: all-customers.php');
?>