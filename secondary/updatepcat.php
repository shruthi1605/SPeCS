<?php
session_start();

require_once("../Others/member_config.php");

//if(isset($_POST['edit']))
{
	$pcatg=mysqli_real_escape_string($link,$_POST['pcatg']);
	$upcatg=mysqli_real_escape_string($link,$_POST['upcatg']);

	$sql="UPDATE categ SET proj_categ='$upcatg' where proj_categ='$pcatg'";

	$res=mysqli_query($link,$sql);

	if($res)
		//header("Location:projcat.php");
		echo "Updated!";
	else 
		echo "ERRor updating".mysqli_error($link);
}

?>