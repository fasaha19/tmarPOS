app.controller('singlepage', function($scope,$http,$rootScope) { 
$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';

  $scope.sum = function(items, prop){
        return items.reduce( function(a, b){
            return a + b[prop];
        }, 0);
    };
   $scope.cart = function() {
      $http({
            method:'GET',
            url:$rootScope.Base_url+"../../details/headcart",  
            }).then(function (response){
                $('#Loader').hide();
                // alert(response.data);
                if (response.data != '') {
                  // $scope.cartcount=(response.data.headcart).length;
                  $scope.cartcount=(response.data.headcart).length;
                  $scope.cartdata=response.data.headcart;
                  $scope.cartdata.map(obj => obj.totamnt=parseInt(obj.reqqty)*parseInt(obj.prod_offer_price));
                  $scope.cartdata.map(obj => obj.new_prod_stock=parseInt(obj.prod_stock)-parseInt(obj.reqqty));
                  // $rootScope.shocat= $rootScope.cartdata.map(a=>a.id=a.shopid);
                  //console.log($rootScope.cartdata);
                 /* $.each($rootScope.cartdata,function(i,j){
                    if($rootScope.shopTotAmnt[String(j.shopid)] == undefined){
                      $rootScope.shopTotAmnt[String(j.shopid)] = 0;
                    }
                    $rootScope.shopTotAmnt[String(j.shopid)] = $rootScope.shopTotAmnt[String(j.shopid)]
                     + j.totamnt;   
                  });*/
                 /* $rootScope.shopamnt=$rootScope.cartdata.map(obj => {item = ($rootScope.shopTotAmnt).find(item => item === obj.shopid);
                          console.log(item);
                           if (item) { 
                            if(){
                      $rootScope.delcha[String(obj.shopid)]+=obj.deliverycharges;
                  }
                  }});*/
                  //$rootScope.sumshop($rootScope.cartdata,"totamnt",$rootScope.cartdata.map(obj => obj.shopid));
                  $scope.totalcart=$scope.sum($scope.cartdata,"totamnt");
                //   window.location.href = 'Abc';
                //   // $location.path('localhost/ci/Abc');
                }              
            },function (error){

          });
    };
    $scope.cart();
    $scope.saddr = function() {
// alert(order);
      $http({
            method:'GET',
            url:$rootScope.Base_url+"../../details/daddrs",  
            }).then(function (response){
                $('#Loader').hide();
                // alert(response.data);
                if (response.data != '') {
                  $scope.singleaddress=response.data.singleaddress[0];
                  
                //   window.location.href = 'Abc';
                //   // $location.path('localhost/ci/Abc');
                }              
            },function (error){

          });
       
    }
    $scope.saddr();

    $scope.getdats = function(val) {
      $scope.requireddata=val;
      $http({
            method:'POST',
            url:$rootScope.Base_url+"../../details/getaparticular",
            data:$.param({"value":val}), 
            }).then(function (response){
                $('#Loader').hide();
                // alert(response.data);
                if (response.data != '') {
                  $scope.products=response.data.product;
                  $scope.products.map(obj => {item = (response.data.cart).find(item => item.prod_id === obj.prod_id);
                          if (item) { 
                      obj.reqqty=parseInt(item.reqqty);
                  }});
                  
                  
                //   window.location.href = 'Abc';
                //   // $location.path('localhost/ci/Abc');
                }              
            },function (error){

          });
       
    }
    $scope.rinccart = function(data) {
    $scope.cartdata[data].reqqty=+$scope.cartdata[data].reqqty+ +1;
    
     $http({
            method:'POST',
            url:$rootScope.Base_url+"../../cart/updcart",  
            data : $.param({"prod_id":$scope.cartdata[data].prod_id,"qty":$scope.cartdata[data].reqqty}),
            }).then(function (response){
              $scope.cartdata.map(obj => obj.totamnt=parseInt(obj.reqqty)*parseInt(obj.prod_offer_price));
              $scope.cartdata.map(obj => obj.new_prod_stock=parseInt(obj.prod_stock)-parseInt(obj.reqqty));
              $scope.totalcart=$scope.sum($scope.cartdata,"totamnt");
              $scope.cart();
                  // safe to use the function
              $scope.getdats($scope.requireddata);
              
            },function (error){

          });
    
    
  }
  $scope.removeprod = function(data) {
    
     $http({
            method:'POST',
            url:$rootScope.Base_url+"../../cart/remcart",  
            data : $.param({"prod_id":$scope.cartdata[data].prod_id}),
            }).then(function (response){
              $scope.cart();
                  // safe to use the function
              $scope.getdats($scope.requireddata);
              
               
            },function (error){

          });
    
    
  }
  
  $scope.rdeccart = function(data) {
    $scope.cartdata[data].reqqty=+$scope.cartdata[data].reqqty- +1;

     $http({
            method:'POST',
            url:$rootScope.Base_url+"cart/updcart",  
            data : $.param({"prod_id":$scope.cartdata[data].prod_id,"qty":$scope.cartdata[data].reqqty}),
            }).then(function (response){
              $scope.cart();
                  // safe to use the function
              $scope.getdats($scope.requireddata);
              
            },function (error){

          });
  }
  $scope.inputcart = function(data) {


   if(parseInt($scope.cartdata[data].prod_stock)>parseInt($scope.cartdata[data].reqqty)){

     $http({
            method:'POST',
            url:$rootScope.Base_url+"../../cart/updcart",  
            data : $.param({"prod_id":$scope.cartdata[data].prod_id,"qty":$scope.cartdata[data].reqqty}),
            }).then(function (response){
                $scope.cart();
                $('.update_qty_side').eq(data).addClass('d-none') ;
                $('.wrap-num-product2').eq(data).removeClass('d-none');
            },function (error){

          });
   }
   else{
      $scope.cart();
      swal("Alert!", "Stock less than Quanity", "warning");

        $('.update_qty_side').eq(data).addClass('d-none') ;
        $('.wrap-num-product2').eq(data).removeClass('d-none'); 

   }
  } 

  $scope.closeinputcart = function(data) {


        $('.update_qty_side').eq(data).addClass('d-none') ;
        $('.wrap-num-product2').eq(data).removeClass('d-none'); 
          $scope.cart();
   
  }
    $scope.addcart = function(data) {
      $scope.products[data].reqqty= 1;
     $http({
            method:'POST',
            url:$rootScope.Base_url+"../../cart/addprod",  
            data :$.param({"prod_id":$scope.products[data].prod_id,"qty":$scope.products[data].reqqty}),

            }).then(function (response){
               $scope.cart();
              $scope.getdats($scope.requireddata);
            },function (error){

          });
  }

  $scope.inccart = function(data) {
    $scope.products[data].reqqty=$scope.products[data].reqqty+ 1;
     $http({
            method:'POST',
            url:$rootScope.Base_url+"../../cart/updcart",  
            data : $.param({"prod_id":$scope.products[data].prod_id,"qty":$scope.products[data].reqqty}),
            }).then(function (response){
              $scope.cart();
              $scope.getdats($scope.requireddata);
            },function (error){

          });
  }
  $scope.deccart = function(data) {
    $scope.products[data].reqqty=$scope.products[data].reqqty- 1;
     $http({
            method:'POST',
            url:$rootScope.Base_url+"../../cart/updcart",  
            data : $.param({"prod_id":$scope.products[data].prod_id,"qty":$scope.products[data].reqqty}),
            }).then(function (response){
              $scope.cart();
              $scope.getdats($scope.requireddata);
            },function (error){

          });
  }
  
  $scope.ordernow = function(){
      $http({
            method:'POST',
            url:$rootScope.Base_url+"../../order/ordernow",  
            data : $.param({"cartdata":$scope.cartdata,"addressid":$scope.singleaddress.id,"totalcart":$scope.totalcart}),
            }).then(function (response){
              //if (response.data.success) {
                location.href = "confirm_order";

              //}
            },function (error){

          });

    }



    // search filter
    $(document).ready(function() {
    $("#myInput").on("keyup", function() {
      var value = $(this).val().toLowerCase();

      $("div[class^=col]")
        .hide()
        .filter(function() {
          var cardTitle = $(this).find('.card-title').text().toLowerCase();

          return cardTitle.includes(value);
        })
        .show();
    });
  });

    // btn-filter
    $scope.filt = function(data){

     var value = data;

     if (value=="all") {

       $("div[class^=col]")
        .show();

      }
      else{
      $("div[class^=col]")
        .hide()
        .filter(function() {
          var cardTitle = $(this).find('.helo').text().toLowerCase();
            return cardTitle.includes(value);
        })
        .show();
      }

    }

$scope.wz1 = function(){
    $('#wz1').hide();
    $('#wz2').show();
  }
   $scope.wz2 = function(){
    $('#wz2').hide();
    $('#wz3').show();
  }

   $scope.wz3 = function(){
    $('#wz2').hide();
    $('#wz3').show();
  }


});