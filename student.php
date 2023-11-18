<?php
include_once("db.php"); // Include the file with the Database class

class Student {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function create($data) {
        try {
            // Prepare the SQL INSERT statement
            $sql = "INSERT INTO students(student_number, first_name, middle_name, last_name, gender, birthday) VALUES(:student_number, :first_name, :middle_name, :last_name, :gender, :birthday);";
            $stmt = $this->db->getConnection()->prepare($sql);
    
            // Bind values to placeholders
            $stmt->bindParam(':student_number', $data['student_number']);
            $stmt->bindParam(':first_name', $data['first_name']);
            $stmt->bindParam(':middle_name', $data['middle_name']);
            $stmt->bindParam(':last_name', $data['last_name']);
            $stmt->bindParam(':gender', $data['gender']);
            $stmt->bindParam(':birthday', $data['birthday']);
    
            // Execute the INSERT query
            $success = $stmt->execute();
    
            // Check if the insert was successful
            if ($success) {
                // Return the last inserted ID only if the statement was successfully executed
                return $this->db->getConnection()->lastInsertId();
            } else {
                return null; // Return null if the insert was not successful
            }
        } catch (PDOException $e) {
            // Handle any potential errors here
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }

    public function read($id) {
        try {
            $connection = $this->db->getConnection();
            $sql = "SELECT * FROM students WHERE id = :id";
            $stmt = $connection->prepare($sql);
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            // Fetch the student data as an associative array
            $studentData = $stmt->fetch(PDO::FETCH_ASSOC);

            return $studentData;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }

    public function update($id, $data) {
        try {
            $sql = "UPDATE students SET
                    student_number = :student_number,
                    first_name = :first_name,
                    middle_name = :middle_name,
                    last_name = :last_name,
                    gender = :gender,
                    birthday = :birthday
                    WHERE id = :id";
    
            $stmt = $this->db->getConnection()->prepare($sql);
    
            // Bind parameters
            $stmt->bindValue(':student_number', $data['student_number']);
            $stmt->bindValue(':first_name', $data['first_name']);
            $stmt->bindValue(':middle_name', $data['middle_name']);
            $stmt->bindValue(':last_name', $data['last_name']);
            $stmt->bindValue(':gender', $data['gender']);
            $stmt->bindValue(':birthday', $data['birthday']);
           
    
            // Execute the query
            $stmt->execute();
    
            return $stmt->rowCount() > 0;
        } catch (PDOException $e) {
            // Handle any potential errors here
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }

    public function delete($id) {
        try {
            $this->db->getConnection()->beginTransaction();
    
            $detailSql = "DELETE FROM student_details WHERE student_id = :id";
            $detailStmt = $this->db->getConnection()->prepare($detailSql);
            $detailStmt->bindValue(':id', $id);
            $detailStmt->execute(); 
    
           
            $studentSql = "DELETE FROM students WHERE id = :id";
            $studentStmt = $this->db->getConnection()->prepare($studentSql);
            $studentStmt->bindValue(':id', $id);
            $studentStmt->execute();
    
            
            $this->db->getConnection()->commit();
    
           
            if ($studentStmt->rowCount() > 0) {
                return true; // Record deleted successfully
            } else {
                return false; 
            }
        } catch (PDOException $e) {
           
            $this->db->getConnection()->rollBack();
            echo "Error: " . $e->getMessage();
            throw $e; 
        }
    }
    

    public function displayAll(){
        try {
            $sql = "SELECT * FROM students LIMIT 100"; // Modify the table name to match your database
            $stmt = $this->db->getConnection()->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
        } catch (PDOException $e) {
            // Handle any potential errors here
            echo "Error: " . $e->getMessage();
            throw $e; // Re-throw the exception for higher-level handling
        }
    }
}
 

?>