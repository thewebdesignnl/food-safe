<?php  include('header.php'); ?>	
<link rel="stylesheet" type="text/css" href="assets/evo-calendar/css/evo-calendar.css"/>
<link rel="stylesheet" type="text/css" href="assets/evo-calendar/css/evo-calendar.midnight-blue.css"/>
<?php  include('sidebar.php');  

if(isset($_POST['add-list1'])) {
    $valid = 1;
     if(empty($_POST['list-user'])) {
         $valid = 0;
       
     }
      if($valid == 1) {
		   $reg_at = date("Y-m-d");
        $statement = $pdo->prepare("INSERT INTO planning (u_id,plan_pid,plan_type,task_day,task_time,pdate) VALUES (?,?,?,?,?,?)");
        $statement->execute(array($_POST['list-user'],$_POST['list-pid'],'1',$_POST['list-date'],$_POST['list-time'],$reg_at));
     }
 } 

if(isset($_POST['add-list2'])) {
    $valid = 1;
     if(empty($_POST['list-user2'])) {
         $valid = 0;
         
     }
      if($valid == 1) {
		   $reg_at = date("Y-m-d");
      $statement = $pdo->prepare("INSERT INTO planning (u_id,plan_pid,plan_type,task_day,task_time,pdate) VALUES (?,?,?,?,?,?)");
        $statement->execute(array($_POST['list-user2'],$_POST['list-pid2'],'2',$_POST['list-date2'],$_POST['list-time2'],$reg_at));
     }
 } 

$getlists = $pdo->prepare("SELECT * FROM lists");


?>	

            <!-- Container-fluid starts-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                                    <div class="card">
                                       <form class="theme-form theme-form-2 mega-form"   method="post">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Add article</h5>
                                            </div>    
											
									<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
<button class="nav-link active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#tab-measurment"  type="button">Measurements</button>
                                                </li>
                                           
                                                <li class="nav-item" role="presentation">
   <button class="nav-link" id="pills-usage-tab" data-bs-toggle="pill" data-bs-target="#tab-list" type="button">Lists</button>
                                                </li>                                            
                                       
                                            </ul>		
											
											
											
											
					 <div class="tab-content" id="pills-tabContent">
						  <div class="tab-pane fade show active" id="tab-measurment" role="tabpanel">
			  <form method="POST" class="theme-form theme-form-2 mega-form"  name="measrement" enctype="multipart/form-data"> 
                       <div class="mb-4 row align-items-center">
                          <label class="col-lg-2 col-md-3 col-form-label form-label-title">User</label>
                          <div class="col-md-9 col-lg-10">                                
                                         
                     <select name="list-user" class="js-example-basic-single w-100 selectusr">
		                            <option value="">Select User</option>
		                            <?php		                          
		                            $getuser->execute();
		                            $result = $getuser->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) { ?>
		                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
		                                <?php } ?>
		                        </select>
                                    </div>
                                        </div><!--mb-4-->                                                 
                                                      
                                      <div class="mb-4 row align-items-center">
                             <label class="col-lg-2 col-md-3 col-form-label form-label-title">Products</label>
                              <div class="col-md-9 col-lg-10">              
                     <select name="list-pid" class="js-example-basic-single w-100">
		                            <option value="">Select Product</option>
		                            <?php		                          
                                  $getproducts->execute();  
                                  $result2 = $getproducts->fetchAll(PDO::FETCH_ASSOC);                    
 
		                            foreach ($result2 as $row2) { ?>
		           <option value="<?php echo $row2['pid']; ?>"><?php echo $row2['pname']; ?></option>
		                                <?php } ?>
		                        </select>
                                    </div>
                                         </div><!--mb-4-->

                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-lg-2 col-md-3 col-form-label form-label-title"> Date</label>
                                            <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="date" name="list-date"  value="">
                                                 </div>
                                                </div><!--mb-4-->
                                                <div class="mb-4 row align-items-center">
                                                <label class="col-lg-2 col-md-3 col-form-label form-label-title">Time</label>
                                                   <div class="col-md-9 col-lg-10">
                                                      <input class="form-control" type="time"  name="list-time"  value="">
                                              </div>
                                                </div><!--mb-4-->
                                   <button class="btn btn-animation"  type="submit"  name="add-list1">Add  article</button>

                                   
                                   </form>
                                    </div> 
									
<div class="tab-pane fade show" id="tab-list" role="tabpanel">
			  <form method="POST" class="theme-form theme-form-2 mega-form"  name="add-list" enctype="multipart/form-data"> 
                       <div class="mb-4 row align-items-center">
                          <label class="col-lg-2 col-md-3 col-form-label form-label-title">User</label>
                          <div class="col-md-9 col-lg-10">                                
                                         
                   <select name="list-user2" class="js-example-basic-single w-100 selectusr">
		                            <option value="">Select User</option>
		                            <?php		                          
		                            $getuser->execute();
		                            $result = $getuser->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) { ?>
		                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
		                                <?php } ?>
		                        </select>
                                    </div>
                                        </div><!--mb-4-->                                                 
                                                      
                                      <div class="mb-4 row align-items-center">
                             <label class="col-lg-2 col-md-3 col-form-label form-label-title">List</label>
                              <div class="col-md-9 col-lg-10">              
                     <select name="list-pid2" class="js-example-basic-single w-100">
		                            <option value="">Select</option>
		                            <?php		                          
                                  $getlists->execute();  
                                  $listresult = $getlists->fetchAll(PDO::FETCH_ASSOC);                    
 
		                            foreach ($listresult as $row2) { ?>
		           <option value="<?php echo $row2['lid']; ?>"><?php echo $row2['listname']; ?></option>
		                                <?php } ?>
		                        </select>
                                    </div>
                                         </div><!--mb-4-->

                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-lg-2 col-md-3 col-form-label form-label-title"> Date</label>
                                            <div class="col-md-9 col-lg-10">
                                                        <input class="form-control" type="date" name="list-date2"  value="">
                                                 </div>
                                                </div><!--mb-4-->
                                                <div class="mb-4 row align-items-center">
                                                <label class="col-lg-2 col-md-3 col-form-label form-label-title">Time</label>
                                                   <div class="col-md-9 col-lg-10">
                                                      <input class="form-control" type="time"  name="list-time2"  value="">
                                              </div>
                                                </div><!--mb-4-->
                                   <button class="btn btn-animation"  type="submit"  name="add-list2">Add  Value</button>

                                   
                                   </form>
                                    </div> 
									
										   </div>
										</div><!--.card-body-->
									</div>   
										   
								 
							
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->
               
                <?php  include('footer.php'); ?>	
 