<?php 
session_start();
require_once("../Others/member_config.php");

	$pid=mysqli_real_escape_string($link,$_GET['id']);

	$pcatg=mysqli_real_escape_string($link,$_POST['sel1']);
	$projtit=mysqli_real_escape_string($link,$_POST['projtit']);
	$yop=mysqli_real_escape_string($link,$_POST['yop']);
	$projdef=mysqli_real_escape_string($link,$_POST['projdef']);
	$desc=mysqli_real_escape_string($link,$_POST['desc']);
	$learn=mysqli_real_escape_string($link,$_POST['learn']);
	$tags=mysqli_real_escape_string($link,$_POST['tag']);
	$dlink= mysqli_real_escape_string($link,$_POST['dlink']);
	//$datafile=mysqli_real_escape_string($link,$_POST['datafile']); 
	//$df=$_FILES['datafile']['tmp_name'];  //to insert blob data
	//$datafile=file_get_contents($df);

	  $file_name = mysqli_real_escape_string($link,$_FILES['datafile']['name']);
      $file_size = $_FILES['datafile']['size'];
      $file_tmp = $_FILES['datafile']['tmp_name'];
      $file_type = $_FILES['datafile']['type'];

      $target_dir = "../images/";
	  $target_file = $target_dir . basename($file_name);
	  $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$res2=mysqli_query($link,"SELECT * from categ where proj_categ='$pcatg'"); 
$row=mysqli_fetch_assoc($res2);
$cid=$row['categ_id'];

$qry="UPDATE stud_proj set title='$projtit',yop='$yop',proj_defn='$projdef',proj_desc='$desc',learning='$learn',attachments='$file_name',link='$dlink',tags='$tags',categ_id='$cid' where proj_id=$pid";

$res=mysqli_query($link,$qry);

mysqli_data_seek($res2,0);

if($res && $res2){
	$pdet=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$pdet['proj']=$row;
	}
	while($row2=mysqli_fetch_assoc($res2))
	{
		$pdet['catg']=$row2;
	}
	//header('Content-type: application/json');
	echo json_encode($pdet);
}
else
 echo "Error".mysqli_error($link);

?>