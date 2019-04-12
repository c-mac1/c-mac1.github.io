<?php

session_start();
include('../conn.php');

// say if user id does not equal the user id session
// rowid = id of the product
$rowid = $conn->real_escape_string($_GET['editid']);

$readrow = "SELECT * FROM WD_Products
			WHERE WD_Products.id = '$rowid' ";
	
	$result=$conn->query($readrow);
	
	if(!$result){
		echo $conn->error;
	}
	
	while ($row = $result->fetch_assoc()){
		$userid = $row['userid'];
		$desc = $row['description'];
  		$info = $row['Information'];
  		$path = $row['path'];
  		$price = $row['price'];	
  		$id = $row['id'];
	}
	

if ($userid != $_SESSION['40146593_id']){
	header('Location: ../index.php'); 
}
	
	$myuser = $_SESSION['40146593_user'];
	$userid = $_SESSION['40146593_id'];
		
	
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Item</title>


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

$('.popover-dismiss').popover({
  trigger: 'hover'
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
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Shop
          
        </a>
        
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="../product/shop.php">All Products</a>
       
         <?php
        
        $prodnav = "SELECT * FROM WD_Product_Type "; 
    
        $prodresult = $conn->query($prodnav);
        
        if(!$prodresult){
        	echo $conn->error;
        }
        
        while ($nav = $prodresult -> fetch_assoc()){	
        	$name = $nav['Type'];
        	$idvar = $nav['id'];
        	
        	echo "
        	
        	<a class='dropdown-item' href='../product/shopproducts.php?editid=$idvar'>$name</a>";
  	
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
        <a class="nav-link" href="../contact.php">Contact <i class="fas fa-phone"></i></a>
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
		<div class ='row'>
			<div class ="col pad2">
	
			<div class='jumbotron text-center'>
  			<h1 class='display-4'>Lets Edit your Product <i class='fas fa-edit'></i></h1>
  	<p class='lead'>Edit what you would like to change below and we can get your item back up for sale!</p>
  			<hr class='my-4'>
			</div>
			
			</div>
		</div>
		
		
	<div class ='row'>
			<div class ="col pad2">
		<form action='editprocess.php' method='POST' enctype='multipart/form-data'>
	
	<?php
  	
  		echo "
  		<input type='hidden' value ='$id' name='myeditid'>
  		
  			<div class='form-group'>
   			<label for='egproductType'>Title</label>
    		<input type='text' class='form-control' id='prodtypeid' aria-describedby='emailHelp' placeholder='Edit product description' name='editdesc' value= '$desc' required>
  			</div>
  			
  			
  			<div class='form-group'>
   			 <label for='egproductType'>Description</label>
    		<input type='text' class='form-control' id='prodtypeid' aria-describedby='emailHelp' placeholder='Enter information (Reasons for selling/Condition)' name='editinfo' value='$info'  required>
  			</div>
  			
  			<div class='form-group'>
   			 <label for='egproductType'>Price</label>
    		<input type='number' class='form-control' id='prodtypeid' aria-describedby='emailHelp' placeholder='Enter your product price' name='editprice' value='$price'>
  			</div>
  
  	
  			<div class='form-group'>
    		<label for='fileimage'>Product Image</label>
    		<input type='file' accept='file_extension|image/png,image/jpeg,image/jpg' class='form-control' id='exampleimage' placeholder='Image' name='editimage' value='productimgstorage/$path'>
  			</div>
  		
	
  				
  		
  			<button type='submit' class='btn btn-primary mar1' data-container='body' data-toggle='tooltip' data-placement='right' title='Edit' value='editproduct' name ='upload'>
				<h1>Edit <i class='fas fa-edit'></i></h1>
				</button>
  		
  			
  			<button type='submit' class='btn btn-danger float-right mar1' data-container='body' data-toggle='popover' data-placement='right' data-content='Delete Item' value='deleteprod' name ='delete' formaction='deleteprocess.php'>
				<h1><span class='far fa-trash-alt'></span></h1>
				</button>
				
				</div>
  		
				</div>";
  			
  			
  		
  		?>
		</form>

		
  		
  	</div><!--container close-->
  		
	
	
	
	<nav class="navbar justify-content-end navbar-light bg-light">
 			 <a class="navbar-brand" href="index.php">Elmtree GAA Swap Shop <i class="fas fa-trademark"></i></a>
	</nav>
</body>	
</html>
	
	