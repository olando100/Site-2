<?php 
$title = 'Update Record';   
require_once 'includes/header.php'; 
require_once 'db/conn.php'; 

// Check if an ID is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $attendee = $crud->getAttendee();

    if(!$attendee) {
        // Redirect to another page or display an error if the ID is not found
        echo "Record not found";
        exit;
    }
} else {
    // Redirect to another page or display an error if the ID is not provided
    echo "No ID provided";
    exit;
}

// Check if the form has been submitted
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
    // Collect form data
    $id = $_POST['id'];
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $dob = $_POST['dob'];
    $emai = $_POST['emai'];
    $specialty = $_POST['specialty'];
    $contact = $_POST['contactNumber'];
    
    // Call the update method
    $isUpdated = $crud->edit($id, $firstName, $lastName, $dob, $emai, $specialty, $contactNumber) ;

    if($isUpdated) {
        // Redirect after successful update
        header('Location: view.php');
        exit;
    } else {
        echo '<div class="alert alert-danger">Error updating record</div>';
    }
}
?>

<h1 class="text-center">Update Record</h1>

<div class="container mt-4">
    <form action="update_record.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']; ?>">

        <div class="mb-3">
            <label for="firstName" class="form-label">First Name:</label>
            <input type="text" class="form-control" id="firstName" name="firstName" value="<?php echo $attendee['first_name']; ?>" required>
        </div>
        <button type="submit" name="submit" class="btn btn-primary">Update</button>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>
