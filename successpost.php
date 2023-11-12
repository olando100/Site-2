<?php 
$title = 'Success Post';   
require_once 'includes/header.php'; 
require_once 'db/conn.php'; 
require_once 'crud.php';

$isSuccess = false;
$operationPerformed = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Common sanitization for all operations
    $firstName = htmlspecialchars($_POST['firstName'] ?? '');
    $lastName = htmlspecialchars($_POST['lastName'] ?? '');
    $dob = htmlspecialchars($_POST['dob'] ?? '');
    $specialty = htmlspecialchars($_POST['specialty'] ?? '');
    $email = htmlspecialchars($_POST['email'] ?? '');
    $contactNumber = htmlspecialchars($_POST['contactNumber'] ?? '');
    $id = htmlspecialchars($_POST['id'] ?? ''); // For update and delete

    if (isset($_POST['submit'])) {
        // Insert data into the database
        $isSuccess = $crud->insert($firstName, $lastName, $dob, $specialty, $email, $contactNumber);
        $operationPerformed = 'insert';
    } elseif (isset($_POST['update'])) {
        // Perform the update operation
        $isSuccess = $crud->update($id, $firstName, $lastName, $dob, $specialty, $email, $contactNumber);
        $operationPerformed = 'update';
    } elseif (isset($_POST['delete'])) {
        // Perform the delete operation
        $isSuccess = $crud->delete($id);
        $operationPerformed = 'delete';
    }
}

// Display success or error messages based on the operation
if($operationPerformed == 'insert' && $isSuccess) { 
    echo '<h1 class="text-center mb-4">Congratulations!</h1>';
    // Display success card
    // ...
} elseif ($operationPerformed == 'update' && $isSuccess) {
    echo '<h1 class="text-center mb-4">Update Successful!</h1>';
    // Display update success message
} elseif ($operationPerformed == 'delete' && $isSuccess) {
    echo '<h1 class="text-center mb-4">Delete Successful!</h1>';
    // Display delete success message
} else {
    echo '<h1 class="text-center mb-4">Error! There was a problem with your operation.</h1>';
    echo '<div class="text-center"><a href="index.php" class="btn btn-primary">Go Back</a></div>';
}

// Fetch all records to display
$attendees = $crud->readAll();

require_once 'includes/footer.php'; 
?>
