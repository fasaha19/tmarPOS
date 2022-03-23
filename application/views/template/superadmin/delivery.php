	  
<script src="../assets/js/sadelivery.js"></script>

    <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
  	
   <div class="col-md-12  ">

    <div class="row">
      <div class="col-12">
            <div class="card card-dark">
            <div class="card-header">
              <h1 class="card-title ">Orders</h1>
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-hover ">
                <thead>
                <tr>
                  <th>Order No</th>
                  <th>Customer Address</th>
                  <th>Mobile</th>
                  <th>Approve</th>

                </tr>
                </thead>
                <tbody>
                   {% for i in fetch_data %}
     
                <tr >
                  <td class="align-middle ">{{i.order_id}}</td>
                  <td class="align-middle ">{{i.user_id}}</td>
                  <td class="align-middle ">{{i.address_line1}}</td>
                  <td class="align-middle ">
                 <label class="switch">
                  {% if i.orderstatus == 0 or i.orderstatus == 1 %}
                  <input id="{{i.order_id}}" name="status" class="status" type="checkbox"  {% if i.orderstatus == 1 %} checked  {% endif %} >
                  <span class="slider round"></span>
                  {% endif %}
                </label>
                  {% if i.orderstatus == 2 %}
                    Accepted
                  {% endif %}
                  {% if i.orderstatus == 3 %}
                    Delivered
                  {% endif %}
                  </td>
                  
                </tr>
  
           {% endfor %}
               
                </tbody>
              <!--   <tfoot>
               <tr>
                  <th>Name</th>
                  <th>Price</th>
                  <th>Qty</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </tfoot> -->
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
    </div>
            
   </div>
   </div>
