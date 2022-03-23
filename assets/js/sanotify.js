$(document).on('submit', '#carousel_form', function(event){  
     
            var formdata = '';
           event.preventDefault();
    
       
                $.ajax({  
                     url:"carousel_image",
                     type:'POST',  
                     data:new FormData(this),
                      contentType:false,
                     cache:false,
                     processData: false,
                     async:false,
                
                     success:function(data)  
                     {  
                           toastr.success("Notification Sent Successfully");
                            setTimeout(function(){  location.reload() }, 2000);
                          
                     }  
                });  
           
         
      });  







$(function () {
        $(".status").click(function () {

           var id = $(this).attr("id");
        
            if ($(this).is(":checked")) {
                $.ajax({  
                     url:"verify",
                     type:'POST',  
                     data:{id:id}, 
                     dataType:"json",  
                     success:function(data)  
                     {  
                          location.reload();
                          
                          
                     }  
                }); 
            } else {
                 $.ajax({  
                     url:"block",
                     type:'POST',  
                     data:{id:id}, 
                     dataType:"json",  
                     success:function(data)  
                     {  
                          location.reload();
                          
                          
                     }  
                }); 
            } 
        });
    });