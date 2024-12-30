<?php require("inc/config.php");

if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
	$statement = $pdo->prepare("SELECT * FROM products WHERE pid=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}
 
// Delete from tbl_product
	$statement = $pdo->prepare("DELETE FROM products WHERE pid=?");
	$statement->execute(array($_REQUEST['id']));

	header('location: products.php'); 
}

?>