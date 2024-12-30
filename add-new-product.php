<?php  include('header.php'); ?>	
<?php  include('sidebar.php'); ?>	
<?php
if(isset($_POST['form1'])) {
	
	
	print_r($_POST);
        $valid = 1;      
         /// $filepath = $_POST['p_feature_path'];    
        if(empty($_POST['p_name']) || empty($_POST['tcat_name'])) {
            $valid = 0;
            $erros = "Fill Required Fields!<br>";           
        }         
        if($valid == 1) {
			$erros = '';                   
            $today = date("Y-m-d");
			
			$active_on_off = 2;
            if(isset($_POST['p_is_active']) && $_POST['p_is_active']=='on')  {  $active_on_off = 1; }
            if(isset($_POST['p_is_active']) && $_POST['p_is_active']=='off')  {  $active_on_off = 2; } 
			
			$intervl = 0;
            if(isset($_POST['interval']) && $_POST['interval']=='on')  {  $intervl = 1; }      
			
            $statement = $pdo->prepare("INSERT INTO products(
									pname,cat,pro_group,kind,expires,min_temp,max_temp,barcode,user,p_interval,active,pro_date                
                                      ) VALUES (?,?,?,?,?,?,?,?,?,?,?,?)");
                                     
            $statement->execute(array($_POST['p_name'],$_POST['tcat_name'],$_POST['group_name'],$_POST['kinds'],$_POST['expiry'],$_POST['min_temp'], $_POST['max_temp'],$_POST['barcode'],$_POST['users'],$intervl,$active_on_off,$today               
                 ));  
			
			
			if($statement){
					header('location: products.php');
			}
			
			
		
             
    }     
    
    } 
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
                                                    <label class="form-label-title col-sm-3 mb-0" required>Product  Name*</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" value=""  name="p_name">
                                                    </div>
                                                </div>

                                        <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Assign user*</label>
                              <div class="col-sm-9">                      
                     <select name="users" class="js-example-basic-single w-100 users" required>
		                            <option value="">Select</option>
		                            <?php
		                            $statement = $pdo->prepare("SELECT * FROM members ORDER BY id ASC");
		                            $statement->execute();
		                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) { ?>
		                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
		                                <?php } ?>
		                        </select>
                                    </div>
                                                </div>

                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Category*</label>
                              <div class="col-sm-9">                      
                     <select name="tcat_name" class="js-example-basic-single w-100 top-cat"  required>
		                            <option value="">Select Top Level Category</option>
		                            <?php
		                            $statement = $pdo->prepare("SELECT * FROM category ORDER BY category ASC");
		                            $statement->execute();
		                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) { ?>
		                                <option value="<?php echo $row['id']; ?>"><?php echo $row['category']; ?></option>
		                                <?php } ?>
		                        </select>
                                    </div>
                                                </div>

                        <div class="mb-4 row align-items-center">
                                <label  class="col-sm-3 col-form-label form-label-title">Group*</label>
                              <div class="col-sm-9">                      
                     <select name="group_name" class="js-example-basic-single w-100 top-cat" required>
		                            <option value="">Select Group</option>
		                            <?php
		                            $statement4 = $pdo->prepare("SELECT * FROM groups ORDER BY id ASC");
		                            $statement4->execute();
		                            $result4 = $statement4->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result4 as $row) { ?>
		                                <option value="<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
		                                <?php } ?>
		                        </select>
                                    </div>
                                                </div>
											
					  <div class="mb-4 row align-items-center">
                                <label  class="col-sm-3 col-form-label form-label-title">Kind</label>
                              <div class="col-sm-9">                      
                     <select name="group_name" class="js-example-basic-single w-100 kinds">
		                            <option value="">Select Group</option>
		                            <?php
		                            $statement6 = $pdo->prepare("SELECT * FROM kinds ORDER BY id ASC");
		                            $statement6->execute();
		                            $result6 = $statement6->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result6 as $row) { ?>
		                                <option value="<?php echo $row['id']; ?>"><?php echo $row['kname']; ?></option>
		                                <?php } ?>
		                        </select>
                                    </div>
                                                </div>						
											
                               
 										<div class="row align-items-center ">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Active</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input type="checkbox" name="p_is_active"  checked><span
                                                                class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
											<div class="row align-items-center ">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Interval</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input type="checkbox" name="interval" ><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
                                           
                                        </div>
                                    </div>                                  
                            
 

                                 <div class="card">
                                        <div class="card-body">
                                            <div class="card-header-2">
                                                <h5>Info</h5>
                                            </div>                                           
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Min Temp</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text" value=""   name="min_temp">
													 
                                                    </div>
                                                </div>
                                                <div class="mb-4  row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Max Temp</label>
                                                    <div class="col-sm-9">
                                                         <input class="form-control" type="text" value=""  name="max_temp">
                                                    </div>
                                                </div>
											
											  <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Expiry</label>
                                                    <div class="col-sm-9">
                                                         <input class="form-control" type="date" value=""  name="expiry">
                                                    </div>
                                                </div>  
											
											<div class="row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">barcode</label>
                                                    <div class="col-sm-9">
                                                         <input class="form-control" type="number" value=""  name="barcode">
                                                    </div>
                                                </div>  
                                        </div>
                                    </div><!--.card-->                                 
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

	  
	  const value = document.querySelector("#value");
const input = document.querySelector("#pi_input");
value.textContent = input.value;
input.addEventListener("input", (event) => {
  value.textContent = event.target.value;
});

	  
	$(document).ready(function() {     	
		
		
     $(document).on('click', '#delete-gallery', function () {        
			$('.deletegal').val(1);	
			$('.gallery-row').fadeOut(100);	
		}); 
		$(document).on('click', '#delete-feature', function () { 	
			$('.current_photo').val(0);	
			$('.feature-img').fadeOut(100);	
		});        
        
        $(document).on('click', '.showmedia', function () {   
			var mediatype = $(this).attr('data-id');
			$('.choosetype').val(mediatype);
	    });
        
        $(document).on('click', '#btnAddgalry', function () { 	
		var mediatype = $('.choosetype').val();
		if(mediatype==1){
			var feature_id =  $('.library-box.selected').attr('data-id');
			$('.current_photo').val(feature_id);
			}
		else{
		var	adimgs = '';
		 $( ".library-box.selected" ).each(function() {			 
			var addimglop =  $(this).attr('data-id');
			  adimgs = adimgs+addimglop+',';	
			 
		 });
		var imgslist = adimgs.slice(0, -1);
		    $('.gall_new_photo').val('');
			 $('.gall_new_photo').val(imgslist);
		 }	 	
	 });   

 }); 
 </script>