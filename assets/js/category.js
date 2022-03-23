app.controller('category', function($scope,$http,$rootScope) { 
$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';




  // search filter
    $(document).ready(function() {
      // alert("SAdsad");
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
    //   // btn-filter
    // $scope.filt = function(data){

    //  var value = data;

    //  if (value=="all") {

    //    $("div[class^=col]")
    //     .show();

    //   }
    //   else{
    //   $("div[class^=col]")
    //     .hide()
    //     .filter(function() {
    //       var cardTitle = $(this).find('.helo').text().toLowerCase();
    //         return cardTitle.includes(value);
    //     })
    //     .show();
    //   }

    // }

    $rootScope.getCategoryData = function(data){
      // console.log(data,"wassadasdsa");
      $rootScope.categoryfetch=data;
      $http({
            method:'POST',
            url:"http://localhost/vish/Category/getcategoryDataVal",  
            data :$.param({"prod_id":data}),
            }).then(function (response){
              $rootScope.categories = response.data.sub_category_data;
              $rootScope.products = response.data.product_data;
               $rootScope.products.map(obj => {item = (response.data.cart).find(item => item.prod_id === obj.id);
                          if (item) { 
                     obj.reqqty=parseInt(item.reqqty);
                  }});
               console.log($rootScope);
            },function (error){

          });
    }
    $scope.modal = function(data){
      console.log(data);
      $scope.modalData = data.product;
      $('#exampleModal').modal('show');
    } 



});