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
                                        <h5>Products List</h5>
                                        <div class="right-options">
                                            <ul>
											 <li><a class="btn btn-solid" href="export.php">Sample csv for download</a></li>	 
        									 <li><a class="btn btn-solid" href="add-new-product.php">Add New Product</a></li>
											<li><a class="btn btn-solid" href="import.php">Import Product</a></li>
                                                <!--<li>
                                                    <a class="btn btn-solid" href="add-new-product.php">Add Product</a>
                                                </li>-->
                                            </ul>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="table-responsive">
                                            <table class="table all-package theme-table table-product" id="table_id">
                                                <thead>
                                                    <tr>
                                                    <th>#</th>                                                       
                                                        <th>Product Name</th>
                                                        <th>Category</th>
                                                        <th>Product Group</th>
                                                        <th>Expires</th>
                                                        <th>Last measurement</th>
													    <th>Status</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>
											 <tbody>
												
					 	<?php
						$i=0;
							///$statement = $pdo->prepare("SELECT *  FROM products   ORDER BY pid DESC");
												 
	 $statement = $pdo->prepare(" SELECT  * from products LEFT JOIN category on products.cat=category.id  LEFT JOIN groups on products.pro_group=groups.id");						 
												 
							$statement->execute();
							$result = $statement->fetchAll(PDO::FETCH_ASSOC);															 
							foreach ($result as $row) {
								$proid= $row['pid'];                            
								$i++;
							?>												
                         <tr>
                            <td><?php echo $i; ?> - <?php echo $row['pid']; ?></td>
                  
                           <td>  <a href="product-edit.php?id=<?php echo $proid; ?>"><?php echo $row['pname']; ?></a></td>
                            <td><?php echo $row['category']; ?></td>
                          <td><?php echo $row['name']; ?></td>
                          <td class="td-price">
							   <?php echo date('d M y',strtotime($row['expires'])); ?>
							 </td>
 						 <td ></td>
                <?php if($row['active'] == 1) { ?>
                               <td class="status-close"><span>On</span> </td>
                <?php } else { ?>
                <td class="status-danger"><span>Off</span></td>
                <?php } ?>              <td>
                                                                        <ul>
                                                                <li>
                                                                    <a href="product-detail.php?id=<?php echo $proid; ?>">
                                                                        <i class="ri-eye-line"></i>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                <a href="product-edit.php?id=<?php echo $proid; ?>">
                                                                        <i class="ri-pencil-line"></i>
                                                                    </a>
                                                                </li>

                                                                <li>
                                                                    <a href="product-delete.php?id=<?php echo $proid; ?>">
                                                                        <i class="ri-delete-bin-line"></i>
                                                                    </a>
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

                <?php  include('footer.php'); ?>	