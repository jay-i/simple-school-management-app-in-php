<?php
// session_start();
require_once 'session.php';
require_once 'auth.php';
$cuser = new Auth(); // store current user session

// Handle Profile Update
if(isset($_FILES['image'])){
    // print_r($_FILES);
    $surname = $cuser->check_input($_POST['surname']);
    $name = $cuser->check_input($_POST['name']);
    $phone = $cuser->check_input($_POST['phone']);
    $dob = $cuser->check_input($_POST['dob']);
    $gender = $cuser->check_input($_POST['gender']);

    $oldImage = $_POST['oldimage'];
    $folder = 'uploads/';

    if(isset($_FILES['image']['name']) && ($_FILES['image']['name'] != "")){
        $newImage = $folder.$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], $newImage);

        if($oldImage != null){
            // Delete oldImage
            unlink($oldImage);
        }
    } 
    else{
        $newImage = $oldImage;
    }
    $cuser->update_profile($surname, $name, $phone, $dob, $gender, $newImage, $cid);
}

// Handle Change Password
if(isset($_POST['action']) && $_POST['action'] == 'change_pass'){
    // print_r($_POST);
    $currentPass = $_POST['curpass'];
    $newPass = $_POST['newpass'];
    $cnewPass = $_POST['cnewpass'];

    $hnewPass = password_hash($newPass, PASSWORD_DEFAULT);

    if($newPass != $cnewPass){
        echo $cuser->showMessage('danger', 'Password did not match!');
    }
    else{
        if(password_verify($currentPass, $cpass)){
            $cuser->change_password($hnewPass,$cid);
            echo $cuser->showMessage('success', 'Password Changed Successfully!');
        }
        else{
            echo $cuser->showMessage('danger', 'Current Password is Wrong');
        }
    }
    
}

?>