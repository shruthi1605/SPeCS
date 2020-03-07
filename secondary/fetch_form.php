<?php
session_start();
require_once("../Others/member_config.php");

$pid=$_GET['id'];

$fetch="SELECT title,yop,proj_defn,proj_desc,learning,attachments from stud_proj where proj_id=$pid";

                 		$res2=mysqli_query($link,$fetch);

                 		$row2=mysqli_fetch_assoc($res2);


?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../styles/style_int.css">
</head>
</head>
<body>
<div class="container">
	<form id="pform">
	<fieldset><legend align="center">Project Details</legend>
  <div class="form-group row">
    <label class="col-lg-6 col-form-label">Project Title:</label>
    <div class="col-lg-6">
      <p class="form-control-static"><?php echo $row2['title']?></p>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-lg-6 col-form-label">Year of project:</label>
    <div class="col-lg-6">
      <p class="form-control-static"><?php echo $row2['yop']?></p>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-lg-6 col-form-label">Project definition:</label>
    <div class="col-lg-6">
      <p class="form-control-static"><?php echo $row2['proj_defn']?></p>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-lg-6 col-form-label">Description of project:</label>
    <div class="col-lg-6">
      <p class="form-control-static"><?php echo $row2['proj_desc']?></p>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-lg-6 col-form-label">My learnings:</label>
    <div class="col-lg-6">
      <p class="form-control-static"><?php echo $row2['learning']?></p>
    </div>
  </div>

  <div class="form-group row">
    <label class="col-lg-6 col-form-label">Attachments:</label>
    <div class="col-lg-6">
      <p class="form-control-static"><?php echo $row2['attachments']?></p>
    </div>
  </div>
  <button class="btn btn-default"><a href="list_proj.php" onclick="window.history.go(-1);return false;">Go back</a></button>
  </fieldset>
</form>
</div>
</body>
</html>