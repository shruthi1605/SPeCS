<?php 
session_start();
require_once("../Others/member_config.php");

$get=mysqli_query($link,"SELECT * from categ");
$option='';
while($row=mysqli_fetch_assoc($get))
{

  $option.='<option value="'.$row['proj_categ'].'">'.$row['proj_categ'].'</option>';
  $_SESSION['proj_categ']=$row['proj_categ'];
  $_SESSION['categ_id']=$row['categ_id'];
}
?>

<!DOCTYPE html>
<html >
<head>
	<title>SPeCS</title>
	
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

<script src="//netdna.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="//netdna.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" type="text/css" href="../styles/style_fpg.css">
	<link rel="stylesheet" type="text/css" href="../styles/style_int.css">

</head>

<body >

<header>
<div class="navbar navbar-inverse" role="navigation" id="navig">
<div class="container-fluid">
<div class="navbar-header">
        
        <a class="navbar-brand" href="../specs-after-login.php">SPeCS</a>
      </div>

<div class="collapse navbar-collapse">

<ul class="nav navbar-nav navbar-right">
<li><a href="../specs-after-login.php">Home</a>
<li class="dropdown">
<a href="#" class="dropdown-toggle" data-toggle="dropdown" ><?php 
                    if(isset($_SESSION['logged']))
                    {
                        echo $_SESSION['first_name']; echo " "; 
                        echo $_SESSION['last_name'];
                    }
                    
                ?><span class="caret"></span></a>
<ul class="dropdown-menu" style="text-align: center;">

<li><a href="../php/profile.php">Profile</a></li>
<li><a href="list_proj.php">Project </a></li>
<li><a href="../php/logout.php">Logout</a></li>

</ul>

</li>
</ul>

</div>

    </div>
</div>
</header>

<div class="container" >
<div class="center-table ">
	<div class="row">
		
    <div class="table-responsive">
        <center>
        		<div id="cat"  >
        		<h2 style="color: #2d4577; font-weight: 500;">MY  PROJECTS</h2>
                     
               
              <table id="mytable" align="center" class="table-condensed table-bordred table-striped table-hover" style="padding-bottom: 80px;">
                   
                   <thead>
                   
                   	<th>Project  Name</th>
                    <th></th>
                    <th>
    <button id="add_new" class="" style="margin-top:2px;margin-left: 5px ;font-size: 15px;background-color: #a1aec4;border:none;border-radius:25px;" data-toggle="modal" data-target="#mymodal" title="Add a new project"><i class="glyphicon glyphicon-plus glyphicon-stack glyphicon-stack-1x white"></i></button>
     
    </th>
                       
                   </thead>
                   <tbody id="listhere">
                   <div id="accordion">
                   <?php 
                   $name=mysqli_real_escape_string($link,$_SESSION['proj_categ']);
                   $id=mysqli_query($link,"SELECT categ_id from categ where proj_categ='$name'");

                   $ini=mysqli_fetch_assoc($id);
                   $_SESSION['categ_id']=$ini['categ_id'];
                   $pid=$ini['categ_id'];

                   $qry="SELECT * from stud_proj where stud_id=".$_SESSION['stud_id']."";

					$res=mysqli_query($link,$qry);
					if($res){
						$num_rows=mysqli_num_rows($res);
						if($num_rows>=1){
							while($rowc=mysqli_fetch_assoc($res)){
								$_SESSION['proj_id']=$rowc['proj_id'];
								?>
								<tr >
								<td style="width: 50%"><a data-toggle="modal" data-id="<?php echo $rowc['proj_id']; ?>" data-target="#pform" id="getdet" title="View this project details"><?php echo $rowc['title']?></a></td>
                <td ></td>
								<td style="width: 5%"><a data-toggle="modal" data-id="<?php echo $rowc['proj_id']; ?>" data-target="#editmodal" id="dispf" title="Edit this project "><span class="glyphicon glyphicon-edit"></span></a></td>
								<td style="width: 5%"><a data-id="<?php echo $rowc['proj_id']; ?>" id="del" title="Delete this project"><span class="glyphicon glyphicon-trash"></span></a></td>
								</tr>
								
						<?php }
						}
						else 
						{
							echo '<tr><td>No projects found!</tr></td>'.mysqli_error($link);
						}
					}
					else 
					{
						echo "ErROR!".mysqli_error($link);
					}
                   ?>
                   </div>
                	</tbody>
                 </table>
                 
                 
        </div>
        </center>
        </div>

<!-----------------------Modal for displaying project details---------->

    <div class="modal fade" id="pform" role="dialog" >
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> </h4>
            </div>
    <div class="modal-body" id="projdet" >							
	<form >
	<fieldset><legend align="center"><h4>Project Details</h4></legend>

  <div class="form-group row">
    <label class="col-lg-6 col-form-label">Project Category:</label>
    <div class="col-lg-6">
      <p class="form-control-static" id="pcatg"></p>
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
    <label class="control-label col-lg-6 col-form-label">Attachments:</label>
    <div class="col-lg-6">
      <p class="form-control-static" id="pattach"></p>
   </div> 
</div>
<div class="form-group row">
    <label class="col-lg-6 col-form-label">Project link:</label>
    <div class="col-lg-6">
      <p class="form-control-static" id="plink"></p>
   </div> 
</div>
</div><!----Modal body---->
   <div class="modal-footer">
    <div class="form-group">
    <button type="button" class="close" data-dismiss="modal">CLOSE</button>
    </div>
    </div>   

  </fieldset>
  </form>
		
		
		</div>
				</div>
				</div> <!--Modal close -->



  <!-------------------Modal for adding a new project-------------------->

  <div class="modal fade" id="mymodal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Project Details </h4>
            </div>
            <div class="modal-body">
                
            <form class="form-horizontal alert alert-warning" name="projlist" id="projform" method="post" enctype="multipart/form-data" >

    
  <div class="form-group ">

  <label class="control-label col-lg-5" for="sel1"  style="">Project Category *</label>
  <div class="col-lg-3">
  
  <select class="form-control" id="sel1" name="sel1" >
    <option selected="selected">---|---</option>
    <?php echo $option; ?>

  </select>
  </div>
  
 <div id="main" class="accordion">
   <button type="button" class="btn btn-default btn-sm" style="margin-left: 590px;margin-top: -60px;" data-toggle="collapse" data-target="#addcat" title="Add a new category"><span class="glyphicon glyphicon-plus"></span></button>
   <button type="button" class="btn btn-default btn-sm" style="margin-left: 5px; margin-top: -60px;" data-toggle="collapse" data-target="#editcat" title="Edit a category"><span class="glyphicon glyphicon-pencil"></span></button>

   <div id="addcat" class="collapse">
   <input  type="text" name="add" id="add" style="margin-left: 590px;margin-top: -60px; width: 160px;" placeholder=" Add a new project category..">
   <a href="" id="added">SAVE</a>
   </div>

   <div id="editcat" class="collapse">
  <input type="text" name="edit1" id="edit1" style="margin-left:590px; margin-top: 5px;width: 160px;" placeholder="Change to.." value=""><span > TO </span>
  <input type="text" name="edit2" id="edit2" style="margin-left:590px; margin-top: 5px;width: 160px;" >
  <a href="" id="edittedcat"> Change </a>
  </div>
</div>

</div>

<div class="form-group" >
        <label class="control-label col-lg-5">Project Title *</label>
        <div class="col-lg-3">
        <input class="form-control" type="text" name="projtit" id="projtit" autofocus required/>
        </div>
    </div>

    <div class="form-group" >
        <label class="control-label col-lg-5">Year of Project *</label>
        <div class="col-lg-3">
        <input id="yop" class="form-control" type="number"  min="2012" max="2017" name="yop" autofocus required/>
        </div>
    </div>
    
	<div class="form-group" >
        <label  class="control-label col-lg-5">Project Definition *</label>
        <div class="col-lg-3">
        <textarea class="form-control" type="text" id="projdef" name="projdef" size="300"  autofocus required></textarea>
        </div>
  </div>
    
    <div class="form-group" >
        <label class="control-label col-lg-5">Description of Project *</label>
        <div class="col-lg-3">
        <textarea class="form-control" type="text" id="desc" name="desc" size="700"  autofocus required></textarea>
        </div>
    </div>
    

    <div class="form-group" >
        <label class="control-label col-lg-5">My Learnings *</label>
        <div class="col-lg-3">
        <textarea class="form-control" type="text" id="learn" name="learn" size="300"  autofocus required></textarea>
        </div>
    </div>
    

    <div class="form-group" >
        <label class="control-label col-lg-5">Attachments<h6><small>(Add a file(pdf)/image(png,jpg,jpeg,gif) of upto 5mb)</small></h6></label>
        <div class="col-lg-3">
        <input class="form-control" id="dfile" type="file" name="datafile"
        maxlength="800" multiple  />
        </div>
    </div>

    <div class="form-group" >
        <label class="control-label col-lg-5">Project link<h6><small>(Add a link to your project))</small></h6></label>
        <div class="col-lg-3">
        <input class="form-control" id="dlink" type="url" name="dlink"
        maxlength="800"  />
        </div>
    </div>

    <div class="form-group" >
        <label class="control-label col-lg-5">Tags *<h6><small>(Add keywords related to your project)</small></h6></label>
        <div class="col-lg-3">
        <textarea class="form-control" type="text" id="tag" name="tag" size="500"  autofocus required></textarea>
        </div>
    </div>

    <div class="modal-footer">
    <div class="form-group">
        
        <div id="savef">
        <button id="saveform" class="btn btn-primary pull-right"  type="submit"  name="save"  >Save </button>
        </div>
    </div>
    </div>

    
                    
                   
               </form> 
            </div>
        </div>
    </div>

</div><!-----------Modal for adding -------------------->
  </div><!--------Container for adding ------>


  


<!-------------------Edit project modal------------------- -->

<div class="modal fade" id="editmodal" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Project Details </h4>
            </div>
    <div class="modal-body">
                
    <form class="form-horizontal alert alert-warning" name="editprojlist" id="editpform" method="post" enctype="multipart/form-data" >

  <div class="form-group ">

  <label class="control-label col-lg-5" for="sel1"  style="">Project Category *</label>
  <div class="col-lg-3">
  <select class="form-control" id="esel1" name="sel1" >
    <option selected="selected">---|---</option>
    <?php echo $option; ?>

  </select>
  </div>
  
 <div id="main" class="accordion">
   <button type="button" class="btn btn-primary btn-sm" style="margin-left: 590px;margin-top: -60px;" data-toggle="collapse" data-target="#eaddcat" title="Add a new category"><span class="glyphicon glyphicon-plus"></span></button>
   <button type="button" class="btn btn-primary btn-sm" style="margin-left: 5px; margin-top: -60px;" data-toggle="collapse" data-target="#eeditcat" title="Edit a category"><span class="glyphicon glyphicon-pencil"></span></button>

   <div id="eaddcat" class="collapse">
   <input  type="text" name="eadd" id="eadd" style="margin-left: 590px;margin-top: -60px; width: 160px;" placeholder=" Add a new project category..">
   <a href="" id="eadded">SAVE</a>
   </div>

   <div id="eeditcat" class="collapse">
  <input type="text" name="edit1e" id="edit1e" style="margin-left:590px; margin-top: 5px;width: 160px;" placeholder="Change to.." value=""><span > TO </span>
  <input type="text" name="edit2e" id="edit2e" style="margin-left:590px; margin-top: 5px;width: 160px;" >
  <a href="" id="eedittedcat"> Change </a>
  </div>
</div>

</div>
    
    <div class="form-group" >
        <label class="control-label col-lg-5">Project Title *</label>
        <div class="col-lg-3">
        <input class="form-control" type="text" name="projtit" id="eprojtit"  autofocus required/>
        </div>
    </div>
    

    <div class="form-group" >
        <label class="control-label col-lg-5">Year of Project *</label>
        <div class="col-lg-3">
        <input id="eyop" class="form-control" type="number"  min="2012" max="2017" name="yop" autofocus required/>
        </div>
    </div>
    
	<div class="form-group" >
        <label  class="control-label col-lg-5">Project Definition *</label>
        <div class="col-lg-3">
        <textarea class="form-control" type="text" id="eprojdef" name="projdef" size="300"  autofocus required></textarea>
        </div>
    </div>
    
    <div class="form-group" >
        <label class="control-label col-lg-5">Description of Project *</label>
        <div class="col-lg-3">
        <textarea class="form-control" type="text" id="edesc" name="desc" size="700"  autofocus required></textarea>
        </div>
    </div>
    

    <div class="form-group" >
        <label class="control-label col-lg-5">My Learning *s</label>
        <div class="col-lg-3">
        <textarea class="form-control" type="text" id="elearn" name="learn" size="300"  autofocus required></textarea>
        </div>
    </div>
    

    <div class="form-group" >
        <label class="control-label col-lg-5">Attachments<h6><small>(Add a file(pdf)/image(png,jpg,jpeg,gif) of upto 5mb)</small></h6></label>
        <div class="col-lg-3">
        
        <input class="form-control" id="edfile" type="text" name="datafile"
        maxlength="800" multiple readonly />
        <a id="attdel" href="javascript:clearf();">Remove</a>
        </div>
    </div>

    <div class="form-group" >
        <label class="control-label col-lg-5">Project link<h6><small>(Add a link to your project))</small></h6></label>
        <div class="col-lg-3">
        <input class="form-control" id="edlink" type="url" name="dlink"
          /><a id="attdel" href="javascript:clearl();">Remove</a>
        </div>
    </div>

    <div class="form-group" >
        <label class="control-label col-lg-5">Tags *<h6><small>(Add keywords related to your project)</small></h6></label>
        <div class="col-lg-3">
        <textarea class="form-control" type="text" id="etag" name="tag" size="500"  autofocus required></textarea>
        </div>
    </div>

    <div class="modal-footer">
    <div class="form-group">
        
        <div id="editf">
        <button id="editted" class="btn btn-primary pull-right"  type="submit"  name="edit"  >Save Changes</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal" style="margin-right: 5px;">Cancel</button>
        </div>
    </div>
    </div>

    
                    
                   
               </form> 
            </div>
        </div>
    </div>
</div><!-----------Modal for editting -------------------->
  </div><!--------Container for editting ------>


<!--Footer -->

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

<script>
//----------JS for adding a new project category----------------
$(document).ready(function(){
  $("#added").click(function(e){
    e.preventDefault();
   var dat= $("#add").val();
  // console.log(dat);

  $.ajax({
    data:{dat:dat},
    type:"post",
    url:"addpcat.php",
    success:function(data){
      console.log(data);

        
    },
    error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
  });
});
  $("#edittedcat").click(function(e){
    e.preventDefault();
    var dat1=$("#edit1").val();
    var dat2=$("#edit2").val();
    console.log(dat1,dat2);
    $.ajax({
      data:{"pcatg":dat1 ,"upcatg":dat2},
      type:"post",
      url:"updatepcat.php",

      success:function(data){
        console.log(data);
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    });
  });
});

//----------JS for adding new project category inside edit box-------
$(document).ready(function(){
  $("#eadded").click(function(e){
    e.preventDefault();
   var dat= $("#eadd").val();
  // console.log(dat);

  $.ajax({
    data:{dat:dat},
    type:"post",
    url:"addpcat.php",
    success:function(data){
      console.log(data);
      location.reload();
      
      //$("#sel1").append($('<option>',{value:data,text:data}));
        
    },
    error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
  });
});
  $("#eedittedcat").click(function(e){
    e.preventDefault();
    var dat1=$("#edit1e").val();
    var dat2=$("#edit2e").val();
    console.log(dat1,dat2);
    $.ajax({
      data:{"pcatg":dat1 ,"upcatg":dat2},
      type:"post",
      url:"updatepcat.php",

      success:function(data){
        console.log(data);
      },
      error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    });
  });
});


//----------JS for adding  new project details form--------------
$(document).ready(function(){
 
$('#projform').submit(function(e){
	

	$.ajax({
		//FormData object lets you compile a set of key/value pairs (including File input) to send using XMLHttpRequest (an AJAX call) and the transmitted data is in the same format that the form’s submit method would use to send the data if the form’s encoding type were set to multipart/form-data.

    data:new FormData(this),
		type:"post",
		url:"insert_pform.php",
		processData:false,       //jQuery is set to not process the data nor set the content type.
		contentType:false,
		//dataType:"json",
		success:function(data){
			console.log("SUCeSS "+data);
			$("#mymodal").modal("hide");

      location.reload();
		},

		error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
	});
	e.preventDefault();
});
});
//---------------------JS for displaying proj details ----------

$(document).ready(function(){

	$(document).on('click','#getdet',function(e){
		e.preventDefault();

		var proid=$(this).data('id');

		$.ajax({
	type:"post",
	url:"fetch_pdet.php",
	data:"p_id="+proid,

	success:function(res){
		console.log(res);
		$.each(res,function(i,pdet){
		console.log(res.proj.title);
    $('#pcatg').html('');
    $('#pcatg').html(res.catg.proj_categ);
		
    $('#ptitle').html('');
		$('#ptitle').html(res.proj.title);
    $('#year').html('');
		$('#year').html(res.proj.yop);
		$('#defn').html('');
		$('#defn').html(res.proj.proj_defn);
		$('#pdesc').html('');
		$('#pdesc').html(res.proj.proj_desc);
		$('#plearn').html('');
		$('#plearn').html(res.proj.learning);
		$('#pattach').html('');
		$('#pattach').html('<a>'+res.proj.attachments+'</a>');
    $('#plink').html('');
    $('#plink').html('<a href="'+res.proj.link+'">'+res.proj.link+'</a>');
	});	
		
	}
});

});
});

//------------------JS for editting project details form-----------------
function clearf(){
    document.getElementById("edfile").value="";
    
  }
function clearl(){
    
    document.getElementById("edlink").value="";
  }
$(document).ready(function(){


	$(document).on('click','#dispf',function(e){
		e.preventDefault();
		
		var prjid=$(this).data('id');
		
	$.ajax({

	type:"post",
  url:"fetch_pdet.php",
	data:"p_id="+prjid,
  
	success:function(res){
    
		console.log(res); 

		$.each(res,function(i,pdet){

		console.log(res.proj.title);

    document.getElementById("esel1").value=res.catg.proj_categ;
		
    document.getElementById("eprojtit").value=res.proj.title;

		document.getElementById("eyop").value=res.proj.yop;
		
		document.getElementById("eprojdef").value=res.proj.proj_defn;
		
		document.getElementById("edesc").value=res.proj.proj_desc;
		
		document.getElementById("elearn").value=res.proj.learning;
		
		document.getElementById("edfile").value=res.proj.attachments;

    document.getElementById("edlink").value=res.proj.link;

    document.getElementById("etag").value=res.proj.tags;
	});	
		
	},
  error: function(xhr, desc, err) {
        console.log(xhr); console.warn(xhr.responseText);
        console.log("Details: " + desc + "\nError:" + err);
      }
});

  

    $('#editpform').submit(function(e){
 
    $.ajax({
    
    data:new FormData(this),
    type:"post",
    url:"edisp_pdet.php?id="+prjid,
    processData:false,       //jQuery is set to not process the data nor set the content type.
    contentType:false,
    
    success:function(data){
     // console.log("SUCeSS "+data);
      alert("Your changes have been updated!");
      
      location.reload();
      },

    error: function(xhr, desc, err) {
      console.warn(xhr.responseText)
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
  });
  e.preventDefault();
});
    
});
	
});

//-------------------------JS for deleting a project row-----------------

$(document).ready(function(){
  $(document).on("click","#del",function(e){
    e.preventDefault();

    var prid=$(this).data('id');

    $.ajax({
      type:'post',
      data:'pid='+prid,
      url:'del_proj_row.php',

      success:function(res){
    console.log(res);
    location.reload();
  },
     error: function(xhr, desc, err) {
        console.log(xhr);
        console.log("Details: " + desc + "\nError:" + err);
      }
    });
  });
});

</script>


</body>
</html>
