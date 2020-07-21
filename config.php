<?php

    class Database {
        private $dsn = "mysql:host=localhost; dbname=sms";
        private $dbuser = "root";
        private $dbpass = "";

        public $conn;

        public function __construct()
        {
            try{
                $this->conn = new PDO($this->dsn,$this->dbuser,$this->dbpass);
            }catch (PDOException $e){
                echo 'Error : ' .$e->getMessage();
            }

            return $this->conn;
        }

        // check input
        public function check_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        // Error Success Message Alert
        public function showMessage($type, $message){
            return '<div class="alert alert-'.$type.' alert-dismissible">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <strong class="text-center">'.$message.'</strong>
                    </div>';
        }

        //     // Add New Course
        // public function add_new_course($courseCode,$courseName,$courseUnit){
        //     $sql = "INSERT INTO courses (courseCode, courseName, courseUnit) VALUES (:courseCode, :courseName, :courseUnit)";
        //     $stmt = $this->conn->prepare($sql);
        //     $stmt->execute(['courseCode'=>$courseCode,'courseName'=>$courseName,'courseUnit'=>$courseUnit]); 
            
        //     return true;
        // }

        // // Fetch All Courses
        // public function get_course(){
        //     $sql = "SELECT * FROM courses";
        //     $stmt = $this->conn->prepare($sql);
        //     $stmt->execute();

        //     $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //     return $result;
        // }
    }
?>