var app = angular.module('myapp',[]).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[{').endSymbol('}]');
});



	app.run(function($rootScope,$http) {
    $rootScope.Base_url = "http://localhost/vish/";
	$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
  
});