
app.controller('address', function ($scope,$http,$rootScope) {

  $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';

    $scope.addr = function() {
// alert(order);
      $http({
            method:'GET',
            url:$rootScope.Base_url+"details/addrs",  
            }).then(function (response){
                $('#Loader').hide();
                // alert(response.data);
                if (response.data != '') {
                  $scope.addresses=response.data.address;
                  $scope.addrcnt=(response.data.address).length;
                  console.log($scope.addresses, $scope.addrcnt);
                  
                //   window.location.href = 'Abc';
                //   // $location.path('localhost/ci/Abc');
                }              
            },function (error){

          });
       
    }
    $scope.submit = function() {
// alert(order);
      console.log($scope.da);
      $http({
            method:'POST',
            url:$rootScope.Base_url+"Addressdata/addaddress",  
            data :$.param($scope.da),
            }).then(function (response){
                $('#Loader').hide();
                // alert(response.data);
                if (response.data.success) {
                    $scope.da={}
                   $scope.addr();

                   $('#add').show();
                   $('#addr').hide();
                  
                //   window.location.href = 'Abc';
                //   // $location.path('localhost/ci/Abc');
                }              
            },function (error){
          });
    }
    $scope.submit_feedback = function() {
// alert(order);
      console.log($scope.da);
      $http({
            method:'POST',
            url:$rootScope.Base_url+"Addressdata/addfeedBack",  
            data :$.param($scope.da),
            }).then(function (response){
                if (response.data.success) {
                  $scope.da={}
                  swal("","Your suggestion/feedback/Grievance submitted successfully", "success"); 
                }              
            },function (error){
          });
    }
    
    $scope.update = function() {
// alert(order);
      console.log($scope.da);
      $http({
            method:'POST',
            url:$rootScope.Base_url+"Addressdata/updaddress",  
            data :$.param($scope.da),
            }).then(function (response){
                $('#Loader').hide();
                // alert(response.data);
                if (response.data.success) {
                     swal("", "Address Updated Successfully!", "success");
                   $scope.da={}
                   $scope.addr();
                   $('#add').show();
                   $('#addr').hide();
                    $('#add').show();
                     $('#update').hide();
                  
                //   window.location.href = 'Abc';
                //   // $location.path('localhost/ci/Abc');
                }              
            },function (error){

          });
       
    }
    $scope.deleteaddress = function(data) {
// alert(order);
      console.log($scope.da);
     if (confirm("Are you sure to Delete!")) {
      $http({
            method:'POST',
            url:$rootScope.Base_url+"Addressdata/deladdress",  
            data :$.param(data.address),
            }).then(function (response){
                $('#Loader').hide();
                // alert(response.data);
                if (response.data.success) {
                     swal("", "Address Deleted Successfully!", "success");
                   $scope.da={}
                   $scope.addr();
                   $('#add').show();
                   $('#addr').hide();
                    $('#add').show();
                     $('#update').hide();
                  
                //   window.location.href = 'Abc';
                //   // $location.path('localhost/ci/Abc');
                }              
            },function (error){

          });
          }
          else{
            return false;
          }
       
    }
    $scope.editaddress = function(data) {
// alert(order);
      $scope.da=data.address;
      console.log(data.address);
      $('#addr').show();
      $('.addbtn').hide();
      $('#update').show();
       
    }
    $scope.addresdefault = function(data) {
// alert(order);
    console.log("adjgsdahgsajhgj");
      $http({
            method:'POST',
            url:$rootScope.Base_url+"Addressdata/defaddress",  
            data :$.param({"id":data.address.id}),
            }).then(function (response){

                // alert(response.data);
                console.log(response);
                if (response.data.success) {

                     swal("", "Default Address selected Successfully!", "success");
                    $scope.addr();

                  
                //   window.location.href = 'Abc';
                //   // $location.path('localhost/ci/Abc');
                }     

            },function (error){

          });
       
    }
    $scope.addr();
    $scope.show_addr=function (){
      $scope.da = {};
      $('#addr').show();
      $('#add').hide();
      $('#update').hide();
      $('.addbtn').show();
    }
    $scope.hide_addr=function (){
      $('#add').show();
      $('#addr').hide();
    }



    $scope.validate = function(id){

    // alert('#'+id+'err');
    // console.log($('#'+id).length);

    if ($('#'+id).val() == '' ) {
        $('#'+id).addClass('border-danger');
        $('#'+id+'err').show();

    }
    else{
          $('#'+id+'err').hide();
         $('#'+id).removeClass('border-danger');

    }


    };

});