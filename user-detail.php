<?php
// Include necessary files
include('header.php');
include('sidebar.php');
if (isset($_GET['id'])) {
    $user_id = $_GET['id'];

 
    $statement = $pdo->prepare("SELECT * FROM tbl_user_1 WHERE usr_id = :id");
    $statement->bindParam(':id', $user_id, PDO::PARAM_INT);
    $statement->execute();

  
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    if ($user) {
       
        $user_name = $user['user_name'];
        $emailid = $user['regisid'];
		$company = $user['company'];
		$street = $user['street'];
		$postcode = $user['postcode'];
		$city = $user['city'];
		$phone = $user['phone'];
        $registered = date('d M y', $user['registered']);
       

    } else {
        echo "User not found.";
    }
} else {
    echo "No user ID provided.";
}

?>


<div class="page-body">
    
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card card-table">
                    <div class="card-body">
                        <div class="title-header option-title">
                            <h5>User Details</h5>
                            <a href="all-users.php" class="btn btn-theme d-flex">
                                <i data-feather="arrow-left"></i>Back to All Users
                            </a>
                        </div>

                        <!-- Display User Details -->
                        <div class="user-details">
                            <p><strong>Name:</strong> <?php echo $user_name ; ?></p>
                            <p><strong>Email:</strong> <?php echo $emailid ; ?></p>
							<p><strong>Compny:</strong> <?php echo $company ; ?></p>
							<p><strong>Street:</strong> <?php echo $street ; ?></p>
							<p><strong>Postcode:</strong> <?php echo $postcode ; ?></p>
							<p><strong>City:</strong> <?php echo $city  ; ?></p>
							<p><strong>Phone:</strong> <?php echo $phone ; ?></p>
							
                            <p><strong>Registered on:</strong> <?php echo $registered; ?></p>
                           
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</div>


<?php

include('footer.php');
?>
