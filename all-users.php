  <?php  include('header.php'); ?>	
 <?php  include('sidebar.php'); ?>	

            <!-- Container-fluid starts-->
            <div class="page-body">
                <!-- All User Table Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>All Users</h5>
                                        <form class="d-inline-flex">
                                            <a href="add-new-user.php" class="align-items-center btn btn-theme d-flex">
                                                <i data-feather="plus"></i>Add New
                                            </a>
                                        </form>
                                    </div>

                                    <div class="table-responsive table-product">
                                        <table class="table all-package theme-table" id="table_id">
                                            <thead>
                                                <tr>
                                                    <th class="text-start">#</th>
                                                    <th>Company Name</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Registered</th>
                                                    <th>Option</th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                       <?php     $i=0;
            	$statement = $pdo->prepare("SELECT * FROM members ORDER BY id  ASC");
            	$statement->execute();
            	$result = $statement->fetchAll(PDO::FETCH_ASSOC);							
            	foreach ($result as $row) {
					$name  =  $row['name'];	
					$members  =  $row['company'];		
					$emailid =  $row['e_mail'];
			        $register_on = $row['register_on'];
                    $role = $row['role'];				
            		$i++;  ?>
                    <tr>
                        <td><?php echo $i; ?></td>
                         <td><div class="user-name"> <span><?php echo $members; ?></span> </div></td>
						  <td><div class="user-name"> <span><?php echo $name; ?></span> </div></td>
                          <td>   <?php echo $emailid; ?></td>
                          <td  class="order-success">
                          <?php if($role==2) {echo '<span>Supervisor</span>';} else {echo '<span>User</span>';} ?></td>
                          <td> <?php echo  date('d M Y',strtotime($register_on)); ?></td>
                         <td>
                          <ul>
                              <li> 
								 <?php if($role==2) { ?>  
								  <a href="user-edit.php?id=<?php echo $row['id']; ?>&type=2"> <i class="ri-pencil-line"></i> </a>
								  <?php } else{ ?>
								  <a href="user-edit.php?id=<?php echo $row['id']; ?>&type=3"> <i class="ri-pencil-line"></i> </a>
								  <?php } ?>
								   </li> 
                                   <li><a href="user-delete.php?id=<?php echo $row['id']; ?>"> <i class="ri-delete-bin-line"></i> </a>
                                                            </li>
                                                        </ul>
                                                    </td>
                                                </tr>
                        <?php } ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- All User Table Ends-->
<?php  include('footer.php'); ?>	