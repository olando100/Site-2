<?php   
class crud {      
    private $db;

    function __construct($conn) {    
        $this->db = $conn;  
    }
    
    // Insert a new attendee
    public function insert($firstName, $lastName, $dob, $emai, $contactNumber, $specialty) {
        try {
            $sql = "INSERT INTO attendee (first_name, last_name, dateofbirth, emai, contact_number, specialty) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$firstName, $lastName, $dob, $emai, $contactNumber, $specialty]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    // Read all attendees
    public function readAll() {
        try {
            $sql = "SELECT * FROM attendee";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    // Update an attendee
    public function update($id, $firstName, $lastName, $dob, $emai, $contactNumber, $specialty) {
        try {
            $sql = "UPDATE attendee SET first_name = ?, last_name = ?, dateofbirth = ?, emai = ?, contact_number = ?, specialty = ? WHERE attendee_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$firstName, $lastName, $dob, $emai, $contactNumber, $specialty, $id]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    // Delete an attendee
    public function delete($id) {
        try {
            $sql = "DELETE FROM attendee WHERE attendee_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    // Get details of an attendee
    public function getAttendeeDetails($id) {
        try {
            $sql = "SELECT * FROM attendee WHERE attendee_id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}

?>
