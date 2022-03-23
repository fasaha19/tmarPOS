
app.controller('account',function ($scope,$http,$rootScope) {

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