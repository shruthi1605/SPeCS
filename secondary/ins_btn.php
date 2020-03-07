<?php
session_start();
require_once("../Others/member_config.php");

$pcat=mysqli_real_escape_string($link,$_SESSION['proj_categ']);

$cid="SELECT categ_id from `categ` where proj_categ='$pcat'";
	
	$qy=mysqli_query($link,$cid);
	$row=mysqli_fetch_array($qy);
	$_SESSION['categ_id']=$row['categ_id'];
	$id=$row['categ_id'];

//$bid=mysqli_real_escape_string($link,$_GET['id']);

$sql="INSERT into button (`categ_id`) values('$id')";

	$res=mysqli_query($link,$sql);

	if($res)
		{
			echo "Yes!";
		}
	else
		echo "Error! ".mysqli_error($link);
?>