<?php  include('header.php'); ?>	
<?php  include('sidebar.php'); 
  
  $type = $_GET['type'];
  $id = $_GET['id'];


if(isset($_POST['update-type'])){	
	if(($_POST['update-name'] == "")){
	     /// $msg = '<div class="status-danger"><span>Field Empty</span></div>';	
	}
	else{	
		$name = $_POST['update-name'];
		 if($type==1){ // categories
					$statement_update = $pdo->prepare("UPDATE category SET category=? WHERE id=?");
					 $statement_update->execute(array($name,$_REQUEST['id']));		
					if($statement_update){ 
						header('location: category.php');
					}
		 }
		 if($type==2){ // groups
					$statement_update = $pdo->prepare("UPDATE groups SET name=? WHERE id=?");
					 $statement_update->execute(array($name,$_REQUEST['id']));		
					if($statement_update){ 
						header('location: groups.php');
					}
		 }
		 if($type==3){ // kinds
					$statement_update = $pdo->prepare("UPDATE kinds SET kname=? WHERE id=?");
					 $statement_update->execute(array($name,$_REQUEST['id']));		
					if($statement_update){ 
						header('location: kind.php');
					}
		 }		
		 if($type==4){ // lists
					$statement_update = $pdo->prepare("UPDATE lists SET listname=? WHERE lid=?");
					 $statement_update->execute(array($name,$_REQUEST['id']));		
					if($statement_update){ 
						header('location: lists.php');
					}
		 }	
		
	}
}

if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	
	
   if($type==1){
	   $typeupdate = 'Category';
	       $statement = $pdo->prepare("SELECT * FROM category WHERE id=?");
			$statement->execute(array($_REQUEST['id']));
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) {
				$getname  =  $row['category'];  

			}
   }
	
   if($type==2){
	      $typeupdate = 'Group';
	      $statement = $pdo->prepare("SELECT * FROM groups WHERE id=?");
			$statement->execute(array($_REQUEST['id']));
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) {
				$getname  =  $row['name'];  
			}
   }
   if($type==3){
	    $typeupdate = 'Kind';
		 $statement = $pdo->prepare("SELECT * FROM kinds WHERE id=?");
			$statement->execute(array($_REQUEST['id']));
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) {
				$getname  =  $row['kname'];  
			}
   }
  if($type==4){
	    $typeupdate = 'list';
		 $statement = $pdo->prepare("SELECT * FROM lists WHERE lid=?");
			$statement->execute(array($_REQUEST['id']));
			$result = $statement->fetchAll(PDO::FETCH_ASSOC);
			foreach ($result as $row) {
				$getname  =  $row['listname'];  
			}
   }
}
 ?>

<form class="  theme-form theme-form-2 mega-form" action="" method="post">
            <!-- Page Sidebar Start -->
            <div class="page-body">

                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-8 m-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="title-header option-title">
                                                <h5>Update <?php echo $typeupdate; ?></h5>
                                            </div>
                                            
					  <div class="mb-4 row align-items-center">
                                 <label class="col-lg-2 col-md-3 col-form-label form-label-title">Name </label>
                                <div class="col-md-9 col-lg-10">
                                   <input class="form-control" type="text"  value="<?php echo $getname; ?>" name="update-name">
                                                                </div>
                                                            </div>                                              
                                    
                             
                                        <div class="card-submit-button">
                                            <button class="btn btn-animation ms-auto"  name="update-type" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
 
                    </div>
                </div>
					 </div> </div>
                </form>
              

                 <?php  include('footer.php'); ?>	

                 