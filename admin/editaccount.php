<?php
session_start();

// i wnat to say if the userid is the same as the session id then let it go to this page 
// this currenlty allows the session user to access any page 

include("../conn.php");
$rowid = $conn->real_escape_string($_GET['editinfo']);
if ($rowid != $_SESSION['40146593_id']){

		header('Location:../index.php');
		}
		


	$myuser = $_SESSION['40146593_user'];
	$userid = $_SESSION['40146593_id'];
	


//this is userid



$read = "SELECT * FROM WD_USERS
		 WHERE WD_USERS.id = '$rowid'  ";
	
	$result = $conn->query($read);

	if (!$result) {
		echo $conn->error;
}




?>

<!DOCTYPE html>
<html>
<head>
<title>Register</title>

<link rel="apple-touch-icon" sizes="180x180" href="../favicon_io/apple-touch-icon.png">
<link rel="icon" type="image/png" sizes="32x32" href="../favicon_io/favicon-32x32.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon_io/favicon-16x16.png">
<link rel="manifest" href="../favicon_io/site.webmanifest">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
</script>

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

<link rel="stylesheet" href ="../ui.css">



</head>

	<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<a class="navbar-brand" href="../index.php"><i class="fas fa-home"></i></a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   		<span class="navbar-toggler-icon"></span>
  		</button>

  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="shop.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
        
        
        
        
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="../product/shop.php">All Products</a>
    
        <?php
        
        $prodnav = "SELECT * FROM WD_Product_Type "; 
        
        $prodresult = $conn->query($prodnav);
        
        if(!$prodresult){
        	echo $conn->error;
        }
        
        while ($nav = $prodresult -> fetch_assoc()){
        	//build li tags 
        	
        	$name = $nav['Type'];
        	$idvar = $nav['id'];
        	
        	echo "
        	
        	<a class='dropdown-item' href='../product/shopproducts.php?filter=$idvar'>$name</a>";
  	
        }
 
        ?>
        
        </div>
    
        
        <li class="nav-item right">
        <a class="nav-link" href="selling.php">Sell <i class="fas fa-money-check-alt"></i></a>
        </li>
        
         <li class="nav-item right">
        <a class="nav-link" href="account.php">Account <i class="fas fa-user"></i></a>
        </li>
        
        <li class="nav-item right">
        <a class="nav-link" href="../contact/php">Contact <i class="fas fa-phone"></i></a>
        </li>
        
        <li class="nav-item right">
        <a class='nav-link' href='logout.php'>Sign Out <i class='fas fa-sign-out-alt''></i></a>
        </li>
        
     
       
      </li>
     
    </ul>
    	<!--<form class="form-inline my-2 my-lg-0">
      	<input class="form-control mr-sm-2" type="search" placeholder="Search for a product" aria-label="Search">
      	<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
   		 </form-->
    
  	</div>
	</nav>

	
	<!--Start of container-->
	<div class="container">
	
	<div class ="row">
			<div class ="col">
				<h1 class="text-center pad2">Select which details you would like to edit</h1>
  			</div>
	</div>
	
  		<div class="row">
  			<div class="col pad2 mar">
  		
  		<form action="accountprocess.php" method="POST" enctype="multipart/form-data">
  	
  		<?php
  		
  		
  		while ($row1 = $result->fetch_assoc()) {
  		
  		$user =$row1['user'];
  		$pw = $row1['pw'];
  		$email = $row1['email'];
  		$smedia =$row1['socialmedia'];
  		$phone = $row1['phone'];
  		$profileimg = $row1['profileimg'];
  		$school = $row1['school'];
  		
  		$id = $row1['id'];
  
  		
  		
  		echo "
  		<input type='hidden' value ='$id' name='myeditacid'>
	
  	
  			<div class='form-group'>
   			<label for='Username'>Username</label>
    		<input type='text' class='form-control' id='Username' aria-describedby='username' placeholder='Enter username' name='editname' value=$user>
    		<small id='emailHelp' class='form-text text-muted'>Enter a username</small>
  			</div>
  		
  	
  			<div class='form-group'>
    		<label for='Password'>Password</label>
   			<input type='password' class='form-control' id='Password1' placeholder='Password' name='editpass' value='$pw'>
  			</div>
  			
  			<div class='form-group'>
    			<label for='Enter Email'>Email address</label>
    			<input type='email' class='form-control' id='enteremail' aria-describedby='emailHelp' placeholder='Enter email' name='editemail' value='$email'>
    			<small id='emailHelp' class='form-text text-muted'>We'll never share your email with anyone else.</small>
  			</div>
  			
  			
  			<div class='form-group'>
    		<label for='PhoneNumber'>Phone Number</label>
   			<input type='number' class='form-control' id='phonenum' placeholder='Phone Number' name='editphone' value= '$phone'>
  			</div>
  			
  			<div class='form-group'>
    		<label for='prifileimage'>Profile Image</label>
   			<input type='file' accept='file_extension|image/png,image/jpeg,image/jpg' class='form-control' id='imageprofile' placeholder='Profile' name='editprofile' value ='productimgstorage/$profileimg'>
  			</div>
  			
  			<div class='form-group'>
    		<label for='School Name'>School</label>
   			<input type='text' class='form-control' id='school' placeholder='School Name' name='edit_school' value ='$school'>
  			</div>
  			
  			<div class='form-group'>
    		<label for='Social Media Tags'>Social Media</label>
   			<input type='text' class='form-control' id='smedia' placeholder='Enter a link to your facebook account' name='editsmedia' value ='$smedia'>
  			</div>
  			
  
  			<button type='submit' class='btn btn-primary' value='editaccount' name='editac'>Edit Details</button>";
  			
  	}
  	?>
  		
		</form>
  		
  		</div>
 		
 		
 		<!--Already have an account so let them login-->
 		
 	
 		
 			
 		
 		</div>
  	</div>
  	
  	<nav class="navbar justify-content-end navbar-light bg-light">
 			 <a class="navbar-brand" href="../index.php">Elmtree GAA Swap Shop <i class="fas fa-trademark"></i></a>
	</nav>
	
	
</body>	
</html>
	
	