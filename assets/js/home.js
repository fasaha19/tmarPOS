app.controller('home',  function ($scope,$http,$rootScope) {
  $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
  $rootScope.sum = function(items, prop){
        return items.reduce( function(a, b){
            return a + b[prop];
        }, 0);
    };
    $scope.in=new Array();
  $rootScope.cart = function() {
    $rootScope.shopTotAmnt = [];
      $http({
            method:'GET',
            url:$rootScope.Base_url+"details/headcart",  
            }).then(function (response){
                $('#Loader').hide();
                // alert(response.data);
                if (response.data != '') {
                  // $scope.cartcount=(response.data.headcart).length;
                  $rootScope.cartcount=(response.data.headcart).length;
                  $rootScope.cartdata=response.data.headcart;
                  $rootScope.cartdata.map(obj => obj.totamnt=parseInt(obj.reqqty)*parseInt(obj.prod_offer_price));
                  $rootScope.cartdata.map(obj => obj.new_prod_stock=parseInt(obj.prod_stock)-parseInt(obj.reqqty));
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
                  $rootScope.totalcart=$rootScope.sum($rootScope.cartdata,"totamnt");
                //   window.location.href = 'Abc';
                //   // $location.path('localhost/ci/Abc');
                }              
            },function (error){

          });
    };

    $rootScope.cart();

    $rootScope.stocks = function(data,val) {
     
    if(parseInt(data)<parseInt(val)){
      $("#prompt").show();
      return false

    }else{
      $("#prompt").hide();
      return true
    }
    
  }

    $rootScope.cart();

    $rootScope.rinccart = function(data) {
    $rootScope.cartdata[data].reqqty=+$rootScope.cartdata[data].reqqty+ +1;
    
     $http({
            method:'POST',
            url:$rootScope.Base_url+"cart/updcart",  
            data : $.param({"prod_id":$rootScope.cartdata[data].prod_id,"qty":$rootScope.cartdata[data].reqqty}),
            }).then(function (response){
              $rootScope.cartdata.map(obj => obj.totamnt=parseInt(obj.reqqty)*parseInt(obj.prod_offer_price));
              $rootScope.cartdata.map(obj => obj.new_prod_stock=parseInt(obj.prod_stock)-parseInt(obj.reqqty));
              $rootScope.totalcart=$rootScope.sum($rootScope.cartdata,"totamnt");
              $rootScope.cart();
                  // safe to use the function
            //   $rootScope.getshops();
            $rootScope.getCategoryData($rootScope.categoryfetch);
              
            },function (error){

          });
    
    
  }
  $rootScope.removeprod = function(data) {
    
     $http({
            method:'POST',
            url:$rootScope.Base_url+"cart/remcart",  
            data : $.param({"prod_id":$rootScope.cartdata[data].prod_id}),
            }).then(function (response){
              $rootScope.cart();
                  // safe to use the function
            //   $rootScope.getshops();
            $rootScope.getCategoryData($rootScope.categoryfetch);
              
               
            },function (error){

          });
    
    
  }
  
  $rootScope.rdeccart = function(data) {
    $rootScope.cartdata[data].reqqty=+$rootScope.cartdata[data].reqqty- +1;

     $http({
            method:'POST',
            url:$rootScope.Base_url+"cart/updcart",  
            data : $.param({"prod_id":$rootScope.cartdata[data].prod_id,"qty":$rootScope.cartdata[data].reqqty}),
            }).then(function (response){
              $rootScope.cart();
                  // safe to use the function
                // $rootScope.getshops();
                $rootScope.getCategoryData($rootScope.categoryfetch);
              
            },function (error){

          });
  }
  $rootScope.inputcart = function(data) {


   if(parseInt($rootScope.cartdata[data].prod_stock)>parseInt($rootScope.cartdata[data].reqqty)){

     $http({
            method:'POST',
            url:$rootScope.Base_url+"cart/updcart",  
            data : $.param({"prod_id":$rootScope.cartdata[data].prod_id,"qty":$rootScope.cartdata[data].reqqty}),
            }).then(function (response){
                $rootScope.cart();
                $('.update_qty_side').eq(data).addClass('d-none') ;
                $('.wrap-num-product2').eq(data).removeClass('d-none');
            },function (error){

          });
   }
   else{
      $rootScope.cart();
      swal("Alert!", "Stock less than Quanity", "warning");

        $('.update_qty_side').eq(data).addClass('d-none') ;
        $('.wrap-num-product2').eq(data).removeClass('d-none'); 

   }
  } 

  $rootScope.closeinputcart = function(data) {


        $('.update_qty_side').eq(data).addClass('d-none') ;
        $('.wrap-num-product2').eq(data).removeClass('d-none'); 
          $rootScope.cart();
   
  }

  $rootScope.minus_valid = function(data) {

   
  }


  $scope.showupd = function(ind){
      $('.update_qty_side').eq(ind).removeClass('d-none') ;
      $('.wrap-num-product2').eq(ind).addClass('d-none');
      

 }


  $rootScope.saddr = function() {
// alert(order);
      $http({
            method:'GET',
            url:$rootScope.Base_url+"details/daddrs",  
            }).then(function (response){
                $('#Loader').hide();
                // alert(response.data);
                if (response.data != '') {
                  $rootScope.singleaddress=response.data.singleaddress[0];
                  
                //   window.location.href = 'Abc';
                //   // $location.path('localhost/ci/Abc');
                }              
            },function (error){

          });
       
    }
    $rootScope.saddr();

    $rootScope.ordernow = function(val){
      // alert('sdad');
      var orderDetails = btoa(JSON.stringify($rootScope.cartdata)+"$$$"+$rootScope.singleaddress.id+"$$$"+$rootScope.totalcart);
      $http({
            method:'POST',
            url:$rootScope.Base_url+"order/ordernowpayment",  
            data : $.param({"order":orderDetails,"order_id":$('#orderId').val()}),
            }).then(function (response){
              console.log(response);
              if (response.data) {
                $('#myModal2').modal('show');
                $('#myModal2').removeClass('fade');
              }
            },function (error){

          });

    }

    $rootScope.ordernowcod = function(){
      $http({
            method:'POST',
            url:$rootScope.Base_url+"order/ordernow",  
            data : $.param({"cartdata":$rootScope.cartdata,"addressid":$rootScope.singleaddress.id,"totalcart":$rootScope.totalcart}),
            }).then(function (response){
              if (response.data.success) {
                location.href = $rootScope.Base_url+"confirm_order";
              }
            },function (error){

          });

    }

    

  // $rootScope.getshops();
  $rootScope.addcart = function(data) {
    console.log(data);  
    $rootScope.products[data].reqqty= 1;
     $http({
            method:'POST',
            url:$rootScope.Base_url+"cart/addprod",  
            data :$.param({"prod_id":$rootScope.products[data].id,"qty":$rootScope.products[data].reqqty}),
            }).then(function (response){
               console.log(response,"response");
               $rootScope.getCategoryData($rootScope.categoryfetch);
              $rootScope.cart();
            },function (error){

          });
  }
  $rootScope.inccart = function(data) {
    $rootScope.products[data].reqqty=$rootScope.products[data].reqqty+ 1;
     $http({
            method:'POST',
            url:$rootScope.Base_url+"cart/updcart",  
            data : $.param({"prod_id":$rootScope.products[data].id,"qty":$rootScope.products[data].reqqty}),
            }).then(function (response){
              $rootScope.getCategoryData($rootScope.categoryfetch);
              $rootScope.cart();
            },function (error){

          });
  }
  
  $rootScope.deccart = function(data) {
    $rootScope.products[data].reqqty=$rootScope.products[data].reqqty- 1;
     $http({
            method:'POST',
            url:$rootScope.Base_url+"cart/updcart",  
            data : $.param({"prod_id":$rootScope.products[data].id,"qty":$rootScope.products[data].reqqty}),
            }).then(function (response){
              $rootScope.getCategoryData($rootScope.categoryfetch);
              $rootScope.cart();
            },function (error){

          });
  }
  $scope.logout=function(){
    $http({
            method:'POST',
            url:$rootScope.Base_url+"Login/logout",  
            }).then(function (response){
              console.log(response.data);
              window.location.href = $rootScope.Base_url+'Login/';
            },function (error){

          });
  }
 
   $rootScope.wz1 = function(){
    $('#wz1').hide();
    $('#wz2').show();
  }
   $rootScope.wz2 = function(){
    $('#wz2').hide();
    $('#wz3').show();
  }

   $rootScope.wz3 = function(){
    $('#wz2').hide();
    $('#wz3').show();
  }

  
   $('.js-show-cart').on('click',function(){
        $('.js-panel-cart').addClass('show-header-cart');
    });

    $('.js-hide-cart').on('click',function(){
        $('.js-panel-cart').removeClass('show-header-cart');
    }); 


    $('.js-show-sidenav').on('click',function(){
        $('.js-panel-sidenav').addClass('show-header-sidenav');
    });

    $('.js-hide-sidenav').on('click',function(){
        $('.js-panel-sidenav').removeClass('show-header-sidenav');
    });
    
       $scope.openNav = function() {
          document.getElementById("mySidenav").style.width = "220px";
          $('.bg0').addClass('fade');
          $('footer').addClass('fade');

        $(document).mouseup(function(e) 
        {
            var container = $("#mySidenav");

            // if the target of the click isn't the container nor a descendant of the container
            if (!container.is(e.target) && container.has(e.target).length === 0 ) 
            {
                  document.getElementById("mySidenav").style.width = "0";
                 $scope.closeNav();  
            }
            
        });
          

    }         


$scope.closeNav = function() {

  document.getElementById("mySidenav").style.width = "0";
   $('.bg0').removeClass('fade');
   $('footer').removeClass('fade');

}








     //============ fishcart addons ================

      $(".js-select2").each(function(){
      $(this).select2({
        minimumResultsForSearch: 20,
        dropdownParent: $(this).next('.dropDownSelect2')
      });
    });

        $('.gallery-lb').each(function() { // the containers for all your galleries
      $(this).magnificPopup({
            delegate: 'a', // the selector for gallery item
            type: 'image',
            gallery: {
              enabled:true
            },
            mainClass: 'mfp-fade'
        });
    });

      $('.js-addwish-b2').on('click', function(e){
      e.preventDefault();
    });

    $('.js-addwish-b2').each(function(){
      var nameProduct = $(this).parent().parent().find('.js-name-b2').html();
      $(this).on('click', function(){
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-b2');
        $(this).off('click');
      });
    });

    $('.js-addwish-detail').each(function(){
      var nameProduct = $(this).parent().parent().parent().find('.js-name-detail').html();

      $(this).on('click', function(){
        swal(nameProduct, "is added to wishlist !", "success");

        $(this).addClass('js-addedwish-detail');
        $(this).off('click');
      });
    });
  $('.js-pscroll').each(function(){
      $(this).css('position','relative');
      $(this).css('overflow','hidden');
      var ps = new PerfectScrollbar(this, {
        wheelSpeed: 1,
        scrollingThreshold: 1000,
        wheelPropagation: false,
      });

      $(window).on('resize', function(){
        ps.update();
      })
    });

  
   $('.parallax100').parallax100();




  });



function allowNumericSpace(thisInput) {
    thisInput.value = thisInput.value.split(/[^0-9. ]/).join('');
  }
        