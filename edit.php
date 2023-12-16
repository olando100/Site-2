<?php 
    $title = 'Edit';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $occupationresults =$crud -> getSpecialties();
       
    if(!isset($_GET['attendeeid'])){
       // echo "<h1 class ='text-danger'> Please check details </h1>"; 
       include 'includes/errormessage.php';
      
    }
    else{
        $id = $_GET['attendeeid'];
        $result = $crud->getAttendee();       
?>

    <h1 class = "text-center" >Edit Attendee</h1>

    <form method ="post" action = "editpost.php">
        <input type="hidden" name="attendeeid" value="<?php echo $result['attendee_id'] ?>" />
        <div class="form-group">
            <label for="FirstName">First Name</label>
            <input type="text" class="form-control" value ="<?php echo $result['firstname'] ?>" id="FirstName" name ="FirstName">
            <small id="FNameHelp" class="form-text text-muted">Please enter your first name.</small>
        </div>

        <div class="form-group">
        <label for="LastName">Last Name</label>
            <input type="text" class="form-control" value =" <?php echo $result['lastname'] ?> " id="LastName" name="LastName">
            <small id="LNameHelp" class="form-text text-muted">Please enter your last name.</small>
        </div>

        <div class="form-group">
            <label for="dob">Date of Birth</label>
            <input type="text" class="form-control" value ="<?php echo $result['dateofbirth'] ?>" id="dob" name="dob">
            <small id="dateofbirthHelp" class="form-text text-muted">Please enter your date of birth.</small>
        </div>

        <div class="form-group">
            <label for="Email1">Email address</label>
            <input type="email" class="form-control" value ="<?php echo $result['email'] ?> "id="Email1" 
            aria-describedby="emailHelp" placeholder="Enter email" name="Email1">
            <small id="emailHelp" class="form-text text-muted">Please enter your email address.</small>
        </div>

        <div class="form-group">
            <label for="contactnumber">Contact Number</label>
            <input type="text" class="form-control" value ="<?php echo $result['contactNumber'] ?>" id="contactNumber" name="contactNumber">
            <small id="contactHelp" class="form-text text-muted">Please enter your contact number.</small>
        </div>

        <div class="form-group">
            <label for="speciality">Speciality</label>
            <select class="form-control" id="speciality" name="speciality">
            <?php while($r = $specialityresults->fetch(PDO::FETCH_ASSOC)){ ?>
                <option value ="<?php echo $r['speciality_id']?>"
                <?php if ($r['speciality'] == $result['speciality']) echo 'selected' ?>>
                <?php echo $r['speciality'];?>
                </option>
                <?php } ?>
    </select>
            <small id="speciality" class="form-text text-muted">Please select your speciality.</small>
        </div>
        <a href ="viewrecords.php" class="btn btn-default">Back to List</a>
        <button type="submit" name = "submit" class="btn btn-success btn">Save Changes</button>
      
    </form>

    <?php } ?>
       <br>
       <br>
       <br>

<?php require_once 'includes/footer.php'; ?>