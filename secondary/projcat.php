<?php
session_start();
 
require_once("../Others/member_config.php");
$get=mysqli_query($link,"SELECT * from categ");
$option='';
while($row=mysqli_fetch_assoc($get))
{

	$option.='<option value="'.$row['proj_categ'].'">'.$row['proj_categ'].'</option>';
	$_SESSION['proj_categ']=$row['proj_categ'];
	$_SESSION['categ_id']=$row['categ_id'];
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Project category</title>



<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../styles/style_fpg.css">
<link rel="stylesheet" type="text/css" href="../styles/style_int.css">

<script type="text/javascript">
	$(document).ready(function(){
    function alignModal(){
        var modalDialog = $(this).find(".modal-dialog");
        /* Applying the top margin on modal dialog to align it vertically center */
        modalDialog.css("margin-top", Math.max(0, ($(window).height() - modalDialog.height()) / 2));
    }
    // Align modal when it is displayed
    $(".modal").on("shown.bs.modal", alignModal);
    
    // Align modal when user resize the window
    $(window).on("resize", function(){
        $(".modal:visible").each(alignModal);
    });   
});
</script>



<style >
	#sel1
	{
		width: 35%;
		margin-left: 300px;
	}
	
	
</style>
</head>
<body >

<header>
<div class="navbar navbar-inverse" role="navigation" id="navig">
<div class="container-fluid">
<div class="navbar-header">
        
        <a class="navbar-brand" href="../specs-after-login.php">SPeCS</a>
      </div>

<div class="collapse navbar-collapse">
<ul class="nav navbar-nav navbar-right">
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><?php 
                    if(isset($_SESSION['logged']))
                    {
                        echo $_SESSION['first_name']; echo " "; 
                        echo $_SESSION['last_name'];
                    }
                    
                ?><span class="caret"></span></a>
<ul class="dropdown-menu" style="text-align: center;">

<li><a href="../php/profile.php">Profile</a></li>
<li><a href="projcat.php">Project </a></li>
<li><a href="../php/logout.php">Logout</a></li>

</ul>

</li>
</ul>

</div>

    </div>
</div>
</header>

<div class="container">

<div class="form-group ">
<form method="post" action="" id="selformcat">
  <label for="sel1"  style="font-size: 16px;">Choose a project category:</label>
  
  <select class="form-control" id="sel1" name="sel1" >
  	<option selected="selected">---|---</option>
  	<?php echo $option; ?>

  </select>
  <input type="submit" value="Select" >
 </form>
   <button class="btn btn-primary " style="margin-left: 700px;margin-top: -60px;" data-toggle="modal" data-target="#mymodal">Add</button>
  <button class="btn btn-primary " style="margin-left: 5px; margin-top: -60px;" data-toggle="modal" data-target="#mymodal2">Edit</button>
 
</div>

<!------------------ Add---------------------->

<div class="modal fade" id="mymodal" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Add a new project category</h4>
			</div>
			<div class="modal-body">
				<form class="form" method="post" action="addpcat.php">
					<div class="form-group">
						<input type="text" value="<?php  ?>" name="pcatg" class="form-control">
					</div>
					
					<div class="modal-footer">
					<button type="submit" name="add" class="btn btn-primary pull-right">OK</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

<!---------------------------Edit-------------------- -->

<div class="modal fade" id="mymodal2" role="dialog">
	<div class="modal-dialog modal-sm">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Edit the project category</h4>
			</div>
			<div class="modal-body">
				<form class="form" method="post" action="updatepcat.php">
					<div class="form-group">
						<input type="text" name="pcatg" value="<?php echo $_SESSION['proj_categ']; ?>" class="form-control">
					</div>TO
					<div class="form-group">
						<input type="text" name="upcatg"  class="form-control">
					</div>
					<div class="modal-footer">
					<button type="submit" name="edit"  class="btn btn-primary pull-right">SAVE</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>

</div>

<!-- Footer -->

<div class="footer-bottom">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="footer">
   &#169; 2017.SHRUTHI.All Rights Reserved.All Trademarks are acknowledged.
</div>
</div>  
</div>
</div>
</div>

<!--<script type="text/javascript">
	$("#selformcat").submit(function(e){
		var selcat=document.getElementById("sel1").value;
		$.ajax({
			
		data: selcat,
		type:"post",
		url:"after_categ.php",
		processData:false, 
		contentType:false,
		success:function(data){
			alert("Done!"+data);
		},
		error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
    }
		});
		e.preventDefault();
	});
</script>-->

</body>
</html>