<?php
session_start();
require_once("../Others/member_config.php");

//echo $_POST['fname'];
$eid=mysqli_real_escape_string($link,$_POST['email']);

$sql="SELECT email_id from student_prof where email_id='$eid'";
$res=mysqli_query($link,$sql);

if($res)
{

	if(mysqli_num_rows($res)>0)
	{
		echo "exists";
	}
	else 
		echo "GO";
}
else 
echo "Error".mysqli_error($link);

?>