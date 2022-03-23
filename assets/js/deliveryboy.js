app.controller('deliveryboy', function($scope,$http,$rootScope) { 
$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';

  
  $scope.getdel = function() {
// alert(order);
      console.log("del");
      $http({
            method:'GET',
            url:$rootScope.Base_url+"Deliveryboy/getdel",  
            }).then(function (response){
                $('#Loader').hide();
                // alert(response.data);
                if (response.data != '') {
                  console.log(response.data);
                  $scope.del=response.data.data;
                
                  console.log($scope.del);
                /*  $scope.categories=response.data.category;
                  $scope.cartcount=(response.data.cart).length
                  $scope.products=response.data.product;
                  $scope.products.map(obj => {item = (response.data.cart).find(item => item.prod_id === obj.prod_id);
                          if (item) { 
                     obj.reqqty=parseInt(item.reqqty);
                  }});*/
                  
                  
                //   window.location.href = 'Abc';
                //   // $location.path('localhost/ci/Abc');
                }              
            },function (error){

          });
       
    }

 $scope.getdel();

$('.js-show-sidenav').on('click',function(){
        $('.js-panel-sidenav').addClass('show-header-sidenav');
    });

    $('.js-hide-sidenav').on('click',function(){
        $('.js-panel-sidenav').removeClass('show-header-sidenav');
    });


$scope.showorders = function(data){


    $http({
            method:'POST',
            url:$rootScope.Base_url+"Deliveryboy/getpickdata",  
            data : $.param({"id":data.ord.order_id}),
            }).then(function (response){
              console.log(response);
              $('#exampleModal').modal('show');
              $scope.orderdetails=response.data.data;
              console.log($scope.orderdetails);
            },function (error){

          });
}

  $scope.accept = function(data) {
      // console.log("hbdjnj");
      $http({
            method:'POST',
            url:$rootScope.Base_url+"Deliveryboy/approve",  
            data : $.param({"data":data.ord}),
            }).then(function (response){
                $('#Loader').hide();
                // alert(response.data);
                 $scope.getdel();           
            },function (error){

          });
       
    }
    $scope.cancel = function(data) {
      // console.log("hbdjnj");
      $http({
            method:'POST',
            url:$rootScope.Base_url+"Deliveryboy/cancel",  
            data : $.param({"data":data.ord}),
            }).then(function (response){
                $('#Loader').hide();
                // alert(response.data);
                    $scope.getdel();         
            },function (error){

          });
       
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