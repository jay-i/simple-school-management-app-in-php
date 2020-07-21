<?php
    session_start();
    // require_once 'fetchenroll.php';
    require_once 'auth.php';
    // object of auth class
    $user = new Auth();

    // Handle Registration
    if(isset($_POST['action']) && $_POST['action'] == 'register'){
        //print_r($_POST);
        $surname = $user->check_input($_POST['surname']);
        $email = $user->check_input($_POST['email']);
        $password = $user->check_input($_POST['password']);

        $hashpass = password_hash($password, PASSWORD_DEFAULT);

        if($user->user_exist($email)){
            echo $user->showMessage('warning', 'This E-Mail is already registered!');
        } else{
            if($user->register($surname, $email, $hashpass)){
                echo 'register';
                $_SESSION['user'] = $email;
            }
            else{
                echo $user->showMessage('danger', 'Whoops, Something went wrong! try later!');
            }
        }
    }

    // Handle Login
    if(isset($_POST['action']) && $_POST['action'] == 'login'){
       //echo print_r($_POST);
       $email = $user->check_input($_POST['email']);
       $password = $user->check_input($_POST['password']);

       $loggedInUser = $user->login($email);

       if($loggedInUser != null){
           if(password_verify($password, $loggedInUser['password'])){
               // check if the Remember me checkbox is checked or not
               if(!empty($_POST['rem'])){
                   setcookie("email", $email, time()+(30*24*60*60), '/');
                   setcookie("password", $password, time()+(30*24*60*60), '/');
               }
               else{
                   // Set cookie empty - email, value, time & path
                   setcookie("email", "", 1, '/');
                   setcookie("password", "", 1, '/');
               }

               echo 'login';
               $_SESSION['user'] = $email;
           }
           else {
               echo $user->showMessage('danger', 'Password is incorrect!');
           }
       }
       else{
           // if user is not found in db
           echo $user->showMessage('danger', 'User not found!');
       }
       
    }

//////////////////////  ALL STUDENT DETAILS  ///////////////////////////

    // Fetch All Student Details
if(isset($_POST['action']) && $_POST['action'] == 'fetchAllUsers'){
    $output = '';
    $students = $user->fetchAllStudentDetail();


    if($students){
        $output .= '<table class="table table-striped table-bordered text-center">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Surname</th>
                        <th>Name </th>
                        <th>Reg. Number</th>
                        <th>Course Code</th>
                        <th>Course Name</th>
                        <th>Course Unit</th>
                        <th>Course Created On</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>';
            foreach($students as $row) {
               
                $output .= '<tr>
                             <td>'.$row['id'].'</td>
                             <td>'.$row['surname'].'</td>
                             <td>'.$row['name'].'</td>
                             <td>'.$row['reg_number'].'</td>
                             <td>'.$row['courseCode'].'</td>
                             <td>'.$row['courseName'].'</td>
                             <td>'.$row['courseUnit'].'</td>
                             <td>'.$row['created_at'].'</td>
                            
                             
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
        echo '<h3 class="text-center text-secondary">:( No Records Available!</h3>';
    }
}


?>