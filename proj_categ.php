<?php 
session_start();
require_once("Others/member_config.php");

?>

<!DOCTYPE html>
<html ng-app="myapp">
<head>
	<title>SPeCS</title>
	<link rel="stylesheet" type="text/css" href="styles/style_int.css">
	<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.min.js"></script>

</head>

<body>



<div class="container" ng-controller="DbController" >
<div class="center-table ">
	<div class="row">
		
        
        
        
        <div class="table-responsive">
        		<div id="cat" align="center" class="col-lg-12">
        		<h2 id="cat-head">Project Category:
                     </h2>
                     
               
               <div ng-include src="'php/add-proj.php'"></div>
               <div class="clearfix"></div>

              <table id="mytable" align="center" class="table-condensed table-bordred table-striped">
                   
                   <thead>
                   	<th>Project  Name</th>
                    <th>Edit</th>
                   <th>Delete</th>
                       
                   </thead>
                   <tbody>
                   <tr ng-repeat="detail in details" >
                   
                    <td>{{detail.title}}</td>
                    

                    
                    </tr>
                   </tbody>
                 </table>
        </div>
        </div>
</div>
  </div>
  </div>

<script src="scripts/angular-script.js"></script>
</body>
</html>
