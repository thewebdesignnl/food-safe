<?php  include('header.php'); ?>	
 <?php  include('sidebar.php');
  


 

if(isset($_POST['tab10-submit'])) {


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
     if($filesize < 2000000){  
            if($valid3 == 1) {      
                // updating the data
                $final_name = 'banner-'.$file_name.'.'.$ext;
                move_uploaded_file( $path_tmp, '../assets/page/'.$final_name );   
                $sav_ingallery ="INSERT INTO `tbl_product_photo` (`gallery_id`, `image_name`,`type`,`date`) VALUES ('122', '$final_name','4','$date') ";			
                $sav_ingallery1 = $pdo->prepare($sav_ingallery);   
                $sav_ingallery1->execute(); 
                $logoid = $pdo->lastInsertId();  
                 $statement = $pdo->prepare("UPDATE tbl_page SET about_banner=? WHERE id=1");
                $statement->execute(array($logoid));                 
            }
        }

       



    // updating the database
    $statement = $pdo->prepare("UPDATE tbl_page SET  about_title=?, about_content=? WHERE id=1");
    $statement->execute(array($_POST['banner1_content'],$_POST['banner2_content']));

    $success_message = 'Successfully.';
}// submit form


 


//banners
$statement_banner = $pdo->prepare("SELECT * FROM tbl_page WHERE ID = 1");
$statement_banner->execute();
$result_bannr = $statement_banner->fetchAll(PDO::FETCH_ASSOC);   
 foreach ($result_bannr as $row) {
    $about_banner = $row['about_banner'];
    $about_title = $row['about_title'];
    $about_content = $row['about_content'];
   
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
                                                        data-bs-toggle="pill" data-bs-target="#pills-page1"
                                                        type="button">About page</button>
                                                </li>
                                               
											 
                                            </ul>

                                            <div class="tab-content" id="pills-tabContent">
                                              
 
                                                <div class="tab-pane fade show active" id="sett-page1" role="tabpanel">
                   <form method="POST" class="theme-form theme-form-2 mega-form"  name="page1"  enctype="multipart/form-data"> 

                                                        <div class="card-header-1">
                                                            <h5>About page Content</h5>
                                                        </div>

                                                        <div class="row">
                                                        <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">About image</label>
                                                        <div class="col-sm-10">
                                                            <input class="form-control form-choose" type="file"   name="banner1_img">
                                                        </div>
                                                    </div><!--mb-4 row -->
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">About Title</label>
                                                        <div class="col-sm-10">
                                                         <textarea class="form-control form-choose"   name="banner1_content"><?php echo $about_title; ?></textarea>
                                                        </div>
                                                    </div><!--mb-4 row -->                                                                                      
                                                
                                                    <div class="mb-4 row align-items-center">
                                                        <label
                                                            class="col-sm-2 col-form-label form-label-title">About content</label>
                                                        <div class="col-sm-10">
                                                         <textarea class="form-control form-choose"  id="editor1"  name="banner2_content"><?php echo $about_content; ?></textarea>
                                                        </div>
                                                    </div><!--mb-4 row -->
                                                                                                     
                                                    

                                                </div>
                                            <div class="card-submit-button">
                                            <button class="btn btn-animation" type="submit"  name="tab10-submit">Submit</button>
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
      /// $('#editor2').summernote({
	        	//height: 170,
             ///   codeviewFilter: false
	  /// });

    });
</script>       
            
