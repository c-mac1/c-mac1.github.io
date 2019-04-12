<?php
session_start();
//if (!isset($_SESSION['40146593_admin'])){
//	header('Location:../index.php');
//}

	$myuser = $_SESSION['40146593_user'];
	$userid = $_SESSION['40146593_id'];
	$myadmin = $_SESSION['40146593_admin'];
	
	include("../conn.php");
	
	$read = "SELECT * FROM `WD_USERS`";
	
	$result = $conn->query($read);

	if (!$result) {
		echo $conn->error;
}

	

?>

<!DOCTYPE html>
<html>
<head>
<title>Elm Tree</title>

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


<script>
$(function () {
  $('[data-toggle="popover"]').popover()
})
</script>



</head>

	<body>
	
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
  		<a class="navbar-brand" href="index.php"><i class="fas fa-home"></i></a>
  		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
   		<span class="navbar-toggler-icon"></span>
  		</button>

  	<div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
     
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="../product/shop.php" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Shop</a>
        

        
        
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
        	
        	<a class='dropdown-item' href='../product/shopproducts.php?editid=$idvar'>$name</a>";
  	
        }
        ?>
        
        </div>
    
        
        <li class="nav-item right">
        <a class="nav-link" href="account.php">Account <i class="fas fa-user"></i></a>
        </li>
        
        <li class="nav-item right">
        <a class="nav-link" href="../contact.php">Contact <i class="fas fa-phone"></i></a>
        </li>
        
        <li class="nav-item right">
        <a class='nav-link' href='../admin/logout.php'>Sign Out <i class='fas fa-sign-out-alt''></i></a>
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
	
		<div class="row pad2">
    		<div class="col-sm"><h1 class="text-center">Users<i class="fas fa-tshirt"></i></h1>
    		</div>
    	</div>
    	



	<?php
	
	
	
		while ($row = $result->fetch_assoc()){		
			$userid = $row['id'];
			$name = $row['user'];
			$profileimg = $row['profileimg'];
			$email = $row['email'];
			
		
			
			echo"
			
			
			
			
			
			<div class ='row'>
				<div class ='col pad1 prod'>
				<img src='../reglog/users/$profileimg' alt='User Image' class='img-thumbnail'>
				</div>
				
				<div class ='col prod pad2'>
					<p><h3>$name</h3></p>
					<p><b>Email:</b> $email</p>
					<p><b>ID:</b>$userid</p>
					<p><small><u>Please delete all users products <b>before</b> deleting the user</u></small></p>
					
					
					<form action='removeitem.php' method='POST' enctype='multipart/form-data'>
					<a href='viewuseritems.php?produserid=$userid' class='btn btn-primary'>View User Products</a>
					</form>
					
					<form action='removeuser.php' method='POST' enctype='multipart/form-data'>
					
					
		
					<input type='hidden' value ='$userid' name='deleteuserid'>
					
					
					
					<button type='submit' class='btn btn-danger float-right mar1' data-container='body' data-toggle='popover' data-placement='right' data-content='Delete Item' value='$userid' name ='deleteuser' formaction='removeuser.php'>
					<h1><span class='far fa-trash-alt'></span></h1>
					</button>
					</form>
				
				</div>
			</div>
			
			</form>";
				
			}
		
		?>	
			</div> <!--closes row-->
			
			
	
  	</div>
  	</div>
  	
  	<nav class="navbar justify-content-end navbar-light bg-light">
 			 <a class="navbar-brand" href="index.php">Elmtree GAA Swap Shop <i class="fas fa-trademark"></i></a>
	</nav>
	
	
</body>	
</html>
	
	