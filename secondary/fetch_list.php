<?php
session_start();
require_once("../Others/member_config.php");

?>

<?php
//$id=mysqli_real_escape_string($link,$_SESSION[categ_id]);
$id=$_GET['id'];
$sid=mysqli_real_escape_string($link,$_SESSION['stud_id']);

$qry="SELECT title from stud_proj where categ_id=$id and stud_id=$sid";
$res=mysqli_query($link,$qry);

if($res){
	$proj=array();
	while($row=mysqli_fetch_assoc($res))
	{
		$proj[]=$row;
	}
	header('Content-type: application/json');
	echo json_encode($proj);
}
else
 echo "Error".mysqli_error($link);

?>