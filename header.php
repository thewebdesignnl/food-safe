<?php
ob_start();
session_start();
include("inc/config.php");
///include("inc/functions.php");
///include("inc/CSRF_Protect.php");

$currency = '€';

// Check if the user is logged in or not
if(!isset($_SESSION['user'])) {
///	header('location: login.php');
	///exit;
}



$allsetiings = $pdo->prepare("SELECT * FROM tbl_settings WHERE id=1");
$allsetiings->execute();
$result_settigs = $allsetiings->fetchAll(PDO::FETCH_ASSOC);
foreach ($result_settigs as $row)
{
	$logo = $row['logo'];
	$favicon = $row['favicon'];
	$contact_email = $row['contact_email'];
	$contact_phone = $row['contact_phone'];
	$meta_title_home = $row['meta_title_home'];	
	$footer_copyright = $row['footer_copyright']; 
}

 
$webshopdetail = $pdo->prepare("SELECT * FROM website_detail");
$webshopdetail->execute();
$webshopdetail_all = $webshopdetail->fetchAll(PDO::FETCH_ASSOC);
foreach ($webshopdetail_all as $row){	 
	$shopname = $row['name'];
	 
	 
}



	$getfeature_img = $pdo->prepare("SELECT * FROM tbl_product_photo  WHERE id  = '$logo'");
	$getfeature_img->execute();
	$featureimg = $getfeature_img->fetchAll(PDO::FETCH_ASSOC);  
  $logo_img =  $featureimg[0]['image_name'];

	$favicon = $pdo->prepare("SELECT * FROM tbl_product_photo  WHERE id  = '$favicon'");
	$favicon->execute();
	$favicon_name = $favicon->fetchAll(PDO::FETCH_ASSOC);  
   $favicon_name1 =  $favicon_name[0]['image_name']; 

   $getuser = $pdo->prepare("SELECT * FROM members ORDER BY id  ASC");

   $getproducts = $pdo->prepare("SELECT * FROM products ORDER BY pid ASC");
  
  

  
 

?>
 

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $meta_description_home; ?>">
    <meta name="keywords" content="<?php echo $meta_keyword_home; ?>">
    <meta name="author" content="<?php echo $shopname; ?>">
    <link rel="icon" href="assets/logo/<?php echo $favicon_name1; ?>" type="image/x-icon">
    <link rel="shortcut icon" href="assets/logo/<?php echo $favicon_name1; ?>" type="image/x-icon">
    <title><?php echo $shopname; ?> - Dashboard</title>

    <!-- Google font-->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap">

    <!-- Linear Icon css -->
    <link rel="stylesheet" href="assets/css/linearicon.css">

    <!-- fontawesome css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/font-awesome.css">

    <!-- Themify icon css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/themify.css">

    <!-- ratio css -->
    <link rel="stylesheet" type="text/css" href="assets/css/ratio.css">

    <!-- remixicon css -->
    <link rel="stylesheet" type="text/css" href="assets/css/remixicon.css">

    <!-- Feather icon css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/feather-icon.css">

    <!-- Plugins css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/scrollbar.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/animate.css">

    <!-- Bootstrap css-->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- vector map css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vector-map.css">

    <!-- Slick Slider Css 
    <link rel="stylesheet" href="assets/css/vendors/slick.css">-->
       <!-- Select2 css -->
       <link rel="stylesheet" type="text/css" href="assets/css/select2.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/summernote.css">
    <!-- App css -->
    <link rel="stylesheet" type="text/css" href="assets/css/style.css">

    <link rel="stylesheet" type="text/css" href="assets/css/custom.css"><!-- custom css -->  
</head>
 

 
<body>
    <!-- tap on top start-->
    <div class="tap-top">
        <span class="lnr lnr-chevron-up"></span>
    </div>
    <!-- tap on tap end-->

    <!-- page-wrapper Start-->
    <div class="page-wrapper compact-wrapper" id="pageWrapper">
        <!-- Page Header Start-->
        <div class="page-header">
            <div class="header-wrapper m-0">
                <div class="header-logo-wrapper p-0">
                    <div class="logo-wrapper">
                        <a href="index.html">
                            <img class="img-fluid main-logo" src="assets/images/logo/1.png" alt="logo">
                            <img class="img-fluid white-logo" src="assets/images/logo/1-white.png" alt="logo">
                        </a>
                    </div>
                    <div class="toggle-sidebar">
                        <i class="status_toggle middle sidebar-toggle" data-feather="align-center"></i>
                        <a href="index.html">
                            <img src="assets/images/logo/1.png" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>

               <!-- <form class="form-inline search-full" action="javascript:void(0)" method="get">
                    <div class="form-group w-100">
                        <div class="Typeahead Typeahead--twitterUsers">
                            <div class="u-posRelative">
                                <input class="demo-input Typeahead-input form-control-plaintext w-100" type="text"
                                    placeholder="Search Fastkart .." name="q" title="" autofocus>
                                <i class="close-search" data-feather="x"></i>
                                <div class="spinner-border Typeahead-spinner" role="status">
                                    <span class="sr-only">Loading...</span>
                                </div>
                            </div>
                            <div class="Typeahead-menu"></div>
                        </div>
                    </div>
                </form>-->
				
 <?php  include('navbar.php'); ?>				
     </div>
        </div>
        <!-- Page Header Ends-->