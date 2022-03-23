var app = angular.module('saleapp', []).config(function($interpolateProvider){
    $interpolateProvider.startSymbol('[{').endSymbol('}]');
});

    
    app.controller('salectrl', function($scope,$http,$timeout) {
      $scope.Base_url = "http://localhost/tmarPOS/";
      $scope.myCartItems=[];
      $http.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=utf-8';
      $scope.inittotal = 0;
      $scope.disc_value = 0;
      $scope.total = 0;


    
                
     $scope.addToCart = function(item){
         //$scope.items.splice(itemIndex, 1);
      
          $scope.myCartItems.push(item);
          //console.log($("#qty_"+($scope.myCartItems.length-1)));

           $('#dropdown-content').hide(); 
           $('#tab_foot').show();
           $timeout(function () {
            $(".qty-"+($scope.myCartItems.length-1)).focus();
           });

           //document.getElementById("qty_"+($scope.myCartItems.length-1)).focus();
           // $("#qty_"+($scope.myCartItems.length-1)).focus();
           //$('#qty'+($scope.myCartItems.length-1)).focus();
           // var myEl = document.getElementById('qty_0');
           // var angularEl = angular.element(myEl);
           //  angularEl.focus();
            $scope.search_bar="";
            $scope.medicineval={};
      }
      $scope.remv  = function(index) 
     {
      $scope.myCartItems.splice(index, 1);
          $scope.getTotal();

     }
     $scope.search  = function() 
     {
      
      if($scope.search_bar!=''){
      $http({
            method:'post',
            url:$scope.Base_url+'Search/searchmed',
            data:$.param({"a":$scope.search_bar,"type":$('input[name="optionsRad"]:checked').attr('id')}),
            }).then(function (datas){
                $scope.medicineval=datas.data;
                $('#dropdown-content').show();  
                $('#dropbox').html(datas.data);
              console.log($scope.medicineval);
                                
            },function (error){

          });

        }else{
           $('#dropdown-content').hide(); 

        }
    //  console.log($('#search_bar').val());
    //  var a = $('#search_bar').val();
      // $('#dropdown-content').show();  

     }

         $scope.getTotal = function(){
          var total = 0;
          for(var i = 0; i < $scope.myCartItems.length; i++){
              var product = $scope.myCartItems[i];
              total += (product.sellPrice * product.reqqty);
          }
          $scope.total = total;
          $scope.inittotal = total;
          // $scope.adjAmnt();
          return total;
      }
      $scope.fun  = function(itemIndex,event) {
        console.log($scope.myCartItems[itemIndex].reqqty);
        console.log($scope.myCartItems[itemIndex].qty);
        console.log($scope.myCartItems[itemIndex].sellPrice * $scope.myCartItems[itemIndex].reqqty);
        if (parseInt($scope.myCartItems[itemIndex].reqqty) > parseInt($scope.myCartItems[itemIndex].qty)) {
          $scope.myCartItems[itemIndex].reqqty = 0;
          $scope.getTotal();
          swal("","Qty is greater than stock", "warning");
        }else{
          $scope.myCartItems[itemIndex].sellPriceProd = $scope.myCartItems[itemIndex].sellPrice * $scope.myCartItems[itemIndex].reqqty;
          $scope.myCartItems[itemIndex].Total = $scope.myCartItems[itemIndex].sellPrice * $scope.myCartItems[itemIndex].reqqty;
          $scope.getTotal();
          $('.qtydata').keyup(function(e){
            if (e.keyCode == 13) {
              $("#search_bar").focus();
            }else if (e.keyCode == 18) {
              $("#disc_val").focus();
            }
            });
        }
      }

      $scope.prodfun  = function(itemIndex,event) {
        console.log($scope.myCartItems[itemIndex].sellPrice * $scope.myCartItems[itemIndex].reqqty);
          $scope.myCartItems[itemIndex].sellPriceProd = $scope.myCartItems[itemIndex].sellPrice * $scope.myCartItems[itemIndex].reqqty;
          $scope.myCartItems[itemIndex].Total = $scope.myCartItems[itemIndex].sellPrice * $scope.myCartItems[itemIndex].reqqty;
          $scope.getTotal();
      }

      $scope.disc_amnt  = function() {
          console.log($scope);
          total_val = ($scope.inittotal * $scope.disc_value)/100;
          fin_total = $scope.inittotal - total_val;
          $scope.total = fin_total;
      }

      $scope.total_amnt  = function() {
          console.log($scope);
          fin_total = $scope.inittotal - $scope.total;
          total_val = 100 - (($scope.total / $scope.inittotal)*100);
          $scope.disc_value = total_val;
      }



      $scope.count = function(){
          var total = 0;
          for(var i = 0; i < $scope.myCartItems.length; i++){
              
              total = i+1;
          }
          $scope.totitems = total;
          return total;
      }

      $scope.qty_count = function(){
          var total = 0;
          for(var i = 0; i < $scope.myCartItems.length; i++){
               var product = $scope.myCartItems[i];
              total +=  parseInt(product.reqqty);

          }
          $scope.totqty = total;
          return total;
      }

      // $scope.gst_cal = function(){

      //   var tot = $scope.getTotal();
      //   console.log(tot,"sadasd");
      //   $scope.gst = (tot/100)*12;
      //   $scope.halfgst = $scope.gst/2;
      //   $scope.base = $scope.total - $scope.gst;
      //   console.log($scope.halfgst,"sdhdjg");
      // }

      // $scope.adjAmnt = function(){
      //   var adjVal = ($scope.total.toString()).split(".");
      //   $scope.total = adjVal[0];
      //   $scope.totaladjamnt = adjVal[1];
      //   return adjVal[1];
      // }
      $scope.genbill = function(){
        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();

        today = mm + '/' + dd + '/' + yyyy;
        console.log(today,"Date");
        console.log($scope);

        if ($scope.custname) {
          if($('#payType').val() == 'cashcard'){
            if ($('#cash_amnt').val() == '' || $('#card_amnt').val() == '') {
              alert("Please fill all the fields")
              return false;
            }
          }
          $('#gen').attr('disabled',true);
        $http({
                method:'post',
                url:'http://localhost/tmarPOS/index.php/Search/insertbill',
                data:$.param({"billno":$scope.billno,"billType":$('input[name="optionsRad"]:checked').attr('id'),"payType":$('#payType').val(),"cash":$('#cash_amnt').val(),"card":$('#card_amnt').val(),"custname":$scope.custname,"custdate":$scope.custDate,"custnumb":$scope.custnumb,"custaddr":$scope.custaddr,"items":$scope.myCartItems,"base":$scope.base,"total":$scope.total,"totitems":$scope.totitems,"totqty":$scope.totqty,"inittotal":$scope.inittotal,"disc_value":$scope.disc_value,"date":$scope.date}),
                }).then(function (datas){
                  console.log(datas);
                if (datas.data !=='') {
                  swal("","Bill Generated Successfully", "success");
                  setTimeout(function(){
                    location.reload();
                  },2000);
                  window.open("http://localhost/tmarPOS/assets/tmarBill/index.php?billId="+datas.data,"_blank");
                }
                else{
                  alert('Bill Number Already Exist!!');
                }
                },function (error){

              });
           }else{
              alert("Fill All Feilds");
           }


      }


        console.log($scope.myCartItems,"my");

        

    });


$(document).ready(function(){
    // $('#custDate').val(new Date().toDateInputValue());
    document.getElementById('custDate').valueAsDate = new Date();
    var dataTable = $('#example1tab').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"fetch_product",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[-1,-2,-3],  
                     "orderable":false,  
                },  
           ],  
      });
});

function payTypeChange(argument) {
  if($('#payType').val() == 'cashcard'){
    $('#cash').show();
    $('#card').show();
  }else{
    $('#cash').hide();
    $('#card').hide();
  }
}

  


