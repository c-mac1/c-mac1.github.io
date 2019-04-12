<?php

//this page authenticates the user is stored on the database

//CREATES/STARTS THE SESSION
session_start();

include("../conn.php");

$registeruser = $_SESSION['40146593_user'];
$userid = $_SESSION['40146593_id'];



//create real escape string to prevent from sql injections

$random = rand(10,1000);

 $username = $conn->real_escape_string($_POST['postname']);
 $pass = $conn->real_escape_string($_POST['postpass']);
 $email = $conn->real_escape_string($_POST['postemail']);
 $phone = $conn->real_escape_string($_POST['postphone']);
 $school = $conn->real_escape_string($_POST['postschool']);
 $socialmedia = $conn->real_escape_string($_POST['postsocialmedia']);
 
 $profileimage = $_FILES['postprofile']['name'];
 $profileimagetmp = $_FILES['postprofile']['tmp_name'];
 $profileimagetype = $_FILES['postprofile']['type'];
 
 
//adding random number
$profileimage = $random.$profileimage;
//$imgtemp = $_FILES['postimage']['tmp_name'];
//put validation such as type and size
//then build insert and move


move_uploaded_file($profileimagetmp, "users/".$profileimage);

//table uses data from form that has been posted but also a var from the session data
$insert = "INSERT INTO WD_USERS(user, pw, socialmedia, email, phone, profileimg, school) VALUES ('$username', '$pass', '$socialmedia', '$email', '$phone', '$profileimage', '$school') ";

$result = $conn->query($insert);

	if(!$result){
	echo $conn->error;
		} else {
		
		header('location: login.php');
	
}

?>

