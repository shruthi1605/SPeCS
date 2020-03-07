<?php 
session_start();
require_once("../Others/member_config.php");

//var_dump($_POST['go']);
if(isset($_POST['go'])) {
	if(!empty($_POST['keyword'])){
	$query=$_POST['keyword']; 

	$sql="SELECT * FROM `student_prof` INNER JOIN `stud_proj` ON student_prof.stud_id=stud_proj.stud_id  WHERE (first_name like '%$query%' OR last_name like '%$query%' OR title like '%$query%' OR tags like '%$query%') ORDER BY first_name desc";

	$res=mysqli_query($link,$sql);

	if($res){
						$num_rows=mysqli_num_rows($res);
						if($num_rows>=1){

				$row=mysqli_fetch_assoc($res);
				$cid=$row['categ_id'];
				$pid=$row['proj_id'];

				$sql1="SELECT proj_categ from categ where categ_id=$cid";
				$res1=mysqli_query($link,$sql1);
				
				$sql2="SELECT avg_rate from rating where proj_id=$pid";
				$res2=mysqli_query($link,$sql2);	

				mysqli_data_seek($res,0);

				$arr=array();

			while($row1=mysqli_fetch_assoc($res)){
				
				$arr['proj']=$row1;
				
			
			while($row2=mysqli_fetch_assoc($res1)){

				$arr['categ']=$row2;
			}
			while($row3=mysqli_fetch_assoc($res2)){

				$arr['rating']=$row3;
			}
			header('Content-type: application/json');	
			echo json_encode($arr);
		}
			}
			else 
				echo '<tr><td>Found no results matching your query! Please try again.</tr></td>';
			}
				else 
					{
						echo '<tr><td>Found no results matching your query! Please try again.</tr></td>';
						}

		}
}


else
	echo "Error occured while submitting!".mysqli_error($link);

?>