<?php 
$title = 'Success Post';   
require_once 'includes/header.php'; 
require_once 'db/conn.php'; 

$isSuccess = false;
$operationPerformed = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    
    $firstName = htmlspecialchars($_POST['firstName'] ?? '');
    $lastName = htmlspecialchars($_POST['lastName'] ?? '');
    $dob = htmlspecialchars($_POST['dob'] ?? '');
    $specialty = htmlspecialchars($_POST['specialty'] ?? ''); // This should be the specialty ID
    $emai = htmlspecialchars($_POST['emai'] ?? '');
    $contactNumber = htmlspecialchars($_POST['contactNumber'] ?? '');
    $id = htmlspecialchars($_POST['id'] ?? ''); // For update and delete

    if (isset($_POST['submit'])) {
        // Insert data into the database
        $isSuccess = $crud->insert($firstName, $lastName, $dob, $emai, $contactNumber, $specialty);
        $operationPerformed = 'insert';
    } elseif (isset($_POST['update'])) {
        // Perform the update operation
        $isSuccess = $crud->update($id, $firstName, $lastName, $dob, $emai, $contactNumber, $specialty);
        $operationPerformed = 'update';
    } elseif (isset($_POST['delete'])) {
        // Perform the delete operation
        $isSuccess = $crud->delete($id);
        $operationPerformed = 'delete';
    }
}

// Display success or error messages based on the operation
if($operationPerformed == 'insert' && $isSuccess) { 
    echo '<h1 class="text-center mb-4">Congratulations! Record Added Successfully</h1>';
} elseif ($operationPerformed == 'update' && $isSuccess) {
    echo '<h1 class="text-center mb-4">Update Successful!</h1>';
} elseif ($operationPerformed == 'delete' && $isSuccess) {
    echo '<h1 class="text-center mb-4">Delete Successful!</h1>';
} else {
    echo '<h1 class="text-center mb-4">Error! There was a problem with your operation.</h1>';
    echo '<div class="text-center"><a href="index.php" class="btn btn-primary">Go Back</a></div>';
}

$attendees = $crud->readAll();

require_once 'includes/footer.php'; 

?>
