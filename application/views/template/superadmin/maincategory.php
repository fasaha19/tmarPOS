

<script src="../assets/js/samaincat.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Category </li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
         <div class="col-12">
            <div class="card">
              <div class="card-body">
                <form id="add_cat_form" role="form" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Category</label>
                    <br>
                    <input type="text" class="form-control" id="categoryname" name="categoryname" placeholder="Message"/>
                     <br>
                    <input type="file" style="height: 45px;" class="form-control"id="categoryimage" name="categoryimage" placeholder="Image Url"/>
                    
                      <input type="hidden" name="p_id" id="p_id" value=" " />
                <!-- /.card-body -->

                    <div class="card-footer" style="background-color: white;text-align: end;">
                        
                      <input type="submit" name="action" id="action"  value="Add" class="btn col-md-2 btn-dark" />
                    </div>
       
                  </div>
                </form>
              </div>
            </div>
          </div>
        <!-- /.row (main row) -->
      </div>

   
    </section>
    <br>
    <section class="content">
      
    <div class="container-fluid" >
      
    <div class="row">
      <div class="col-12">
            <div class="card">
            <div class="card-header">
              <h1 class="card-title ">Category Display</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-hover ">
                <thead>
                <tr>
                  <th><center>Id</center></th>
                  <th><center>Name</center></th>
                  <th><center>Image</center></th>
                  <th><center>Action</center></th>
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
    </section>
    <!-- /.content -->
  </div>
       

  


