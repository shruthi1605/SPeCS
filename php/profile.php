<?php 
session_start();
require_once("../Others/member_config.php");

$email=$_SESSION['email_id'];

$qry="SELECT * from student_prof where email_id='$email'";
$result=mysqli_query($link,$qry);

$row=mysqli_fetch_assoc($result);
$fname=$row['first_name'];
$lname=$row['last_name'];
$cname=$row['colg_name'];
$mno=$row['mob_no'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>SPeCS</title>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../styles/style_fpg.css">
	<link rel="stylesheet" type="text/css" href="../styles/style_int.css">
	

</head>

<body>

<header>
<div class="navbar navbar-inverse" role="navigation" id="navig">
<div class="container-fluid">
<div class="navbar-header">
        
        <a class="navbar-brand" href="../specs-after-login.php">SPeCS</a>
      </div>

<div class="collapse navbar-collapse">
<ul class="nav navbar-nav navbar-right">
<li><a href="../specs-after-login.php">Home</a>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><?php 
                    if(isset($_SESSION['logged']))
                    {
                        echo $_SESSION['first_name']; echo " "; 
                        echo $_SESSION['last_name'];
                    }
                    
                ?><span class="caret"></span></a>
<ul class="dropdown-menu" style="text-align: center;">

<li><a href="profile.php">Profile</a></li>
<li><a href="../secondary/list_proj.php">Project </a></li>
<li><a href="logout.php">Logout</a></li>

</ul>

</li>
</ul>

</div>

    </div>
</div>
</header>


<div class="container-fluid">
<div class="center-table ">
	<h2 id="pro" style="color: #2d4577;font-weight: 500;">STUDENT   PROFILE </h2>
  
	<table class="table-condensed " width="398"  align="center" cellpadding="5">
  
  <tr>
    
    <td width="82" valign="top"><div >First Name:</div></td>
    <td width="165" valign="top"><div id="fname"><?php echo $fname ?></div></td>
  </tr>
  <tr>
    <td valign="top"><div >Last Name:</div></td>
    <td valign="top"><div id="lname"><?php echo $lname ?></div></td>
  </tr>
  <tr>
    <td valign="top"><div >College Name:</div></td>
    <td valign="top"><div id="cname"><?php echo $cname?></div></td>
  </tr>
  <tr>
    <td valign="top"><div >Contact Number:</div></td>
    <td valign="top"><div id="mno"><?php echo $mno ?></div></td>
  </tr>
  
</table>
  
</div>
<input type="hidden" name="email" value=<?php echo $_SESSION['email_id'];?>/>
<input id="editbtn" type="button" class="btn btn-info" value="EDIT PROFILE" onclick="location.href='edit-profile.php'" />
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