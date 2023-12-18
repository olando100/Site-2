<?php 
$title ='index';   
require_once 'includes/header.php'; 
require_once 'db/conn.php'; 
$specialtyresults = $crud->getSpecialties();
?> 


<h1 class="text-center">Registration for IT Conference</h1>

<form action="successpost.php" method="POST">
        
    <label for="firstName">First Name:</label>
    <input type="text" class="form-control" id="firstName" name="firstName" required><br>
    

    <label for="lastName">Last Name:</label>
    <input type="text" class="form-control" id="lastName" name="lastName" required><br>
    

    <label for="dob">Date of Birth:</label>
    <input type="date" class="form-control" id="dob" name="dob" required><br>
    

    <label for="specialty">Specialty:</label>
    <select id="specialty" name="specialty" class="form-control" required>
    <?php while($r = $specialtyresults->fetch(PDO::FETCH_ASSOC)){ ?>
                <option value ="<?php echo $r['specialty_id'] ?>"><?php echo $r['name'];?></option>
                <?php } ?>
            
   


    </select><br>
    

    <label for="email">Email Address:</label>
    <input type="email" class="form-control" id="email" name="emai" aria-describedby="emailHelp" placeholder="Enter email" required>
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> <br>
    

    <label for="contactNumber">Contact Number:</label>
    <input type="tel" class="form-control" id="contactNumber" name="contactNumber" required><br>
    
    <div class="text-center d-grid container mt-5">
        <button type="submit" name="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

<?php require_once 'includes/footer.php'; ?>
