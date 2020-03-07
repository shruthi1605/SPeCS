
'use strict';
angular.module('sortApp', ['ui.bootstrap'])

.controller('mainController', function($scope,$http) {

  $http.get("../ternary/search_be.php").then(function(response){
    console.log(response.data); 
    $scope.search=response.data; 
    //$scope.here=response.data.roll;
  });
    
  $scope.rate = 2;
  $scope.max = 5;
  $scope.isReadonly = true;
  
  $scope.sortType     = 'first_name'; // set the default sort type
  $scope.sortReverse  = true;  // set the default sort order
   

  });