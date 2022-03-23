 var def = 'aa';
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
                     "targets":[-1],  
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
                             swal("","Product "+action+"ed Successfully", "success");
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
      $(document).on('click', '#qtyUpd', function(event){  
           var formdata = '';
           event.preventDefault();
           var action = $('#action').val();
           // formdata.append('file[]',productName); 
           // console.log(formdata);
           if($('#prod_id_qty').val() != '')  
           {  
                
                $.ajax({  
                     url: "updQty",
                     type:'POST',  
                     data:{id:$('#prod_id_qty').val(),qty:$('#qty_qty').val()},
                      dataType:"json",  
                     success:function(data)  
                     {  
                          console.log(data);
                          if (data) {
                             swal("","Product updated Successfully", "success");
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
// update
      $(document).on('click', '.update', function(){  
        var i = 0;
           var p_id = $(this).attr("id");
           // alert(p_id);
           $.ajax({  
                url:"fetch_single_product",  
                method:"POST",  
                data:{p_id:p_id},  
                dataType:"json",  
                success:function(data)  
                {  
                     $('#p_id').val(p_id);  
                     $('#action').val("Edit");
                     $('#addproduct').collapse('show'); 
                     $('#exampleModal2').modal('show'); 
                     $('#name').val(data.name);     
                     $('#prod_offer_price').val(data.prod_offer_price);
                     $('#prod_offer_price1').val(data.prod_offer_price);
                     $('#prod_offer_price_per').val(data.prod_offer_price_per);  
                     $('#prod_price').val(data.prod_price);  
                     $('#prod_qty').val(data.prod_stock);
                     $('#plan').val(data.plan);
                     $('#gender').val(data.gender);
                     $('#construction').val(data.contruction);
                     $('#article').val(data.article);
                     $('#leather').val(data.leather);
                     $('#color').val(data.color);
                     $('#lining').val(data.lining);
                     $('#sole').val(data.sole);
                     $('#group').val(data.prod_group);
                     $('#prod_ids').val(data.prod_ids);
                     $('#taxType').val(data.tax_type);
                     $('#prodType').val(data.prod_type);
                     $('#prod_tax').val(data.tax);
                     $('#size').val(data.size);
                     $('#price').val(data.prod_price);
                     $('#sell_price').val(data.prod_offer_price);
                     $('#prod').val(data.prod_stock);
              //        $.each(data.sizeDetails, function (i) {
              //             console.log(i);
              //             var clone2 = $('#fetch'+i).clone();  
              //             $("#fetch"+i).after(clone2);
              //             $(clone2).attr('id',"fetch"+i);
              //             $(clone2).attr('name',"fetch"+i);

              //             $(clone2).find(".size_det").attr("name", "size[" + i + "][size] ");
              //             $(clone2).find(".prod_qty").attr("name", "size[" + i + "][prod] ");
              //             $(clone2).find(".prod_prc").attr("name", "size[" + i + "][price] ");
              //             $(clone2).find(".prod_sell_prc").attr("name", "size[" + i + "][sell_price] ");
              //             $(clone2).find(".prod_id").attr("name", "size[" + i + "][id] ");

              //             $(clone2).find(".size_det").attr("id", "size[" + i + "][size] ");
              //             $(clone2).find(".prod_qty").attr("id", "size[" + i + "][prod] ");
              //             $(clone2).find(".prod_prc").attr("id", "size[" + i + "][price] ");
              //             $(clone2).find(".prod_sell_prc").attr("id", "size[" + i + "][sell_price] ");
              //             $(clone2).find(".prod_id").attr("id", "size[" + i + "][id] ");

              //             $(clone2).find("#"+"size[" + i + "][size]").attr("class", "form-control  size_" + i + "_size ");
              //             $(clone2).find("#"+"size[" + i + "][prod]").attr("class", "form-control  size_" + i + "_prod ");
              //             $(clone2).find("#"+"size[" + i + "][price]").attr("class", "form-control  size_" + i + "_price ");
              //             $(clone2).find("#"+"size[" + i + "][sell_price]").attr("class", "form-control  size_" + i + "_sell_price ");

              //             $('.fetch').last().attr('id','fetch'+(parseInt(i)+1));

              //             $('#'+ 'fetch'+(parseInt(i)+1) +' .size_det').val(data.sizeDetails[i]['size']);
              //             $('#'+ 'fetch'+(parseInt(i)+1) +' .prod_qty').val(data.sizeDetails[i]['Qty']);
              //             $('#'+ 'fetch'+(parseInt(i)+1) +' .prod_prc').val(data.sizeDetails[i]['price']);
              //             $('#'+ 'fetch'+(parseInt(i)+1) +' .prod_sell_prc').val(data.sizeDetails[i]['sell_price']);
              //             $('#'+ 'fetch'+(parseInt(i)+1) +' .prod_id').val(data.sizeDetails[i]['id']);
              //             def = i;
              //             // $('#'+ 'fetch'+(parseInt(i)+1) +' .form-group').find('input').eq(1).val('data.sizeDetails[i]["id"]');
              //             // setTimeout(function() {
              //               // $('#size['+i+'][size]').val(data.sizeDetails[i]['size']);
              //               // $('#size[0][size]').val('33');
              //             // }, 1000);
              //             // setTimeout(function() {
              //               // $('#size['+i+'][prod]').val('34');
              //             // }, 1000);
              // });
                }  
           })  
      });

$(document).on('click', '.view_qty', function(){  
        var i = 0;
           var p_id = $(this).attr("id");
           // alert(p_id);
           $.ajax({  
                url:"fetch_single_product",  
                method:"POST",  
                data:{p_id:p_id},  
                dataType:"json",  
                success:function(data)  
                {  

                    var startData = '<table class = "table table-hover table-bordered"  id="myTable"><tr><th>&nbsp;Size&nbsp;</th><th>&nbsp;Price&nbsp;</th><th>&nbsp;Selling Price&nbsp;</th><th>Qty</th><th>Action</th></tr>'
                    $.each(data.sizeDetails, function (i) {
                      startData += '<tr>';
                      startData += '<td>'+data.sizeDetails[i]['size']+'</td>';
                      startData += '<td>'+data.sizeDetails[i]['price']+'</td>';
                      startData += '<td>'+data.sizeDetails[i]['sell_price']+'</td>';
                      startData += '<td>'+data.sizeDetails[i]['Qty']+'</td>';
                      // startData += '<td><a id ="'+data.sizeDetails[i]['id']+'" name="print" style="border-radius: 25px;" class="print text-dark btn btn-warning">Print&nbsp;&nbsp;<i class="nav-icon fas fa-print"></i></a></td>';
                      startData += '</tr>';
                    })
                    startData += '</table>' 
                    
                    $("#table_details_qty").html(startData);
                    $('#exampleModal4').modal('show');
                    
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
            $('#exampleModal4').modal('show');
        console.log($(this));
           var p_id = $(this).attr("id");
           // console.log(p_id);
           $('#qty').val('');
           $('#barcode_form').show();
            // setTimeout(function(){
              $('#prod_id_bar').val($(this).attr("id"));
            // },310);

      });
      $(document).on('click', '#addProd', function(){  
           $('#exampleModal2').modal('show');
      });
      $(document).on('click', '#uploadProd', function(){  
           $('#exampleModal3').modal('show');
      });
      $(document).on('click', '.qtyUpd', function(){  
            $('#prod_id_qty').val($(this).attr("id"));
           $('#exampleModal5').modal('show');
      });
      $(document).on('keyup', '#prod_offer_price_per', function(){  
          var val = $('#prod_price').val();
          var valper = $('#prod_offer_price_per').val();
          fin_val = (val/100)*valper;
          fin_tot_price = parseInt(fin_val) + parseInt(val);
          var valper = $('#prod_offer_price').val(fin_tot_price);
          console.log(fin_val);

      });

      var i = 1;
      $("#plus").on('click', function () {
        if (def != 'aa') {
          i = def+1;
          def = i;
        }
         // $( ".fetch_1" ).clone().appendTo( ".fetch_1" );
         // $("#fetch_2")
         //Add after the element which has class unique
              var clone2 = $('#fetch'+i).clone();  
              $("#fetch"+i).after(clone2);
              $(clone2).attr('id',"fetch"+i);
              $(clone2).attr('name',"fetch"+i);
      //Find name inside unique and update
              $(clone2).find(".size_det").attr("name", "size[" + i + "][size] ");
              $(clone2).find(".prod_qty").attr("name", "size[" + i + "][prod] ");
              $(clone2).find(".prod_prc").attr("name", "size[" + i + "][price] ");
              $(clone2).find(".prod_sell_prc").attr("name", "size[" + i + "][sell_price] ");
      //Find id inside unique and update
              $(clone2).find(".size_det").attr("id", "size[" + i + "][size] ");
              $(clone2).find(".prod_qty").attr("id", "size[" + i + "][prod] ");
              $(clone2).find(".prod_prc").attr("id", "size[" + i + "][price] ");
              $(clone2).find(".prod_sell_prc").attr("id", "size[" + i + "][sell_price] ");
      //Increment the index
              $('.fetch').last().attr('id','fetch'+(parseInt(i)+1));

              i++;
          });
      $("#minus").on('click', function () {
          var dataVal = $('.fetch').last().attr('id');
          if(dataVal != 'fetch1'){
            $('#'+dataVal).remove();
          }

      });

/*Uplaoding the csv form*/

$('#upload_csv').on("submit", function(e){  
                e.preventDefault(); //form will not submitted  
                $.ajax({  
                     url:"uploadForm",  
                     method:"POST",  
                     data:new FormData(this),  
                     contentType:false,          // The content type used when sending data to the server.  
                     cache:false,                // To unable request pages to be cached  
                     processData:false,          // To send DOMDocument or non processed data file it is set to false  
                     success: function(data){  
                          if(data=='Error1')  
                          {  
                               alert("Invalid File");  
                          }  
                          else if(data == "Error2")  
                          {  
                               alert("Please Select File");  
                          }  
                          else if(data == 'Uploaded Successfully')  
                          {  
                             swal("","Product "+action+"ed Successfully", "success");
                          }  
                     }  
                })  
           });

});
 function updatePrice() {
   var taxtype = $('#taxType').val();
      prodPrc = $('#prod_price').val();
      taxPer = $('#prod_tax').val();
   if(taxtype == 'excl'){
      finalPrice = parseInt(prodPrc) + parseInt(((prodPrc/100)*taxPer));
      $('#prod_offer_price').val(finalPrice);
      $('#prod_offer_price1').val(finalPrice);
   }else{
      $('#prod_offer_price').val(prodPrc);
      $('#prod_offer_price1').val(prodPrc);
   }
 }
function updatePriceChange() {
      taxtype = $('#taxType').val();
      prodPrc = $('#prod_price').val();
      if(taxPer === undefined || taxPer == ''){
        taxPer = 0;
      }
      taxPer = $('#prod_tax').val();
   if(taxtype == 'excl'){
      finalPrice = parseInt(prodPrc) + parseInt(((prodPrc/100)*taxPer));
      $('#prod_offer_price').val(finalPrice);
      $('#prod_offer_price1').val(finalPrice);
   }else{
      $('#prod_offer_price').val(prodPrc);
      $('#prod_offer_price1').val(prodPrc);
   }
 }
$(document).ready(function () {

});
