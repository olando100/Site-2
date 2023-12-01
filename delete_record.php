<?php 
$title = 'Delete Record';   
require_once 'includes/header.php'; 
require_once 'db/conn.php'; 

// Check if an ID is provided
if(isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Optionally, fetch details for confirmation message
    $attendee = $crud->getAttendeeDetails($id);

    // Check if the form has been submitted
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Delete record
        $isDeleted = $crud->delete($id);

        if($isDeleted) {
            // Redirect after successful deletion
            header('Location: view_records.php');
            exit;
        } else {
            echo '<div class="alert alert-danger">Error deleting record</div>';
        }
    }
} else {
    echo '<div class="alert alert-danger">No ID provided</div>';
    require_once 'includes/footer.php'; 
    exit;
}

?>

<h1 class="text-center">Delete Record</h1>

<div class="container mt-4">
    <h3>Are you sure you want to delete this record?</h3>
    <!-- Display details of the record for confirmation -->
    <p>Name: <?php echo htmlspecialchars($attendee['first_name'] . ' ' . $attendee['last_name']); ?></p>
    <!-- Add more details if necessary -->

    <form action="delete_record.php?id=<?php echo htmlspecialchars($id); ?>" method="POST">
        <input type="hidden" name="id" value="<?php echo htmlspecialchars($id); ?>">
        <button type="submit" class="btn btn-danger">Delete</button>
        <a href="view_records.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>

<?php require_once 'includes/footer.php'; ?>
