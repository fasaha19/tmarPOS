 
$(function(){  
    
  $('.select2').select2()
});  

  $(document).ready(function(){  
    
  var dataTable = $('#example1').DataTable({  
           "processing":true,  
           "serverSide":true,  
           "order":[],  
           "ajax":{  
                url:"fetch_product",  
                type:"POST"  
           },  
           "columnDefs":[  
                {  
                     "targets":[-1,-3],  
                     "orderable":false,  
                },  
           ],  
      });

      $(document).on('submit', '#add_prod_form', function(event){  
           var formdata = '';
           event.preventDefault();
           var action = $('#action').val();
           // formdata.append('file[]',productName); 
           // console.log(formdata);
           if($('#name').val() != '')  
           {  
                
                $.ajax({  
                     url: action +"prod",
                     type:'POST',  
                     data:new FormData(this),
                     contentType:false,
                     cache:false,
                     processData: false,
                     async:false,
                     success:function(data)  
                     {  
                          console.log(data);
                          if (data == 'Successfully Uploaded') {
                             swal("","Product "+action+"ed in Return Successfully", "success");
                              setTimeout(function(){
                                location.reload();
                              },3000);
                          }
                       }  
                });  
           }  
           else  
           {  
                alert("Bother Fields are Required");  
           }  
      });
      $(document).on('submit', '#add_admin_form', function(event){  
           var formdata = '';
           event.preventDefault();
           // const files = document.querySelector('[type=file]').files;
           // alert(files);
           // var formData = new FormData();
           var action = $('#action').val();
           // formdata.append('file[]',productName); 
           // console.log(formdata);
           if($('#pwd').val() == $('#conf_pwd').val()){
           if($('#name').val() != '' && $('#phone').val() != '' && $('#pwd').val() != ''){
                $.ajax({  
                     url: action +"prod",
                     type:'POST',  
                     data:new FormData(this),
                     contentType:false,
                     cache:false,
                     processData: false,
                     async:false,

                     success:function(data)  
                     {  
                      console.log(data);
                          if(data!="Select The Product Image"){
                            toastr.success("Category "+action+"ed Successfully");
                            setTimeout(function(){  location.reload() }, 2000);
                          $('#add_admin_form')[0].reset();  
                          $('#addproduct').collapse('hide');  
                          location.reload();

                        }
                     }  
                });  
           }  
           else  
           {  
                alert("All the Fields are Required");
           }
         }else{
                alert("Password and Confirm Password should have to be same");
         }  
      });  

// update
      $(document).on('click', '.update', function(){  
        
           var p_id = $(this).attr("id");
           // alert(p_id);
           $.ajax({  
                url:"fetch_single_product",  
                method:"POST",  
                data:{p_id:p_id},  
                dataType:"json",  
                success:function(data)  
                {  
                  console.log(data);
                     $('#p_id').val(p_id);  
                     $('#action').val("Edit");
                     $('#prod_prc_div').hide();
                     $('#addproduct').collapse('show'); 
                     $('#exampleModal2').modal('show'); 
                     $('#ret_prod_id').val(data.ret_prod_id);     
                     $('#prodName').val(data.prodName);
                     $('#ret_cust_name').val(data.ret_cust_name);  
                     $('#ret_cust_num').val(data.ret_cust_num);  
                     $('#ret_prod_qty').val(data.ret_prod_qty);  
                     $('#serialNo').val(data.name);  
                     $('#ret_prod_amnt').val(data.ret_prod_amnt);
                }  
           })  
      });



      // delete
      $(document).on('click', '.delete', function(){  
        
           var p_id = $(this).attr("id");
           $.ajax({  
                url:"delete_prod",  
                method:"POST",  
                data:{p_id:p_id},  
                // dataType:"json",  
                success:function(data)  
                {  

                   swal("Deleted","Product Deleted Successfully", "warning");
                              setTimeout(function(){
                                location.reload();
                              },3000);
                                     
                }  
           })  
      });
      // print
      $(document).on('click', '.print', function(){  
           var p_id = $(this).attr("id");
           $('#qty').val('');
           $('#prod_id').val(btoa(p_id));
           $('#exampleModal1').modal('show');
      });
      $(document).on('click', '#addProd', function(){  
           $('#exampleModal2').modal('show');
      });
      $(document).on('keyup', '#prod_offer_price_per', function(){  
          var val = $('#prod_price').val();
          var valper = $('#prod_offer_price_per').val();
          fin_val = (val/100)*valper;
          fin_tot_price = parseInt(fin_val) + parseInt(val);
          var valper = $('#prod_offer_price').val(fin_tot_price);
          console.log(fin_val);

      });
      $(document).on('keyup', '#serialNo', function(){  
          var serialNo = $('#serialNo').val();
           $.ajax({  
                url:"get_product_details",
                method:"POST",  
                data:{serialNo:serialNo},  
                dataType:"json",  
                success:function(data)  
                {  
                 console.log(data);
                 if (data.length != 0) {
                  $('#prodName').val(data.name);
                  $('#ret_prod_prc').val(data.prod_price);
                  $('#ret_prod_id').val(data.prod_id);
                 }                       
                }  
           })
      });
});