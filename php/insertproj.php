<?php
session_start();
require_once("../Others/member_config.php");


$data = json_decode(file_get_contents("php://input")); 
var_dump($data);
echo $data;

	
	$projtit=mysqli_real_escape_string($link,$data->projtit);
	$yop=mysqli_real_escape_string($link,$data->yop);
	$projdef=mysqli_real_escape_string($link,$data->projdef);
	$desc=mysqli_real_escape_string($link,$data->desc);
	$learn=mysqli_real_escape_string($link,$data->learn);
	$datafile=mysqli_real_escape_string($link,$data->datafile);

	$sql="INSERT into stud_proj(`title`,`yop`,`proj_defn`,`proj_desc`,`learning`,`attachments`) values('$projtit','$yop','$projdef','$desc','$learn',
			'$datafile')";

	$res=mysqli_query($link,$sql);

	if($res)
		{
			echo true;
		}
	else
		echo "Error! ".mysqli_error($link);


?>