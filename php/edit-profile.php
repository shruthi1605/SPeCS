<?php 
session_start();

?>
<!DOCTYPE html>
<html>
<head>
	<title>SPeCS</title>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


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
<h3 id="editpro" >Edit Profile</h3> <a href="profile.php" id="bck">&#x25c0;&nbsp;Back</a>

<form class="form-horizontal" method="post" action="../Others/update-db.php" id="editform">
<fieldset>
	<div class="form-group" >
		<label class="control-label col-lg-5">First Name:</label>
		<div class="col-lg-3">
		<input class="form-control" type="text" id="idfname" name="fname" value=<?php echo $_SESSION['first_name'];?> />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-lg-5">Last Name:</label>
		<div class="col-lg-3">
		<input class="form-control " type="text" id="idlname" name="lname" value=<?php echo $_SESSION['last_name'];?> />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-lg-5">College Name:</label>
		<div class="col-lg-3">
		<input class="form-control " type="text" id="idcname" name="cname" value=<?php echo $_SESSION['colg_name'];?> />
		</div>
	</div>

	<div class="form-group">
		<label class="control-label col-lg-5">Contact number:</label>
		<div class="col-lg-3">
		<input class="form-control " type="text" name="mno" id="idmno" value=<?php echo $_SESSION['mob_no'];?> />
		</div>
	</div>

	<div class="form-group">
		
		<div class="col-lg-3">
		<input class="form-control " type="hidden" name="email" id="idemail" value=<?php echo $_SESSION['email_id'];?> />
		</div>
	</div>

	<div class="form-group">
		
		<div id="save">
		<button id="update" class="btn btn-primary" type="submit" name="update" >Save Changes</button>
		</div>
		
	</div>
</fieldset>
</form>
</div>

<div id="drp" style="margin-left: 500px;margin-top: -90px;">

	<a class="accordion" href="#" style="margin-left: -50px;margin-bottom: -400px;">Change password</a>

	<div class="panel" style="display: none;">
		<form method="post" action="" id="changepw">

		<label class="control-label ">Old password:</label>
			<input class="form-control " type="password" name="oldpw" style="width: 300px;" />

		<label class="control-label ">New password:</label>
			<input class="form-control" type="password" name="newpw" style="width: 300px;"/>

		<input class="form-control " type="hidden" name="email" id="pwemail" value=<?php echo $_SESSION['email_id'];?> />

		<button id="pass" class="btn btn-primary" type="submit" name="savepw" style="margin-top: 10px;">Save</button>

		</form>
	</div>
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

<script >
$(document).ready(function(){
		$("#drp").accordion({
			collapsible:true,active:false
		});

		$("#changepw").submit(function(e){
		
		$.ajax({
			data:$("#changepw").serialize() ,
			type:"post",
			url:"change_pw.php",
			success:function(data){
			//console.log("Done!"+data);
			alert("Your changes have been made");
			location.reload();
		},
		error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
    }
			});
		e.preventDefault();
		});
	});


</script>

</body>
</html>