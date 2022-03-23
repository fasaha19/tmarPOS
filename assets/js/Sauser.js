$(document).ready(function(){
  var data_length = ''
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
                     "targets":[-1,2],  
                     "orderable":false,  
                },  
           ],  
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
                     console.log(data);
                     var valData = '';
                     count = 1;
                     $.each(data,function(key,val){
                        valData += '<tr><td>'+count+'</td><td>'+val.bar_id+'</td><td>'+val.name+'</td><td>'+val.size+'</td><td>'+val.qty+'</td><td>'+val.price+'</td><td>'+val.total+'</td></tr>'
                        count = count + 1;
                     });
                     console.log(valData);
                     $('#orderTable').html(valData);
                     $('#orderUpdate').hide();
                     $('#totVals').hide();
                     $('#exampleModal').modal('show');
                }  
           })  
      });

$(document).on('click', '.edit', function(){
           var p_id = $(this).attr("id");
           // alert(p_id);
           $.ajax({  
                url:"fetchorders",  
                method:"POST",  
                data:{p_id:p_id},  
                dataType:"json",  
                success:function(data)  
                {  
                     console.log(data);
                     var valData = '';
                     count = 1;
                     valData += '<input type="hidden" id="orderIds" class="form-control" value="'+p_id+'">';
                     $.each(data,function(key,val){
                        valData += '<tr><td>'+count+'</td><td>'+val.bar_id+'</td><td>'+val.name+'</td><td>'+val.size+'</td><td><input type="text" id="changeQty_'+count+'" class="form-control qtyPrc" value="'+val.qty+'"></td><td><input type="text" id="changePrc_'+count+'" class="form-control qtyPrc" value="'+val.price+'"></td><td><input type="text" id="changettl_'+count+'" class="form-control" readonly value="'+val.total+'"><input type="hidden" id="data_id_'+count+'" class="form-control" value="'+val.id+'"><input type="hidden" id="data_prod_id_'+count+'" class="form-control" value="'+val.productid+'"></td></tr>'
                        // valData += '<tr><td>'+count+'</td><td>'+val.name+'</td><td>'+val.qty+'</td><td>'+val.price+'</td><td>'+val.total+'</td></tr>'
                        count = count + 1;
                     });
                     finalvalData = '<div class="col-4">Amount: <input type="text" id="totAmntsnoDisc" readonly class="form-control" value="'+data[0].finTotals+'"></div><div class="col-4">Discount: <input type="text" id="discounts"  class="form-control discountchng" value="'+data[0].discountpercent+'"></div><div class="col-4">Total Amount : <input type="text" readonly id="finVals" class="form-control" value="'+data[0].discounttotal+'"></div>';

                     console.log(valData);
                     console.log(data.length);
                     data_length = data.length;
                     $('#orderTable').html(valData);
                     $('#totVals').show();
                     $('#totVals').html(finalvalData);
                     $('#orderUpdate').show();
                     $('#exampleModal').modal('show');
                }  
           })      
 });
$(document).on('keyup', '.qtyPrc', function(){
    var p_ids = $(this).attr("id");
    var id_count = p_ids.split("_")[1];
    var totaldatasVals = 0;

    total = parseInt($('#changeQty_'+id_count).val()) * parseInt($('#changePrc_'+id_count).val());
    $('#changettl_'+id_count).val(total);
    for (var i = 1; i <= data_length; i++) {
      totaldatasVals += parseInt($('#changettl_'+i).val());
    }

    DiscVals = totaldatasVals - ((parseInt($('#discounts').val()) * totaldatasVals)/100)
    $('#totAmntsnoDisc').val(totaldatasVals);
    $('#finVals').val(DiscVals);
    
    console.log(totaldatasVals)

});
$(document).on('keyup', '.discountchng', function(){
  if ($('#discounts').val() != '') {
    var disc_per = parseInt($('#discounts').val())
  }else{
    var disc_per = parseInt(0)
  }
    var val = parseInt($('#totAmntsnoDisc').val())
    var disc_val = parseInt($('#finVals').val())

    DiscVals = val - ((disc_per * val)/100)
    $('#finVals').val(DiscVals);
    

});

$(document).on('click', '.generate', function(){
  var id = $(this).attr("id");
  window.open("http://localhost/tmarPOS/assets/tmarBill/index.php?billId="+id,"_blank");

});
$(document).on('click', '#orderUpdate', function(){
  var final_data = {};
  var reqData = {};
  var val = {};

  for (var i = 1; i <= data_length ; i++){
    val['id_'+i] = $('#data_id_'+i).val();
    val['prod_id_'+i] = $('#data_prod_id_'+i).val();
    val['qty_'+i] = $('#changeQty_'+i).val();
    val['prc_'+i] = $('#changePrc_'+i).val();
    val['total_'+i] = $('#changettl_'+i).val();
  }
  var totAmntsnoDisc = $('#totAmntsnoDisc').val();
  var discounts = $('#discounts').val();
  var finVals = $('#finVals').val();

  reqData['totAmntsnoDisc'] = totAmntsnoDisc;
  reqData['discounts'] = discounts;
  reqData['prods'] = val;
  reqData['finVals'] = finVals;
  reqData['count'] = data_length;
  reqData['orderId'] = $('#orderIds').val();

  console.log(reqData);
  $.ajax({  
    url:"updateOrders",  
    method:"POST",  
    data:{data:reqData},
    success:function(data)  
    {
      console.log(data);
      if (data == 'true') {
        swal("","Data has been updated successfully", "success");
        setTimeout(function(){
          location.reload();
        },2000);
      }
    } 
  });
});