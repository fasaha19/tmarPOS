
    <!-- Content Wrapper. Contains page content -->

<script src="../assets/js/saindex.js"></script>
  <div class="content-wrapper">
    
   <div class="col-md-12  ">

      <button type="button" id="add_button" data-toggle="collapse" data-target="#addproduct" class="w-100 btn btn-block btn-outline-dark ">
              <div class="card-header border-0">
               <h5>Add Admin&nbsp;&nbsp;&nbsp;<i class="fa fa-plus fa-2"></i></h5>
              </div>
            </button>
            
 <div id="addproduct" class="collapse ">
       <div class="card card-dark ">
              <!-- <div class="card-header  ">
                <h3 class="card-title">ADD PRODUCT</h3>
              </div> -->
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" method="post" id="add_admin_form" name="add_admin_form">
                <div class="card-body ">
                  <div class="form-group col-12">
                    <label for="name">Full Name</label>
                    <input type="text" class="form-control" id="name"  name="name" placeholder="Full name">
                  </div>
                  
                  <div class="form-group col-12">
                    <label for="prod_desc">Phone Number</label>
                    <input type="text" class="form-control" id="phone"  name="phone" placeholder="Mobile Number">
                  </div>
                  <div class="form-group col-12">
                    <label for="prod_price">Password</label>
                    <input type="text" class="form-control" id="pwd"  name="pwd" placeholder="Password">
                  </div>
                  <div class="form-group col-12">
                    <label for="prod_offer_price">Confirm Password</label>
                    <input type="text" class="form-control" id="conf_pwd"  name="conf_pwd" placeholder="Confirm Password">
                  </div>
                
                </div>
                <input type="hidden" name="p_id" id="p_id" value=""/>
                <!-- /.card-body -->

                <div class="card-footer" style="text-align: end;">
                  <input type="submit" name="action" id="action"  value="Submit" class="btn col-md-2 btn-dark" />
                </div>
                
              </form>
            </div>


          </div>

<!--  view section -->
           
<br>
    <div class="row">
      <div class="col-12">
            <div class="card card-dark">
            <div class="card-header">
              <h1 class="card-title ">Admins</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-hover ">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Phone</th>
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
   </div>