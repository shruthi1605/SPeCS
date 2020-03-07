<?php
require_once("../Others/member_config.php");

$qry="SELECT * from stud_proj order by proj_id ASC";

$result=mysqli_query($link,$qry);

$arr=array();

if(mysqli_num_rows($result)!=0)
{
	while($row=mysqli_fetch_assoc($result))
	{
		$arr[] = $row;
	}
}

echo $json_info = json_encode($arr);

?>