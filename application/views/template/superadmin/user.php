	  
<script src="../assets/js/Sauser.js"></script>

    <!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <div class="col-md-12  ">
<!-- 
      <button type="button" id="add_button" data-toggle="collapse" data-target="#addproduct" class="w-100 btn btn-block btn-outline-info ">
              <div class="card-header border-0">
               <h3><i class="fa fa-plus fa-2"></i>  Add Shops</h3>
              </div>
            </button> -->

<!--  view section -->
           
<br>
    <div class="row">
      <div class="col-12">
            <div class="card card-dark">
            <div class="card-header">
              <h1 class="card-title ">Sales</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1tab" class="table table-bordered table-hover ">
                <thead>
                <tr>
                  <th>BillNo</th>
                  <th>Name</th>
                  <th>Mobile No.</th>
                  <th>Total Items</th>
                  <th>Total Quantity</th>
                  <th>Total Amount</th>
                  <th>Discount</th>
                  <th>Bill Amount</th>
                  <th>Bill Time</th>
                  <th>Details</th>

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
  <div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title" id="exampleModalLabel"><b>Order</b></h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row mb-4">
          <div class="col-12">
            <div id="Hello">
                <table class="table-vals" style="border: 1px solid black; width: 100%">
                  <thead>
                    <tr>
                      <th>S.No</th>
                      <th>Product Id</th>
                      <th>Product Name</th>
                      <th>Size</th>
                      <th>Qty</th>
                      <th>Price</th>
                      <th>Total</th>
                    </tr>
                  </thead>
                  <tbody id="orderTable">
                  </tbody>
                </table>
            </div>
          </div>           
          </div>
          <div class="row" id="totVals" style="display: none;">
            
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" id="orderUpdate" style="display: none;" >Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
   </div>
