<?php
session_start();
//initializing
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "labxplorer";
$toDate = date("Y-M-D");

//initializing form values
$firstname = $lastname = $studentmail = $passwrd1 = $passwrd2 = $studentnumber = $studdetail = " ";
$errors = array();

// Create connection
$conn = mysqli_connect($servername, $username, $password ,$dbname);


//Register user
if (isset($_POST['reg_user'])){
  $firstname = mysqli_real_escape_string($conn, $_POST['fname']);
  $lastname = mysqli_real_escape_string($conn, $_POST['lname']);
  $studentmail = mysqli_real_escape_string($conn, $_POST['studmail']);
  $passwrd1 = mysqli_real_escape_string($conn, $_POST['passw']);
  $passwrd2 = mysqli_real_escape_string($conn, $_POST['confpassw']);
  $studentnumber = mysqli_real_escape_string($conn, $_POST['studnum']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($firstname)) { array_push($errors, "Firstname is required"); }
  if (empty($lastname)) { array_push($errors, "Last name is required"); }
  if (empty($studentmail)) { array_push($errors, "Student mail is required"); }
  if (empty($studentnumber)) { array_push($errors, "Student number is required"); }
  if (empty($passwrd1)) { array_push($errors, "Password is required"); }
  if ($passwrd1 != $passwrd2) { array_push($errors, "The two passwords do not match");}
  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM users WHERE studentnumber='$studentnumber' OR studentmail='$studentmail' LIMIT 1";
  $result = mysqli_query($conn, $user_check_query);
  $user = mysqli_fetch_assoc($result);
  if ($user) { // if user exists
    if ($user['studentnumber'] === $studentnumber) { array_push($errors, "Student number already exists"); }

    if ($user['studentmail'] === $studentmail) { array_push($errors, "Student mail already exists"); }
  }
   // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
    $protectedpassword = md5($passwrd_1);
    $sql = "INSERT INTO student (studentnumber, firstname, lastname, studentmail, passwrd)
    VALUES ('$studentnumber', '$firstname', '$lastname, '$studentmail', '$protectedpassword')";
    //mysqli_query($conn, $sql);
    if (mysqli_query($conn, $sql)) {
      echo "New record created successfully";
} else {
      echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
    $_SESSION['studentnumber'] = $studentnumber;
    $_SESSION['success'] = "Welcome to LabXplorer";
    //header('location: ../pages/studDashboard.php');
  	header('location: studDashboard.php');
  }
}


// LOGIN USER
if (isset($_POST['login_user'])) {
  $studdetail = mysqli_real_escape_string($conn, $_POST['studnum']);
  $passwrd1 = mysqli_real_escape_string($conn, $_POST['passw']);

  if (empty($studentnumber)) { array_push($errors, "Studentnumber is required"); }
  if (empty($passwrd1)) { array_push($errors, "Password is required"); }

  if (count($errors) == 0) {
  	$passwrd1 = md5($passwrd1);
  	$query = "SELECT * FROM student WHERE studentnumber='$studdetail' OR studentmail='$studdetail' AND passwrd='$passwrd1'";
  	$results = mysqli_query($conn, $query);
  	if (mysqli_num_rows($results) == 1) {
  	  $_SESSION['studdetail'] = $studdetail;
  	  $_SESSION['success'] = "You are now logged in";
  	  header('location: studDashboard.php');
  	}else {
      array_push($errors, "Wrong username/password combination");
      header('location: index.php'); }
  }
}
// Close connection
//mysqli_close($conn);
?>