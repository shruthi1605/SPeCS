<?php
require_once("member_config.php");

$stud="CREATE TABLE IF NOT EXISTS student_prof(
	first_name varchar(30) not null,
	last_name varchar(30) not null,
	email_id varchar(50) not null,
	password varchar(20) not null ,
	colg_name varchar(20) not null,
	mob_no varchar(10) not null,
	stud_id int(10)  auto_increment primary key
)";
$sql=mysqli_query($link,$stud);
if(!$sql)
 echo "Error!".mysqli_error($link);

$proj="CREATE TABLE IF NOT EXISTS `specs`.`stud_proj` ( `title` VARCHAR(30) NOT NULL , `yop` INT(4) NOT NULL , `proj_defn` TEXT NOT NULL , `proj_desc` TEXT NOT NULL , `learning` TEXT NOT NULL , `attachments` BLOB NOT NULL , `p_id` INT(10) NOT NULL auto_increment primary key) ENGINE = InnoDB);"
?>