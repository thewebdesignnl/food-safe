  <?php  include('header.php'); ?>	
 <?php  include('sidebar.php');


$statement4 = $pdo->prepare("SELECT * FROM  products ");
$statement4->execute();
$total_products = $statement4->rowCount();



?>	
 
  
            <!-- index body start -->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
           
 

                        <div class="col-sm-6 col-xxl-3 col-lg-6">
                            <div class="main-tiles border-5 card-hover border-0  card o-hidden">
                                <div class="custome-3-bg b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body p-0">
                                            <span class="m-0">Total Products</span>
                                            <h4 class="mb-0 counter"><?php echo $total_products; ?>
                                                <a href="add-new-product.php" class="badge badge-light-secondary grow">
                                                    ADD NEW</a>
                                            </h4>
                                        </div>

                                        <div class="align-self-center text-center">
                                            <i class="ri-chat-3-line"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    
                     

 
 


                    </div>
                </div>
                <!-- Container-fluid Ends-->

   
    <?php  include('footer.php'); ?>	