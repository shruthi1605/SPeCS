<?php
session_start();
require_once("../Others/member_config.php");

if(isset($_POST['rate']) && !empty($_POST['rate'])){

	$rate=mysqli_real_escape_string($link,$_POST['rate']);
	$pid=$_POST['pid']; 

	$sql="INSERT into rating (`rate_no`,`proj_id`) values('$rate','$pid') ";
	$res=mysqli_query($link,$sql);
	if($res)
	{
		$sql="SELECT rate_no from rating where proj_id=$pid";
		$res1=mysqli_query($link,$sql);
		$tot=mysqli_num_rows($res1);

		if($res1)
			{
				$rating=0;
				while($row=mysqli_fetch_assoc($res1))
					$rating+=$row['rate_no'];
				
				$avg=($rating/$tot);

				var_dump($avg);
				$res2=mysqli_query($link,"UPDATE rating set avg_rate=$avg where proj_id=$pid");
				$res3=mysqli_query($link,"SELECT round(avg_rate,1) from rating");
				if($res3)
					echo $avg;
				else 
					echo "Err".mysqli_error($link);
			}
		else
			echo mysqli_error($link);
		
	}	
	else 
		echo "Error".mysqli_error($link);
}

?>