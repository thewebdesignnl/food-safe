<?php  include('header.php'); ?>	
 <?php  include('sidebar.php'); ?>	
<?php 
$message ="";
 

function create_thumbnail($src, $dest, $desired_width, $desired_height) {
    // Get the dimensions of the original image
    list($width, $height) = getimagesize($src);

    // Calculate the scaling factor
    $ratio = $width / $height;

    // Determine the new dimensions while maintaining aspect ratio
    if ($desired_width / $desired_height > $ratio) {
        $new_width = $desired_height * $ratio;
        $new_height = $desired_height;
    } else {
        $new_height = $desired_width / $ratio;
        $new_width = $desired_width;
    }

    // Create a new true color image
    $thumb = imagecreatetruecolor($new_width, $new_height);

    // Get the image resource based on the source image type
    $ext = strtolower(pathinfo($src, PATHINFO_EXTENSION));
    switch ($ext) {
        case 'jpg':
        case 'jpeg':
            $source = imagecreatefromjpeg($src);
            break;
        case 'png':
            $source = imagecreatefrompng($src);
            break;
        case 'gif':
            $source = imagecreatefromgif($src);
            break;
        default:
            return false; // Unsupported image type
    }

    // Resize the original image and copy it to the thumbnail
    imagecopyresampled($thumb, $source, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

    // Save the thumbnail to the destination path
    switch ($ext) {
        case 'jpg':
        case 'jpeg':
            imagejpeg($thumb, $dest);
            break;
        case 'png':
            imagepng($thumb, $dest);
            break;
        case 'gif':
            imagegif($thumb, $dest);
            break;
    }

    // Free memory
    imagedestroy($source);
    imagedestroy($thumb);

    return true;
}

$desired_width = 600; // Desired width of the thumbnail
$desired_height = 600; // Desired height of the thumbnail



  
if(isset($_FILES['fileUpload']['name'])) {     
if(!empty($_FILES['fileUpload']['name'])){    
foreach($_FILES['fileUpload']['name'] as $i => $fileUpload) { 
  
//file name and temp start 124424//    
$filename = strtolower(str_replace(' ','-',$_FILES['fileUpload']['name'][$i]));
$filesize = $_FILES['fileUpload']['size'][$i];
$filetempname = $_FILES['fileUpload']['tmp_name'][$i];
//file name and temp end//   
    
// Get values from post.
$img = strtolower(str_replace(' ','-',$fileUpload));
$date = date('Y-m-d');    
///$ip_address = $_SERVER['REMOTE_ADDR'];        

print_r($img);
$check ="SELECT * FROM tbl_product_photo where image_name = '$img'";
$stmt = $pdo->prepare($check); 
$stmt->execute();
$count = $stmt->fetchColumn();
if($count > 0){   
   
$message = "<div class='alert alert-danger' role='alert'><button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button><strong>Alert!</strong> You can't upload same image ($img) multiple time</div>";}   
    
else {          
 
//hit upload on storage 124424
move_uploaded_file($filetempname,"../assets/shop-gallery/".$filename);

 

if (create_thumbnail('../assets/shop-gallery/'.$filename,"../assets/shop-gallery/thumbnail/".$filename, $desired_width, $desired_height)) {
    echo "Thumbnail created successfully!";
} else {
     echo "Failed to create thumbnail.";
}

 
$sql_file ="INSERT INTO `tbl_product_photo` (`gallery_id`, `image_name`, `date`) VALUES ('122', '$img', '$date') ";
    
$stmt = $pdo->prepare($sql_file);   
$stmt->execute();         
$message = "<div class='alert alert-success' role='alert'><span aria-hidden='true'>&times;</span></button><strong>Success!</strong> Images uploaded!</div>";      
}

 
}
 }} 
 ?>
            <!-- Container-fluid starts-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="title-header option-title justify-content-start">
                                        <h5>Upload photos</h5>
                                        
                                         
                                    </div>

  

                      
                        <form method="POST" enctype="multipart/form-data">
                            
                            <div class="form-group">
                            <input type="file" name="fileUpload[]" class="form-control" multiple required>
                            <input type="submit" class="btn btn-solid mt-2" value="Upload"></div>
                        
                             </div>
                                </form>
                            <?php echo $message;?> 
                        



                            </div>
                            </div>
                      </div> 
                </div>
 


<?php include('footer.php') ;?>

  
                    
                        
 