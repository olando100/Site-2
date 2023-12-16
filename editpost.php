<?php 
   
    require_once 'db/conn.php';

    if (isset($_POST['submit'])){

        $fname = $_POST['firstName'];
        $lname = $_POST['lastName'];
        $dob = $_POST['dob'];
        $emai = $_POST['emai'];
        $specialty = $_POST['specialty'];
        $contact = $_POST['contactNumber'];
        
        $result =$crud->edit($id, $firstName, $lastName, $dob, $emai, $specialty, $contactNumber);

        if($result){
            header("Location: viewrecords.php");
    }else{
        include 'includes/errormessage.php';
    }
    }
    else{
        include 'includes/errormessage.php';
    }
?>