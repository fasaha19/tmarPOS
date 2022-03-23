
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Easymart  </title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="assets/js/angular.min.js"></script>
  <script src="assets/js/AngularformsApp.js"></script>
<!--===============================================================================================-->  
  <link rel="icon" type="image/png" href="assets/login/images/icons/favicon.ico"/>
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/animate/animate.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
  <link rel="stylesheet" type="text/css" href="assets/login/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="assets/login/css/util.css">
  <link rel="stylesheet" type="text/css" href="assets/login/css/main.css">
<!--===============================================================================================-->
</head>
<body ng-app="angularFormApp">
  <nav class="navbar fixed-top"> 
    
 

  </nav>
  
  <div class="limiter">
    <div class="container-login100">
         <div class="row ">
      <div class="col-12 w-100 ">
          <div class="login100-form-btn  "> 
        <h2>Easymart</h2>
      </div>
      </div>
     
    </div>


      <div class="wrap-login100 p-t-50 p-b-90" ng-app="myApp" ng-controller="regController">
        <form class="login100-form validate-form flex-sb flex-w border-primary" method="post" ng-submit="submitForm()">
         
          <span class="login100-form-title p-b-51">
            Login
          </span>

              <p ng-model="message"></p> 
          
          <div class="wrap-input100 validate-input m-b-16" data-validate = "Username is required">
            <input class="input100" type="text"  ng-model="user.email" name="phone" placeholder="Phone Number" id="email" ng-blur="validate('email')">
            <span class="focus-input100" ></span>
          </div>
            <small style="display: none;" id="emailerr" class="mb-4 mt-n4 text-danger">  * Please Enter your Email!<br></small>
          
          
          <div class="wrap-input100 validate-input m-b-16" data-validate="Password is required">
            <input class="input100" type="password"  ng-model="user.password" name="password"  id="password" placeholder="Password" ng-blur="validate('password')">
       
            <span class="focus-input100" ></span>
          </div>
               <small style="display: none;" id="passworderr" class="mb-4 mt-n4 text-danger">* Please Enter your Password! <br></small>
          
          <div class="flex-sb-m w-full p-t-3 p-b-24">
            <div class="contact100-form-checkbox">
              <input class="input-checkbox100" id="ckb1" type="checkbox" name="remember-me">
              <label class="label-checkbox100" for="ckb1">
                Remember me
              </label>
            </div>

            <div>
              <a href="Signup" class="txt1">
                New User? Signup
              </a>
            </div>
          </div>

          <div class="container-login100-form-btn m-t-17">
            <button class="login100-form-btn">
              Login
            </button>
          </div>

        </form>
      </div>
    </div>
  </div>
  

  <div id="dropDownSelect1"></div>
  
<!--===============================================================================================-->
  <script src="assets/login/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/login/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/login/vendor/bootstrap/js/popper.js"></script>
  <script src="assets/login/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/login/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
  <script src="assets/login/vendor/daterangepicker/moment.min.js"></script>
  <script src="assets/login/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
  <script src="assets/login/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
  <script src="assets/login/js/main.js"></script>

</body>
</html>



<script>


var angularFormApp = angular.module('angularFormApp',[]);
app.controller('regController', function($scope,$http) { 






});
</script>
</body>
</html>
