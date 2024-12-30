<?php
include("inc/config.php");
// Set the content type to JSON
header('Content-Type: application/json');

// Sample data (this could be from a database or external source)
$data = [
    'status' => 'success',
   /// 'message' => 'Welcome to the simple PHP API',
    'data' => [
        ['id' => 1, 'name' => 'John Doe'],
        ['id' => 2, 'name' => 'Jane Smith','email' => 'test@test.com'],
		['id' => 3, 'name' => 'K Singh','email' => '2333@test.com'],
		['id' => 4, 'name' => 'Raj','email' => 'bbb@test.com']
    ]
];

	  $statement = $pdo->prepare("SELECT * FROM members ORDER BY id  ASC");
      $statement->execute();
      $members = $statement->fetchAll(PDO::FETCH_ASSOC);	

 $formattedData = [];
    foreach ($members as $member) {
        $formattedData[] = [
            'id' => $member['id'],
            'name' => $member['name'],
            'email' => $member['e_mail'] // Assuming `e_mail` is the field for email
        ];
    }




   $response1 = [
        'status' => 'success',
      'data' => $formattedData
    ];  

  /// echo json_encode($response1);

///print_r($response1);


// Handle the request method (GET, POST, PUT, DELETE)
$method = $_SERVER['REQUEST_METHOD'];

 
///echo json_encode($data ); 

// Handle GET requests (return data)
if ($method == 'GET') {
   /// echo json_encode($data);
  $inputData = json_decode(file_get_contents('php://input'), true);
    $id = $inputData['name'] ?? null;
	///echo json_encode($id );
	
	
///$id = isset($_GET['name']);
  
    if ($id) {
        // Search for the item with the given id
        $found = null;
     
		/*foreach ($data['data'] as $entry) {
            if ($entry['name'] == $id) {
                $found = $entry;
                break;
            }
        }
		*/
		
 $getuser = $pdo->prepare("SELECT * FROM members WHERE name=?");
	$getuser->execute(array($id));
	$found = $getuser->rowCount();
	$result_usr = $getuser->fetchAll(PDO::FETCH_ASSOC);
		
		
		
        if ($found) {
            // Return the found data as JSON
            echo json_encode(['status' => 'success', 'data' => $result_usr]);
        } else {
            // ID not found
            echo json_encode(['status' => 'error', 'message' => 'Data not found']);
        }
    } else {
        // Return all data if no id is specified
         echo json_encode(['status' => 'error', 'message' => 'Data not found']);
    }
   
   
}

// Handle POST requests (create new data)
elseif ($method == 'POST') {
    $inputData = json_decode(file_get_contents('php://input'), true);
    if (isset($inputData['name'])) {
        $newData = [
            'id' => count($data['data']) + 1, // Assign a new ID
            'name' => $inputData['name']
        ];
        $data['data'][] = $newData; // Add new data
        echo json_encode(['status' => 'success', 'message' => 'Data added successfully', 'data' => $newData]);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Name field is required']);
    }
}

// Handle PUT requests (update data)
elseif ($method == 'PUT') {
    $inputData = json_decode(file_get_contents('php://input'), true);
    $id = $inputData['id'] ?? null;
    $name = $inputData['name'] ?? null;

    if ($id && $name) {
        foreach ($data['data'] as &$entry) {
            if ($entry['id'] == $id) {
                $entry['name'] = $name;
                echo json_encode(['status' => 'success', 'message' => 'Data updated successfully', 'data' => $entry]);
                exit;
            }
        }
        echo json_encode(['status' => 'error', 'message' => 'Data not found']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'ID and name are required']);
    }
}

// Handle DELETE requests (delete data)
elseif ($method == 'DELETE') {
    $inputData = json_decode(file_get_contents('php://input'), true);
    $id = $inputData['id'] ?? null;

    if ($id) {
        foreach ($data['data'] as $key => $entry) {
            if ($entry['id'] == $id) {
                unset($data['data'][$key]); // Remove the data
                echo json_encode(['status' => 'success', 'message' => 'Data deleted successfully']);
                exit;
            }
        }
        echo json_encode(['status' => 'error', 'message' => 'Data not found']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'ID is required']);
    }
} else {
    // Handle unsupported methods
    echo json_encode(['status' => 'error', 'message' => 'Method not supported']);
}












?>
