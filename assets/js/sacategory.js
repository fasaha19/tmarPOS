$(function () {
    // Summernote
    $('.prod_desc').summernote();  $(function () {
    // Summernote
    $('.prod_desc').summernote();
  });   
  }); 
  $(function(){  
    
  $('.select2').select2()
});  


   // $('#add_prod_form').on('submit', function(e){  
   //         e.preventDefault();  

   //         if($('#prod_img').val() == '')  
   //         {  
   //              alert("Please Select the Image");  
   //         }  
   //         else  
   //         {  
   //              $.ajax({  
   //                   url:"<?php echo base_url(); ?>add_products/add_prod",   
   //                   //base_url() = http://localhost/tutorial/codeigniter  
   //                   method:"POST",  
   //                   data:new FormData(this),  
   //                   contentType: false,  
   //                   cache: false,  
   //                   processData:false,  
   //                   async:false,
   //                   success:function(data)  
   //                   {  
   //                        alert("Your Reference Id is : "+data);
   //                        location.reload();
   //                   }  
   //              });  
   //         }  
   //    });

   


 

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
                     "targets":[-1,-2,-3],  
                     "orderable":false,  
                },  
           ],  
      });

    $('#addproduct').click(function(){  
           $('#product_form')[0].reset();  
           $('.modal-title').text("Add Brand Name");  
           $('#action').val("Add");  
      })
  

      $(document).on('submit', '#add_cat_form', function(event){  
           var formdata = '';
           event.preventDefault();
           // const files = document.querySelector('[type=file]').files;
           // alert(files);
           // var formData = new FormData();
           var productName = "VJHKSDJVHJDV";
           // var formdata = $('#product_form').serialize();
           // formdata.append('tax_file', "sdadsadasd");
            // formdata.append('file', files);
           // alert(productName);
           var action = $('#action').val();
           // formdata.append('file[]',productName); 
           // console.log(formdata);
           if(productName != '')  
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
                          
                          if(data!="Select The Product Image"){

                             toastr.success("Category "+action+"ed Successfully");
                            setTimeout(function(){  location.reload() }, 1000);
                          $('#add_prod_form')[0].reset();  
                          $('#addproduct').collapse('hide');  
                          // dataTable.ajax.reload();


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
        
           var p_id = $(this).attr("id");
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
                     $('#name').val(data.name);     
                     $("#categoryid").select2('val', data.categoryid);  
                    
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

                             toastr.error("Subcategory Deleted Successfully");
                             setTimeout(function(){  location.reload() }, 1000);
                          
                                     
                }  
           })  
      });




 });