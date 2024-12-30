<?php  include('header.php'); ?>	
<?php  include('sidebar.php');  
 
if(isset($_POST['form1'])) {
        $valid = 1;	
        $currentid = $_REQUEST['id'];	   
             
        $active_on_off = 0;
        if(isset($_POST['p_is_active'])) {  $active_on_off = 1; }   
	$interval = 0;
	  if(isset($_POST['interval'])){  $interval = 1; }       
        
            $statement = $pdo->prepare("UPDATE products SET  pname=?, cat=?, pro_group=?, kind=?, expires=?,
                                      min_temp=?,  max_temp=?,  barcode=?,  user=?, p_interval=?, active=? 
                                            WHERE pid=?");
              

	  $statement->execute(array(
                                $_POST['p_name'],
                                $_POST['tcat_name'],
                                $_POST['groups'],
					 			 $_POST['kinds'],           
                                $_POST['expiry'],                             
                                    $_POST['min_temp'], 
                                    $_POST['max_temp'],
                                    $_POST['barcode'],
					 				 $_POST['users_assign'],                                    
					  				$interval,
									 $active_on_off,  
                                        $_REQUEST['id']
                                    ));
            
            
            
        
            $success_message = 'Product is updated successfully.';
        }
 
      



$currentid = $_REQUEST['id'];
$statement = $pdo->prepare("SELECT * FROM products WHERE pid=?");
$statement->execute(array($_REQUEST['id']));
$result = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row) {
	$p_name = $row['pname'];
	$cat = $row['cat'];
	$pro_group = $row['pro_group'];
	$expires = $row['expires'];
	$min_temp = $row['min_temp'];
	$max_temp = $row['max_temp'];
	$barcode = $row['barcode'];
	$user = $row['user'];
	$active = $row['active'];
	$intrvl = $row['p_interval'];
	
	

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
                                            <div class="card-header-2">
                                                <h5>Product Information</h5>
                                            </div>

                                           
                                                <div class="mb-4 row align-items-center">
                                                    <label class="form-label-title col-sm-3 mb-0">Product
                                                        Name</label>
                                                    <div class="col-sm-9">
                                                        <input class="form-control" type="text"
                                                            value="<?php echo $p_name; ?>"  name="p_name">
                                                    </div>
                                                </div>

                                          <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Assign user</label>
                              <div class="col-sm-9">                      
                     <select name="users_assign" class="js-example-basic-single w-100 top-cat">
		                            <option value="">users</option>
		                            <?php
		                            $statement = $pdo->prepare("SELECT * FROM members ORDER BY id ASC");
		                            $statement->execute();
		                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) { ?>
		                                <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $user){echo 'selected';} ?>><?php echo $row['name']; ?></option>
		                                <?php } ?>
		                        </select>
                                    </div>
                                                </div>

                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Category</label>
                              <div class="col-sm-9">                      
                     <select name="tcat_name" class="js-example-basic-single w-100 top-cat">
		                            <option value="">Select Top Level Category</option>
		                            <?php
		                            $statement = $pdo->prepare("SELECT * FROM category ORDER BY category ASC");
		                            $statement->execute();
		                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) { ?>
		                                <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $cat){echo 'selected';} ?>><?php echo $row['category']; ?></option>
		                                <?php } ?>
		                        </select>
                                    </div>
                                                </div>

                                             

                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Group</label>
                                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100  end-cat" name="groups">
                                         <option value="">Choose</option>
		                            <?php
		                            $statement = $pdo->prepare("SELECT * FROM groups    ORDER BY name ASC");
		                            $statement->execute(array());
		                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) {
		                                ?>
		    <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $pro_group){echo 'selected';} ?>><?php echo $row['name']; ?></option>
		                                <?php
		                            }
		                            ?>
		                        </select>
                                                    </div>
                                                </div><!--.mb-4-->
              <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Kind</label>
                                                    <div class="col-sm-9">
                                        <select class="js-example-basic-single w-100  end-cat" name="kinds">
                                         <option value="">Choose</option>
		                            <?php
		                            $statement = $pdo->prepare("SELECT * FROM kinds    ORDER BY kname ASC");
		                            $statement->execute(array());
		                            $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) {
		                                ?>
		    <option value="<?php echo $row['id']; ?>" <?php if($row['id'] == $pro_group){echo 'selected';} ?>><?php echo $row['kname']; ?></option>
		                                <?php
		                            }
		                            ?>
		                        </select>
                                                    </div>
                                                </div><!--.mb-4-->
                                        
                                            <!--    <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Brand</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100">
                                                            <option disabled>Brand Menu</option>
                                                            <option value="puma">Puma</option>
                                                            <option value="hrx">HRX</option>
                                                            <option value="roadster">Roadster</option>
                                                            <option value="zara">Zara</option>
                                                        </select>
                                                    </div>
                                                </div> 

                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Unit</label>
                                                    <div class="col-sm-9">
                                                        <select class="js-example-basic-single w-100">
                                                            <option disabled>Unit Menu</option>
                                                            <option>Kilogram</option>
                                                            <option>Pieces</option>
                                                        </select>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Tags</label>
                                                    <div class="col-sm-9">
                                                        <div class="bs-example">
                                                            <input type="text" class="form-control"
                                                                placeholder="Type tag & hit enter" id="#inputTag"
                                                                data-role="tagsinput">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="mb-4 row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Exchangeable</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input type="checkbox"><span class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>-->
                                                <div class="row align-items-center">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Active</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                                                            <input type="checkbox" name="p_is_active"  value="1" <?php if($active == 0){} else { echo 'checked'; }  ?>>
                                                            <span                                                                class="switch-state"></span>
                                                        </label>
                                                    </div>
                                                </div>
											
								<div class="row align-items-center ">
                                                    <label
                                                        class="col-sm-3 col-form-label form-label-title">Interval</label>
                                                    <div class="col-sm-9">
                                                        <label class="switch">
                             <input type="checkbox" name="interval"   value="1" <?php if($intrvl == 0){} else { echo 'checked'; }  ?>><span class="switch-state" ></span>
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
                                                        <input class="form-control" type="text" value="<?php echo $min_temp; ?>"  name="min_temp">
                                                    </div>
                                                </div>
                                                <div class="mb-4  row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Max Temp</label>
                                                    <div class="col-sm-9">
                                                         <input class="form-control" type="text" value="<?php echo $max_temp; ?>"  name="max_temp">
                                                    </div>
                                                </div>
											
											  <div class="mb-4 row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">Expiry</label>
                                                    <div class="col-sm-9">
                                                         <input class="form-control" type="date" value="<?php echo $expires; ?>"  name="expiry">
                                                    </div>
                                                </div>  
											
											<div class="row align-items-center">
                                                    <label class="col-sm-3 col-form-label form-label-title">barcode</label>
                                                    <div class="col-sm-9">
                                                         <input class="form-control" type="number" value="<?php echo $p_name; ?>"  name="barcode">
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

     $(document).on('click', '.library-box', function () { 
         
 
				 var imgid = $(this).attr('data-id');    
				 var mediatype = $('.choosetype').val();
				 
					if(mediatype==1){
						$('.library-box').removeClass('selected');
						$(this).addClass('selected');
                        ///$('.current_photo').val(imgid);
					}
					else{
						$(this).addClass('selected');
					}
                 			 
 			});

    $(document).on('click', '#readmore_imgs', function () { 
		var pages = parseInt($('.pagelimit').val());
			    $.ajax({ 
                        url: 'ajax_all.php',
                                data: {
                                     action:'gallery_more',
                                     pages:pages,
								 
                                },
                                type: 'post',
                               success: function (data){   	
								console.log(data);	                               
								$('.media-library-sec').append(data);
								   var pagesnew = parseInt(pages+1);
                                 $('.pagelimit').val(pagesnew);
                                }
                 }); 	
		
	 });

     $(document).on("click", ".addvarls ", function (e) {	 
		   var proid = "<?php echo  $_REQUEST['id'] ?>"; 	


	 		 var vartion_1 = $(this).parent().parent().parent('.all-data').find( ".var-choose1  select").val();
		   var vartion_2 =$(this).parent().parent().parent('.all-data').find( ".var-choose2  select").val();
		   var vartion_3 =$(this).parent().parent().parent('.all-data').find( ".var-choose3 select").val();
          // var vartion_4 =$(this).parent().parent().parent('.all-data').find( ".var-selectorw  select").val();
          // var vartion_5 =$(this).parent().parent().parent('.all-data').find( ".var-selectorw  select").val();
   
		  var vartion_1_id = $(this).parent().parent().parent('.all-data').find( ".var-choose1  select").attr('data-id');
		   var vartion_2_id =$(this).parent().parent().parent('.all-data').find( ".var-choose2  select").attr('data-id');
		   var vartion_3_id =$(this).parent().parent().parent('.all-data').find( ".var-choose3  select").attr('data-id');
         //  var vartion_4_id =$(this).parent().parent().parent('.all-data').find( ".var-selectorw  select").attr('data-id');
         ///  var vartion_5_id =$(this).parent().parent().parent('.all-data').find( ".var-selectorw  select").attr('data-id');
		 
	    	var var_price = $(this).parent().parent().parent('.all-data').find('.att-price').val();
           var var_qty = $(this).parent().parent().parent('.all-data').find('.att-qty').val();
           var status =  $(this).parent().parent().parent('.all-data').find('.att-status').val();

		 
		 	console.log(vartion_3);
		 
		   if(var_price=='' && var_price==0)  {  return false;}
		    $.ajax({ 
                        url: 'ajax_all.php',
                                data: {
                                     action:'add_variations',
                                     proid:proid, 
                                     vartion_1:vartion_1,
									  vartion_2:vartion_2,
									  vartion_3:vartion_3,
									  vartion_1_id:vartion_1_id,
									  vartion_2_id:vartion_2_id,
									  vartion_3_id:vartion_3_id,
									 var_price:var_price,
                                     var_qty:var_qty,
                                     status:status,
                                },
                                type: 'post',
                               success: function (data){  
								console.log(data); 		                               
								 ///  	$('.select2').val(' ').trigger("change");	 
                                  
                                }
                 }); 
		  	 
	  });


      
	  $(document).on("click", ".addattrnew ", function (e) {   
        
        var	showatt_ids = '';
		 $( ".attribute-row").each(function() {		
            if($(this).find(".showin-var").prop("checked") == true){
                var attattid =  $(this).find(".showin-var:checked").val();
                showatt_ids = showatt_ids+attattid+',';	
            }	 
			
			 
		 });

        

        $.ajax({ 
                        url: 'ajax_all.php',
                                data: {
                                    action:'show_variations',
                                    sendatt_id:showatt_ids,    
                                },
                                type: 'post',
                               success: function (data){  
							 	///console.log(data); 		                               
								  $('#append-vars').append(data);
                                  
                                }
                 }); 

        });

      




 }); 
 </script>