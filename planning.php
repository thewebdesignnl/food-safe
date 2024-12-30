<?php  include('header.php'); ?>	
<link rel="stylesheet" type="text/css" href="assets/evo-calendar/css/evo-calendar.css"/>
<link rel="stylesheet" type="text/css" href="assets/evo-calendar/css/evo-calendar.midnight-blue.css"/>
<?php  include('sidebar.php');

 $userid = (isset($_GET['uid']) ? $_GET['uid'] : 0) ;

if(isset($_POST['add-list1'])) {
    $valid = 1;
     if(empty($_POST['list-user'])) {
         $valid = 0;
         $error_message .= "Top Category Name can not be empty<br>";
     } else {
        
     }
      if($valid == 1) {
		$reg_at = date("Y-m-d");
        $statement = $pdo->prepare("INSERT INTO planning (user_id,product_name,task_day,task_time,pdate) VALUES (?,?,?,?,?)");
        $statement->execute(array($_POST['list-user'],$_POST['list-pid'],$_POST['list-date'],$_POST['list-time'],$reg_at));
     }
 } 
?>	

            <!-- Container-fluid starts-->
            <div class="page-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-sm-12">
           <div class="card">
             <form class="theme-form theme-form-2 mega-form"   method="post">
                   <div class="card-body">                                            
				    <div class="mb-4 row align-items-center">
                          <label class="col-lg-2 col-md-3 col-form-label form-label-title">User</label>
                          <div class="col-md-9 col-lg-10">                                
                           <select name="list-user" class="js-example-basic-single w-100 selectusr">
		                    <option value="">Select User</option>
						      <option value="planning.php">None</option>
		                            <?php		                          
		                            $getuser->execute();
		                            $result = $getuser->fetchAll(PDO::FETCH_ASSOC);   
		                            foreach ($result as $row) { ?>
		                                <option value="planning.php?uid=<?php echo $row['id']; ?>"><?php echo $row['name']; ?></option>
		                                <?php } ?>
		                        </select>
                                    </div>
                                        </div><!--mb-4--> 
										   </div>
										</form>
							</div>
											
						 <div class="card">                                     
                           <div class="card-body">		 										
                                    <div class="title-header option-title d-sm-flex d-block">
                                        <h5>Article List of:</h5>  
			<div class="weeks right-options">	
			<ul >
<li><button class="btn btn-animation  prev-week" type="button"  ><i class="ri-arrow-left-s-line"></i></button></li>
<li><?php  $today = date('Y-m-d');
$date = new DateTime($today);
$week = $date->format("W"); ?>
	<h6>Week number:<span class="week-no"><?php echo $week; ?></span></h6>
				 
				</li>				
<li><button class="btn btn-animation  next-week" type="button" ><i class="ri-arrow-right-s-line"></i></button></li>
			</ul>
			</div><!--.weeks-->					
                                    </div>							
								<div class="row week-data"  id="planning-show">
	 <?php
	// Get the current date
	 $currentDate = new DateTime();
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

									/*
$startdate =  $startOfWeek->format('Y-m-d');
$enddate =  $endOfWeek->format('Y-m-d');

$currentweek_task = $pdo->prepare("SELECT * FROM planning WHERE task_day BETWEEN ? AND ?");
$currentweek_task->execute(array($startdate, $enddate));
$result_tasks = $currentweek_task->fetchAll(PDO::FETCH_ASSOC);
$currentweek = []; 
		 	foreach ($result_tasks as $row) {
				 ///$currentweek[] = $row['task_day']; 
                 $currentweek[] = array("date"=>$row['task_day'], "time"=>$row['task_time'], "proname"=>$row['product_name']);
                 ///$currentweek[]['time'] = $row['task_time'];
        }
									
									
	*/								
									

      ///  echo '<pre>';
       /// print_r($currentweek);
/*
   foreach ($weekDays as $day) {    
        foreach ($currentweek as $item) {
            if ($item['date'] === $day) {
                // Item found
                echo "Found: " . $item['proname'] . " on " . $item['date'] . " at " . $item['time'] . "<br>";
                $found = true;
                break; // Exit the loop once the item is found
            }
        }
    }
*/
          

?>
 </div> <div>
             </div>
                 </div> </div><!--card-->
					
					
				 <div class="card">
                             <div class="card-body">	
								  <div class="title-header option-title d-sm-flex d-block">
                                        <h5>Find by date</h5>  </div>
							  <div id="calendar"></div>			
								</div>
                            </div><!--card-->	
					
							
                        </div>
                    </div>
                </div>
                <!-- Container-fluid Ends-->               
                <?php  include('footer.php'); ?>	
<input type="hidden"  value="<?php echo $userid;?>" class="userid">
<input type="hidden"  value="2" class="weekno">				
<script src="assets/evo-calendar/js/evo-calendar.js"></script>
<script>
$(document).ready(function() {
	 $('.selectusr').on('change', function () {			
				  var url = $(this).val(); // get selected value			 
				  if (url) { // require a URL
					  window.location = url; // redirect
				  }
				  return false;
			  });

    $('#calendar').evoCalendar({
      'format': 'm-d-yy',     
      'sidebarDisplayDefault': false,    
    });

    $('#calendar').on('selectDate', function(event, newDate, oldDate) {
      
		
		
	 var weekno = parseInt($('.weekno').val());
	  var userid =$('.userid').val();
		
		$.ajax({
			url: "ajax_all.php",
			method: "POST",
			data: {action: 'taskbydate',
				 'userid' : userid,	
				   'weekno' : weekno,
				   'finddate':newDate
				},
			 dataType: "html",
			success: function (data){
			     console.log(data);
				/// $('#planning-show').empty();
                ///  $('#planning-show').html(data);
				
				///var nextweek_no = parseInt(weekno+1);
                /// $('.weekno').val(nextweek_no);
				
			}  
		});	
		
		
    });

      $(document).on("change", ".selectusr", function (event) {
        var url = $(this).val(); // get selected value			 
				  if (url) { // require a URL
					///  window.location = url; // redirect
				  }
				  return false;
      });
	
	
	$(document).on("click", ".next-week", function (event) { 
		
	 var weekno = parseInt($('.weekno').val());
	  var userid =$('.userid').val();
		
		$.ajax({
			url: "ajax_all.php",
			method: "POST",
			data: {action: 'nextweek',
				 'userid' : userid,	
				   'weekno' : weekno,	
				},
			 dataType: "html",
			success: function (data){
			     console.log(data);
				 $('#planning-show').empty();
                  $('#planning-show').html(data);
				
				var nextweek_no = parseInt(weekno+1);
                 $('.weekno').val(nextweek_no);
				
			}  
		});
	 });
	
	
    });//ready
</script> 