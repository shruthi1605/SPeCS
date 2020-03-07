<?php
require_once("member_config.php");
session_start();


	if(isset($_POST['update']))
	{
		$fname=mysqli_real_escape_string($link,$_POST['fname']);
		$lname=mysqli_real_escape_string($link,$_POST['lname']);
		$cname=mysqli_real_escape_string($link,$_POST['cname']);
		$mno=mysqli_real_escape_string($link,$_POST['mno']);
		$eid=mysqli_real_escape_string($link,$_POST['email']);
		
		session_unset();
		$sql="UPDATE student_prof SET first_name='$fname',last_name='$lname',colg_name='$cname',mob_no='$mno' where email_id='$eid'";
		$res=mysqli_query($link,$sql);
		
		$qry="SELECT * from student_prof where email_id='$eid'";
		$result=mysqli_query($link,$qry);
		
		if($result)
		{
			$prof=array();

				
			$row = mysqli_fetch_assoc($result);
				$_SESSION['email_id'] = $row['email_id'];
           		$_SESSION['first_name']=$row['first_name'];
           		$_SESSION['last_name']=$row['last_name'];
                $_SESSION['colg_name']=$row['colg_name'];
              	$_SESSION['mob_no']=$row['mob_no'];
              	$_SESSION['logged']=true;
			
              echo ' <script language="javascript"> alert("Your changes have been saved.") </script>';
				 header("Location:../php/edit-profile.php");
              
				 exit;
		}
		else
			echo " ErroR ".mysqli_error($link);
	}
?>
