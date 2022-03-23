app.controller('shop', function($scope,$http,$rootScope) { 
$http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';





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




});