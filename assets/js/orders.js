app.controller('orders', function($scope,$http,$rootScope) { 
$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';




   $scope.getorder = function() {
      $http({
            method:'GET',
            url:$rootScope.Base_url+"order/getorders",  
            }).then(function (response){
                $('#Loader').hide();
                // alert(response.data);
                if (response.data != '') {
                  //console.log(response.data);
                  $scope.orddata=response.data.ord;
                  console.log($scope.orddata);
               
                }              
            },function (error){

          });
       
    }
  
  $scope.getorder();
  $rootScope.showorders = function(data) {
     $http({
            method:'POST',
            url:$rootScope.Base_url+"order/getordersdata",  
            data : $.param({"id":data.ord.order_id}),
            }).then(function (response){
              console.log(response);
              $('#exampleModal').modal('show');
              $scope.orderdetails=response.data.ordrs
              console.log($scope.orderdetails);
            },function (error){

          });
  }
  $scope.cancel = function(data) {
      // console.log("hbdjnj");
      $http({
            method:'POST',
            url:$rootScope.Base_url+"order/cancelsingle",  
            data : $.param({"data":data.ordd}),
            }).then(function (response){
                $('#Loader').hide();
                // alert(response.data);
                if (response.data != '') {
                  //console.log(response.data);
                  $scope.orddata=response.data.ord;
                  console.log($scope.orddata);
               
                }              
            },function (error){

          });
       
    }

  $scope.cancelall = function(data) {
      // console.log("hbdjnj");
      $http({
            method:'POST',
            url:$rootScope.Base_url+"order/cancelAll",  
            data : $.param({"data":data.ord}),
            }).then(function (response){
                $('#Loader').hide();
                // alert(response.data);
                if (response.data != '') {
                  //console.log(response.data);
                  $scope.orddata=response.data.ord;
                  console.log($scope.orddata);
               
                }              
            },function (error){

          });
       
    }









$scope.load_unseen_notification = function(view = '')
     {
       
       var v;

      $.ajax({
       url:"home/fetch_notification",
       method:"POST",
       data:{view:view},
       dataType:"json",
       success:function(data)
       {

     
            $('#notify').html(data.notification);
            $('.total').html(data.total);

            if(data.unseen_notification >= 0)
            {
             v = data.unseen_notification;
             
            
             $('#notifycount').attr("data-notify",v);
          

        }



       }
      });

     } 

         $('#chk_out_form').on('submit', function(e){
                               
                           e.preventDefault();
                          
                             var formData = $(this).serialize();
                               // alert(formData);
                              $.ajax({  
                                           url:"checkout/add",   
                                           //base_url() = http://localhost/tutorial/codeigniter  
                                           method:"POST",  
                                           data:new FormData(this), 
                                           dataType:"json", 
                                           contentType: false,  
                                           cache: false,  
                                           processData:false,  
                                           async:false,
                                           success:function(data)  
                                           {  
                                              
                                              $('#wz1').hide();
                                              $('#wz2').show();

                                           }  
                                      });   
                                        
                      });



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