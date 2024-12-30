<?php 
include("inc/config.php");
include("inc/functions.php");


///require '../vendor/autoload.php';
					  
///	use MyParcelNL\Sdk\src\Factory\ConsignmentFactory;
///use MyParcelNL\Sdk\src\Helper\MyParcelCollection;
///use MyParcelNL\Sdk\src\Model\Consignment\PostNLConsignment;


if(isset($_POST)){
$action=$_POST['action'];
 
	if($action=='savefonts'){ 
	$titlefont = $_POST['titlefont'];
	$contentfont = $_POST['contentfont'];
 		$buttonarea = $_POST['buttonarea'];
		$bfontsize = $_POST['bfontsize'];
		$size1 = $_POST['size1'];
		$size2 = $_POST['size2'];
		$size3 = $_POST['size3'];
		$size4 = $_POST['size4'];
		$size5 = $_POST['size5'];
		$size6 = $_POST['size6'];
		$showinfopopup = $_POST['showinfopopup'];
	
  $statement = $pdo->prepare("SELECT * FROM styling");
    	$statement->execute();
    	$total = $statement->rowCount();							
    	if($total>0) {
			
			$statement = $pdo->prepare("UPDATE styling SET titlefont=?,contentfont=?,buttons=?,bfontsize=?,size1=?,size2=?,size3=?,size4=?,size5=?,size6=?,show_pro_popup=?  WHERE id=?");
			$statement->execute(array($titlefont,$contentfont,$buttonarea,$bfontsize,$size1,$size2,$size3,$size4,$size5,$size6,$showinfopopup,8));
		}
		else{
			 $sql = "INSERT INTO styling (titlefont,contentfont,buttons,bfont,size1,size2,size3,size4,size5,size6,show_pro_popup) VALUES ('$titlefont','$contentfont','$buttonarea','$bfontsize','$size1','$size2','$size3','$size4','$size5','$size6','$showinfopopup')";
	  $affeted_row = $pdo->exec($sql);
		}
	
   
	
	
} 
	 
	
 		 
	
 
	
 
if($action=='searc_by_cat'){ 
	$search_id = $_POST['search_cat'];
 
	 $stmt = $pdo->prepare("SELECT * FROM tbl_product  WHERE ecat_name=?");
 $stmt->execute(array($search_id));
 	while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
	echo "<tr>";
		echo "<td > ".$row['p_id']." </td>";
	echo "<td > ".$row['p_name']." </td>";
 
		
	///echo "<td align='center'> ".$row['p_qty']." </td>";
	?>
		<td>
		<span class="update-span1"><?php echo $row['p_current_price']; ?></span>
		<input type="number"  class="qty-update1"   style="display:none;"  value="<?php echo $row['p_current_price']; ?>">
	 
	</td>
	<td>
		<span class="update-span"><?php echo $row['p_qty']; ?></span>
		<input type="number"  class="qty-update"   style="display:none;"  value="<?php echo $row['p_qty']; ?>">
	
	</td>
	<td><?php echo $row['ecat_name']; ?></td>
	<td>
		<button data-id="<?php echo $row['p_id']; ?>" class="btn btn-warning btn-xs updateattus" style="display:none;">Update</button>
		<?php
	 echo '<div >'.'<a class="update-btn"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>'.'|'.'<a href=delitem.php?id=' . $row["p_id"] .'><i class="fa fa-trash" aria-hidden="true"></i></a>'.' </div></td>';

	echo "</tr>";
	}
   
	}
	
	

if($action=='send_mail'){ 
	
	$cust_id = $_POST['cust_id'];
	$subject_text = $_POST['subject_text'];
	$message_text = $_POST['message_text'];
	
	
	///$subject = 'New Order';
 
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .="From: info@printshopdiemen.nl";
	if(mail($cust_id, $subject_text, $message_text, $headers)){
		echo 'sent';
	} 
	else{
		echo 'not';
	}
	 
}
	
	

// show variations
if($action=='show_variations'){  
  $showatt_ids = $_POST['sendatt_id'];
  $maincat=explode(',',$showatt_ids);  ?>  
<div class="all-data row">
  <?php  $attnumber = 1;
   foreach ($maincat as $row2) {
	$statement_attr = $pdo->prepare("SELECT * FROM attrs WHERE id=?");
	$statement_attr->execute(array($row2));
	$result_attr1 = $statement_attr->fetchAll(PDO::FETCH_ASSOC);	
	 ?>
			<?php    
			foreach ($result_attr1 as $row){ $att_id  = $row['id'];  ?>  
			<div class="col-sm-4 mb-2 var-selectorw var-choose<?php echo $attnumber; ?>">     
<select   class="form-control js-example-basic-single w-100  var-choose-opt "  data-id="<?php echo $row2; ?>" >	
			<option value="1">Any <?php echo $row['att_name'];   ?></option>                
				<?php                                         					
		 
			$statement_getattr = $pdo->prepare("SELECT * FROM att_values WHERE att_id=?");
			$statement_getattr->execute(array($row['id']));
			$result_fetchattr = $statement_getattr->fetchAll(PDO::FETCH_ASSOC);			
			foreach ($result_fetchattr as $row) {						
				
			$statement2 = $pdo->prepare("SELECT * FROM pro_att_assign WHERE pro_id=? AND att_id=?");
			$statement2->execute(array($currentid,$att_id));
			$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);								 
				$explode2 = explode(',', $result2[0]['attr_val']);	
			?>
			<option value="<?php echo $row['att_value']; ?>" ><?php echo $row['att_value']; ?></option>                                       
			<?php
			} ?>
			</select> </div> 
			<?php  $attnumber++;  }  	 }
			?>    		                                 
			<div class="all-data-box  row">                 
			<div class="col-sm-4 mb-2">
			<label>Quantity</label>
			<input class="form-control att-price" type="number" placeholder="0">
			</div>
			<div class="col-sm-4 mb-2">  <label>Regular price </label> <input class="form-control att-qty" type="number" placeholder="0"> </div>
			<div class="col-sm-12 mb-2">
			<label>Stock</label>
			<select class="js-example-basic-single w-100 att-status">
			<option  value="1">In Stock</option>
				<option value="2">Out Of Stock</option>
			</select>
			</div>                               
			<div class="modal-footer ">
			<button class="btn btn-animation addvarls"   type="button" data-bs-original-title="" title=""><i  class="ri-delete-bin-line"></i></button>
			<button class="btn btn-animation addvarls"   type="button" data-bs-original-title="" title="">Save</button>
			</div>
			</div>
			</div>		
			<?php    
}
	
	
if($action=='update_status'){ 	
	$oid = $_POST['oid'];
	$status = $_POST['chooseattr'];

 	$statement = $pdo->prepare("UPDATE tbl_orders  SET ot_status=? WHERE ot_id=? ");
    $statement->execute(array($status,$oid));	
	if($statement){
	 
		$statement2 = $pdo->prepare("SELECT * FROM tbl_user_1  WHERE or_id=?");
		$statement2->execute(array($oid));
		$result2 = $statement2->fetchAll(PDO::FETCH_ASSOC);							
		foreach ($result2 as $row) {  
			$regid =  $row['regisid']; 				 
			$usr_first_name = 	 $row['usr_first_name'];
			$usr_last_name = 	 $row['usr_last_name'];
			$usr_company = 	 $row['usr_company'];
			$usr_streetaddress1 = 	 $row['usr_streetaddress1'];
			$usr_streetaddress2 = 	 $row['usr_streetaddress2'];
			$usr_order_city = 	 $row['usr_order_city'];
			$usr_zipcode = 	 $row['usr_zipcode'];
			$usr_order_phone = 	 $row['usr_order_phone'];
			$usr_emailid = 	 $row['usr_emailid'];		
		}		 
 
	if($status ==1){  
		$subject_text = 'Order number #'.$oid.' Approved';
		$message_text = ' <div class="content">
            <h2  style="font-family:sans-serif;font-size:15px;line-height:20px;">Hello '.$usr_first_name.',</h2>
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;">We wanted to let you know that the status of your order #'.$oid.' has been updated.</p>
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;"><strong>New Status: Approved</strong></p>
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;">If you have any questions or concerns regarding your order, feel free to reach out to our support team.</p>          
        </div>
        <div class="footer">
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;">Thank you for shopping with us!</p>           
        </div>';
	}
	if($status ==2){  
		$subject_text = 'Order number #'.$oid.' Pending';
	$message_text = ' <div class="content">
            <h2  style="font-family:sans-serif;font-size:15px;line-height:20px;">Hello '.$usr_first_name.',</h2>
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;">We wanted to let you know that the status of your order #'.$oid.' has been updated.</p>
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;"><strong>New Status: Pending</strong></p>
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;">If you have any questions or concerns regarding your order, feel free to reach out to our support team.</p>          
        </div>
        <div class="footer">
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;">Thank you for shopping with us!</p>           
        </div>';
	}
	if($status ==3){  
		$subject_text = 'Order number #'.$oid.' Canceled';
		$message_text = ' <div class="content">
            <h2  style="font-family:sans-serif;font-size:15px;line-height:20px;">Hello '.$usr_first_name.',</h2>
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;">We wanted to let you know that the status of your order #'.$oid.' has been updated.</p>
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;"><strong>New Status: Canceled</strong></p>
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;">If you have any questions or concerns regarding your order, feel free to reach out to our support team.</p>          
        </div>
        <div class="footer">
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;">Thank you for shopping with us!</p>           
        </div>';
	}
	if($status ==4){  
		$subject_text = 'Order number #'.$oid.' Failed';
	$message_text = ' <div class="content">
            <h2  style="font-family:sans-serif;font-size:15px;line-height:20px;">Hello '.$usr_first_name.',</h2>
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;">We wanted to let you know that the status of your order #'.$oid.' has been updated.</p>
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;"><strong>New Status: Failed</strong></p>
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;">If you have any questions or concerns regarding your order, feel free to reach out to our support team.</p>          
        </div>
        <div class="footer">
            <p  style="font-family:sans-serif;font-size:15px;line-height:20px;">Thank you for shopping with us!</p>           
        </div>';
	} 
	
	///$subject = 'New Order';
 
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers = "MIME-Version: 1.0" . "\r\n";
	$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
	$headers .="From: info@printshopdiemen.nl";	
 
 	 if(mail($usr_emailid, $subject_text, $message_text, $headers)){	 echo 1;	 } 
	 else{	 	echo 2;	 }  
}
}		
	
if($action=='nextweek'){ 
	 $week = $_POST['weekno'];
	$userid = $_POST['userid'];
	
	 
		$year=2025;
		function getStartAndEndDate($week, $year) {
		  $dateTime = new DateTime();
		  $dateTime->setISODate($year, $week);
		  $result['start_date'] = $dateTime->format('Y-m-d');
		  $dateTime->modify('+6 days');
		  $result['end_date'] = $dateTime->format('Y-m-d');
		  return $result;
		}
		$dates=getStartAndEndDate($week,$year);
	///	print_r($dates);
	
 
	$nextweek = $dates['start_date'];
 
	$currentDate = new DateTime($nextweek);
   /// $currentDate = new DateTime('2024-12-31');
	// Get the current day of the week (0 = Sunday, 1 = Monday, ..., 6 = Saturday)
	$dayOfWeek = $currentDate->format('1');
	// Calculate the date for the start of the week (Monday)
	$startOfWeek = clone $currentDate;
	$startOfWeek->modify('+' . $dayOfWeek . ' days')->modify('Monday this week');
	$endOfWeek = clone $startOfWeek;
	$endOfWeek->modify('+6 days');
	// Create an array to store the days of the week
	$weekDays = [];
	// Loop through the 7 days of the week and add them to the array
	for ($i = 0; $i < 7; $i++) {
		$day = clone $startOfWeek;
		$day->modify('+' . $i . ' days');
		$weekDays[] = $day->format('Y-m-d'); // Format the date (e.g., "Monday, 2024-12-13")
		//  $weekDays[] = $day->format('l, Y-m-d'); // Format the date (e.g., "Monday, 2024-12-13")
	}
	
	 
	foreach ($weekDays as $day) {
			 			
									?>           
  <div class="col-sm-2 col-xxl-2 col-lg-2">
                            <div class="main-tiles border-5 card-hover border-0  card o-hidden">
                                <div class="custome-1-bg b-r-4 card-body">
                                    <div class="media static-top-widget">
                                        <div class="media-body p-0">
											<span class="badge badge-light-primary grow"><?php echo  date('l',strtotime($day)); ?></span>
                                            <span class="m-0"><?php echo  date('d M Y',strtotime($day)); ?></span>
				<?php
	 $currentweek_task = $pdo->prepare(" SELECT  * from planning LEFT JOIN products on planning.plan_pid=products.pid  LEFT JOIN members on planning.u_id=members.id WHERE  task_day = ?");										 
 ///$currentweek_task = $pdo->prepare("SELECT * FROM planning WHERE task_day = ?");								 
$currentweek_task->execute(array($day));
 $total = $currentweek_task->rowCount();							 
$result_tasks = $currentweek_task->fetchAll(PDO::FETCH_ASSOC);
		 foreach ($result_tasks as $tltask) {
			 ///  
			 
 			  $taskday = date('d M Y',strtotime($tltask['task_day']));
			 $tasktime = date('H:s A',strtotime($tltask['task_time']));
 echo '<h4 class="mb-0 counter"><br><span class="badge badge-light-danger grow"><i class="fa fa-thermometer-empty" aria-hidden="true"></i> '.$tltask['pname'].'<br><br>'.$taskday.'<br>'.$tasktime.' <button class="btn btn-sm  next-week" type="button" ><i class="fa fa-times" aria-hidden="true"></i></button></span></h4>';		
		  }
							 ?>
  </div>                                     
     </div>
         </div>
                 </div>
           </div>                 									
  
<?php }
	
}	
	
	


} // action column
?>