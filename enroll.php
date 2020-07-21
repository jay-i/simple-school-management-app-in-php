<?php
require_once 'session.php';
include 'header.php';


//Connect to our MySQL database using the PDO extension.
$conn = new PDO("mysql:host=localhost; dbname=sms", 'root', '');
 


/////////////////////   Session   ///////////////////////////

$sql = "SELECT * FROM session";
$stmt = $conn->prepare($sql);
$stmt->execute();

$sessions = $stmt->fetchAll(PDO::FETCH_ASSOC);

/////////////////////   Department   ///////////////////////////

$sql = "SELECT * FROM department";
$stmt = $conn->prepare($sql);
$stmt->execute();

$departments = $stmt->fetchAll(PDO::FETCH_ASSOC);

/////////////////////   Level   ///////////////////////////

$sql = "SELECT * FROM level";
$stmt = $conn->prepare($sql);
$stmt->execute();

$levels = $stmt->fetchAll(PDO::FETCH_ASSOC);

/////////////////////   Semester   ///////////////////////////

$sql = "SELECT * FROM semester";
$stmt = $conn->prepare($sql);
$stmt->execute();

$semesters = $stmt->fetchAll(PDO::FETCH_ASSOC);

/////////////////////   Courses   ///////////////////////////

$sql = "SELECT * FROM courses";
$stmt = $conn->prepare($sql);
$stmt->execute();

$courses = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
 
 <?php  

    if(isset($_POST['enroll'])){
        //print_r($_POST);
        $student_id = $cuser->check_input($_POST['student_id']);
        $session_id = $cuser->check_input($_POST['session_id']);
        $dept_id = $cuser->check_input($_POST['dept_id']);
        $level_id = $cuser->check_input($_POST['level_id']);
        $semester_id = $cuser->check_input($_POST['semester_id']);
        $course_id = $cuser->check_input($_POST['course_id']);


        $sql = "INSERT INTO courseenroll (student_id, session_id, dept_id, level_id, semester_id, course_id) VALUES (:student_id, :session_id, :dept_id, :level_id, :semester_id, :course_id)";
        $stmt = $conn->prepare($sql);
        // $inserted = $stmt->execute(['']);
        $inserted = $stmt->execute(['student_id'=>$student_id, 'session_id'=>$session_id, 'dept_id'=>$dept_id, 'level_id'=>$level_id, 'semester_id'=>$semester_id, 'course_id'=>$course_id]);
        if($inserted){
            echo '<font color="green">Course Successfully Register!</font>';
        } else {
            echo $cuser->showMessage('danger', '<font color="red">Whoops, Something went wrong! try later!</font>');
        }
    }

?>

<br>
<br>
<br>

<div class="col-md-12">
    <h3 class="page-head-line">COURSE ENROLLMENT </h3>
</div>

<hr>


<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
                <div class="card border-default">
                    <div class="card-header bg-info text-white lead">
                        Course Registration
                    </div>
                    <form action="" method="post" class="px-3 mt-2" id="change-pass-form">
                        <div class="form-group">
                            <label for="student_id"></label>
                           <input type="hidden" name="student_id" id="student_id" placeholder="" value="<?= $cid; ?>" readonly class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="sname">Surname</label>
                           <input type="text" name="surname" id="sname" placeholder="" value="<?= $csname; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="name">Name</label>
                           <input type="text" name="name" id="name" placeholder="" value="<?= $cname; ?>" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="regno">Student Reg. No</label>
                           <input type="text" name="reg_number" id="reg_number" value="<?= $cnumber; ?>" placeholder="" readonly class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="course">Session</label>
                            <select class="form-control" name="session_id" id="session_id" required>
                                <option value="" >Select Session</option>
                                <?php foreach($sessions as $session): ?>
                                    <option value="<?= $session['id']; ?>"><?= $session['session_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="course">Department</label>
                            <select class="form-control" name="dept_id" id="dept_id" required>
                                <option value="" >Select Department</option>
                                <?php foreach($departments as $department): ?>
                                    <option value="<?= $department['id']; ?>"><?= $department['dept_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="course">Level</label>
                            <select class="form-control" name="level_id" id="level_id" required>
                                <option value="" >Select Level</option>
                                <?php foreach($levels as $level): ?>
                                    <option value="<?= $level['id']; ?>"><?= $level['level_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="course">Semester</label>
                            <select class="form-control" name="semester_id" id="semester_id" required>
                                <option value="" >Select Semester</option>
                                <?php foreach($semesters as $semester): ?>
                                    <option value="<?= $semester['id']; ?>"><?= $semester['semester_name']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="course">Course</label>
                            <select class="form-control" name="course_id" id="course_id" required>
                                <option value="" >Select Course</option>
                                <?php foreach($courses as $course): ?>
                                    <option value="<?= $course['id']; ?>"><?= $course['courseName']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <div class="form-group">
                           <p id="courseError" class="text-danger"></p> 
                        </div>

                        <div class="form-group">
                            <input type="submit" name="enroll" id="enroll" value="Register Course" class="btn btn-info">
                        </div>
                    </form>
                </div>
        </div>

    </div>
</div>