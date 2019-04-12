<?php
session_start();
include("../conn.php");

		if (!isset($_SESSION['40146593_user'])){
		header('Location:../index.php');
		}
		
		$myemail = $_SESSION['40146593_email'];

include("../conn.php");

//this is the product individual id 
$getid = $conn->real_escape_string(htmlentities(urldecode($_GET['product'])));



//instead of selecctong all the books we only want one book
$readq = "SELECT WD_Products.description,WD_Products.id, WD_USERS.email, WD_Products.published, WD_Products.Information, WD_Products.price, WD_Product_Type.Type, WD_Products.path
			FROM WD_USERS
            INNER JOIN WD_Products
            ON WD_USERS.id = WD_Products.userid
			INNER JOIN WD_Product_Type 
			ON 
			WD_Products.Product_type_id = WD_Product_Type.id 
			WHERE WD_Products.id = '$getid' ";
		

$result = $conn->query($readq);
if (!$result) {
	echo $conn->error;
}


?>

<!DOCTYPE html>
<html>
<head>
<title>View Product</title>

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
        <a class="dropdown-item" href="shop.php">All Products</a>
    
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
        	
        	<a class='dropdown-item' href='shopproducts.php?filter=$idvar'>$name</a>";
  	
        }
 
        ?>
        
        </div>
        
		<li class="nav-item right">
        <a class="nav-link" href="../admin/selling.php">Sell <i class="fas fa-money-check-alt"></i></a>
        </li>
        
         <li class="nav-item right">
        <a class="nav-link" href="../admin/account.php">Account <i class="fas fa-user"></i></a>
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
	
	<?php
			
			while ($row = $result->fetch_assoc()){
			$type = $row['Type'];
			$desc = $row['description'];
			$price = $row['price'];
			$image = $row['path'];
			$id = $row['id'];
			$info = $row['Information'];
			$date = $row['published'];
			$selleremail = $row['email'];
			
			
			
			
	echo"
		<div class ='row pad2'>
			<div class ='col'>
				<h1 class='text-center'>$type</h1>
  			</div>
		</div>
		
		
		<div class ='row'>
				<div class ='col pad1 prod'>
				<img src='../admin/productimgstorage/$image' alt='$desc Image' class='img-thumbnail'>
				</div>
			
				
				<div class ='col prod pad2'>
				
				<form method ='POST' action ='individualproduct.php?product=$id'>
					<p><h3>$desc</h3></p>
					<p><b>Information: </b>$info</p>
					<p><b>Price:</b>£$price</p>
					<p><small><b>Posted on:</b> $date</small></p>
					<a href='sellerprofile.php?product=$id'><p>View Seller Profile <i class='fas fa-address-card'></i></p></a>
				
				
				<div class='form-group pad2'>
   					<label for='exampleInputEmail1'><h5><u>Contact the seller to initiate a purchase</u></h5></label>
    				<input type='email' value='$myemail' class='form-control' id='exampleInputEmail1' aria-describedby='emailHelp' placeholder='Enter an email address for the seller to reply to' name='postemail' required>
    				<small id='emailHelp' class='form-text text-muted'>We'll never share your details with anyone else.</small>
  				</div>
				
				
				<button type='submit' class='btn btn-primary' name='emailsend'>Submit</button>
			
				</form>
				</div>
		</div>";
		}

		?>
		
		<?php
			
			if(isset($_POST['emailsend'])){
			
				$from = $conn->real_escape_string($_POST['postemail']);
				$to = $selleremail;
				$subject = $desc;
				$msg = 'Hello, your product is gaining interest. Reply to the email address above to initiate a purchase ';
				
				mail($to, $subject, $msg, $from);
				
				echo "
				<div class='row text-center pad1'>
    				<div class='col'>
						<p><h2>Your email has been sent</h2></p>
						<p><h3>Thank You for using Elmtree
						<i class='fas fa-smile-wink'></i>
						</h3></p>
					</div>
				</div>";
			

			
			}
		?>
			
			
		
	</div>
	
	<nav class="navbar justify-content-end navbar-light bg-light">
 			 <a class="navbar-brand" href="../index.php">Elmtree GAA Swap Shop <i class="fas fa-trademark"></i></a>
	</nav>

	
</body>	
</html>
	
	