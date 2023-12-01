<?php 
$title = 'Update Record';   
require_once 'includes/header.php'; 
require_once 'db/conn.php'; 

// Check if an ID is provided
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $attendee = $crud->getAttendeeDetails($id);
} else {
    // Redirect to another page or display an error if the ID is not provided
    echo "No ID provided";
    exit;
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

    <!-- Add other fields similar to the above -->

    <button type="submit" name="submit" class="btn btn-primary">Update</button>
</form>
</div>

<?php require_once 'includes/footer.php'; ?>
