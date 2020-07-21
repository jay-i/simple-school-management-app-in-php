<?php

require_once 'admin-db.php';
$admin = new Admin();
session_start();

// Handle Admin login
if(isset($_POST['action']) && $_POST['action'] == 'adminLogin'){
    //echo print_r($_POST);
    $username = $admin->check_input($_POST['username']);
    $password = $admin->check_input($_POST['password']);

    $hashpassword = sha1($password);

    $loggedInAdmin = $admin->admin_login($username,$hashpassword);

    if($loggedInAdmin != null){
        echo 'admin_login';
        $_SESSION['username'] = $username;
    }
    else {
        echo $admin->showMessage('danger', 'Username or Password is Incorrect!');
    }
}

// Handle Fetch All Users ajax request
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllUsers'){
    $output = '';
    $data = $admin->fetchAllUsers(0);
    $path = '/';

    if($data){
        $output .= '<table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Photo</th>
                        <th>Reg. Number</th>
                        <th>Surname</th>
                        <th>Name</th>
                        <th>E-Mail</th>
                        <th>Phone</th>
                        <th>Date of Birth</th>
                        <th>Gender</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';
            foreach($data as $row) {
                if($row['photo'] !=''){
                    $uphoto = $path.$row['photo'];
                }
                else{
                    $uphoto = '../img/avatar5.png';
                }
                $output .= '<tr>
                             <td>'.$row['id'].'</td>
                             <td><img src="'.$uphoto.'" class="rounded-circle" width="40px"></td>
                             <td>'.$row['reg_number'].'</td>
                             <td>'.$row['surname'].'</td>
                             <td>'.$row['name'].'</td>
                             <td>'.$row['email'].'</td>
                             <td>'.$row['phone'].'</td>
                             <td>'.$row['dob'].'</td>
                             <td>'.$row['gender'].'</td>
                             
                             <td>
                                <a href="#" id="'.$row['id'].'" title="View Details" class="btn btn-primary btn-sm">View Details</a>&nbsp;&nbsp;
                                <a href="#" id="'.$row['id'].'" title="Edit Student" class="btn btn-info btn-sm">Edit</a>&nbsp;&nbsp;
                                <a href="#" id="'.$row['id'].'" title="Delete Student" class="btn btn-danger btn-sm">Delete</a>&nbsp;&nbsp;
                             </td>
                            </tr>';
            }
                $output .=' </tbody>
                        </table>';
           echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( No any student registered yet!</h3>';
    }
}

// Handle Add New Course
if(isset($_POST['action']) && $_POST['action'] == 'add_course'){
    // print_r($_POST);
    $courseCode = $admin->check_input($_POST['courseCode']);
    $courseName = $admin->check_input($_POST['courseName']);
    $courseUnit = $admin->check_input($_POST['courseUnit']);

    $admin->add_new_course($courseCode, $courseName, $courseUnit);
}


// Display All Courses
if(isset($_POST['action']) && $_POST['action'] == 'display_courses'){
    $output = '';
    $courses = $admin->get_course(0);


    if($courses){
        $output .= '<table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Course Unit</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';
            foreach($courses as $row) {
               
                $output .= '<tr>
                             <td>'.$row['id'].'</td>
                             <td>'.$row['courseCode'].'</td>
                             <td>'.$row['courseName'].'</td>
                             <td>'.$row['courseUnit'].'</td>
                             
                             <td>
                                <a href="#" id="'.$row['id'].'" title="View Student" class="btn btn-primary btn-sm">View</a>&nbsp;&nbsp;
                                <a href="#" id="'.$row['id'].'" title="Edit Student" class="btn btn-info btn-sm editBtn">Edit</a>&nbsp;&nbsp;
                                <a href="#" id="'.$row['id'].'" title="Delete Student" class="btn btn-danger btn-sm">Delete</a>&nbsp;&nbsp;
                             </td>
                            </tr>';
            }
                $output .=' </tbody>
                        </table>';
           echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( No Course Available!</h3>';
    }
}

//////////////////////////////////////  Department  /////////////////////////////////////////


// Handle Add New Department
if(isset($_POST['action']) && $_POST['action'] == 'add_department'){
    // print_r($_POST);
    $dept_name = $admin->check_input($_POST['dept_name']);
   
    $admin->add_new_department($dept_name);
}


// Display All departments
if(isset($_POST['action']) && $_POST['action'] == 'display_department'){
    $output = '';
    $departments = $admin->get_department(0);


    if($departments){
        $output .= '<table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Department</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';
            foreach($departments as $row) {
               
                $output .= '<tr>
                             <td>'.$row['id'].'</td>
                             <td>'.$row['dept_name'].'</td>
                             
                             <td>
                                <a href="#" id="'.$row['id'].'" title="View Student" class="btn btn-primary btn-sm">View</a>&nbsp;&nbsp;
                                <a href="#" id="'.$row['id'].'" title="Edit Student" class="btn btn-info btn-sm editBtn">Edit</a>&nbsp;&nbsp;
                                <a href="#" id="'.$row['id'].'" title="Delete Student" class="btn btn-danger btn-sm">Delete</a>&nbsp;&nbsp;
                             </td>
                            </tr>';
            }
                $output .=' </tbody>
                        </table>';
           echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( No Department Available!</h3>';
    }
}


//////////////////////////////////////  Level  /////////////////////////////////////////


// Handle Add New Level
if(isset($_POST['action']) && $_POST['action'] == 'add_level'){
    // print_r($_POST);
    $level_name = $admin->check_input($_POST['level_name']);
   
    $admin->add_new_level($level_name);
}


// Display All Level
if(isset($_POST['action']) && $_POST['action'] == 'display_level'){
    $output = '';
    $levels = $admin->get_level(0);


    if($levels){
        $output .= '<table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Level</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';
            foreach($levels as $row) {
               
                $output .= '<tr>
                             <td>'.$row['id'].'</td>
                             <td>'.$row['level_name'].'</td>
                             
                             <td>
                                <a href="#" id="'.$row['id'].'" title="View Level" class="btn btn-primary btn-sm">View</a>&nbsp;&nbsp;
                                <a href="#" id="'.$row['id'].'" title="Edit Level" class="btn btn-info btn-sm editBtn">Edit</a>&nbsp;&nbsp;
                                <a href="#" id="'.$row['id'].'" title="Delete Level" class="btn btn-danger btn-sm">Delete</a>&nbsp;&nbsp;
                             </td>
                            </tr>';
            }
                $output .=' </tbody>
                        </table>';
           echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( No Level Available!</h3>';
    }
}


//////////////////////////////////////  Semester  /////////////////////////////////////////


// Handle Add New Level
if(isset($_POST['action']) && $_POST['action'] == 'add_semester'){
    // print_r($_POST);
    $semester_name = $admin->check_input($_POST['semester_name']);
   
    $admin->add_new_semester($semester_name);
}


// Display All Level
if(isset($_POST['action']) && $_POST['action'] == 'display_semester'){
    $output = '';
    $semesters = $admin->get_semester(0);


    if($semesters){
        $output .= '<table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Semester</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';
            foreach($semesters as $row) {
               
                $output .= '<tr>
                             <td>'.$row['id'].'</td>
                             <td>'.$row['semester_name'].'</td>
                             
                             <td>
                                <a href="#" id="'.$row['id'].'" title="View Level" class="btn btn-primary btn-sm">View</a>&nbsp;&nbsp;
                                <a href="#" id="'.$row['id'].'" title="Edit Level" class="btn btn-info btn-sm editBtn">Edit</a>&nbsp;&nbsp;
                                <a href="#" id="'.$row['id'].'" title="Delete Level" class="btn btn-danger btn-sm">Delete</a>&nbsp;&nbsp;
                             </td>
                            </tr>';
            }
                $output .=' </tbody>
                        </table>';
           echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( No Semester Available!</h3>';
    }
}


//////////////////////////////////////  Session  /////////////////////////////////////////


// Handle Add New Level
if(isset($_POST['action']) && $_POST['action'] == 'add_session'){
    // print_r($_POST);
    $session_name = $admin->check_input($_POST['session_name']);
   
    $admin->add_new_session($session_name);
}


// Display All Level
if(isset($_POST['action']) && $_POST['action'] == 'display_session'){
    $output = '';
    $sessions = $admin->get_session(0);


    if($sessions){
        $output .= '<table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Session</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';
            foreach($sessions as $row) {
               
                $output .= '<tr>
                             <td>'.$row['id'].'</td>
                             <td>'.$row['session_name'].'</td>
                             
                             <td>
                                <a href="#" id="'.$row['id'].'" title="View Level" class="btn btn-primary btn-sm">View</a>&nbsp;&nbsp;
                                <a href="#" id="'.$row['id'].'" title="Edit Level" class="btn btn-info btn-sm editBtn">Edit</a>&nbsp;&nbsp;
                                <a href="#" id="'.$row['id'].'" title="Delete Level" class="btn btn-danger btn-sm">Delete</a>&nbsp;&nbsp;
                             </td>
                            </tr>';
            }
                $output .=' </tbody>
                        </table>';
           echo $output;
    } else {
        echo '<h3 class="text-center text-secondary">:( No Session Available!</h3>';
    }
}


?>