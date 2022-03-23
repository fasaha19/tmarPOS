
<div class="content-wrapper"> 
<div class="row">	
   <div class="col-md-12  ">
   	 <div class="card card-dark">
            <div class="card-header">
              <h1 class="card-title ">ORDERS</h1>
            </div>
            <!-- /.card-header -->
         

   		  <div class="card-body">
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                <tr>
                  <th>Order Id</th>
                  <th>Date</th>
                  <th>Buyer Name</th>
                  <th>Order Details</th>
              
                </tr>
                </thead>
                <tbody>
     <?php  
           if($admin_order->num_rows() > 0)  
           {  
                foreach($admin_order->result_array() as $row)  
                {  
            

                	
                
           ?> 
                <tr >
                  <td class="align-middle h5 "># <?php echo $row['id'];?></td>
                  <td class="align-middle h5 "><?php $splitTimeStamp = explode(" ",$row['created']);
													$date = $splitTimeStamp[0];
													$time = $splitTimeStamp[1];
													echo $date." / ".$time;
													?> 
				</td>

      
                  <td class="align-middle h5 "><?php echo $row['buyer_name']; ?></td>
                  <td class="align-middle h5 "><button type="button" class="btn btn-info" id="<?php echo $row['id'];?>" data-toggle="modal" data-target="#modal-default<?php echo $row['id'];?>">
                  Order Details
                </button></td>


         <div class="modal  fade" id="modal-default<?php echo $row['id'];?>">
  	   
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header bg-dark">
              <h4 class="modal-title">Order #<?php echo $row['id'];?> </h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
   		  <?php  

                	$var = unserialize($row['chk_prod_details']);
                	$var2 = unserialize($row['chk_amnt_details']);
                	$var3 = unserialize($row['address']);
      	
					
           ?> 
             <div class="container">
             	<hr>
             	<div class="row">
             		<div class="col-md-6 col-xs-6 col-sm-6 ">
             			<h6 class="font-weight-bold">Buyer email</h6>
             		</div>
             		<div class="col-md-6 col-xs-6 col-sm-6">
             			<h6><?php echo $row['buyer_email']; ?></h6>
             		</div>
             	</div>
             	<hr>
             	<div class="row">
             		<div class="col-md-6 col-xs-6 col-sm-6 ">
             			<h6 class="font-weight-bold">Buyer Address</h6>
             		</div>
             		<div class="col-md-6 col-xs-6 col-sm-6">
             			<h6><?php echo $var3['name']; ?></h6>
             			<h6><?php echo $var3['address_line1']; ?></h6>
             			<h6><?php echo $var3['town_city']; ?></h6>
             			<h6><?php echo $var3['district']; ?></h6>
             			<h6><?php echo $var3['state']; ?></h6>
             			
             		</div>
             	</div>
             	<hr>
             	<div class="row">
             		<div class="col-md-6 col-xs-6 col-sm-6 ">
             			<h6 class="font-weight-bold">Postal Code</h6>
             		</div>
             		<div class="col-md-6 col-xs-6 col-sm-6">
             			<h6><?php echo $var3['pincode']; ?></h6>
             			
             		</div>
             	</div>
             	<hr>
             	<div class="row">
             		<div class="col-md-12 col-xs-12 col-sm-12 text-center">
             			<h6 class="font-weight-bold">products</h6>
             		</div>
             		
             	</div>
             	<hr>
             	<?php
             	$arr = array();
                	for ($i=1; $i < $var['prod_count']  ; $i++) { 
                			$arr['p_id'.$i] = $var['prod_id'.$i];

             	?>
             	<div class="row">
             		<div class="col-md-3 col-xs-3 col-sm-3 ">
             			<h6 class="font-weight-bold">product name</h6>
             			<h6 class="font-weight-bold">quantity</h6>
             			<h6 class="font-weight-bold">Price</h6>
             			
             		</div>

             		<div class="col-md-3 col-xs-3 col-sm-3 ">
             			<h6><?php  echo $var['prod_name'.$i]; ?></h6>
             			<h6><?php  echo $var['qty'.$i]; ?></h6>
             
             			
             		</div>
             		<div class="col-md-6 col-xs-6 col-sm-6">
             			<img class="border shad" src="<?php echo base_url(); ?>assets/uploads/products/<?php echo $var['prod_img'.$i]; ?>"  height="150" width="150">
             				
             		</div>
             	</div>
             	<hr>
             	 <?php 
			 		}
	        ?>


	        <hr>
	        <div class="row">
	        	<div class="col-xs-6 col-md-6 col-sm-6 text-right">
	        		<h6>Sub Total Amount</h6>
	        		<h6>Shipping Amount</h6>
	        		<h6>Total Amount</h6>
	        	</div>
	        	<div class="col-xs-6 col-md-6 col-sm-6 text-right ">
	        	
	        		<h6 class="font-weight-bold text-warning"> <?php echo $a=$var2['ship_charges']; ?></h6>
	        		<h6 class="font-weight-bold text-danger	"><?php echo $b=$var2['tot_cost']; ?></h6>
              <h6 class="font-weight-bold text-dark "><?php echo $a+$b; ?></h6>
	        	
	        	</div>
	        </div>
             </div>
	       
            </div>
            <div class="modal-footer justify-content-between">
              <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       <!--        <button type="button" class="btn btn-primary">Save changes</button> -->
            </div>
          </div>
          <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
      
      </div>
           





                </tr>
  <?php 


        }
  
      }
  ?>
               
                </tbody>
             
              </table>
            </div>
   </div>
</div>



 

</div>

</div>


<script type="text/javascript">
	  $(function () {
        $('#example1').DataTable({
      "paging": true,
      "lengthChange": true,
      "searching": true,
      "ordering": true,
      "info": true,
      "order": [],
      "autoWidth": true,
    });
  });
</script>