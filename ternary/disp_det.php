<?php
session_start();
require_once("../Others/member_config.php");

$pid=mysqli_real_escape_string($link,$_POST['p_id']);
//$pid=1;
$qry="SELECT * from stud_proj where proj_id=$pid";
$res1=mysqli_query($link,$qry); 
$row=mysqli_fetch_assoc($res1);
$cid=$row['categ_id'];
$sid=$row['stud_id'];

$res2=mysqli_query($link,"SELECT * from categ where categ_id=$cid");

$res3=mysqli_query($link,"SELECT * from student_prof where stud_id=$sid");
$res4=mysqli_query($link,"SELECT * from rating where proj_id=$pid");
mysqli_data_seek($res1,0);
if($res1 && $res2 && $res3 && $res4){
	$pdet=array();
	while($row=mysqli_fetch_assoc($res1))
	{
		$pdet['proj']=$row;
	}

	while($row2=mysqli_fetch_assoc($res2))
	{
		$pdet['categ']=$row2;
	}
	
	while($row3=mysqli_fetch_assoc($res3))
	{
		$pdet['name']=$row3;
	}
	while($row4=mysqli_fetch_assoc($res4))
	{
		$pdet['rate']=$row4;
	}
	header('Content-type: application/json');
	echo json_encode($pdet);
}
else
 echo "Error".mysqli_error($link);
?>

