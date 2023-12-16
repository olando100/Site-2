<?php 
$title = 'Success Post';
require_once 'includes/header.php';
require_once 'db/conn.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $dob = $_POST['dob'];
    $emai = $_POST['emai'];
    $specialty = $_POST['specialty'];
    $contact = $_POST['contactNumber'];

    $isSuccess = $crud->insert($fname, $lname, $dob, $emai, $specialty, $contact);

    if ($isSuccess) {
        echo '<h1 class="text-center text-success">You have been registered</h1>';
    } else {
        echo '<h1 class="text-center text-danger">Registration failed</h1>';
    }
}


?> 


<div class="card" style="width: 18rem;">
    <div class="card-body">

        <h5 class='card-title'>


        <?php echo $_POST['firstName'].''. $_POST['lastName']; ?>
        
        </h5>
        <h6 class = "card-subtitle mb-2 text-muted"> 
            <?php echo $_POST['specialty']; ?> </h6>

        <p class="card-text">
                Date of Birth: <?php echo $_POST['dob']; ?>
        </p>
        <p class="card-text">
                Email Address <?php echo $_POST['emai']; ?>
        </p>
        <p class="card-text">
                Contact Number <?php echo $_POST['contactNumber']; ?>
        </p>






    </div>



