<?php

session_start();
require_once 'auth.php';
$cuser = new Auth(); // store current user session

if(!isset($_SESSION['user'])){
    header('location: index.php');
    die;
}
// current user email in time reg & login
$cemail = $_SESSION['user'];

// Call currentUser object
$data = $cuser->currentUser($cemail);

$cid = $data['id'];
$cnumber = $data['reg_number'];
$csname = $data['surname'];
$cname = $data['name'];
$cpass = $data['password'];
$cphone = $data['phone'];
$cdob = $data['dob'];
$cphoto = $data['photo'];
$cgender = $data['gender'];
$created = $data['created_at'];

$reg_on = date('d M Y', strtotime($created));

$fname = strtok($cname, " ");
?>