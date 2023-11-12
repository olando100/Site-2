<?php   

class crud {      

    private $db;

    function __construct($conn) {    
        $this->db = $conn;  
    }
    
    public function insert($firstName, $lastName, $dob, $email, $contactNumber, $specialty) {
        try {
            $sql = "INSERT INTO attendees (first_name, last_name, date_of_birth, email, contact_number, specialty) VALUES (?, ?, ?, ?, ?, ?)";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$firstName, $lastName, $dob, $email, $contactNumber, $specialty]);
            return true;
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function readAll() {
        try {
            $sql = "SELECT * FROM attendees";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return [];
        }
    }

    public function update($id, $firstName, $lastName, $dob, $email, $contactNumber, $specialty) {
        try {
            $sql = "UPDATE attendees SET first_name = ?, last_name = ?, date_of_birth = ?, email = ?, contact_number = ?, specialty = ? WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$firstName, $lastName, $dob, $email, $contactNumber, $specialty, $id]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }

    public function delete($id) {
        try {
            $sql = "DELETE FROM attendees WHERE id = ?";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([$id]);
            return $stmt->rowCount();
        } catch (PDOException $e) {
            error_log($e->getMessage());
            return false;
        }
    }
}


?>
