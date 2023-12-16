<?php 
    $title = 'View Record';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    if(!isset($_GET['applicantid'])){

        include 'includes/errormessage.php'; 
    }
    else{

        $id = $_GET['applicantid'];
        $result = $crud->getattendee();
   
?>

<div class="card">
            <div class="card-body">
            <h5 class="card-title"> 
                <?php echo $result['firstname'] . " " . $result['lastname']; ?>
                </h5>
            <h6 class="card-subtitle mb-2 text-muted">
                <?php echo $result['specialty'];?></h6>

            <p class="card-text"> Date of Birth: 
                <?php echo  $result['dob'];?></p>
            
                
            <p class="card-text"> Contact Number: 
                <?php echo  $result['contactNumber'];?></p>

            <p class="card-text"> Email Address: 
                <?php echo  $result['emai'];?></p>
            
            </div>
            </div>
            <br/>
                <a href ="view.php" class="btn btn-info">Back to List</a>
                <a href ="edit.php?attendeeid=<?php echo $result['attendee_id'] ?>" class="btn btn-primary">Edit</a>
                <a onclick="return confirm('Are you sure you want to delete record?');"
                href ="delete.php?attendeeid=<?php echo $result['attendee_id'] ?>" class="btn btn-danger">Delete</a>
                
            <?php }?>

    <br>
    <br>
    <br>

<?php require_once 'includes/footer.php'; ?>