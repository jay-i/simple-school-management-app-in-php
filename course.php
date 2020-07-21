<?php
    require_once 'config.php';

    class Courses extends Database{
        
         // Fetch All Courses
         public function get_course(){
            $sql = "SELECT * FROM courses";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
        }
    }


?>