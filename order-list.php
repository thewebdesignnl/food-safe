  <?php  include('header.php'); ?>	
 <?php  include('sidebar.php'); ?>	
 
            <!-- Order section Start -->
            <div class="page-body">
                <!-- Table Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card card-table">
                                <div class="card-body">
                                    <div class="title-header option-title">
                                        <h5>Order List</h5>
                                        <a href="#" class="btn btn-solid">Download all orders</a>
                                    </div>
                                    <div>
                                        <div class="table-responsive">
                                            <table class="table all-package order-table theme-table" id="table_id">
                                                <thead>
                                                    <tr>
                                                        <th>#</th>
                                                        <th>Order Code</th>
                                                        <th>Date</th>
                                                        <th>Payment Method</th>
                                                    
                                                        <th>Amount</th>
                                                        <th>Status</th>
                                                        <th>Option</th>
                                                    </tr>
                                                </thead>

                                                <tbody>
                                                <?php						  		 
                 ////         
				if($List){ 
					 $statement1 = $pdo->prepare("SELECT * FROM tbl_orders WHERE ot_id IN ($List)");
				}
				else{
					 $statement1 = $pdo->prepare("SELECT * FROM tbl_orders ORDER by ot_OrderDate   DESC");
				}
				$statement1->execute();
                $result1 = $statement1->fetchAll(PDO::FETCH_ASSOC);	
				$i=0;
                      foreach ($result1 as $row1) {
							    	$ot_id = $row1['ot_id'];
                                	$paymenyopt = $row1['ot_paymentoption'];
							    	$subtotal =  $row1['ot_subTotal'];
							    	$apidamt =  $row1['ot_TotalAmount'];
							    	$ot_discount =  $row1['ot_discount'];
							    	$paymentstatus =  $row1['ot_status'];
							    	$dileverycharge =  $row1['ot_deliveryCharge'];
							    	$or_type =  $row1['or_type'];
							   if($or_type == 1 ){ $or_type2 = 'Pick up'; } 
							   else {  $or_type2 = 'Delivery';}
							    	$orderdate =  date_format(new DateTime($row1["ot_OrderDate"]), "M d, Y");
								$i++; ?>


                                                    <tr>
                                                        <td>
                                                        <?php echo $i; ?>
                                                        </td>
                                                        <td><?php echo $ot_id; ?></td>
                                                        <td><?php echo $orderdate; ?></td>
                                                        <td><?php echo $paymenyopt; ?></td>
                                                        <td><?php echo $currency; echo $apidamt; ?></td>
<?php if($paymentstatus==1){ ?>
    <td class="order-success"><span>Success</span></td>
<?php } ?> 
<?php if($paymentstatus==2){ ?>
    <td class="order-pending"><span>Pending</span></td>
<?php } ?> 
<?php if($paymentstatus==3){ ?>
    <td class="order-cancle"><span>Canceled</span></td>
<?php } ?>    
<?php if($paymentstatus==4){ ?>
    <td class="order-cancle"><span>Failed</span></td>
<?php } ?>    

                                                       
                       <td>
                            <ul>
            <li> <a href="order-detail.php?id=<?php echo $ot_id; ?>"> <i class="ri-eye-line"></i></a></li>
            <li> <a data-id="<?php echo $ot_id; ?>"  data-bs-toggle="offcanvas"  href="#order-details" class="setstatus"> <i class="ri-pencil-line"></i> </a></li>
  <li> <a href="javascript:void(0)" data-bs-toggle="modal"  data-bs-target="#exampleModalToggle"  data-id="<?php echo $ot_id; ?>" data-type="5"  class="delete-btn">  <i class="ri-delete-bin-line"></i>  </a>
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
                <!-- Table End -->
                <?php  include('footer.php'); ?>	
 
<input type="hidden"   class="ajax-url"  value="ajax_all.php">
<input type="hidden"   class="oid"  value="<?php echo $ot_id; ?>">


    <!-- Modal start -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1">
        <div class="modal-dialog  modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-body">
                    <h5 class="modal-title" id="staticBackdropLabel">Logging Out</h5>
                    <p>Are you sure you want to log out?</p>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    <div class="button-box">
                        <button type="button" class="btn btn--no" data-bs-dismiss="modal">No</button>
                        <button type="button" onclick="location.href = 'login.html';"
                            class="btn  btn--yes btn-primary">Yes</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->

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
                     </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-animation btn-md fw-bold" data-bs-dismiss="modal">No</button>
                    <a href="#" class="btn btn-animation btn-md fw-bold delete-action" >Yes</a>
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

    <!-- Offcanvas Box Start -->
    <div class="offcanvas offcanvas-end order-offcanvas" tabindex="-1" id="order-details"
        aria-labelledby="offcanvasExampleLabel" aria-expanded="false">
        <div class="offcanvas-header">
            <h4 class="offcanvas-title" id="offcanvasExampleLabel">Order ID: #<span></span></h4>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
                <i class="fas fa-times"></i>
            </button>
        </div>
        <div class="offcanvas-body theme-form theme-form-2 mega-form">
          <form  method="POST">
        <select class="form-control status-chose"><option value="0">Choose</option>
							<option value="4">Faild</option>
							<option value="3">Cancelded</option>
							<option value="2">Pending</option> 
							<option value="1">Success</option></select>  
        <button class="btn btn-solid btn-animation   updateattus mt-3"  type="button">Change Status</button>
</form>
         </div>
        </div>
    </div>
    
<script type="text/javascript">
$(document).ready(function(){	
    var ajaxurl = $('.ajax-url').val();
    
    $(".setstatus").on("click", function() { 
        var oid = $(this).attr('data-id'); 
        $('.offcanvas-title span').html(oid);  
        $('.updateattus').attr('data-id',oid);
        
    });

    $(".updateattus").on("click", function() {      
        var oid = $(this).attr('data-id');   
        var chooseattr =   $('.status-chose  option:selected').val();     
        var action = "update_status";
     if(chooseattr==0) { return false; }
        $.ajax({
            url: ajaxurl,
            method: "POST",
            data: {action: action,
                'oid' : oid,
                'chooseattr' : chooseattr, 
                },
         dataType: "text",
            success: function (data){
			console.log(data);
               if(data==1){ 
               window.location.reload(true);
            
            }
            }  
        });
    });
});

</script>	