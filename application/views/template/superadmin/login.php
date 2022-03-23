<!DOCTYPE html>
<html lang="en">
<head>
  <title>Login </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="{{base_url}}assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{base_url}}assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{base_url}}assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{base_url}}assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{base_url}}assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{base_url}}assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{base_url}}assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{base_url}}assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="{{base_url}}assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="{{base_url}}assets/login/css/util.css">
  <link rel="stylesheet" type="text/css" href="{{base_url}}assets/login/css/main.css">
  <script src="{{base_url}}assets/js/angular.min.js"></script>
<!--===============================================================================================-->
</head>
<body ng-app="angularFormApp">
 <!--  <nav class="navbar fixed-top navbar-light bg-light"> 
    
    <div class="row ">
      <div class="col-12 "> 
        <h2>Istyle Treasure Hunt</h2>
      </div>
    </div>

  </nav> -->
  
  <div class="limiter" ng-controller="regController">
    <div class="container-login100">
      <div class="wrap-login100 p-t-50 p-b-90">
          <span style="font-size: 25px;" class="login100-form-title p-b-51">
            T M Abdul Rahman & Sons
          </span>
          <span style="font-size: 25px;" class="login100-form-title p-b-51">
            Login
          </span>

          
          <div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
            <input class="input100" type="text" ng-model="user.phone" name="shopphone" placeholder="Phone Number">
            <span class="focus-input100"></span>
          </div>
          
          
          <div class="wrap-input100 validate-input m-b-16" data-validate = "Password is required">
            <input class="input100" type="password" ng-model="user.password" name="password" placeholder="Password">
            <span class="focus-input100"></span>
          </div>
            <input class="input100" type="hidden" ng-model="user.mobileid" ng-init="user.mobileid='{{val}}'"  placeholder="Password">
            <!-- <div class="flex-sb-m w-full p-t-3 p-b-24">
              <div class="contact100-form-checkbox">
                <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
                <label class="label-checkbox100" for="ckb1">
                  Remember me 
                </label>
              </div>
              
              <div>
                <a href="{{base_url}}Signup" class="txt1">
                  New User? Signup
                </a>
              </div>
            </div> -->
          <input class="text-danger" readonly ng-model="inval"></input>

          <div class="container-login100-form-btn m-t-17">
            <button ng-click="submitForm()" class="login100-form-btn">
              Login
            </button>
          </div>

      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="{{base_url}}assets/fishcart/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="{{base_url}}assets/fishcart/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="{{base_url}}assets/fishcart/vendor/bootstrap/js/popper.js"></script>
  <script src="{{base_url}}assets/fishcart/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="{{base_url}}assets/fishcart/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="{{base_url}}assets/fishcart/vendor/daterangepicker/moment.min.js"></script>
  <script src="{{base_url}}assets/fishcart/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="{{base_url}}assets/fishcart/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="{{base_url}}assets/fishcart/js/main.js"></script>
    <script>
    var angularFormApp = angular.module('angularFormApp',[]).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[{').endSymbol('}]');
    });
    angularFormApp.controller('regController',function($scope,$http){
    $scope.submitForm=function()
    {
      console.log($scope.user,"aaaa");
           $http({
            method:'post',
            url:'{{base_url}}Login/adminauth',
            data : $.param($scope.user), //forms user object
            headers : {'Content-Type': 'application/x-www-form-urlencoded;charset=utf-8'} 
            }).then(function (response){
              console.log(response);
              if (response.data == 1) {
                $scope.inval= "Login Success";
              }else{
                $scope.inval= "Invalid Credentials";
              }
                if (response.data==true) {
                  console.log(response);
                  window.location.href = '{{base_url}}Sashop/';
                  // $location.path('localhost/ci/Abc');
                }   
            },function (error){
    
          });
    };
    });
</script>
</body>
</html>