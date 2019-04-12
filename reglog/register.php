<?php

include("../conn.php");



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
        <a class="nav-link" href="register.php">Register</a>
        </li>
        
        <li class="nav-item right">
        <a class="nav-link" href="login.php">Login</a>
        </li>
        
        <li class="nav-item right">
        <a class="nav-link" href="../contact.php">Contact <i class="fas fa-phone"></i></a>
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
				<h1 class="text-center pad2">Register <i class="fas fa-sign-in-alt"></i></h1>
  			</div>
	</div>
	
  		<div class="row">
  			<div class="col pad2 mar">
  		
  		<form action="registering.php" method="POST" enctype="multipart/form-data">
  		
  			<div class="form-group">
   			<label for="Username">Name</label>
    		<input type="text" class="form-control" id="Username" aria-describedby="username" placeholder="Enter username" name="postname">
    		<small id="emailHelp" class="form-text text-muted">Enter a username</small>
  			</div>
  			
  			<div class="form-group">
    		<label for="exampleInputPassword1">Password</label>
   			<input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password" name="postpass">
  			</div>
  			
  			<div class="form-group">
    			<label for="Enter Email">Email address</label>
    			<input type="email" class="form-control" id="enteremail" aria-describedby="emailHelp" placeholder="Enter email" name="postemail">
    			<small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
  			</div>
  			
  			<div class="form-group">
    		<label for="PhoneNumber">Phone Number</label>
   			<input type="number" class="form-control" id="phonenum" placeholder="Phone Number" name="postphone">
  			</div>
  			
  			<div class="form-group">
    		<label for="profileimage">Profile Image</label>
   			<input type="file" accept='file_extension|image/png,image/jpeg,image/jpg' class="form-control" id="imageprofile" placeholder="Profile" name="postprofile">
  			</div>
  			
  			<div class="form-group">
    		<label for="School Name">School</label>
   			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="School Name" name="postschool">
  			</div>
  			
  			<div class="form-group">
    		<label for="Social Media Tags">Social Media</label>
   			<input type="text" class="form-control" id="exampleInputPassword1" placeholder="Enter a link to your facebook account" name="postsocialmedia">
  			</div>
  			
  			
  			<div class="form-check">
   			<input type="checkbox" class="form-check-input" id="exampleCheck1">
    		<label class="form-check-label" for="exampleCheck1">I agree to the Terms & Conditions</label>
  			</div>
  
  			<button type="submit" class="btn btn-primary" value="uploadproduct" name="upload">Register</button>
		</form>
  		
  		</div>
 		
 		
 		<!--Already have an account so let them login-->
 		
 		<div class="col cardreg text-center">
 		
 			<div class="card log border-0" style="width: 18rem;">
  				<img class="card-img-top" src="../productimg/login.jpg" alt="Login">
  				<div class="card-body">
   				<h5 class="card-title">Already have an Account</h5>
    			<p class="card-text">If you already are a registered member of Elmtree just login</p>
    			<a href="login.php" class="btn btn-primary">Login</a>
  				</div>
			</div>
 		
 		</div>
  	</div>
  	</div>
  	<nav class="navbar justify-content-end navbar-light bg-light">
 			 <a class="navbar-brand" href="../index.php">Elmtree GAA Swap Shop <i class="fas fa-trademark"></i></a>
	</nav>
	
	
</body>	
</html>
	
	