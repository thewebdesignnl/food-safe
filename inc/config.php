<?php
// Error Reporting Turn On
ini_set('error_reporting',1);

// Setting up the time zone
date_default_timezone_set('Europe/Amsterdam');

// Host Name
$dbhost = 'localhost';

// Database Name
$dbname = 'ra_we_ap_foodsafe_db';

// Database Username
$dbuser = 'ra_we_ap_foodsafe';

// Database Password
$dbpass = 'c00~1cPj3';

// Defining base url
define("BASE_URL", "https://thewebdesign.nl/foodsafe/admin/");

// Getting Admin url
define("ADMIN_URL", BASE_URL . "admin" . "/");



try {
	$pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $exception ) {
	echo "Connection error :" . $exception->getMessage();
} 
 
 