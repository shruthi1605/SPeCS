<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Specs</title>
	<link rel="stylesheet" type="text/css" href="../styles/style_int.css">
<link rel="stylesheet" type="text/css" href="../styles/projf.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

    

</head>
<body>



<div class="container" id="body" >
<fieldset><legend align="center">PROJECT DETAILS</legend>
	<form class="form-horizontal alert alert-warning" name="projlist" id="projform" ng-submit="insertInfo(projinfo);" >

	
	
	<div class="form-group" >
		<label class="control-label col-lg-5">Project Title</label>
		<div class="col-lg-3">
		<input class="form-control" type="text" name="projtit" ng-model="projinfo.projtit" autofocus required/>
		</div>
	</div>
	<div class="form-group">
		<p class="text-danger" ng-show="projlist.title.$invalid">This field is empty!</p>
		</div>

	<div class="form-group" >
		<label class="control-label col-lg-5">Year of Project</label>
		<div class="col-lg-3">
		<input id="#datepicker" class="form-control" type="number"  min="2012" max="2017" name="yop" ng-model="projinfo.yop" autofocus required/>
		</div>
	</div>
	<div class="form-group">
		<p class="text-danger" ng-show="projlist.yop.$invalid">This field is empty!</p>
		</div>

	<div class="form-group" >
		<label  class="control-label col-lg-5">Project Definition</label>
		<div class="col-lg-3">
		<textarea class="form-control" type="text" name="projdef" size="300" ng-model="projinfo.projdef" autofocus required></textarea>
		</div>
	</div>
	<div class="form-group">
		<p class="text-danger" ng-show="projlist.proj_defn.$invalid">This field is empty!</p>
		</div>

	<div class="form-group" >
		<label class="control-label col-lg-5">Description of Project</label>
		<div class="col-lg-3">
		<textarea class="form-control" type="text" name="desc" size="700" ng-model="projinfo.desc" autofocus required></textarea>
		</div>
	</div>
	<div class="form-group">
		<p class="text-danger" ng-show="projlist.proj_desc.$invalid">This field is empty!</p>
		</div>

	<div class="form-group" >
		<label class="control-label col-lg-5">My Learnings</label>
		<div class="col-lg-3">
		<textarea class="form-control" type="text" name="learn" size="300" ng-model="projinfo.learn" autofocus required></textarea>
		</div>
	</div>
	<div class="form-group">
		<p class="text-danger" ng-show="projlist.learning.$invalid">This field is empty!</p>
		</div>

	<div class="form-group" >
		<label class="control-label col-lg-5">Attachments<h6><small>(Attach document/pdf of upto 5mb)</small></h6></label>
		<div class="col-lg-3">
		<input class="form-control" type="file" name="datafile" size="40" multiple ng-model="projinfo.datafile" />
		</div>
	</div>

	<div class="form-group">
		
		<div id="savef">
		<button id="saveform" class="btn btn-primary" ng-disabled="projlist.$invalid" type="submit"  name="save"  >Save </button>
		</div>
	</div>


	</form>
</fieldset>
</div>





</body>
</html>