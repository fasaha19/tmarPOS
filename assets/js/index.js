app.controller('index', function($scope,$http,$rootScope) { 
$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';

	/*$scope.nextpage=function(value){
		window.location.href = 'anothershop/page/'+value;
	}*/
    


    $scope.cap = function(a){
      // alert(a);
      var cap = a.charAt(0);
      // alert(cap);
      setTimeout(function(){
       $('#'+a).text(cap);
     }, 30);
     

    }
  
  



  


});