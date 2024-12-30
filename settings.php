<?php  include('header.php'); ?>	
 <?php  include('sidebar.php');
 
 if(isset($_POST['tab1-submit'])) {
    $valid = 1;
    $valid2 = 1;
    $path = $_FILES['photo_logo']['name'];
    $path_tmp = $_FILES['photo_logo']['tmp_name'];
    $filesize = $_FILES['photo_logo']['size'];

    $date = date('Y-m-d');
    

    if($path == '') {
        $valid = 0;
        $error_message .= 'You must have to select a photo<br>';
    } else {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }

        if($filesize < 1000000){  
            if($valid == 1) {      
                // updating the data
                $final_name = 'logo'.$file_name.'.'.$ext;
                move_uploaded_file( $path_tmp, '../assets/logo/'.$final_name );   
                $sav_ingallery ="INSERT INTO `tbl_product_photo` (`gallery_id`, `image_name`,`type`,`date`) VALUES ('122', '$final_name','1','$date') ";			
                $sav_ingallery1 = $pdo->prepare($sav_ingallery);   
                $sav_ingallery1->execute(); 
                $logoid = $pdo->lastInsertId();  
                        $statement = $pdo->prepare("UPDATE tbl_settings SET logo=? WHERE id=1");
                $statement->execute(array($logoid));
                $success_message = 'Logo is updated successfully.';
                }
        }

        $path_fab = $_FILES['photo_favicon']['name'];
        $path_tmp_fab = $_FILES['photo_favicon']['tmp_name'];

     

        if($path_fab == '') {
            $valid2 = 0;
            $error_message .= 'You must have to select a photo<br>';
        } else {
            $ext = pathinfo( $path_fab, PATHINFO_EXTENSION );
            $file_name = basename( $path_fab, '.' . $ext );
            if( $ext!='png' ) {
                $valid2 = 0;
                $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
            }
        }
    
         if($valid2 == 1) {      
                    // updating the data
                    $final_name = 'fav-'.$file_name.'.'.$ext;
                    move_uploaded_file( $path_tmp_fab, '../assets/logo/'.$final_name );   
                    $sav_ingallery ="INSERT INTO `tbl_product_photo` (`gallery_id`, `image_name`,`type`, `date`) VALUES ('122', '$final_name','1', '$date') ";			
                    $sav_ingallery1 = $pdo->prepare($sav_ingallery);   
                    $sav_ingallery1->execute(); 
                    $logoid = $pdo->lastInsertId();  
                    $statement = $pdo->prepare("UPDATE tbl_settings SET favicon=? WHERE id=1");
                    $statement->execute(array($logoid));
                    $success_message = 'Logo is updated successfully.';
          }
     
         if($_POST['order_email']!=''){ 
          $statement_details = $pdo->prepare("UPDATE orders_mail SET email1=?");
          $statement_details->execute(array($_POST['order_email']));
         }
}// submit form


if(isset($_POST['tab2-submit'])) {
    
    // updating the database
    $statement = $pdo->prepare("UPDATE tbl_settings SET newsletter_on_off=?, footer_about=?, footer_copyright=?, contact_address=?, contact_email=?, contact_phone=?, contact_fax=?, contact_map_iframe=? WHERE id=1");
    $statement->execute(array($_POST['newsletter_on_off'],$_POST['footer_about'],$_POST['footer_copyright'],$_POST['contact_address'],$_POST['contact_email'],$_POST['contact_phone'],$_POST['contact_fax'],$_POST['contact_map_iframe']));

    $success_message = 'General content settings is updated successfully.';
    
}// submit form


if(isset($_POST['tab3-submit'])) {
    // updating the database
	$statement = $pdo->prepare("DELETE FROM website_detail");
	$statement->execute();
    $statement = $pdo->prepare("INSERT INTO website_detail SET  name=?, address=?,email=?, phone=?, kvkno=?, btwno=?");
    $statement->execute(array(
    						$_POST['website_name'],
    						$_POST['address'],
    						$_POST['email_onwer'],
							$_POST['phone_onwer'],
    						$_POST['kvkno'],
    						$_POST['btwno']
    						 
    					));

    $success_message = 'Website detail added.';
}// submit form

 

if(isset($_POST['tab6-submit'])) {
    // updating the database

        $statement5 = $pdo->prepare("UPDATE styling SET themecolor=?,color2s=?");
        $statement5->execute(array($_POST['color'],$_POST['color2s']));
   

}// submit form
 
  
 



$statement_mail = $pdo->prepare("SELECT * FROM orders_mail");
$statement_mail->execute();
$result_mail = $statement_mail->fetchAll(PDO::FETCH_ASSOC);                           
foreach ($result_mail as $row) {
    $order_email= $row['email1'];
    $order_email1= $row['email2'];
}
$statement_detail = $pdo->prepare("SELECT * FROM website_detail");
$statement_detail->execute();
$result_det = $statement_detail->fetchAll(PDO::FETCH_ASSOC);                           
foreach ($result_det as $row) {
    $name_website= $row['name'];
    $address_website= $row['address'];
    $email_website= $row['email'];
	$phone_website= $row['phone'];
    $kvkno_website= $row['kvkno'];
    $btwno_website= $row['btwno'];
}

$statement_styling = $pdo->prepare("SELECT * FROM styling");
$statement_styling->execute();
$result_stl = $statement_styling->fetchAll(PDO::FETCH_ASSOC);   
 foreach ($result_stl as $row) {
    $titlefont = $row['titlefont'];
    $contentfont = $row['contentfont'];
     $buttons = $row['buttons'];
     $bfontsize = $row['bfontsize'];
     $size1 = $row['size1'];
     $size2 = $row['size2'];
     $size3 = $row['size3'];
     $size4 = $row['size4'];

         $themecolor1 = $row['themecolor'];
         $themecolor2 = $row['color2s'];
           $themecolor3 = $row['color3s'];
      
}

 


?>

            <!-- Create Coupon Table start -->
         
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="title-header option-title">
                                                <h5>All Settings</h5>
                                            </div>
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-home-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-home"
                                                        type="button">General</button>
                                                </li>
                                               <!--  <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-profile-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-profile"
                                                        type="button">Footer</button>
                                                  </li>-->
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-usage-tab" data-bs-toggle="pill"
                                                        data-bs-target="#sett-tab3" type="button">Webshop Info</button>
                                                </li>
                                            
                                               <!-- <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-usage-tab" data-bs-toggle="pill"
                                                        data-bs-target="#sett-tab5" type="button">All Pages Banners</button>
                                                </li>-->
                                      <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-usage-tab" data-bs-toggle="pill"
                                                        data-bs-target="#sett-tab6" type="button">Styling</button>
                                                </li>
                                       
                                            </ul>

                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                   <form method="POST" class="theme-form theme-form-2 mega-form"  name="tab1" enctype="multipart/form-data"> 

                                                        <div class="card-header-1">
                                                            <h5>General</h5>
                                                        </div>

                                                        <div class="row">
                                                        <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">logo</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control form-choose" type="file"
                                                               name="photo_logo">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">favicon</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control form-choose" type="file"
                                                                name="photo_favicon">
                                                        </div>
                                                    </div>
                                                    <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">E-Mail</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                <input type="text" class="form-control" name="order_email" value="<?php echo $order_email; ?>">
                                                                </div>
                                                            </div> 

                                                
															
  
                                                        </div>
                                            <div class="card-submit-button">
                                            <button class="btn btn-animation" type="submit"  name="tab1-submit">Submit</button>
                                        </div>
                            </form> 
                                                </div><!--tab-panel-->

                      <div class="tab-pane fade" id="pills-profile" role="tabpanel">
                               <form method="POST" class="theme-form theme-form-2 mega-form"  name="tab2" enctype="multipart/form-data"> 
                                                        <div class="card-header-1">
                                                            <h5>Footer Content</h5>
                                                        </div>

                                                        <div class="row">
                                                              <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-sm-2 col-form-label form-label-title">Newsletter</label>
                                                                <div class="col-sm-10">
                                                                <select name="newsletter_on_off" class="js-example-basic-single w-100" style="width:auto;">
                                                <option value="1" <?php if($newsletter_on_off == 1) {echo 'selected';} ?>>On</option>
                                                <option value="0" <?php if($newsletter_on_off == 0) {echo 'selected';} ?>>Off</option>
                                            </select>
                                                                </div>
                                                            </div>

                                                           <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">About Section</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                <textarea name="footer_about" class="form-control" cols="30" rows="5"><?php echo $footer_about; ?></textarea>
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Copyright</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                    <input class="form-control"   name="footer_copyright"  type="text" value="<?php echo $footer_copyright; ?>">
                                                                </div>
                                                            </div> 

                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Contact Address</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                <textarea class="form-control" name="contact_address" rows="5" ><?php echo $contact_address; ?></textarea>
                                                                </div>
                                                            </div> 

                                                          

                                                         

                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Contact Email</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                <input type="text" class="form-control" name="contact_email" value="<?php echo $contact_email; ?>">
                                                                </div>
                                                            </div> 
                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Contact Phone</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                <input type="text" class="form-control" name="contact_phone" value="<?php echo $contact_phone; ?>">
                                                                </div>
                                                            </div> 

                                                            <div class="card-submit-button">
                                            <button class="btn btn-animation" type="submit"  name="tab2-submit">Submit</button>
                                        </div>

                                                        </div> 
                                                        </form>                                                   
                                                </div><!--tab-panel-->

                                                <div class="tab-pane fade" id="sett-tab3" role="tabpanel">
                            <form method="POST" class="theme-form theme-form-2 mega-form"  name="tab3" enctype="multipart/form-data"> 

                                                      
                                                <div class="card-header-1"><h5>Webshop Info</h5> </div>
                                        <div class="row">
                                               <div class="mb-4 row align-items-center">
                                                <label class="col-lg-2 col-md-3 col-form-label form-label-title">Shop Name</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                <input type="text" class="form-control" name="website_name" value="<?php echo $name_website; ?>">                                                                </div>
                                                            </div> 

                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Address</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                <input type="text" class="form-control" name="address" value="<?php echo $address_website; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="mb-4 row align-items-center">
                                                <label class="col-lg-2 col-md-3 col-form-label form-label-title">Email</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                <input type="text" class="form-control" name="email_onwer" value="<?php echo $email_website; ?>">
                                                                </div>
                                                            </div> 

                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Phone</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                <input type="text" class="form-control" name="phone_onwer" value="<?php echo $phone_website; ?>">
                                                                </div>
                                                            </div>
                                                            <div class="mb-4 row align-items-center">
                                                <label class="col-lg-2 col-md-3 col-form-label form-label-title">KVK No</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                <input type="text" class="form-control" name="kvkno" value="<?php echo $kvkno_website; ?>">
                                                                </div>
                                                            </div> 

                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">BTW No</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                <input type="text" class="form-control" name="btwno" value="<?php echo $btwno_website; ?>">
                                                                </div>
                                                            </div>      
  
                                                        </div>
                                                        <div class="card-submit-button">
                                            <button class="btn btn-animation" type="submit"  name="tab3-submit">Submit</button>
                                        </div></form> 
                                                </div><!--tab-panel-->
												
											  <div class="tab-pane fade" id="sett-tab6" role="tabpanel">
                                          <form method="POST" class="theme-form theme-form-2 mega-form"  name="tab6" enctype="multipart/form-data"> 
  
                                                   <div class="card-header-1">
                                                       <h5>Styling</h5>
                                                   </div>

                                                       <div class="row">
                               
                                                
                                   
                                    
                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Main color</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                <input type="color" class="form-control" name="color" value="<?php echo $themecolor1; ?>"> </div>
                                                            </div><!--mb-4-->
                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Color Secondary</label>
                                                                <div class="col-md-9 col-lg-10">
                                                                <input type="color" class="form-control" name="color2s" value="<?php echo $themecolor2; ?>"> </div>
                                                            </div><!--mb-4-->
                               

                                                       </div>  
                                                       <div class="card-submit-button">
                                            <button class="btn btn-animation" type="submit"  name="tab6-submit">Submit</button>
                                        </div> 
                                        </form>                                         
                                                </div><!--tab-panel-->	
												
                                              

                                            </div>
                                        </div>
                                       
                                    </div><!--cart-->
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           
            <!-- Create Coupon Table End -->

 <?php  include('footer.php'); ?>
 <script type="text/javascript">
	$(document).ready(function() {     
       /// $('#editor1').summernote({
	        	////height: 170
	     ///   });
      /// $('#editor2').summernote({
	        	//height: 170,
             ///   codeviewFilter: false
	  /// });

    });
</script>       
            
