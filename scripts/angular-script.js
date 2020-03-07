
var myapp=angular.module('myapp',[]);
myapp.controller("DbController",['$scope','$http',function($scope,$http){

getInfo();
function getInfo(){	

	$http.post('php/formDetails.php').success(function(data){

	$scope.details = data;	
});
}

$scope.show_form = true;

$scope.formToggle =function(){
$('#projform').slideToggle();
//$('#editForm').css('display', 'none');
}

$scope.insertInfo = function(info){
$http.post('php/insertproj.php',{"projcat":info.projcat,"projtit":info.projtit,"yop":info.yop,"projdef":info.projdef,"desc":info.desc,"learn":info.learn,"datafile":info.datafile}).success(function(data){
if (data == true) {
getInfo();
$('#projform').css('display', 'none');
}
});
}

}]);