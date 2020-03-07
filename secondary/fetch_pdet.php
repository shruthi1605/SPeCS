<?php
session_start();
require_once("../Others/member_config.php");



$pid=$_POST['p_id'];


$qry="SELECT * from stud_proj where proj_id=$pid";
$res=mysqli_query($link,$qry); 
$row=mysqli_fetch_assoc($res);
$cid=$row['categ_id'];


$qry1="SELECT * from categ where categ_id=$cid";
$res1=mysqli_query($link,$qry1);

mysqli_data_seek($res,0);

if($res && $res1){
	$pdet=array();
	while($row1=mysqli_fetch_assoc($res))
	{
		$pdet['proj']=$row1;
	}
	
	while($row2=mysqli_fetch_assoc($res1))
	{
		$pdet['catg']=$row2;
	}
	header('Content-type: application/json');
	echo json_encode($pdet);
	
}
else
 echo "Error".mysqli_error($link);

?>