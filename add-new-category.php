<?php  include('header.php'); ?>	
<?php  include('sidebar.php');    
 
 if(isset($_POST['add-cat'])) {
	 
print_r($_POST);	 
	 
	$valid = 1;
    if(empty($_POST['cat-f'])) {
        $valid = 0;
        $error_message .= "Top Category Name can not be empty<br>";
    } else {
    	// Duplicate Category checking
    	$statement = $pdo->prepare("SELECT * FROM  category WHERE category=?");
    	$statement->execute(array($_POST['cat-f']));
    	$total = $statement->rowCount();
    	if($total){
    		$valid = 0;
           $msg = '<div class="status-danger"><span>Category is exists.</span></div>';	
    	}
    }

    if($valid == 1) {  
			$statement = $pdo->prepare("INSERT INTO category (category) VALUES (?)");
			$statement->execute(array($_POST['cat-f']));			 
  			   $msg = '<div class="status-close"><span>Category saved.</span></div>';	
	 	 		
    }
 }

 if(isset($_POST['add-grp'])) {
	   $valid = 1;
  if(empty($_POST['groupname'])) {
        $valid = 0;
        
    } else {
    	// Duplicate Category checking
    	$statement = $pdo->prepare("SELECT * FROM  groups WHERE name=?");
    	$statement->execute(array($_POST['groupname']));
    	$total = $statement->rowCount();
    	if($total){
    		$valid = 0;
        	  $msg = '<div class="status-danger"><span>Group is exists.</span></div>';	
    	}
    }

    if($valid == 1) {  
		 			 
 			
			$statement2 = $pdo->prepare("INSERT INTO groups (name) VALUES (?)");
			$statement2->execute(array($_POST['groupname']));	
		  $msg = '<div class="status-close"><span>Group saved.</span></div>';	
	 	 		
    }
 }


 if(isset($_POST['add-kind'])) {
	   $valid = 1;
  if(empty($_POST['kindname'])) {
        $valid = 0;        
    } else {
    	$statement = $pdo->prepare("SELECT * FROM  kinds WHERE kname=?");
    	$statement->execute(array($_POST['kindname']));
    	$total = $statement->rowCount();
    	if($total){
    		$valid = 0;
        	  $msg = '<div class="status-danger"><span>kind is exists.</span></div>';	
    	}
    }
    if($valid == 1) {  			
		$statement2 = $pdo->prepare("INSERT INTO kinds (kname) VALUES (?)");
		$statement2->execute(array($_POST['kindname']));	
		$msg = '<div class="status-close"><span>kind saved.</span></div>';	 	 		
    }
 }
  ?>

            <div class="page-body">

                <!-- New Product Add Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-8 m-auto">
									  <div class="title-header option-title"><?php echo $msg; ?></div>
                                    <div class="card">
                      <form class="theme-form theme-form-2 mega-form"  action="" method="post" enctype="multipart/form-data">
                                        <div class="card-body">											 
                                            <div class="card-header-2">
                                                <h5>Add  Category</h5>
                                            </div>

                                            <div class="theme-form theme-form-2 mega-form">
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Category Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" name="cat-f"  placeholder="Category Name">
                                                    </div>
                                                </div>                                               
                                            </div>                             
                                        </div>
						  
						  
						  
                                        <div class="card-submit-button">
                                            <button class="btn btn-animation ms-auto" type="submit"  name="add-cat">Submit</button>
                                        </div>
                                    </form>
                                    </div><!--.card-->
 
  					  <div class="card">
                      	<form class="theme-form theme-form-2 mega-form"  action="" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="card-header-2"> <h5>Add Group</h5> </div>          
									<div class="theme-form theme-form-2 mega-form">
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Group Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" name="groupname"  placeholder="Group">
                                                    </div>
                                                </div>                                               
                                            </div> 
                                        </div>					  
                                        <div class="card-submit-button">
                                            <button class="btn btn-animation ms-auto" type="submit"  name="add-grp">Submit</button>
                                        </div>
                                    </form>
                                    </div><!--.card-->
									
					   <div class="card">
                      	<form class="theme-form theme-form-2 mega-form"  action="" method="post" enctype="multipart/form-data">
                                        <div class="card-body">
                                            <div class="card-header-2"> <h5>Add kind</h5> </div>          
									<div class="theme-form theme-form-2 mega-form">
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">kind Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" name="kindname"  placeholder="Kind">
                                                    </div>
                                                </div>                                               
                                            </div> 
                                        </div>					  
                                        <div class="card-submit-button">
                                            <button class="btn btn-animation ms-auto" type="submit"  name="add-kind">Submit</button>
                                        </div>
                                    </form>
                                    </div><!--.card-->	

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- New Product Add End -->

  <?php  include('footer.php'); ?>	
	<script type='text/javascript'> 
	jQuery( document ).ready(function($) {	 		 
	
	 }); 
</script>	 						
						