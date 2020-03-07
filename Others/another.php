<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>SPeCS</title>
	<link rel="stylesheet" type="text/css" href="../styles/style_int.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</head>

<body>

<header>
<div class="head" id="navig">
	
		<div class="next">
    		
    		<a class="brand" href="specs-after-login.php">SPeCS</a>
    	</div>
    	<div >
    	<ul class="ls" >

    		<li class="lis" style="float: right; text-align: center;"><a  class ="dropout" href="php/logout.php">Logout</a></li>

    		<li class="ls" style="float: right; text-align: center;color:white;">
    			<a href="php/profile.php" class="dropbtn" id="dropmain" ><?php 
    				if(isset($_SESSION['logged']))
    				{
    					echo $_SESSION['first_name']; echo " "; 
    					echo $_SESSION['last_name'];
    				}
    				
    			?></a>
    			
    		</li>

    		
    		
    	</ul>
    	</div>
    </div>
</div>
</header>

<div class="container">
<div class="col-lg-12"  >
    <p id="block">Your form has been saved. Do you want to add another project?</p>
</div>
<div class="btn-group" id="blockbtn">
<a href="../proj_categ.php"><button class="btn btn-primary" >Yes</button></a>
<a href="../proj_categ.php"><button class="btn btn-primary">No</button></a>
</div>
</div>



</body>
</html>