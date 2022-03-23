<script src="{{base_url}}assets/js/retIndex.js"></script>
  <div class="content-wrapper">
    
   <div class="col-md-12  ">

      <!-- <button type="button" id="add_button" data-toggle="collapse" data-target="#addproduct" class="w-100 btn btn-block btn-outline-dark ">
        <div class="card-header border-0">
         <h5>Return Products&nbsp;&nbsp;&nbsp;<i class="fa fa-plus fa-2"></i></h5>
        </div>
      </button> -->
            
 <!-- <div id="addproduct" class="collapse "> -->
       
<!--  view section -->
           
<br>
    <div class="row">
      <div class="col-12">
            <div class="card card-dark">
            <div class="card-header">
              <h1 class="card-title ">Return Products</h1>
              <a id="addProd" style="float: right;font-weight: normal !important;"><i class="nav-icon fa fa-plus-circle"></i>&nbsp;Return Product</a>&nbsp;&nbsp;
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-hover ">
                <thead>
                <tr>
                  <th>Return Id</th>
                  <th>Product Name</th>
                  <th>Qty</th>
                  <th>Amount Returned</th>
                  <th>Customer Name</th>
                  <th>Customer Number</th>
                  <th>Returned On</th>
                  <th>Action</th>
                </tr>
                </thead>
              
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
    </div>
            
   </div>
   <div class="modal " id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title" id="exampleModalLabel">Print</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row mb-4">
          <div class="col-12">
              <div>
                <form action="http://localhost/istyle/assets/barcodePrint.php" target="_blank" method="get">
                      <div class="form-group">
                          <label>Qty</label>
                          <input type="text" name="qty" id="qty" autocomplete="off">
                          <input type="hidden" name="prod_id" id="prod_id">
                          <button type="submit" class="btn btn-secondary">Submit</button>
                      </div>
                </form>
              </div>
          </div>           
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<div class="modal" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row mb-4">
          <div class="col-12">
            <div id="addproduct">
             <div class="card card-dark ">
              <form role="form" method="post" id="add_prod_form" name="add_prod_form" enctype="multipart/form-data" >
                <div class="card-body ">
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="name">Serial Number</label>
                      <input type="text" class="form-control" id="serialNo"  name="name" placeholder="Serial Number">
                    </div>
                    <div class="form-group col-6">
                      <label for="name">Product Name</label>
                      <input type="text" class="form-control" id="prodName"  name="prodName" placeholder="Serial Number">
                    </div>

                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="name">Customer Name</label>
                      <input type="text" class="form-control" id="ret_cust_name"  name="ret_cust_name" placeholder="Customer Name">
                    </div>
                    <div class="form-group col-6">
                      <label for="name">Customer Number</label>
                      <input type="text" class="form-control" id="ret_cust_num"  maxlength="10" name="ret_cust_num" placeholder="Customer Number">
                      <input type="hidden" class="form-control" id="ret_prod_id" name="ret_prod_id">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-6">
                      <label for="prod_stock">Product Quantity</label>
                      <input type="text" class="form-control" id="ret_prod_qty"  name="ret_prod_qty" placeholder="Product Quantity">
                    </div>
                    <div class="form-group col-6" id="prod_prc_div">
                      <label for="prod_stock">Product Price</label>
                      <input type="text" class="form-control" id="ret_prod_prc"  name="ret_prod_prc" placeholder="Product Price">
                    </div>
                  </div>
                  <div class="row">
                      <div class="form-group col-6">
                      <label for="prod_stock">Amount To Return</label>
                      <input type="text" class="form-control" id="ret_prod_amnt"  name="ret_prod_amnt" placeholder="Amount To Return">
                    </div>
                  </div>
                </div>
                <input type="hidden" name="p_id" id="p_id" value=""/>
                <!-- /.card-body -->
                <div class="card-footer" style="text-align: end;">
                  <input type="submit" name="action" id="action"  value="Add" class="btn col-md-2 btn-dark" />
                </div>
              </form>
            </div>
          </div>
          </div>           
          </div>
        </div>
      </div>
    </div>
  </div>