<?php
session_start();
require_once("../Others/member_config.php");



{	

	
	$projtit=mysqli_real_escape_string($link,$_POST['projtit']);
	$yop=mysqli_real_escape_string($link,$_POST['yop']);
	$projdef=mysqli_real_escape_string($link,$_POST['projdef']);
	$desc=mysqli_real_escape_string($link,$_POST['desc']);
	$learn=mysqli_real_escape_string($link,$_POST['learn']);
	$tags=mysqli_real_escape_string($link,$_POST['tag']);
	$dlink= mysqli_real_escape_string($link,$_POST['dlink']);
	 
	$file_name = mysqli_real_escape_string($link,$_FILES['datafile']['name']);
      $file_size = $_FILES['datafile']['size'];
      $file_tmp = $_FILES['datafile']['tmp_name'];
      $file_type = $_FILES['datafile']['type'];
	
//print_r($_FILES);
	$target_dir = "../images/";
$target_file = $target_dir . basename($file_name);
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

	if (empty($file_name) && empty($file_tmp))
        echo ''; 

    $upl= move_uploaded_file($file_tmp, $target_file);
	
	$pcat=mysqli_real_escape_string($link,$_POST['sel1']);
	
	$sid=mysqli_real_escape_string($link,$_SESSION['stud_id']);

	
	$id="SELECT categ_id from `categ` where proj_categ='$pcat'";
	
	$qy=mysqli_query($link,$id); 
	$row=mysqli_fetch_array($qy);
	$_SESSION['categ_id']=$row['categ_id'];
	$cid=$row['categ_id'];

	$sql="INSERT into `stud_proj` (`title`,`yop`,`proj_defn`,`proj_desc`,`learning`,`attachments`,`link`,`tags`,`categ_id`,`stud_id`) values('$projtit',$yop,'$projdef','$desc','$learn','$file_name','$dlink','$tags',$cid,$sid)";
	

	$res=mysqli_query($link,$sql); 
	
	if($res && $upl)
		{
			//header("Location:fetch_list.php?id=$cid");
			echo "OK!";
			
		}
	else
		echo "Error! ".mysqli_error($link);

}
?>