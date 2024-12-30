<?php require_once('header.php');

    $type = $_GET['type'];
    $id = $_GET['id'];

	if($type==1){ // category delete
        $statement = $pdo->prepare("DELETE FROM category WHERE id =?");
        $statement->execute(array($id));    
        header('location: category.php');
    }
    if($type==2){ // group delete
        $statement = $pdo->prepare("DELETE FROM groups WHERE id =?");
        $statement->execute(array($id));    
        header('location: groups.php');
    }

    if($type==3){ // kinds
        $statement = $pdo->prepare("DELETE FROM kinds WHERE id =?");
        $statement->execute(array($id));    
        header('location: kind.php');
    }
 
	  if($type==4){ // lists
        $statement = $pdo->prepare("DELETE FROM lists WHERE lid =?");
        $statement->execute(array($id));    
        header('location: lists.php');
    }
	
?>