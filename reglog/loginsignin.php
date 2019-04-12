<?php

session_start();

include("../conn.php");

//create real escape string to prevent from sql injections
//postname is the email
 $username = $conn->real_escape_string($_POST['postname']);
 $pass = $conn->real_escape_string($_POST['postpass']);
 
 //ADMIN CHECK NOT WORKING
 //$checkuseradmin = "SELECT * FROM WD_USERS WHERE email = '$username' AND pw = '$pass' and UserType ='1' ";
 //$result = $conn->query($checkuseradmin);
 //check if true
 //$num = $result->num_rows;

 //USER LOGIN WORKING
$checkuser = "SELECT * FROM WD_USERS WHERE email = '$username' AND pw = '$pass'";
$resultuser = $conn->query($checkuser);
 //check if true
 $num1 = $resultuser->num_rows;

 //if ($num >0){
//can get username and id (and pw if needed) as we have $result of query that contains the info
 	//while ($row = $result->fetch_assoc()){

	//user and id in the array are stored in the table columns 
 	//$myuser = $row['user'];  
 	//$myid = $row['id'];
 	//$email = $row['email'];
 	//$type = $row['UserType'];
  	
 	//$_SESSION['40146593_user'] = $myuser;
 	//$_SESSION['40146593_id'] = $myid;
 	//$_SESSION['40146593_email']=  $email;
 	//$_SESSION['40146593_admin']=  $type; 
 	
 		
//}
 	
 
 //let them in 
 //header('location:../control/index.php');

 	if ($num1>0){
 //} elseif ($num1>0) {
 
 	while ($row1 = $resultuser->fetch_assoc()){
 	
 	$myuser = $row1['user'];  
 	$myid = $row1['id'];
 	$email = $row1['email'];
 	$type = $row1['UserType'];
 	
 	$_SESSION['40146593_user'] = $myuser;
 	$_SESSION['40146593_id'] = $myid;
 	$_SESSION['40146593_email']=  $email;
 	
 	}
 
 	header('location:../admin/index.php');
 	
 } else {
 //wrong name
 header('location:login.php');
 }
 	
 	

?>