<?php  include('header.php'); ?>	
 <?php  include('sidebar.php');
  


 

if(isset($_POST['Promo-submit'])) {
    $valid3 = 1;    
    $path = $_FILES['banner1_img']['name'];
    $path_tmp = $_FILES['banner1_img']['tmp_name'];
    $filesize = $_FILES['banner1_img']['size'];
    $date = date('Y-m-d');   
    if($path == ''){ $valid3 = 0; } 
    else {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid3 = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }
     if($filesize < 2500000){  
            if($valid3 == 1) {      
                // updating the data
                $final_name = 'banner-'.$file_name.'.'.$ext;
                move_uploaded_file( $path_tmp, '../assets/page/home/'.$final_name );   
                $sav_ingallery ="INSERT INTO `tbl_product_photo` (`gallery_id`, `image_name`,`type`,`date`) VALUES ('122', '$final_name','5','$date') ";			
                $sav_ingallery1 = $pdo->prepare($sav_ingallery);   
                $sav_ingallery1->execute(); 
                $logoid = $pdo->lastInsertId();  
                 $statement = $pdo->prepare("UPDATE home_banner_tbl SET hb_photo=? WHERE id=1");
                $statement->execute(array($logoid));                 
            }
        }

       



    // updating the database
    $statement = $pdo->prepare("UPDATE home_banner_tbl SET  hb_title=?, hb_content=? WHERE id=1");
    $statement->execute(array($_POST['banner1_title'],$_POST['banner2_content']));

    $success_message = 'Successfully.';
}// submit form


 
if(isset($_POST['Promo3-submit'])) {
    $valid3 = 1;    
    $path = $_FILES['banner3_img']['name'];
    $path_tmp = $_FILES['banner3_img']['tmp_name'];
    $filesize = $_FILES['banner3_img']['size'];
    $date = date('Y-m-d');   
    if($path == ''){ $valid3 = 0; } 
    else {
        $ext = pathinfo( $path, PATHINFO_EXTENSION );
        $file_name = basename( $path, '.' . $ext );
        if( $ext!='jpg' && $ext!='png' && $ext!='jpeg' && $ext!='gif' ) {
            $valid3 = 0;
            $error_message .= 'You must have to upload jpg, jpeg, gif or png file<br>';
        }
    }
     if($filesize < 2500000){  
            if($valid3 == 1) {      
                // updating the data
                $final_name = 'banner-'.$file_name.'.'.$ext;
                move_uploaded_file( $path_tmp, '../assets/page/home/'.$final_name );   
                $sav_ingallery ="INSERT INTO `tbl_product_photo` (`gallery_id`, `image_name`,`type`,`date`) VALUES ('122', '$final_name','5','$date') ";			
                $sav_ingallery1 = $pdo->prepare($sav_ingallery);   
                $sav_ingallery1->execute(); 
                $logoid = $pdo->lastInsertId();  
                 $statement = $pdo->prepare("UPDATE home_banner_tbl2 SET hb_photo=? WHERE id=1");
                $statement->execute(array($logoid));                 
            }
        }

       



    // updating the database
    $statement = $pdo->prepare("UPDATE home_banner_tbl2 SET  hb_title=?, hb_content=? WHERE id=1");
    $statement->execute(array($_POST['banner3_title'],$_POST['banner3_content']));

    $success_message = 'Successfully.';
}// submit form




//banners
$statement_banner = $pdo->prepare("SELECT * FROM home_banner_tbl WHERE id=1");
$statement_banner->execute();
$result_bannr = $statement_banner->fetchAll(PDO::FETCH_ASSOC);   
 foreach ($result_bannr as $row) {
    $about_banner = $row['hb_photo'];
    $about_title = $row['hb_title'];
    $about_content = $row['hb_content'];
   
}



//banners
$statement_banner2 = $pdo->prepare("SELECT * FROM home_banner_tbl2 WHERE id=1");
$statement_banner2->execute();
$result_bannr2 = $statement_banner2->fetchAll(PDO::FETCH_ASSOC);   
 foreach ($result_bannr2 as $row) {
    $about_banner2 = $row['hb_photo'];
    $about_title2 = $row['hb_title'];
    $about_content2 = $row['hb_content'];
   
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
                                                        data-bs-toggle="pill" data-bs-target="#sett-page1"
                                                        type="button">Home  Prmomo Section </button>
                                                </li>
												
												  <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-home-tab"
                                                        data-bs-toggle="pill" data-bs-target="#sett-page2"
                                                        type="button">Home  Prmomo Section 2</button>
                                                </li>
                                               
											 
                                            </ul>

                                            <div class="tab-content" id="pills-tabContent">
                                              
 
                                                <div class="tab-pane fade show active" id="sett-page1" role="tabpanel">
                   <form method="POST" class="theme-form theme-form-2 mega-form"  name="page1"  enctype="multipart/form-data"> 

                                                        <div class="card-header-1">
                                                            <h5>Home page Promotional banners</h5>
                                                        </div>

                                                        <div class="row">
                                                        <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Promo image</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control form-choose" type="file"   name="banner1_img">
                                                        </div>
                                                    </div><!--mb-4 row -->
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Promo Title</label>
                                                        <div class="col-sm-10">
                                                         <textarea class="form-control form-choose"   name="banner1_title"><?php echo $about_title; ?></textarea>
                                                        </div>
                                                    </div><!--mb-4 row -->                                                                                      
                                                
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Promo content</label>
                                                        <div class="col-sm-10">
                                                         <textarea class="form-control form-choose"  id="editor1"  name="banner2_content"><?php echo $about_content; ?></textarea>
                                                        </div>
                                                    </div><!--mb-4 row -->
                                                                                                     
                                                    

                                                </div>
                                            <div class="card-submit-button">
                                            <button class="btn btn-animation" type="submit"  name="Promo-submit">Submit</button>
                                        </div>
                            </form> 
                                                </div><!--tab-panel-->


                                                <div class="tab-pane fade show" id="sett-page2" role="tabpanel">
                   <form method="POST" class="theme-form theme-form-2 mega-form"  name="page1"  enctype="multipart/form-data"> 

                                                        <div class="card-header-1">
                                                            <h5>Home page Promotional banners 2</h5>
                                                        </div>

                                                        <div class="row">
                                                        <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Promo image</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control form-choose" type="file"   name="banner3_img">
                                                        </div>
                                                    </div><!--mb-4 row -->
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Promo Title</label>
                                                        <div class="col-sm-10">
                                                         <textarea class="form-control form-choose"   name="banner3_title"><?php echo $about_title2; ?></textarea>
                                                        </div>
                                                    </div><!--mb-4 row -->                                                                                      
                                                
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">Promo content</label>
                                                        <div class="col-sm-10">
                                                         <textarea class="form-control form-choose"  id="editor2"  name="banner3_content"><?php echo $about_content2; ?></textarea>
                                                        </div>
                                                    </div><!--mb-4 row -->
                                                                                                     
                                                    

                                                </div>
                                            <div class="card-submit-button">
                                            <button class="btn btn-animation" type="submit"  name="Promo3-submit">Submit</button>
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
       $('#editor1').summernote({
	         height: 170
	      });
       $('#editor2').summernote({
	        	height: 170,
             ///   codeviewFilter: false
	  });

    });
</script>       
            
