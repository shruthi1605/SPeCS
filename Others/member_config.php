<?PHP 
	$link=mysqli_connect("localhost","root","")or die("not connected");
	$db="CREATE DATABASE IF NOT EXISTS specs";
	$sql=mysqli_query($link,$db);
		if(!$sql)
			echo "Error!".mysqli_error($link);
		
     mysqli_select_db($link,"specs")or die("no db found");
    /* if($link)
		 echo "Connected";*/
?>