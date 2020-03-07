<?php
require_once("../Others/member_config.php");


//var_dump($_POST['bsubmit']);
if(isset($_POST['bsubmit']))
{
	$errors=array();

	if(empty($_POST['fname']))
	{
		$errors[]="Please enter first name"; 
	}
	else
		{$fname=mysqli_real_escape_string($link,$_POST['fname']); }

	if(empty($_POST['lname']))
	{
		$errors[]= "Please enter last name";
	}
	else
		$lname=mysqli_real_escape_string($link,$_POST['lname']);

	if(empty($_POST['email']))
	{
		$errors[]= "Please enter email-id";
	}
	else
		$email=mysqli_real_escape_string($link,$_POST['email']);
	if(empty($_POST['pw']))
	{
		$errors[]= "Please enter password";
	}
	else
		$pw=$_POST['pw'];
	if(empty($_POST['cname']))
	{
		$errors[]="Please enter college name";
	}
	else
		$cname=mysqli_real_escape_string($link,$_POST['cname']);
	if(empty($_POST['mno']))
	{
		$errors[]="Please enter mobile number";
	}
	else
		$mno=$_POST['mno'];

}
$pw=password_hash($pw,PASSWORD_DEFAULT);

if(empty($errors))
{
	$sql="INSERT into student_prof (`first_name`,`last_name`,`email_id`,`password`,`colg_name`,`mob_no`) values('$fname','$lname','$email','$pw','$cname','$mno')";
	$result=mysqli_query($link,$sql) ;

	if($result)
		{header("Location: ../Others/thank-you.html");}
	else 
		echo "Error inserting".mysqli_error($link);
}
else
	echo $errors;

?>