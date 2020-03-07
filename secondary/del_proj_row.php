<?php
session_start();
require_once("../Others/member_config.php");

$id=$_POST['pid'];

$sql="DELETE from stud_proj where proj_id=$id";
$res=mysqli_query($link,$sql);
if($res){
	echo "Yes";

}
else 
echo "ErrOr".mysqli_error($link);

?>