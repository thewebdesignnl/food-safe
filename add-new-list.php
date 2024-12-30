<?php  include('header.php'); ?>	
<?php  include('sidebar.php');    
 
 if(isset($_POST['add-list'])) {
 
	$valid = 1;
    if(empty($_POST['list-name'])) {
        $valid = 0;
        $error_message .= "Top Category Name can not be empty<br>";
    } else {
    	// Duplicate Category checking
    	$statement = $pdo->prepare("SELECT * FROM  lists WHERE listname=?");
    	$statement->execute(array($_POST['list-name']));
    	$total = $statement->rowCount();
    	if($total){
    		$valid = 0;
           $msg = '<div class="status-danger"><span>List is exists.</span></div>';	
    	}
    }

    if($valid == 1) {  
			$statement = $pdo->prepare("INSERT INTO lists (listname) VALUES (?)");
			$statement->execute(array($_POST['list-name']));			 
  			   $msg = '<div class="status-close"><span>List saved.</span></div>';	
	 	 		
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
                                                <h5>Add  List</h5>
                                            </div>

                                            <div class="theme-form theme-form-2 mega-form">
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">List Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" name="list-name"  placeholder="Name">
                                                    </div>
                                                </div>                                               
                                            </div>                             
                                        </div>
						  
						  
						  
                                        <div class="card-submit-button">
                                            <button class="btn btn-animation ms-auto" type="submit"  name="add-list">Submit</button>
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
						