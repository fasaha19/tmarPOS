$(document).ready(function(){

    var buttonCommon = {
        exportOptions:{
          format: {
            body : function(data , row, column,node ) {

            }

          }
        }
    }

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
           "buttons":[
               'print'
           ]
      });
});
$(document).on('click', '.detail', function(){
           var p_id = $(this).attr("id");
           // alert(p_id);
           $.ajax({  
                url:"fetchorders",  
                method:"POST",  
                data:{p_id:p_id},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#p_id').val(p_id);  
                     $('#action').val("Edit");
                     $('#addproduct').collapse('show');  
                     $('#name').val(data.name);     
                     $('#prod_offer_price').val(data.prod_offer_price);  
                     $('#prod_price').val(data.prod_price);  
                     $('#prod_qty').val(data.prod_stock);
                }  
           })  
      });

$(document).on('click', '.print_data', function(){
           var startDate = $('#startDate').val();
           var endDate = $('#endDate').val();
           if (startDate != '' && endDate != '') {
             $.ajax({  
                  url:"fetchordersdownload",  
                  method:"POST",  
                  data:{startDate:startDate,endDate:endDate},  
                  success:function(data)  
                  {  
                    swal("","Report Generated Successfully,Please check the report folder in your system.", "success");
                  }  
             })
           }else{
              swal("","Please Enter All fields", "error");

           }
      });