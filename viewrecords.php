<?php 
$title = 'View Applications';   
require_once 'includes/header.php'; 
require_once 'db/conn.php'; 

// Fetch all records from the database
$attendees = $crud->getAttendee();
?>

<h1 class="text-center">Attendee Records</h1>

<div class="container mt-4">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Date of Birth</th>
                <th>Email</th>
                <th>Contact Number</th>
                <th>Specialty</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($attendees as $attendee) { ?>
                <tr>
                    <td><?php echo htmlspecialchars($attendee['attendee_id']); ?></td>
                    <td><?php echo htmlspecialchars($attendee['first_name']); ?></td>
                    <td><?php echo htmlspecialchars($attendee['last_name']); ?></td>
                    <td><?php echo htmlspecialchars($attendee['dateofbirth']); ?></td>
                    <td><?php echo htmlspecialchars($attendee['emai']); ?></td>
                    <td><?php echo htmlspecialchars($attendee['contact_number']); ?></td>
                    <td><?php echo htmlspecialchars($attendee['specialty']); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php require_once 'includes/footer.php'; ?>