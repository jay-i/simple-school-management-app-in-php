<?php

    require_once 'config.php';

    class Auth extends Database {

        // Register User
        public function register($surname, $email, $password){
            $sql = "INSERT INTO students (surname, email, password) VALUES (:surname, :email, :password)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['surname'=>$surname, 'email'=>$email, 'password'=>$password]);
            
            return true;
        }

        // Check if user already exist
        public function user_exist($email){
            $sql = "SELECT email FROM students WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $result = $stmt->fetch(PDO::FETCH_ASSOC);

            return $result;
        }

        // Login existing User
        public function login($email){
            $sql = "SELECT email, password FROM students WHERE email = :email AND deleted != 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        } 

        // Current User in session
        public function currentUser($email){
            $sql = "SELECT * FROM students WHERE email = :email AND deleted != 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['email'=>$email]);
            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            return $row;
        }

        // Update Profile 
        public function update_profile($surname,$name,$phone,$dob,$photo,$gender,$id){
            $sql = "UPDATE students SET surname = :surname, name = :name, phone = :phone, dob = :dob,  photo = :photo, gender = :gender WHERE id = :id AND deleted != 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['surname'=>$surname,'name'=>$name, 'phone'=>$phone,'dob'=>$dob, 'gender'=>$gender, 'photo'=>$photo, 'id'=>$id]);

            return true;
        }

        // Change Password of a User
        public function change_password($pass,$id){
            $sql = "UPDATE students SET password = :pass WHERE id = :id AND deleted != 0";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute(['pass'=>$pass, 'id'=>$id]);

            return true;
        }

        // Fetch All Student Detail
        public function fetchAllStudentDetail(){
            $sql = "SELECT courses.id, courses.courseCode, courses.courseName, courses.courseUnit, courses.created_at, students.surname, students.reg_number, students.name FROM courses INNER JOIN students ON courses.reg_number = student.id";
    
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            return $result;
    
        }

    }

?>