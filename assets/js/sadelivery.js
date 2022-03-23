
 $(function () {
        $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "autoWidth": true,
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