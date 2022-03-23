

<script src="../assets/js/sacategory.js"></script>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Subcategory</h1>
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
    <style>
        .select2-selection__rendered{
            line-height:18px !important;
        }
    </style>
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
         <div class="col-12">
            <div class="card">
              <div class="card-body">
                <form id="add_cat_form" role="form" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Category</label>
                    <select  class="form-control select2" id="categoryid"  data-placeholder="Select a Category" data-dropdown-css-class="select2" name="categoryid" style="width: 100%; " autocomplete="off">
                       {% for i in drop_data %}
                           <option value="{{i.id}}">{{i.categoryname}}</option>
                        {% endfor %}
             
                    </select>
                  
                    <br>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Message"/>
                     <br>
                    
                    
                      <input type="hidden" name="p_id" id="p_id" value=" " />
                <!-- /.card-body -->

                    <div class="">
                        
                      <input type="submit" name="action" id="action"  value="Add" class="btn col-md-2 offset-md-10 btn-dark" />
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
                  <th>Id</th>
                  <th>Name</th>
                  <th>Category</th>
                  
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
    </section>
    <!-- /.content -->
  </div>
       

  


