<?php
session_start();

require_once("../Others/member_config.php");

//if(isset($_POST['add']))
{
	$pcatg=mysqli_real_escape_string($link,$_POST['dat']);

	$sql="INSERT into categ (`proj_categ`) values('$pcatg')";

	$res=mysqli_query($link,$sql);var_dump($res);
	//$row2=mysqli_fetch_assoc($res);
	//$pcatg=$row2['proj_categ'];
	
	if($res)
		//header("Location:projcat.php");

		{echo "Inserted";
	
}

	else 
		echo "Not inserted".mysqli_error($link);

	$qry="SELECT * from categ where proj_categ='$pcatg'";
	$res2=mysqli_query($link,$qry);

	if($res2)
	{
		$arr=array();
	while($row=mysqli_fetch_assoc($res2))
		$arr=$row;

	echo json_encode($arr['proj_categ']);
	}
	else 
		echo "Error selecting".mysqli_error($link);
}

?>