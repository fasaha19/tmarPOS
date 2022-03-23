	  
<script src="../assets/js/salerep.js"></script>

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
              <h1 class="card-title ">Download Sale Report</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <div style="display: flex;">
                <div class="form-group">
                  <label>Start Date</label>
                  <input type="date" name="startDate" id="startDate">
                </div>
                <div class="form-group" style="margin-left: 20px;">
                  <label>End Date</label>
                  <input type="date" name="endDate" id="endDate">
                </div>
                <div class="form-group" style="margin-left: 20px;margin-top: -4px;">
                  <button class="btn btn-primary print_data">Generate Excel</button>
                </div>
              </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
    </div>

    <div class="row">
      <div class="col-12">
            <div class="card card-dark">
            <div class="card-header">
              <h1 class="card-title ">Sale Report</h1>
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
                  <th>Profit Amount</th>
                  <th>Bill Time</th>

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
