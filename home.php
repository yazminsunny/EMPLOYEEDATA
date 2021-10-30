<?php
session_start();

// initializing variables

$username = "";
$email    = "";
$name     = "";
$age      = "";
$gender   = "";
$errors = array();

// connect to the database
$db = mysqli_connect('localhost', 'root', '', 'blogheredb');


// REGISTER USER
if (isset($_POST['reg_user'])) {
  // receive all input values from the form
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $email = mysqli_real_escape_string($db, $_POST['email']);
  $password_1 = mysqli_real_escape_string($db, $_POST['password_1']);
  $password_2 = mysqli_real_escape_string($db, $_POST['password_2']);
  $name= mysqli_real_escape_string($db, $_POST['name']);
  $age= mysqli_real_escape_string($db, $_POST['age']);
  $gender= mysqli_real_escape_string($db, $_POST['gender']);

  // form validation: ensure that the form is correctly filled ...
  // by adding (array_push()) corresponding error unto $errors array
  if (empty($username)) { array_push($errors, "Username is required"); }
  if (empty($email)) { array_push($errors, "Email is required"); }
  if (empty($password_1)) { array_push($errors, "Password is required"); }
  if (empty($name)) { array_push($errors, "Your name is required"); }
  if (empty($age)) { array_push($errors, "Age is required"); }
  if (empty($gender)) { array_push($errors, "Gender is required"); }
  if ($password_1 != $password_2) {
	array_push($errors, "The two passwords do not match");
  }

  // first check the database to make sure
  // a user does not already exist with the same username and/or email
  $user_check_query = "SELECT * FROM user WHERE username='$username' OR email='$email' LIMIT 1";
  $result = mysqli_query($db, $user_check_query);
  $userexist = mysqli_fetch_assoc($result);

  if ($userexist) { // if user exists
    if ($userexist['username'] === $username) {
      array_push($errors, "Username already exists");
    }

    if ($userexist['email'] === $email) {
      array_push($errors, "Email already exists");
    }
  }

  // Finally, register user if there are no errors in the form
  if (count($errors) == 0) {
  	$password =$password_1;//encrypt the password before saving in the database

  	$query = "INSERT INTO user (username, email, password,name,age,gender) VALUES('$username', '$email', '$password','$name','$age','$gender')";
  	mysqli_query($db, $query);
  	$_SESSION['username'] = $username;
  	$_SESSION['success'] = "You have successfully logged in!";
  	header('location: homepage.php');
  }
}

// LOGIN USER
if (isset($_POST['login_user'])) {
  $username = mysqli_real_escape_string($db, $_POST['username']);
  $password = mysqli_real_escape_string($db, $_POST['password']);

  if (empty($username)) {
  	array_push($errors, "Username is required");
  }
  if (empty($password)) {
  	array_push($errors, "Password is required");
  }

  if (count($errors) == 0) {
  	$query = "SELECT * FROM user WHERE username='$username' AND password='$password'";
  	$results = mysqli_query($db, $query);
    $row=mysqli_fetch_array($results);


  	if (mysqli_num_rows($results) == 1) {
       $_SESSION['username'] = $username;
   	   $_SESSION['success'] = "Successfully logged in!";
   	   header('location: homepage.php');
      }
      else
      {
       array_push($errors, "Wrong username/password combination");
  	  }
  }

}




?>
