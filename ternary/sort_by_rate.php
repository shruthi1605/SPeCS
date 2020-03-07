<?php
session_start();
require_once("../Others/member_config.php");


	?>



<!DOCTYPE html>
<html>
<head>
	<title></title>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/js/star-rating.js"></script>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.1/css/star-rating.css">

<link rel="stylesheet" type="text/css" href="../styles/style_fpg.css">
<link rel="stylesheet" type="text/css" href="../styles/projf.css">	

<!--Angular -->

<script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/angular-ui-bootstrap/1.3.3/ui-bootstrap-tpls.js"></script>
    
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular-animate.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.6.1/angular-sanitize.js"></script>
    <script src="../scripts/ang.js"></script>

</head>
<body>

<header>
<div class="navbar navbar-inverse " role="navigation" id="navig" >
	<div class="container-fluid">
		<div class="navbar-header">
    		
    		<a class="navbar-brand" href="../spec_home.html">SPeCS</a>
    	</div>
    	<div >
    	<ul class="nav navbar-nav navbar-right" >
    		<li class="ls" ><a id="link1"  href="../PHP/signup.html">Signup</a></li>
    		<li class="ls" ><a  id ="link2" href="../PHP/login.html">Login</a></li>
    	</ul>
    	</div>
    </div>
</div>
</header>

<div class="container" ng-app="sortApp" ng-controller="mainController">
	<div class="center-table ">
	<div class="searchhead" >
		<div class="ui-widget">
		<form method="post" id="srch" action="sort_by_rate.php">
		   <input class="next_pg_search" placeholder=" Search by project category or student name..." type="search"  name="keyword" id="explore">
		   <div id="sb" style="position:absolute; bottom: 170px;left:390px;" ></div> 
		        <div class="inner-addon right-addon">
		          
		            <button id="search_btn" class="btn btn-default" type="submit" value="Search" name="go" >
		            	<span class="glyphicon glyphicon-search"></span>
		              </button>     
		            
		        </div>
		        </form>
		</div>
	</div>
	<!--To search for the keyword -->

	
		<p style="color: red;"><strong>Your  search  for  ""  fetched  the  following  results..</strong></p>
		<div class="row"><center>
		<div class="table-responsive">
			<table id="mytable" class="table table-bordred table-striped table-hover" style="width: 70%;margin-top: 17px;">
				<thead>
					<th id="stnm"><a href="#" ng-click="sortType = 'first_name'">Student name<span ng-show="sortType == 'roll'" class="fa fa-caret-down"></span>
          </a>
          </th>
					<th id="ptit"><a href="#" ng-click="sortType = 'title'">
          <span ng-show="sortType == 'title'" class="fa fa-caret-down"></span>Project title</a></th>
					<th id="rat"><a href="#" ng-click="sortType = 'avg_rate'">
          <span ng-show="sortType == 'avg_rate'" class="fa fa-caret-down"></span>Rating</a></th>
				</thead>
				<tbody >
					<tr ng-repeat="result in search  | orderBy:sortType:sortReverse track by $index">
						<td>{{result.search}}</td>
						<td>{{result.search}}</td>
						<td><span uib-rating ng-model="result.avg_rate" max="max" read-only="isReadonly" on-hover="hoveringOver(value)" on-leave="overStar = null" titles="['one','two','three']" aria-labelledby="default-rating"></span></td>
					</tr>
				</tbody>
			</table>
			</div>
		</div>
		</center>
	</div>
</div>
<!--If no results were found in db or if no keyword was entered -->

<!--Footer-->
<div class="footer-bottom">
<div class="container">
<div class="row">
<div class="col-lg-12">
<div class="footer">
	 &#169; 2017. SPeCS - Student Project eCatalogue System - portal is developed by SHRUTHI. All Rights Reserved. All Trademarks are acknowledged.
</div>
</div>	
</div>
</div>
</div>

<!--Modal for displaying the student project details-->

<div class="modal fade" id="vproj" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <center><h3 class="modal-title">Student Project Details </h3></center>
            </div>
    <div class="modal-body" id="projdet" >							
	<form >
	<fieldset>

	<div class="form-group row ">
		<div>
		<span class="col-lg-6"></span>
			<label class="col-lg-3 col-form-label">
				Current Rating:
			</label>
			<div class="col-lg-3">
				
					<fieldset  >
						
                        <input name="input-3" id="in-rating" value="" title="" class="rating-loading in_rating" data-show-clear="false" data-show-caption="false" data-size="xxs" data-readonly />

                    </fieldset>
				
			</div>
		</div>
	</div>

	<div class="form-group row">
    <label class="col-lg-6 col-form-label">Student name:</label>
    <div class="col-lg-6">
      <p class="form-control-static" id="name"></p>
   </div>
</div>

<div class="form-group row">
    <label class="col-lg-6 col-form-label">College name:</label>
    <div class="col-lg-6">
      <p class="form-control-static" id="college"></p>
   </div>
</div>

<div class="form-group row">
    <label class="col-lg-6 col-form-label">Project category:</label>
    <div class="col-lg-6">
      <p class="form-control-static" id="categ"></p>
   </div>
</div>

  <div class="form-group row">
    <label class="col-lg-6 col-form-label">Project Title:</label>
    <div class="col-lg-6">
      <p class="form-control-static" id="ptitle"></p>
   </div>
</div>
  <div class="form-group row">
    <label class="col-lg-6 col-form-label">Year of project:</label>
    <div class="col-lg-6">
      <p class="form-control-static" id="year"></p>
   </div>
</div>
	<div class="form-group row">
    <label class="col-lg-6 col-form-label">Project definition:</label>
    <div class="col-lg-6">
      <p class="form-control-static" id="defn"></p>
   </div>  
</div>
   <div class="form-group row">
    <label class="col-lg-6 col-form-label">Description of project:</label>
    <div class="col-lg-6">
      <p class="form-control-static" id="pdesc"></p>
   </div>
</div>
   <div class="form-group row">
    <label class="col-lg-6 col-form-label">My learning:</label>
    <div class="col-lg-6">
      <p class="form-control-static" id="plearn"></p>
   </div> 
</div>
   <div class="form-group row">
    <label class="col-lg-6 col-form-label">Attachments:</label>
    <div class="col-lg-6">
      <p class="form-control-static" id="pattach"></p>
   </div> 
</div>

   <div class="form-group row">
    <label class="col-lg-6 col-form-label">Project Link:</label>
    <div class="col-lg-6">
      <p class="form-control-static" id="plink"></p>
   </div> 
</div>

<div class="form-group row">
    <label class="col-lg-6 col-form-label">Rate this project</label>
    <div class="col-lg-6">
      
       <fieldset id='demo1' class="rating">
                        <input class="stars" type="radio" id="star5" name="rating" value="5"   />
                        <label class = "full" for="star5" title="5 stars"></label>
                        <input class="stars" type="radio" id="star4" name="rating" value="4" />
                        <label class = "full" for="star4" title="4 stars"></label>
                        <input class="stars" type="radio" id="star3" name="rating" value="3" />
                        <label class = "full" for="star3" title="3 stars"></label>
                        <input class="stars" type="radio" id="star2" name="rating" value="2" />
                        <label class = "full" for="star2" title="2 stars"></label>
                        <input class="stars" type="radio" id="star1" name="rating" value="1" />
                        <label class = "full" for="star1" title="1 star"></label>

                    </fieldset>
   </div>
</div>

<div class="form-group row">
    <label class="col-lg-6 col-form-label" align="right">Contact details of the student:</label>
    
</div>

<div class="form-group row">
    <label class="col-lg-6 col-form-label">Mobile number:</label>
    <div class="col-lg-6">
      <p class="form-control-static" id="mno"></p>
   </div>
</div>

<div class="form-group row">
    <label class="col-lg-6 col-form-label">Email-id:</label>
    <div class="col-lg-6">
      <p class="form-control-static" id="email"></p>
   </div>
</div>

</div><!----Modal body---->
   <div class="modal-footer">
    <div class="form-group">
    <button type="button" class="close" data-dismiss="modal" style="color:#152133;opacity: .5;">CLOSE</button>
    </div>
    </div>   

  </fieldset>
  </form>
		</div>
				</div>
				</div> <!--Modal close -->

<script >
//-----------JS for displaying the project details-----------	

$(document).ready(function(){
var id={};
	$(document).on('click','#view',function(e){
		e.preventDefault();

		var proid=$(this).data('id');

		

		$.ajax({
	type:"post",
	url:"disp_det.php",
	data:"p_id="+proid,

	success:function(d){
		//console.log(d);
		
		
		$.each(d,function(i,pdet){
		//console.log(d.name.first_name);
		//console.log(d.rate.avg_rate);
		$('#name').html('');
		$('#name').html(d.name.first_name);

		$('#college').html('');
		$('#college').html(d.name.colg_name);

		$('#categ').html('');
		$('#categ').html(d.categ.proj_categ);

		$('#ptitle').html('');
		$('#ptitle').html(d.proj.title);

		$('#year').html('');
		$('#year').html(d.proj.yop);

		$('#defn').html('');
		$('#defn').html(d.proj.proj_defn);

		$('#pdesc').html('');
		$('#pdesc').html(d.proj.proj_desc);

		$('#plearn').html('');
		$('#plearn').html(d.proj.learning);

		$('#pattach').html('');
		$('#pattach').html('<a href="../images/'+d.proj.attachments+'">'+d.proj.attachments+'</a>');

		$('#plink').html('');
		$('#plink').html('<a href="'+d.proj.link+'">'+d.proj.link+'</a>');

		$('#mno').html('');
		$('#mno').html(d.name.mob_no);

		$('#email').html('');
		$('#email').html(d.name.email_id);

		$('.in_rating').rating('update',d.rate.avg_rate);

		id.pid=d.proj.proj_id;
		console.log(id.pid);
	});	
		
	},
	error: function(xhr, desc, err) {
      console.warn(xhr.responseText)
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
});

	});

//--------------------JS for rating-----------------------


$("#demo1 .stars").click(function () {
                           		var pjid=id.pid;
                           		//console.log(pjid);
                                $.post('rating.php',{pid:pjid,rate:$(this).val()},function(d){
                                	console.log(d);
                                    if(d>0)
                                    {
                                        alert('You already rated');
                                    }else{
                                        alert('Your rating has been recorded');
                                    }
                                });
                                $(this).attr("checked");
                                location.reload();
                            });
	
	$(".rating-loading").rating({displayOnly: true, step: 0.1});
	
	
});
//-----------For displaying stars-----------------



 </script>



</body>
</html>


		
	
	
	
	
	
