<?php  include('header.php'); ?>	
<?php  include('sidebar.php'); 
 

if(isset($_POST['add_user'])) {
	
	if (($_POST ['full_name'] == "") || ($_POST ['password'] == "") || ($_POST ['email'] == "")){
    $msg = '<div class="status-danger"><span>Fields reguired.</span></div>';	
	}
	else{
    $email = $_POST['email']; 

     $statement = $pdo->prepare("SELECT * FROM  members WHERE e_mail LIKE '$email' ");   
        $statement->execute();
          $result = $statement->fetchAll(PDO::FETCH_ASSOC);   
          $checkid = $result[0]['e_mail'];
         if($checkid==$_POST['email']){
             
             $msg = '<div class="status-danger"><span>Email is used.</span></div>';	
         }
        else{
		$c_name = $_POST['c_name'];
		$name = $_POST['full_name'];
		$password = $_POST['password'];
			
			$street = $_POST['street'];
			$postcode = $_POST['postcode'];
			$city = $_POST['city'];
			$phone = $_POST['phone'];
			
	 			
		 $reg_at = date("Y-m-d");
     $role = $_POST['roles'];  
		$sql= "INSERT INTO members(name,pwd,e_mail,company,street,postcode,city,phone,role,register_on) VALUES ('$name','$password','$email','$c_name','$street','$postcode','$city','$phone','$role','$reg_at')";
		$affeted_row = $pdo->exec($sql);

        if($statement){ 
			///header('location: all-users.php');
    

            $username = $_POST ['full_name'];
            $useremail = $_POST ['email'];


            $sendmail = '<table class="es-wrapper" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;padding:0;Margin:0;width:100%;height:100%;background-repeat:repeat;background-position:center top" width="100%" cellspacing="0" cellpadding="0" role="none">
            <tbody><tr style="border-collapse:collapse">
             <td valign="top" style="padding:0;Margin:0">
              <table cellpadding="0" cellspacing="0" class="es-content" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                <tbody><tr style="border-collapse:collapse">
                 <td class="es-adaptive" align="center" style="padding:0;Margin:0">
                  <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" role="none">
                    <tbody><tr style="border-collapse:collapse">
                    </tr>
                  </tbody></table></td>
                </tr>
              </tbody></table>
              <table class="es-header" cellspacing="0" cellpadding="0" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%;background-color:transparent;background-repeat:repeat;background-position:center top">
                <tbody><tr style="border-collapse:collapse">
                 <td align="center" style="padding:0;Margin:0">
                  <table class="es-header-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center" role="none">
                    <tbody><tr style="border-collapse:collapse">
                     <td align="left" style="padding:0;Margin:0">
                      <table width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                        <tbody><tr style="border-collapse:collapse">
                         <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                          <table width="100%" cellspacing="0" cellpadding="0" role="presentation" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                            <tbody><tr style="border-collapse:collapse">
                             <td align="center" style="padding:0;Margin:0;padding-bottom:20px;font-size:0"><a><img src="https://theappdesign.nl/foodsafe/assets/logo/logositex.png" alt="" style="display:block;border:0;outline:none;text-decoration:none;-ms-interpolation-mode:bicubic" width="154"></a></td>
                            </tr>
                          </tbody></table></td>
                        </tr>
                      </tbody></table></td>
                    </tr>
                  </tbody></table></td>
                </tr>
              </tbody></table>
              <table class="es-content" cellspacing="0" cellpadding="0" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                <tbody><tr style="border-collapse:collapse">
                 <td align="center" style="padding:0;Margin:0">
                  <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" align="center" role="none">
                    <tbody><tr style="border-collapse:collapse">
                     <td align="left" style="padding:0;Margin:0">
                      <table width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                        <tbody><tr style="border-collapse:collapse">
                         <td valign="top" align="center" style="padding:0;Margin:0;width:600px">
                          <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-radius:3px;background-color:#FCFCFC" width="100%" cellspacing="0" cellpadding="0" bgcolor="#fcfcfc" role="presentation">
                            <tbody><tr style="border-collapse:collapse">
                             <td class="es-m-txt-l" align="left" style="padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:30px"><h2 style="Margin:0;line-height:31.2px;mso-line-height-rule:exactly;font-family:helvetica, arial, sans-serif;font-size:26px;font-style:normal;font-weight:normal;color:#333333">Welcome!</h2></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                             <td bgcolor="#fcfcfc" align="left" style="padding:0;Margin:0;padding-top:10px;padding-left:20px;padding-right:20px"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:14px;line-height:21px;font-family:helvetica, arial, sans-serif;  color:#333333">Hi '.$name.', we’re glad you’re here! You can enjoy purchases and discover new discounts every week. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.<br></p></td>
                            </tr>
                          </tbody></table></td>
                        </tr>
                      </tbody></table></td>
                    </tr>
                    <tr style="border-collapse:collapse">
                     <td style="padding:0;Margin:0;padding-left:20px;padding-right:20px;padding-top:30px;background-color:#FCFCFC" bgcolor="#fcfcfc" align="left">
                      <table width="100%" cellspacing="0" cellpadding="0" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px">
                        <tbody><tr style="border-collapse:collapse">
                         <td valign="top" align="center" style="padding:0;Margin:0;width:560px">
                          <table style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:separate;border-spacing:0px;border-color:#EFEFEF;border-style:solid;border-width:1px;border-radius:3px;background-color:#FFFFFF" width="100%" cellspacing="0" cellpadding="0" bgcolor="#ffffff" role="presentation">
                            <tbody><tr style="border-collapse:collapse">
                             <td align="center" style="padding:0;Margin:0;padding-bottom:15px;padding-top:20px"><h3 style="Margin:0;line-height:21.6px;mso-line-height-rule:exactly;font-family:helvetica, arial, sans-serif;font-size:18px;font-style:normal;font-weight:normal;color:#333333">Your account information:</h3></td>
                            </tr>
                            <tr style="border-collapse:collapse">
                             <td align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, arial, sans-serif;line-height:24px;color:#64434A">Login: '.$username.'</p><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, arial, sans-serif;line-height:24px;color:#64434A">Email: '.$useremail.'</p></td>
                            </tr>
                        <tr style="border-collapse:collapse">
                             <td align="center" style="padding:0;Margin:0"><p style="Margin:0;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-size:16px;font-family:helvetica, arial, sans-serif;line-height:24px;color:#64434A">Password: '.$password.'</p></td>
                            </tr>							
                            <tr style="border-collapse:collapse">
                             <td align="center" style="Margin:0;padding-left:10px;padding-right:10px;padding-top:20px;padding-bottom:20px"><span class="es-button-border" style="border-style:solid;border-color:transparent;background:#F8F3EF;border-width:0px;display:inline-block;border-radius:3px;width:auto"><a  href="https://theappdesign.nl/foodsafe/admin/login.php" class="es-button" target="_blank" style="mso-style-priority:100 !important;text-decoration:none;-webkit-text-size-adjust:none;-ms-text-size-adjust:none;mso-line-height-rule:exactly;font-family:helvetica, arial, sans-serif;font-size:17px;color:#64434A;border-style:solid;border-color:#F8F3EF;border-width:10px 20px 10px 20px;display:inline-block;background:#F8F3EF;border-radius:3px;font-weight:normal;font-style:normal;line-height:20.4px;width:auto;text-align:center">Log In Now</a></span></td>
                            </tr>
                          </tbody></table></td>
                        </tr>
                      </tbody></table></td>
                    </tr>
                  </tbody></table></td>
                </tr>
              </tbody></table>     
       
              <table class="es-content" cellspacing="0" cellpadding="0" align="center" role="none" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;table-layout:fixed !important;width:100%">
                <tbody><tr style="border-collapse:collapse">
                 <td style="padding:0;Margin:0;background-color:#666666" bgcolor="#666666" align="center">
                  <table class="es-content-body" style="mso-table-lspace:0pt;mso-table-rspace:0pt;border-collapse:collapse;border-spacing:0px;background-color:transparent;width:600px" cellspacing="0" cellpadding="0" bgcolor="#ffffff" align="center" role="none">
                    <tbody><tr style="border-collapse:collapse">
                     <td align="left" style="padding:0;Margin:0">
                      </td>
                    </tr>
                  </tbody></table></td>
                </tr>
              </tbody></table>       
             </td>
            </tr>
          </tbody></table>';
       
       
   ///  echo $sendmail;
			
			
			
	 
$subject = 'Thank you for Register';
 
 
 
require 'phpmailer/PHPMailerAutoload.php';
$mailnew = new PHPMailer;
 //$mail->isSMTP();
 $mailnew->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
    $mailnew->Port   = 587;                                   // Enable SMTP authentication
    $mailnew->SMTPAuth   = true;                                   // Enable SMTP authentication
    $mailnew->SMTPSecure   = 'tls';                                   // Enable SMTP authentication
    $mailnew->Username   = 'info@theappdesign.nl';                     // SMTP username
    $mailnew->Password   = 'aarti2@1183HG';         
    $mailnew->setFrom('info@theappdesign.nl');
    $mailnew->addAddress($useremail);     // Add a recipient
 
    $mailnew->addReplyTo('info@theappdesign.nl');
    $mailnew->isHTML(true);
    $mailnew->CharSet = 'UTF-8';
    $mailnew->Subject = $subject;
	$mailnew->msgHTML($sendmail);

    if($mailnew->send()){	
		
		 /// $msg = '<div class="status-close"><span>Created and mail sent.</span></div>';	
		 header('Location: all-users.php');
	 
	}
	else{
	  $msg = '<div class="status-danger"><span>Error.</span></div>';	
	}		
		



			
		}		
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
                                             <?php echo $msg; ?>
                                            </div>
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-home-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-home"
                                                        type="button">New user</button>
                                                </li>
                                                <!--<li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-profile-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-profile"
                                                        type="button">Permission</button>
                                                </li>-->
                                            </ul>

                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel">
                                                    <form class="theme-form theme-form-2 mega-form">
                                                        <div class="card-header-1">
                                                           
                                                        </div>

                                                        <div class="row">
											  <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="form-label-title col-lg-2 col-md-3 mb-0">Company Name</label>
                                                                <div class="col-md-9 col-lg-10">
                                             <input class="form-control" type="text"  value="<?php echo $full_name; ?>" name="c_name" >
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="form-label-title col-lg-2 col-md-3 mb-0">Name</label>
                                                                <div class="col-md-9 col-lg-10">
                                                 <input class="form-control" type="text"  value="<?php echo $full_name; ?>" name="full_name" >
                                                                </div>
                                                            </div>

                                                            <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="col-lg-2 col-md-3 col-form-label form-label-title">Email
                                                                    Address</label>
                                                                <div class="col-md-9 col-lg-10">
                                           <input class="form-control" type="email"  value="<?php echo $email; ?>"  name="email" >
                                                                </div>
                                                            </div>
															
										   <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="form-label-title col-lg-2 col-md-3 mb-0">Street</label>
                                                                <div class="col-md-9 col-lg-10">
                                                 <input class="form-control" type="text"  value="<?php echo $full_name; ?>" name="street" >
                                                                </div>
                                                            </div>		
															
												   <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="form-label-title col-lg-2 col-md-3 mb-0">Postcode</label>
                                                                <div class="col-md-9 col-lg-10">
                                                 <input class="form-control" type="text"  value="<?php echo $full_name; ?>" name="postcode" >
                                                                </div>
                                                            </div>		
												   <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="form-label-title col-lg-2 col-md-3 mb-0">City</label>
                                                                <div class="col-md-9 col-lg-10">
                                                 <input class="form-control" type="text"  value="<?php echo $full_name; ?>" name="city" >
                                                                </div>
                                                            </div>						
											    <div class="mb-4 row align-items-center">
                                                                <label
                                                                    class="form-label-title col-lg-2 col-md-3 mb-0">Phone</label>
                                                                <div class="col-md-9 col-lg-10">
                                                 <input class="form-control" type="text"  value="<?php echo $full_name; ?>" name="phone" >
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
                                                    <option   value="2"   >Supervisor</option>
                                                    <option   value="3"  >user</option>  </select>
                                          </div
                                    
                                          

                                                        </div>
                                                   
                                              
 
   </div>    



                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-submit-button">
                                            <button class="btn btn-animation ms-auto"  name="add_user" type="submit">Submit</button>
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

                 