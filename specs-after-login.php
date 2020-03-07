<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title>SPeCS</title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

	<link rel="stylesheet" type="text/css" href="styles/style_fpg.css">
	
</head>
<body>

<div class="navbar navbar-inverse" role="navigation" id="navig">
<div class="container-fluid">
<div class="navbar-header">
    		
    		<a class="navbar-brand" href="specs-after-login.php">SPeCS</a>
    	</div>

<div class="collapse navbar-collapse">
<ul class="nav navbar-nav navbar-right">
<li><a href="specs-after-login.php">Home</a>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><?php 
                    if(isset($_SESSION['logged']))
                    {
                        echo $_SESSION['first_name']; echo " "; 
                        echo $_SESSION['last_name'];
                    }
                    
                ?><span class="caret"></span></a>
<ul class="dropdown-menu" style="text-align: center;">

<li><a href="php/profile.php">Profile</a></li>
<li><a href="secondary/list_proj.php">Project </a></li>
<li><a href="php/logout.php">Logout</a></li>

</ul>

</li>
</ul>

</div>

    </div>
</div>

<!-------------------------------------------------------------------->

	<!--<div class="fpg_body">
		<article class="intro">SPeCS,Student Project eCatalogue System, is a portal that enables users to view the kinds of projects made by engineering students during their academic years in college and rate them.Search for projects below or sign up to showcase your projects.</article>
	
	</div>-->
    <div style="text-align: center;padding-top: 5px;color:#2d4577;">
        <h2><strong>SPeCS - Student Project eCatalogue System</strong></h2>
    </div>
    <div >
        <button class="btn btn-primary" style="margin-top: 180px;margin-left: 300px;width:400px; font-size: 18px" onclick="location.href='php/profile.php'">View / Edit your profile details</button>
        <button class="btn btn-primary" style="margin-top: 180px;margin-left: 40px;width:400px;font-size: 18px;" onclick="location.href='secondary/list_proj.php'">Add / View a project</button>
    </div>
<div class="footer-bottom">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="footer">

	 &#169; 2017. SPeCS - Student Project eCatalogue System - portal is developed by SHRUTHI. All Rights Reserved. All Trademarks are acknowledged.
</div>
</div>
</div>
</div>	
</div>




</body>
</html>