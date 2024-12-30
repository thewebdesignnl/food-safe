
<?php  include('header.php'); ?>	
<?php  include('sidebar.php'); ?>	
<?php


require 'sheet/vendor/autoload.php';

use PhpOffice\PhpSpreadsheet\IOFactory;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Reader\Exception;



if(isset($_POST['form1'])) {	
   
        $valid = 1;      
         /// $filepath = $_POST['p_feature_path'];    
       //// if(empty($_POST['p_file'])){
            ///$valid = 0;

          //  $erros .= "Fill Required Fields!<br>";
           
       /// }    
       
       $fileTmpPath = $_FILES['p_file']['tmp_name'];
    $fileName = $_FILES['p_file']['name'];
    $fileSize = $_FILES['p_file']['size'];
    $fileType = $_FILES['p_file']['type'];


 $assouser = $_POST['user_imp'];


$spreadsheet = IOFactory::load($fileTmpPath);
$sheet = $spreadsheet->getActiveSheet();
$rows = $sheet->toArray(); // Convert the sheet to an array

 
 ///print_r($rows);


 for ($i = 3; $i < count($rows); $i++) {
 
    $pname = $rows[$i][0]; // Assuming the first column contains 'name'
    $cat = $rows[$i][1]; // Assuming the second column contains 'email'
    $kind = $rows[$i][2]; // Assuming the third column contains 'age'
    $date = $rows[$i][3]; // Assuming the third column contains 'age'
    $temperature = $rows[$i][4]; // Assuming the third column contains 'age'
    $duration = $rows[$i][5]; // Assuming the third column contains 'age'

 
 

    $getdate = date('Y-m-d H:i', strtotime($date));

    $statment = $pdo->prepare("INSERT INTO category (category) VALUES (?)");
    /// $stmt->bind_param("sssdss", $product, $category, $type, $datetime, $temperature, $duration ); // 'sssssss' means seven strings
     $statment->execute(array($cat)); 

 
    // Prepare SQL statement to insert data into the database
    $stmt = $pdo->prepare("INSERT INTO products (pname, cat, kind, pro_date, temperature, distribution_time,pro_user ) VALUES (?, ?, ?, ?, ?, ?,?)");
   /// $stmt->bind_param("sssdss", $product, $category, $type, $datetime, $temperature, $duration ); // 'sssssss' means seven strings
    $stmt->execute(array($pname, $cat, $kind, $getdate, $temperature, $duration,$assouser)); 
 
    // Execute the statement
   /// if (!$stmt->execute()) {
       /// echo "Error inserting data: " . $stmt->error;
   /// }
}
echo "Data imported successfully.";










        if($valid == 1) {
            $erros = '';                
           /// $today = date("Y-m-d H:i:sa");
           /// $statement = $pdo->prepare("INSERT INTO tbl_product( p_name,ecat_name,pro_date) VALUES (?,?,?)");                                     
           /// $statement->execute(array( $_POST['p_name'],$_POST['tcat_name'],$today  ));
       
             
    }
     
    
}// submit


 
?>
            <div class="page-body">

                <!-- New Product Add Start -->
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="row">
                                <div class="col-sm-8 m-auto">

                            
                                <form class="theme-form theme-form-2 mega-form"  action="" method="post" enctype="multipart/form-data">
                             
                                      <input class="btn btn-primary ms-auto  mb-2" type="submit"  name="form1"> 
                                    
                                    <div class="card">
                                        <div class="card-body">

                                        <h6 class="text-danger card-header-2"><?php echo $erros; ?></h6>

                                            <div class="card-header-2">
                                                <h5>Product Information</h5>
                                            </div>

                                           
                                        

                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">User</label>
                              <div class="col-sm-9">                      
                     <select name="user_imp" class="js-example-basic-single w-100 top-cat">
		                            <option value="">Select User</option>
		                            <?php
		                          
		                            $getuser->execute();
		                            $result = $getuser->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) { ?>
		                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
		                                <?php } ?>
		                        </select>
                                    </div>
                                                </div>
                                  
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Upload</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="file" value=""  name="p_file">
                                                    </div>
                                                </div
                                            
                                           
                                        </div>
                                    </div>

                                   
								
								 
                                  
                               
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Edit Product Add End -->
                 
 
 
    <input type="hidden" class="choosetype" value="0">
    <input type="hidden"  value="1" class="pagelimit">
 <?php  include('footer.php'); ?>	
  <script type="text/javascript">


	$(document).ready(function() {	
     
        $('#editor1').summernote({
	        	height: 170
	        });
       $('#editor2').summernote({
	        	height: 170,
                codeviewFilter: false
	   });
            
 
 
    

 }); 
 </script>