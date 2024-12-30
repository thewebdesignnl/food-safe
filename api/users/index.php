
<?php
// index.php
include 'response.php';    // Include response handler
include 'users.php';     // Include logic for members
 
header("Access-Control-Max-Age: 3600");

// Check the HTTP method
$method = $_SERVER['REQUEST_METHOD'];



// Parse URL to get the resource (e.g., /api/members)
$uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$uriSegments = explode('/', $uri);

 

 ///print_r($method);

// Assume we are dealing with members resource
if (isset($uriSegments[5])) { // && is_numeric($uriSegments[5])) {
    $id = $uriSegments[5];  // ID from URL like /members/1
} else {
    $id = null;
}
 
 

// Handle different HTTP methods
switch ($method) {
    case 'GET':
        if ($id) {
		
            // Get a single member
            $statement = $pdo->prepare("SELECT * FROM members WHERE id=?");
			 
         	$statement->execute(array($id));
         ///   $statement->execute();
            $member = $statement->fetch(PDO::FETCH_ASSOC);
            if ($member) {				
                sendResponse('success', $member);
				
            } else {
                sendResponse('error', [], 'Member not found');
            }
        } else {
            // Get all members
            $members = getMembers();
            sendResponse('success', $members);
        }
        break;
    
    case 'POST':
			 
		 $inputData = json_decode(file_get_contents('php://input'), true);
	
		
		///  echo json_encode($inputData);
		
		$email = $inputData['email'] ?? null;
		$pwd = $inputData['password'] ?? null;
		
	 if ($email && $pwd) {		 
            // Get a single member
            $statement = $pdo->prepare("SELECT * FROM members WHERE  e_mail = ? AND pwd=?");
			
         	$statement->execute(array($email,$pwd));
         ///   $statement->execute();
            $member = $statement->fetch(PDO::FETCH_ASSOC);
            if ($member) {		
		 
				
                sendResponse(200, $member);
				
            } else {
                sendResponse('error', [], 'Member not found');
            }
        } else {
            // Get all members
            $members = getMembers();
            sendResponse('success', $members);
        }
        break;
		/*
        // Create a new member
        $data = json_decode(file_get_contents('php://input'), true);
        if (isset($data['name'], $data['e_mail'])) {
            if (createMember($data)) {
                sendResponse('success', [], 'Member created successfully');
            } else {
                sendResponse('error', [], 'Failed to create member');
            }
        } else {
            sendResponse('error', [], 'Missing required fields');
        }
        break;
		
		*/

		
   /* case 'PUT':
        if ($id) {
            // Update an existing member
            $data = json_decode(file_get_contents('php://input'), true);
            if (isset($data['name'], $data['e_mail'])) {
                if (updateMember($id, $data)) {
                    sendResponse('success', [], 'Member updated successfully');
                } else {
                    sendResponse('error', [], 'Failed to update member');
                }
            } else {
                sendResponse('error', [], 'Missing required fields');
            }
        } else {
            sendResponse('error', [], 'Member ID is required');
        }
        break;*/

    case 'DELETE':
        if ($id) {
            // Delete a member
            if (deleteMember($id)) {
                sendResponse('success', [], 'Member deleted successfully');
            } else {
                sendResponse('error', [], 'Failed to delete member');
            }
        } else {
            sendResponse('error', [], 'Member ID is required');
        }
        break;

    default:
        sendResponse('error', [], 'Method not allowed');
        break;
}
?>



<?php
 
 /*
$url = 'http://localhost/api/';
$data = ['name' => 'Jane Smith'];

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// Execute cURL session
$response = curl_exec($ch);

// Check for cURL errors
if ($response === false) {
    die('Error occurred while fetching the data: ' 
        . curl_error($ch));
}

// Close cURL session
curl_close($ch);

// Display the response
echo $response;
*/




/*
$curl = curl_init();

curl_setopt_array($curl, array(
  CURLOPT_URL => 'https://theappdesign.nl/foodsafe/admin/api.php',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'GET',
  CURLOPT_POSTFIELDS =>'{"name": "DDD"}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);

curl_close($curl);

///echo $response;
 
 
echo $response;
*/ 

?>
