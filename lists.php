  <?php  include('header.php'); ?>	
 <?php  include('sidebar.php'); ?>	

            <!-- Container-fluid starts-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="title-header option-title d-sm-flex d-block">
                                        <h5>List</h5>
                                        <div class="right-options">
                                            <ul>                                
												
                                                <!--<li>
                                                    <a href="javascript:void(0)">Export</a>
                                                </li>-->
                                                <li>
                                                    <a class="btn btn-solid" href="add-new-list.php">Add list</a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="table-responsive">
                                            <table class="table all-package theme-table table-product" id="table_id">
                                                <thead>
                                                    <tr>
                                                    <th>#</th>                                                      
                                                        <th>Name</th>                                                      
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>
											 <tbody>
												
					 	<?php
						$i=0;
							$statement = $pdo->prepare("SELECT *  FROM lists   ORDER BY lid DESC");
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);
							foreach ($result as $row) {
								$proid= $row['lid']; 
               
								$i++;
							?>												
                         <tr>
                            <td><?php echo $i; ?></td>
                  
                           <td><?php echo $row['listname']; ?></td>
                 
   
            <td>   <ul>
                                                     
                                                                <li>
                                
                     <a href="edit.php?id=<?php echo $proid; ?>&type=4" data-bs-original-title="" title=""><i class="ri-pencil-line"></i></a>                                         
																	
                                                                </li>
                                                                <li>
                                                   <a href="javascript:void(0)" data-bs-toggle="modal" data-bs-target="#exampleModalToggle" data-id="<?php echo $proid; ?>" data-type="4" class="delete-btn" data-bs-original-title="" title=""><i class="ri-delete-bin-line"></i> </a>
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
                </div>
                <!-- Container-fluid Ends-->

				
	
    <!-- Delete Modal Box Start -->
    <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header d-block text-center">
                    <h5 class="modal-title w-100" id="exampleModalLabel22">Are You Sure ?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="remove-box">
                        <p>Be careful! All products, mid level categories and end level categories under this top lelvel category will be deleted from all the tables.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                    <a href="#" class="btn btn-animation btn-md fw-bold  delete-action">Yes</a>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade theme-modal remove-coupon" id="exampleModalToggle2" aria-hidden="true" tabindex="-1">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-center" id="exampleModalLabel12">Done!</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="remove-box text-center">
                        <div class="wrapper">
                            <svg class="checkmark" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 52 52">
                                <circle class="checkmark__circle" cx="26" cy="26" r="25" fill="none" />
                                <path class="checkmark__check" fill="none" d="M14.1 27.2l7.1 7.2 16.7-16.8" />
                            </svg>
                        </div>
                        <h4 class="text-content">It's Removed.</h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- Delete Modal Box End -->			
				
				
                <?php  include('footer.php'); ?>	