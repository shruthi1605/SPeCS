<?php 
require_once("../Others/member_config.php");

$old=trim($_POST['oldpw']);
$new=($_POST['newpw']);

$eid=mysqli_real_escape_string($link,$_POST['email']);

$sql="SELECT password from student_prof where email_id='$eid'";
$res=mysqli_query($link,$sql);
$row=mysqli_fetch_assoc($res);

$oldpw=$row['password'];

if(password_verify($old,$oldpw))
{
	$new=password_hash($new,PASSWORD_DEFAULT);
	$qry="UPDATE student_prof set password='$new' where email_id='$eid'";
	$result=mysqli_query($link,$qry);

	if($result)
		echo "Success";
	else 
		echo "Error is updating.".mysqli_error($link);
}
else 
echo "Error in password verification.".mysqli_error($link);

?>