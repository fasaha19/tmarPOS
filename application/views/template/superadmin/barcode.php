	  
<script src="../assets/js/prodrep.js"></script>

    <!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <div class="col-md-12  "> 
  <!-- <div class="row">
      <div class="col-12">
            <div class="card card-dark">
              <div class="card-header">
                <h1 class="card-title ">Print Sale Report</h1>
              </div>
              <div class="card-body table-responsive">
              </div>
          </div>
          </div>
    </div>  --> 
<br>
    <div class="row">
      <div class="col-12">
            <div class="card card-dark">
            <div class="card-header">
              <h1 class="card-title ">Download Barcode</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <form action="http://localhost/istyle/assets/barcodeprintpage.php" target="_blank" method="get">
              <div >
                <div class="form-group">
                  <label>Product Id(For multiple Ids give in comma(,) seperated values)</label>
                  <input class="form-control" type="text" name="prod_ids" id="prod_ids" placeholder="example : 1,2,3,5">
                </div>
                <div class="form-group" style="margin-left: 20px;margin-top: -4px;">
                  <button class="btn btn-primary print_data">Generate</button>
                </div>
              </div>
                </form>
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
          <h5 class="modal-title" id="exampleModalLabel">Order #</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row mb-4">
          <div class="col-12">
                <div id="Hello">
                </div>
          </div>           
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
  <div class="modal " id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title" id="exampleModalLabel">Change Status</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row mb-4">
          <div class="col-12">
            <form>
              <div >
                <label>Status</label>
                <select id="Status" class="form-control Status">
                  <option value="1">Accepted</option>
                  <option value="2">shipped</option>
                  <option value="3">Deliverd</option>
                </select>
                <input type="hidden" name="orderid" id="orderIdStatus">
              </div>
            </form>
          </div>           
          </div>
        </div>
        <div class="modal-footer">
          <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> -->
          <button type="button" onclick="submit_status();" class="btn btn-secondary">Submit</button>
        </div>
      </div>
    </div>
  </div>
   </div>
