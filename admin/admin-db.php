<?php

require_once 'config.php';

class Admin extends Database{
    // Admin login
    public function admin_login($username, $password){
        $sql = "SELECT username, password FROM admin WHERE username = :username AND password = :password";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['username'=>$username, 'password'=>$password]);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        return $row;
    }

    // Count Total No. of Rows
    public function totalCount($tablename){
        $sql = "SELECT * FROM $tablename";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $count = $stmt->rowCount();

        return $count;
    }

    // Fetch All Registered Users(students)
    public function fetchAllUsers($val){
        $sql = "SELECT * FROM students WHERE deleted != $val";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }

     // Add New Course
     public function add_new_course($courseCode,$courseName,$courseUnit){
        $sql = "INSERT INTO courses (courseCode, courseName, courseUnit) VALUES (:courseCode, :courseName, :courseUnit)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['courseCode'=>$courseCode,'courseName'=>$courseName,'courseUnit'=>$courseUnit]); 
         
        return true;
    }

    // Fetch All Courses
    public function get_course(){
        $sql = "SELECT * FROM courses";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

//////////////////////////// Department  ////////////////////////////////

    // Add New Department
    public function add_new_department($dept_name){
        $sql = "INSERT INTO department (dept_name) VALUES (:dept_name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['dept_name'=>$dept_name]); 
         
        return true;
    }

    // Fetch All Courses
    public function get_department(){
        $sql = "SELECT * FROM department";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    //////////////////////////// Level  ////////////////////////////////

    // Add New Department
    public function add_new_level($level_name){
        $sql = "INSERT INTO level (level_name) VALUES (:level_name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['level_name'=>$level_name]); 
         
        return true;
    }

    // Fetch All Courses
    public function get_level(){
        $sql = "SELECT * FROM level";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    //////////////////////////// Level  ////////////////////////////////

    // Add New Semester
    public function add_new_semester($semester_name){
        $sql = "INSERT INTO semester (semester_name) VALUES (:semester_name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['semester_name'=>$semester_name]); 
         
        return true;
    }

    // Fetch All Courses
    public function get_semester(){
        $sql = "SELECT * FROM semester";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

     //////////////////////////// Session  ////////////////////////////////

    // Add New Semester
    public function add_new_session($session_name){
        $sql = "INSERT INTO session (session_name) VALUES (:session_name)";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute(['session_name'=>$session_name]); 
         
        return true;
    }

    // Fetch All Courses
    public function get_session(){
        $sql = "SELECT * FROM session";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}

?>