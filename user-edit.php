<?php  include('header.php'); ?>	
<?php  include('sidebar.php'); 
 

if(isset($_POST['update_user'])) {
	
	if (($_POST ['full_name'] == "") || ($_POST ['password'] == "") || ($_POST ['email'] == "")){
	  $msg = '<div class="status-danger"><span>Fields reguired.</span></div>';	
	}
	else{
	
		$c_name = $_POST['c_name'];
		$full_name  =  $_POST['full_name'];
		$password = $_POST['password'];
		$email = $_POST['email'];
		$roll  =  $_POST['roles'];		
		
		$street = $_POST['street'];
		$postcode = $_POST['postcode'];		
		$city = $_POST['city'];			
		$phone = $_POST['phone'];	
		$password = $_POST['password'];		 
		 
		 
		/// $sql= "INSERT INTO tbl_user(full_name,password,email,phone,role,status,roll_1) VALUES ('$name','$password','$email','$phone','$roll','Active','$allrollslist')";
		
		$statement = $pdo->prepare("UPDATE members SET name=?,pwd=?,company=?,street=?,postcode=?,city=?,phone=?,role=? WHERE id=?");
		 	$statement->execute(array($full_name,$password,$c_name,$street,$postcode,$city,$phone,$roll,$_REQUEST['id']));
		
        if($statement){ header('location: all-users.php'); }
		
	  ///$affeted_row = $pdo->exec($statement);
			  $msg = '<div class="status-seccuss"><span>Done.</span></div>';	
	
	}
}

if(!isset($_REQUEST['id'])) {
	header('location: logout.php');
	exit;
} else {
	// Check the id is valid or not
    $statement = $pdo->prepare("SELECT * FROM members WHERE id=?");
	$statement->execute(array($_REQUEST['id']));
	$total = $statement->rowCount();
	$result = $statement->fetchAll(PDO::FETCH_ASSOC);
	if( $total == 0 ) {
		header('location: logout.php');
		exit;
	}

    foreach ($result as $row) {
        $company  =  $row['company'];
        $full_name =  $row['name'];
        $password =  $row['pwd'];
        $email =  $row['e_mail'];
        $role =  $row['role']; 
		
			$company =  $row['company'];
					$street =  $row['street'];
					$postcode =  $row['postcode'];
					$city =  $row['city'];
					$phone =  $row['phone'];
		

        $rolls = $result[0]['roll_1']; 
 
        $unserializedData = unserialize($rolls); 

    }

    foreach($unserializedData as $row => $key  ){
        if($row == 'users'){
          $checkusers = $key;
      }
        if($row == 'settings'){
          $check_settings = $key;
      }
        if($row == 'newsletter'){
          $check_newsletter = $key;
      }
        if($row == 'inventroymanagement'){
          $check_inventroymanagement = $key;
      }
        if($row == 'shippingmethod'){
          $check_shippingmethod = $key;
      }
        if($row == 'emailimport'){
          $check_emailimport = $key;
      }
        if($row == 'slider'){
          $check_slider = $key;
      }
        if($row == 'service'){
          $check_service = $key;
      }
          if($row == 'testimonial'){
          $check_testimonial = $key ;
      }
        if($row == 'blogposts'){
          $check_blogposts = $key ;
      }   if($row == 'shopsection'){
          $check_shopsection = $key ;
      }   if($row == 'product'){
          $check_product = $key ;
      }   if($row == 'order'){
          $check_order = $key ;
      }   if($row == 'languagesettings'){
          $check_languagesettings = $key ;
      }
        if($row == 'message'){
          $check_message = $key ;
      }
        if($row == 'customer'){
          $check_customer = $key ;
      }
        if($row == 'page'){
          $check_page = $key ;
      }
            if($row == 'socialmedia'){
          $check_socialmedia = $key ;
      }
            if($row == 'subscriber'){
          $check_subscriber = $key ;
      }
                if($row == 'homepagecategory'){
          $check_homepagecategory = $key ;
      }
            if($row == 'coupon'){
          $check_coupon = $key ;
      }
   }

}
  ?>

<form class="  theme-form theme-form-2 mega-form" action="" method="post">
            <!-- Page Sidebar Start -->
            <div class="page-body">
                <!-- New User start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-8 m-auto">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="title-header option-title">
                                                <h5>Update to: <?php echo $full_name; ?></h5>
												<?php echo $msg; ?>
                                            </div>
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-home-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-home"
                                                        type="button">Account</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-profile-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-profile"
                                                        type="button">Permission</button>
                                                </li>
                                            </ul>

                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                                    <form class="theme-form theme-form-2 mega-form">
                                                        <div class="card-header-1">
                                                           
                                                        </div>

                                                        <div class="row">
                                                            <div class="mb-4 row align-items-center">
                                  <label  class="form-label-title col-lg-2 col-md-3 mb-0">Company  Name</label>
                                                                <div class="col-md-9 col-lg-10">
                               <input class="form-control" type="text"  value="<?php echo $company; ?>" name="c_name" >
                                                                </div>
                                                            </div>
       					 <div class="mb-4 row align-items-center">
                                  <label  class="form-label-title col-lg-2 col-md-3 mb-0">Name</label>
                                                                <div class="col-md-9 col-lg-10">
                               <input class="form-control" type="text"  value="<?php echo $full_name; ?>" name="full_name" >
                                                                </div>
                                                            </div>
															
                                          <div class="mb-4 row align-items-center">
                                                <label  class="col-lg-2 col-md-3 col-form-label form-label-title">Email Address</label>
                                                                <div class="col-md-9 col-lg-10">
                                                <input class="form-control" type="email"  value="<?php echo $email; ?>"  name="email" readonly>
                                                                </div>
                                                            </div>

										        <div class="mb-4 row align-items-center">
                                                <label  class="col-lg-2 col-md-3 col-form-label form-label-title">Street</label>
                                                                <div class="col-md-9 col-lg-10">
                                                <input class="form-control" type="text"  value="<?php echo $street; ?>"  name="street" >
                                                                </div>
                                                            </div>					
											        <div class="mb-4 row align-items-center">
                                                <label  class="col-lg-2 col-md-3 col-form-label form-label-title">Postcode</label>
                                                                <div class="col-md-9 col-lg-10">
                                                <input class="form-control" type="text"  value="<?php echo $postcode; ?>"  name="postcode" >
                                                                </div>
                                                            </div>		
												
												      <div class="mb-4 row align-items-center">
                                                <label  class="col-lg-2 col-md-3 col-form-label form-label-title">City</label>
                                                                <div class="col-md-9 col-lg-10">
                                                <input class="form-control" type="text"  value="<?php echo $city; ?>"  name="city" >
                                                                </div>
                                                            </div>	
															
														
												      <div class="mb-4 row align-items-center">
                                                <label  class="col-lg-2 col-md-3 col-form-label form-label-title">Phone</label>
                                                                <div class="col-md-9 col-lg-10">
                                                <input class="form-control" type="text"  value="<?php echo $phone; ?>"  name="phone" >
                                                                </div>
                                                            </div>				
															
															
                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Password</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                    <input class="form-control" type="password"  value="<?php echo $password; ?>" name="password">
                                                                </div>
                                                            </div>

                                        

                                                            <div class="mb-4 row align-items-center">                                     
                                                    <label  class="col-lg-2 col-md-3 col-form-label form-label-title">Role</label>
                                                    <div class="col-md-9 col-lg-10">
                                          <select class="js-example-basic-single w-100" name="roles">
                                                <option   value="2" <?php if($role == 2){echo 'selected';} ?> >Supervisor</option>
                                               <option   value="3" <?php if($role == 3){echo 'selected';} ?>>User</option>  </select>
                                                </div>
                                            </div>
                                     
                                                        </div>
                                                   
                                                </div><!--tab-panel-->

                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel">
                                                    <div class="card-header-1">
                                                        <h5>Permition</h5>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Users</label>
                                                        <div class="col-md-9 radio-section">
                                                         
                                          <label> <input type="radio" name="users" <?php if($checkusers==1){ echo 'checked';  } ?>  value="1">
                                                                    <i></i>  <span>Allow</span>
                                                                </label>

                          <label> <input type="radio" name="users"  value="0"  <?php if($checkusers==0){ echo 'checked';  } ?> /><i></i> <span>Deny</span> </label>
                                                         
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Settings</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="settings"  <?php if($check_settings==1){ echo 'checked';  } ?>  value="1" />
                                                                    <i></i><span>Allow</span></label>

                                                                <label>
                                                                    <input type="radio" name="settings"  value="0"   <?php if($check_settings==0){ echo 'checked';  } ?>> <i></i> <span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Page</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="page"   <?php if($check_page==1){ echo 'checked';  } ?>  value="1" >
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="page"  value="0"  <?php if($check_page==0){ echo 'checked';  } ?>/>
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Social Media</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="social-media"   <?php if($check_socialmedia==1){ echo 'checked';  } ?>  value="1"/>
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="social-media" value="0"  <?php if($check_socialmedia==0){ echo 'checked';  } ?>>
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Homepage Category</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="homepage-category"  <?php if($check_homepagecategory==1){ echo 'checked';  } ?>  value="1" />
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="homepage-category" value="0"   <?php if($check_homepagecategory==0){ echo 'checked';  } ?>>
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Blog Posts</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="blog-posts"   <?php if($check_blogposts==1){ echo 'checked';  } ?>  value="1" />
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="blog-posts" value="0"   <?php if($check_blogposts==0){ echo 'checked';  } ?>>
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Testimonial</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="testimonial"  <?php if($check_testimonial==1){ echo 'checked';  } ?>  value="1" />
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="testimonial" value="0"   <?php if($check_testimonial==0){ echo 'checked';  } ?>>
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Slider</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="slider"  <?php if($check_slider==1){ echo 'checked';  } ?>  value="1" />
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="slider" value="0"   <?php if($check_slider==0){ echo 'checked';  } ?> >
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Language Settings</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="language-settings"  <?php if($check_languagesettings==1){ echo 'checked';  } ?>  value="1" />
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="language-settings" value="0"  <?php if($check_languagesettings==0){ echo 'checked';  } ?>>
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Message</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="message"  <?php if($check_message==1){ echo 'checked';  } ?>  value="1" />
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="message" value="0"  <?php if($check_message==0){ echo 'checked';  } ?>>
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Newsletter</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="newsletter"  <?php if($check_newsletter==1){ echo 'checked';  } ?>  value="1" />
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="newsletter" value="0"   <?php if($check_newsletter==0){ echo 'checked';  } ?>>
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Email Import</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="email-import"  <?php if($check_emailimport==1){ echo 'checked';  } ?>  value="1" />
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="email-import" value="0"    <?php if($check_emailimport==0){ echo 'checked';  } ?>>
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Service</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="service"  <?php if($check_service==1){ echo 'checked';  } ?>  value="1" />
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="service" value="0" <?php if($check_service==0){ echo 'checked';  } ?>>
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                    <label class="col-md-2 mb-0">Customer</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="customer"  <?php if($check_customer==1){ echo 'checked';  } ?>  value="1" />
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="customer" value="0" <?php if($check_customer==0){ echo 'checked';  } ?>>
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                    <label class="col-md-2 mb-0">Subscriber</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="subscriber"  <?php if($check_subscriber==1){ echo 'checked';  } ?>  value="1" />
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="subscriber" <?php if($check_subscriber==0){ echo 'checked';  } ?>  value="0">
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>

                                                    <div class="card-header-1">
                                                        <h5>Shop Related Permition</h5>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Shop Section</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="shop-section"  <?php if($check_shopsection==1){ echo 'checked';  } ?>  value="1">
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="shop-section"  <?php if($check_shopsection==0){ echo 'checked';  } ?> value="0" />
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Product</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="product"  <?php if($check_product==1){ echo 'checked';  } ?>  value="1" />
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="product"   <?php if($check_product==0){ echo 'checked';  } ?> value="0">
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Order</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="order"  <?php if($check_order==1){ echo 'checked';  } ?>  value="1" />
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="order"  <?php if($check_order==0){ echo 'checked';  } ?> value="0">
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>

                                                    <div class="mb-4 row align-items-center">
                                                        <label class="col-md-2 mb-0">Shipping Method</label>
                                                        <div class="col-md-9 radio-section">
                                                          
                                                                <label>
                                                                    <input type="radio" name="shipping-method"  <?php if($check_shippingmethod==1){ echo 'checked';  } ?>  value="1">
                                                                    <i></i><span>Allow</span>
                                                                </label>

                                                                <label>
                                                                    <input type="radio" name="shipping-method" <?php if($check_shippingmethod==0){ echo 'checked';  } ?>  value="0"/>
                                                                    <i></i><span>Deny</span>
                                                                </label>
                                                           
                                                        </div>
                                                    </div>

                                     
                                                   
                                        




                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-submit-button">
                                            <button class="btn btn-animation ms-auto"  name="update_user" type="submit">Submit</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
 
                    </div>
                </div>
                </form>
                <!-- New User End -->

                 <?php  include('footer.php'); ?>	

                 