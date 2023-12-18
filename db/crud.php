<?php
class crud {
    private $db;

    function __construct($conn) {
        $this->db = $conn;
    }

    // Insert a new attendee
    public function insertAttendees($fname, $lname, $dob, $email,$contact,$specialty){
        try {
            // define sql statement to be executed
            $sql = "INSERT INTO attendee (firstname,lastname,dateofbirth,emailaddress,contactnumber,specialty_id,avatar_path) VALUES (:fname,:lname,:dob,:email,:contact)";
            //prepare the sql statement for execution
            $stmt = $this->db->prepare($sql);
            // bind all placeholders to the actual values
            $stmt->bindparam(':fname',$fname);
            $stmt->bindparam(':lname',$lname);
            $stmt->bindparam(':dob',$dob);
            $stmt->bindparam(':email',$email);
            $stmt->bindparam(':contact',$contact);
            $stmt->bindparam(':specialty',$specialty);
           

            // execute statement
            $stmt->execute();
            return true;
    
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function editAttendee($id,$fname, $lname, $dob, $email,$contact,$specialty){
        try{ 
             $sql = "UPDATE `attendee` SET `firstname`=:fname,`lastname`=:lname,`dateofbirth`=:dob,`emailaddress`=:email,`contactnumber`=:contact,`specialty_id`=:specialty WHERE attendee_id = :id ";
             $stmt = $this->db->prepare($sql);
             // bind all placeholders to the actual values
             $stmt->bindparam(':id',$id);
             $stmt->bindparam(':fname',$fname);
             $stmt->bindparam(':lname',$lname);
             $stmt->bindparam(':dob',$dob);
             $stmt->bindparam(':email',$email);
             $stmt->bindparam(':contact',$contact);
             $stmt->bindparam(':specialty',$specialty);

             // execute statement
             $stmt->execute();
             return true;
        }catch (PDOException $e) {
         echo $e->getMessage();
         return false;
        }
         
     }

    public function getAttendeeDetails($id){
        try{
             $sql = "select * from attendee a inner join specialties s on a.specialty_id = s.specialty_id 
             where attendee_id = :id";
             $stmt = $this->db->prepare($sql);
             $stmt->bindparam(':id', $id);
             $stmt->execute();
             $result = $stmt->fetch();
             return $result;
        }catch (PDOException $e) {
             echo $e->getMessage();
             return false;
         }
     }

    public function getAttendee() {
        try {
            $sql = "SELECT * FROM `attendee` a INNER JOIN specialties o ON a.specialty_id = o.specialty_id";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendeeById($id) {
        try {
            $sql = "SELECT a.attendee_id, a.first_name, a.last_name, a.dateofbirth, a.emai, a.contact_number, o.specialty_name FROM attendee a INNER JOIN specialty o ON a.specialty_id = o.specialty_id WHERE attendee_id = :attendeeid";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':attendeeid', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function deleteAttendee($id) {
        try {
            $sql = "DELETE FROM attendee WHERE attendee_id = :attendeeid";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':attendeeid', $id);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendees() {
        try {
            $sql = "SELECT * FROM `attendee`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getSpecialties() {
        try {
            $sql = "SELECT * FROM `specialties`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
//sir 

    public function getSpecialtyById($id){
        try{
            $sql = "SELECT * FROM `specialties` where specialty_id = :id";
            $stmt = $this->db->prepare($sql);
            $stmt->bindparam(':id', $id);
            $stmt->execute();
            $result = $stmt->fetch();
            return $result;
        }catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
        
    }
}




?>
