<?php
class crud {
    private $db;

    function __construct($conn) {
        $this->db = $conn;
    }

    // Insert a new attendee
    public function insert($firstName, $lastName, $dob, $emai, $specialty, $contactNumber) {
        try {
            $sql = "INSERT INTO attendee (first_name, last_name, dateofbirth, emai, specialty_id, contact_number) VALUES (:fname, :lname, :dob, :emai, :specialty, :contact)";
            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':fname', $firstName);
            $stmt->bindParam(':lname', $lastName);
            $stmt->bindParam(':dob', $dob);
            $stmt->bindParam(':emai', $emai);
            $stmt->bindParam(':specialty', $specialty);
            $stmt->bindParam(':contact', $contactNumber);

            $stmt->execute();
            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function edit($id, $firstName, $lastName, $dob, $emai, $specialty, $contactNumber) {
        try {
            $sql = "UPDATE attendee SET first_name = :fname, last_name = :lname, dateofbirth = :dob, emai = :emai, specialty_id = :specialty, contact_number = :contact WHERE attendee_id = :attendeeid";

            $stmt = $this->db->prepare($sql);
            $stmt->bindParam(':fname', $firstName);
            $stmt->bindParam(':lname', $lastName);
            $stmt->bindParam(':dob', $dob);
            $stmt->bindParam(':emai', $emai);
            $stmt->bindParam(':specialty', $specialty);
            $stmt->bindParam(':contact', $contactNumber);
            $stmt->bindParam(':attendeeid', $id);

            $stmt->execute();
            return true;

        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }

    public function getAttendee() {
        try {
            $sql = "SELECT * FROM `attendee` a INNER JOIN specialty o ON a.specialty_id = o.specialty_id";
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
            $sql = "SELECT * FROM `specialty`";
            $result = $this->db->query($sql);
            return $result;
        } catch (PDOException $e) {
            echo $e->getMessage();
            return false;
        }
    }
}
?>
