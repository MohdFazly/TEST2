<?php 
session_start();

// connect to database
$db = mysqli_connect('localhost', 'root', '', 'projectairasia');

// variable declaration
$fullname = "";
$email    = "";
$address  = "";
$date    = "";
$errors   = array(); 

// call the register() function if register_btn is clicked
if (isset($_POST['register_btn'])) {
	register();
}

// REGISTER USER
function register(){
	// call these variables with the global keyword to make them available in function
	global $db, $errors, $fullname, $email, $address, $date, $password;

	// receive all input values from the form. Call the e() function
    // defined below to escape form values
	$fullname    =  e($_POST['fullname']);
	$email       =  e($_POST['email']);
	$address       =  e($_POST['address']);
	$date       =  e($_POST['date']);
	$password  = e($_POST['password']);
	


	// register user if there are no errors in the form
	if (count($errors) == 0) {
		$password = md5($password);//encrypt the password before saving in the database

		if (isset($_POST['user_type'])) {
			$user_type = e($_POST['user_type']);
			$query = "INSERT INTO users (fullname, email, address, date, password) 
					  VALUES('$fullname', '$email','$address', '$date','$password')";
			mysqli_query($db, $query);
			$_SESSION['success']  = "New user successfully created!!";
			header('location: home.php');
					
		}
	}
}

// return user array from their id
function getUserById($id){
	global $db;
	$query = "SELECT * FROM users WHERE id=" . $id;
	$result = mysqli_query($db, $query);

	$user = mysqli_fetch_assoc($result);
	return $user;
}

// escape string
function e($val){
	global $db;
	return mysqli_real_escape_string($db, trim($val));
}

function display_error() {
	global $errors;

	if (count($errors) > 0){
		echo '<div class="error">';
			foreach ($errors as $error){
				echo $error .'<br>';
			}
		echo '</div>';
	}
}



// call the login() function if register_btn is clicked
if (isset($_POST['login_btn'])) {
	//echo "haiii";
	login();
}

// LOGIN USER
function login(){
	global $db, $email, $errors;

	// grap form values
	$email = e($_POST['email']);
	$password = e($_POST['password']);
	


	// attempt login if no errors on form
	if (count($errors) == 0) {
		

		$query = "SELECT * FROM users WHERE email='$email' AND password='$password' LIMIT 1";
		//echo $querys;
		$results = mysqli_query($db, $query);

		if (mysqli_num_rows($results) == 1) { // user found
			$_SESSION['user_mail'] = $email;
			$user = mysqli_fetch_assoc($results);
			$_SESSION['user'] = $user; 
			header ('location: index.php');
			}
		}else {
			array_push($errors, "Wrong email or password combination");
		}
	}



// ...
function isAdmin()
{
	if (isset($_SESSION['user']) && $_SESSION['user']['user_type'] == 'admin' ) {
		return true;
	}else{
		return false;
	}
}

function isLoggedIn()
{
	if (isset($_SESSION['user']) ) {
		return true;
	}else{
		return false;
	}
}