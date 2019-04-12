<?php
session_start();
if (!isset($_SESSION['40146593_user'])){
	header('Location:../index.php'); 
}
		
		

	$myuser = $_SESSION['40146593_user'];
	$userid = $_SESSION['40146593_id'];
	
	
	include("../conn.php");

$readq = "SELECT WD_Product_Type.Type, WD_Products.description, WD_Products.price  FROM `WD_Products` 
			INNER JOIN WD_Product_Type 
			ON WD_Products.Product_type_id = WD_Product_Type.id" ;

$result = $conn->query($readq);
	

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
  $('[data-toggle="tooltip"]').tooltip()
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
	<div class ="row pad2">
		<div class ="col">
			<h1 class="text-center">
  			<?php echo"
  			Welcome $myuser";
  			?>
  			</h1>
  			
		</div>
	
	</div>
	
  		<div class="row pad2">
  			<div class="col">
  			<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  			
  				<div class="carousel-inner car">
    			<div class="carousel-item active">
      				<img class="d-block w-100 carimg" src="../productimg/dub.jpg" alt="First slide">
      					<div class="carousel-caption d-none d-md-block ">
    					<h3>Discover hidden gems!</h3>
    					<p>Theres a jersey for everyone</p>
    					</div>
    			</div>
    		
    			<div class="carousel-item">
      				<img class="d-block w-100 carimg" src="../productimg/college.jpg" alt="Second slide">
      				<div class="carousel-caption">
    					<h3>Sell your own unwanted items!</h3>
    					<p>One mans trash is another mans treasure!</p>
    				</div>
    			</div>
    		
    			<div class="carousel-item">
      				<img class="d-block w-100 carimg" src="../productimg/mayo.jpg" alt="Third slide">
      				<div class="carousel-caption d-none d-md-block">
    					<h3>Make some easy money!</h3>
    					<p>You could always do with some extra cash $$</p>
    				</div>
    			</div>
    			
    			</div>
    			</div>
  			
  		
  			
  			
  				<a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    			<span class="carousel-control-prev-icon" aria-hidden="true"></span>
    			<span class="sr-only">Previous</span>
  				</a>
  				
  				<a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    			<span class="carousel-control-next-icon" aria-hidden="true"></span>
    			<span class="sr-only">Next</span>
  				</a>
  				
  			</div>
		</div>
  		
  		
  		
  		<!---Adding a product--->
  		<div class="row pad1 mar">
  		<div class="col">
  		
  		<div class="card text-center" style="width: 18rem;">
  			<img class="card-img-top" src="../productimg/downtop.jpg" alt="Sell product">
  			<div class="card-body">
   				 <h5 class="card-title">Selling </h5>
    			<a href="selling.php"><button type="btn btn-primary" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Sell unwanted items">Sell
    			</button></a>
  			</div>
  		</div>
  		</div>
  		
  		<div class="col">
  		<div class="card text-center" style="width: 18rem;">
  			<img class="card-img-top wid" src="../productimg/logo.png" alt="Buy product">
  			<div class="card-body">
   				 <h5 class="card-title">Buying </h5>
    			<a href="../product/shop.php">
    			<button type="btn btn-primary" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Browse our shop collection">Shop
    			</button></a>
  			</div>
  		</div>
  		</div>
  		
  		<div class="col">
  		<div class="card text-center" style="width: 18rem;">
  			<img class="card-img-top" src="../productimg/manage.png" alt="Account management">
  			<div class="card-body">
   				 <h5 class="card-title">Manage Account</h5>
    			<a href="account.php"><button type="btn btn-primary" class="btn btn-secondary" data-toggle="tooltip" data-placement="bottom" title="Edit account details ">View account
    			</button></a>
  			</div>
  		</div>
  		</div>
 
		</div>
		
		

  	</div>
  	
  	<nav class="navbar justify-content-end navbar-light bg-light">
 			 <a class="navbar-brand" href="index.php">Elmtree GAA Swap Shop <i class="fas fa-trademark"></i></a>
	</nav>
	
	
</body>	
</html>
	
	