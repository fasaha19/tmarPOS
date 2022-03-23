	  
<script src="../assets/js/sadash.js"></script>
<style type="text/css">
  .linear-bg-col{
    background-image: linear-gradient(60deg, black, transparent);
  }
</style>

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
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <div class="row">
          <div class="col-lg-1"></div>
          <div class="col-lg-2 col-12">
            <!-- small box -->
            <div class="small-box bg-info linear-bg-col">
              <div class="inner">
                <h3>{{total_orders}}</h3>

                <p> Sales</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-danger linear-bg-col">
              <div class="inner">
                <h3>{{total_product}}</h3>

                <p>Products</p>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
           <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-primary linear-bg-col">
              <div class="inner">
                <h3>{% if total_items != '' %}{{total_items}}{% else %}0{% endif %}<sup style="font-size: 20px"></sup></h3>

                <p>Items Sold</p>
              </div>
              <div class="icon">
                <i class="ion ion-chatboxes"></i>
              </div>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-warning linear-bg-col" style="color: white !important;">
              <div class="inner">
                <h3>Rs.{% if total_product_amount != '' %}{{total_product_amount}}{% else %}0{% endif %}</h3>

                <p>Product Amount</p>
              </div>
              <div class="icon">
                <i class="ion ion-cube"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <div class="col-lg-2 col-6">
            <!-- small box -->
            <div class="small-box bg-success linear-bg-col">
              <div class="inner">
                <h3>Rs.{{total_orders_profit | number_format(2,'.',',')}}</h3>

                <p> Total Profit</p>
              </div>
              <div class="icon">
                <i class="ion ion-bag"></i>
              </div>
              <!-- <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a> -->
            </div>
          </div>
          <!-- ./col -->
          <!-- ./col -->


        </div>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
          </div>
    </div>

     <div class="row">
        <div class="col-6">
          <div class="card bg-warning linear-bg-col" style="color: white !important;">
            <div class="row m-2">
              <div class="col-6">
                
              <h4>Product Value Sold <b>Today</b></h4>
              </div>
              <div class="col-6 text-right">
                
               <h1>Rs. {% if total_product_amount_today != '' %}{{total_product_amount_today}}{% else %}0{% endif %}</h1>
              </div>
          </div>
          </div>
        </div><div class="col-6">
          <div class="card bg-success linear-bg-col">
            <div class="row m-2">
            <div class="col-6">
                <h4><b>Today's</b> Profit</h4>
            </div>
             <div class="col-6 text-right">
                
               <h1>Rs. {% if total_orders_profit_today != '' %}{{total_orders_profit_today}}{% else %}0{% endif %}</h1>
              </div>

            </div>
          </div>
        </div> 

        <div class="col-6">
          <div class="card bg-info linear-bg-col">
                 <div class="row m-2">
            <div class="col-6">
              <h4>Customers <b>Today</b></h4>
            </div>
             <div class="col-6 text-right">
                
               <h1>{% if total_orders_today != '' %}{{total_orders_today}}{% else %}0{% endif %}</h1>
              </div>
            </div>
          </div>
        </div><div class="col-6 ">
          <div class="card bg-primary linear-bg-col">
                 <div class="row m-2">
            <div class="col-6">
                <h4>Product Sold <b>Today</b></h4>
            </div>
             <div class="col-6 text-right">
                
               <h1>{% if total_items_today != '' %}{{total_items_today}}{% else %}0{% endif %}</h1>
              </div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card bg-primary linear-bg-col">
            <div class="card-header">
                <h3><b>Customers</b></h3>
            </div>
            <div class="mr-25">
                <div id="chartContainer" style="height: 370px; width: 100%;"></div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card bg-info linear-bg-col">
            <div class="card-header">
                <h3><b>Product Value Sold</b></h3>
            </div>
            <div class="mr-25">            
                <div id="chartContainervalue1" style="height: 370px; width: 100%;"></div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card bg-danger linear-bg-col">
            <div class="card-header">
                <h3><b>Profit</b></h3>
            </div>
            <div class="mr-25">
                <div id="chartContainervalue2" style="height: 370px; width: 100%;"></div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card bg-success linear-bg-col">
            <div class="card-header">
                <h3><b>Products Sold</b></h3>
            </div>
            <div class="mr-25">            
                <div id="chartContainervalue3" style="height: 370px; width: 100%;"></div>
            </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card bg-warning linear-bg-col" style="color: white !important;">
            <div class="row m-2">
              <div class="col-6">
                
              <h4>Product Value Sold <br><b>This Week</b></h4>
              </div>
              <div class="col-6 text-right">
                
               <h1>Rs. {% if total_product_amount_week != '' %}{{total_product_amount_week | number_format(2,'.',',')}}{% else %}0{% endif %}</h1>
              </div>
          </div>
          </div>
        </div><div class="col-6">
          <div class="card bg-success linear-bg-col">
            <div class="row m-2">
            <div class="col-6">
                <h4><b>This Week's</b> Profit</h4>
            </div>
             <div class="col-6 text-right">
                
               <h1>Rs. {% if total_orders_profit_week != '' %}{{total_orders_profit_week | number_format(2,'.',',')}}{% else %}0{% endif %}</h1>
              </div>

            </div>
          </div>
        </div> 

        <div class="col-6">
          <div class="card bg-info linear-bg-col">
                 <div class="row m-2">
            <div class="col-6">
              <h4>Customers <b>This Week</b></h4>
            </div>
             <div class="col-6 text-right">
                
               <h1>{% if total_orders_week != '' %}{{total_orders_week}}{% else %}0{% endif %}</h1>
              </div>
            </div>
          </div>
        </div><div class="col-6 ">
          <div class="card bg-primary linear-bg-col">
                 <div class="row m-2">
            <div class="col-6">
                <h4>Product Sold <b>This Week</b></h4>
            </div>
             <div class="col-6 text-right">
                
               <h1>{% if total_items_week != '' %}{{total_items_week}}{% else %}0{% endif %}</h1>
              </div>
            </div>
          </div>
        </div>
        <br>
        <div class="col-6">
          <div class="card bg-success linear-bg-col">
              <div class="card-header">
                  <h3><b>Sale in Last 5 Months</b></h3>
              </div>
              <div class="mr-25">
                  <table class="table table-bordered table-hover ">
                    <thead>
                      <th>Months</th>
                      <th>Amount (in Rs.) </th>
                    </thead>
                    <tbody>
                          {% for i,j in sale %}
                      <tr>
                        <td>{{i}}</td>
                        <td>{% if j != '' %}{{j | number_format(2,'.',',')}}{% else %}0{% endif %}</td>
                      </tr>
                      {% endfor %}
                    </tbody>
                  </table>        
                </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card bg-danger linear-bg-col">
              <div class="card-header">
                  <h3><b>Profit in Last 5 Months</b></h3>
              </div>
              <div class="mr-25">
                  <table class="table table-bordered table-hover">
                    <thead>
                      <th>Months</th>
                      <th>Amount (in Rs.) </th>
                    </thead>
                    <tbody>
                          {% for i,j in profit %}
                      <tr>
                        <td>{{i}}</td>
                        <td>{% if j != '' %}{{j | number_format(2,'.',',')}}{% else %}0{% endif %}</td>
                      </tr>
                      {% endfor %}
                    </tbody>
                  </table>        
                </div>
          </div>
        </div>
        <div class="col-6">
          <div class="card bg-warning linear-bg-col" style="color: white !important;">
            <div class="row m-2">
              <div class="col-6">
                
              <h4>Product Value Sold <br><b>This Month</b></h4>
              </div>
              <div class="col-6 text-right">
                
               <h1>Rs. {% if total_product_amount_month != '' %}{{total_product_amount_month | number_format(2,'.',',') }}{% else %}0{% endif %}</h1>
              </div>
          </div>
          </div>
        </div><div class="col-6">
          <div class="card bg-success linear-bg-col">
            <div class="row m-2">
            <div class="col-6">
                <h4><b>This Month's</b> Profit</h4>
            </div>
             <div class="col-6 text-right">
                
               <h1>Rs. {% if total_orders_profit_month != '' %}{{total_orders_profit_month | number_format(2,'.',',')}}{% else %}0{% endif %}</h1>
              </div>

            </div>
          </div>
        </div> 

        <div class="col-6">
          <div class="card bg-info linear-bg-col">
                 <div class="row m-2">
            <div class="col-6">
              <h4>Customers <b>This Month</b></h4>
            </div>
             <div class="col-6 text-right">
                
               <h1>{% if total_orders_month != '' %}{{total_orders_month}}{% else %}0{% endif %}</h1>
              </div>
            </div>
          </div>
        </div><div class="col-6 ">
          <div class="card bg-primary linear-bg-col">
                 <div class="row m-2">
            <div class="col-6">
                <h4>Product Sold <b>This Month</b></h4>
            </div>
             <div class="col-6 text-right">
                
               <h1>{% if total_items_month != '' %}{{total_items_month}}{% else %}0{% endif %}</h1>
              </div>
            </div>
          </div>
        </div>
      </div>
            
   </div>
   </div>
