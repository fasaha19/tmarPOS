 <script src="{{base_url}}assets/js/saindex.js"></script>
  <style type="text/css">
    #addProd {
      transition: 300ms;
      border-bottom: 2px solid transparent;
    }
    #addProd:hover {
      border-color: white;
    }
    
  </style>

  <div class="content-wrapper">
    
   <div class="col-md-12" style="padding: 10px 25px 25px 25px;">

      <!-- <button type="button" id="add_button" data-toggle="collapse" data-target="#addproduct" class="w-100 btn btn-block btn-outline-dark ">
        <div class="card-header border-0">
         <h5>Add Products&nbsp;&nbsp;&nbsp;<i class="fa fa-plus fa-2"></i></h5>
        </div>
      </button> -->
<!--             
 <div id="addproduct" class="collapse ">
       <div class="card card-dark ">
              <form role="form" method="post" id="add_prod_form" name="add_prod_form" enctype="multipart/form-data" >
                <div class="card-body ">
                  <div class="form-group col-12">
                    <label for="name">Product Name</label>
                    <input type="text" class="form-control" id="name"  name="name" placeholder="Product name">
                  </div>
                  <div class="form-group col-12">
                    <label for="prod_price">Product Price</label>
                    <input type="text" class="form-control" id="prod_price"  name="prod_price" autocomplete="off" placeholder="Product Price">
                  </div>
                  <div style="display: flex;">
                      <div class="form-group col-6">
                        <label for="prod_offer_price">Product Selling Price - profit percentage(in %)</label>
                        <input type="text" class="form-control" id="prod_offer_price_per" autocomplete="off" name="prod_offer_price_per" placeholder="Product Selling Price (in %)">
                      </div>
                        <div class="form-group col-6" style="cursor: not-allowed;pointer-events: none;">
                          <label for="prod_stock">Product Selling Price</label>
                          <input type="text" class="form-control" id="prod_offer_price"  name="prod_offer_price" placeholder="Product Selling Price">
                        </div>
                  </div>
                    <div class="form-group col-12">
                      <label for="prod_stock">Product Quantity</label>
                      <input type="text" class="form-control" id="prod_qty"  name="prod_qty" placeholder="Product Quantity">
                    </div>
                </div>
                <input type="hidden" name="p_id" id="p_id" value=""/>
                 /.card-body -->
             <!--    <div class="card-footer" style="text-align: end;">
                  <input type="submit" name="action" id="action"  value="Add" class="btn col-md-2 btn-dark" />
                </div>
              </form>
            </div>
          </div>  -->
<!--  view section -->
           
<br>
    <div class="row">
      <div class="col-12">
            <div class="card card-dark">
            <div class="card-header">
              <h1 class="card-title "><b>Manage Stocks</b></h1>
              <a id="addProd" style="float: right;font-weight: normal !important;"><i class="nav-icon fa fa-plus-circle"></i>&nbsp;Add Product</a>&nbsp;&nbsp;
              <a id="uploadProd" style="float: right;font-weight: normal !important;padding-right: 15px;"><i class="nav-icon fa fa-plus-circle"></i>&nbsp;Upload File</a>&nbsp;&nbsp;
            </div>
            <!-- /.card-header -->
            <div class="card-body table-responsive">
              <table id="example1" class="table table-bordered table-hover ">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Product Name</th>
                  <th>Color</th>
                  <th>Construction</th>
                  <th>Size</th>
                  <th>Price</th>
                  <th>Qty </th>
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
   <div class="modal " id="exampleModal1" style="z-index: 99;" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
  <div class="modal" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title" id="exampleModalLabel">Upload Product</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="row">
              <div style="text-align: center;padding-left: 20px;">
                Kindly download the below report and edit the document for error free upload.
              </div>
            </div>
            <div class="row">
              <div style="text-align: center;padding-left: 20px;">
                <a class="" href="../assets/sample_product.csv">Download Sample File</a>
              </div>
            </div>
            <div class="row">
              <div style="text-align: center;padding-left: 20px;">
                <form id="upload_csv" method="post" enctype="multipart/form-data">
                   <br />
                   <label>Select CSV File</label>
                                  <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top:15px;border-radius: 25px;background: linear-gradient(to right,#7e84ce,#5299e2) !important;border: 2px solid;" />
                                  <input type="submit" style="border-radius: 25px;background: linear-gradient(to right,#2f3474,#0173e9) !important;" name="upload" id="upload" value="Upload" class="btn btn-info" />
                              <div style="clear:both"></div>
                 </form>
              </div>
            </div>
          <br>
          <br>
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
                      <label for="name">Product Name</label>
                      <input type="text" class="form-control" id="name"  name="name" placeholder="Product Name">
                    </div>
                    <div class="form-group col-6">
                      <label for="name">Plan</label>
                      <input type="text" class="form-control" id="plan"  name="plan" placeholder="Product Plan">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-3" >
                      <label for="prod_price">Gender</label>
                      <input type="text" class="form-control" id="gender"  name="gender" autocomplete="off" placeholder="Gender">
                    </div>
                    <div class="form-group col-3">
                      <label for="prod_price">Construction</label>
                      <input type="text" class="form-control" id="construction"  name="construction" autocomplete="off" placeholder="Construction">
                    </div>
                    <div class="form-group col-3" >
                      <label for="prod_price">Article</label>
                      <input type="text" class="form-control" id="article"  name="article" autocomplete="off" placeholder="Article">
                    </div>
                    <div class="form-group col-3">
                      <label for="prod_price">Leather</label>
                      <input type="text" class="form-control" id="leather"  name="leather" autocomplete="off" placeholder="Leather">
                    </div>
                  </div><div class="row">
                    <div class="form-group col-3" >
                      <label for="prod_price">Color</label>
                      <input type="text" class="form-control" id="color"  name="color" autocomplete="off" placeholder="Color">
                    </div>
                    <div class="form-group col-3">
                      <label for="prod_price">Lining</label>
                      <input type="text" class="form-control" id="lining"  name="lining" autocomplete="off" placeholder="Lining">
                    </div>
                    <div class="form-group col-3" >
                      <label for="prod_price">Sole</label>
                      <input type="text" class="form-control" id="sole"  name="sole" autocomplete="off" placeholder="Sole">
                    </div>
                    <div class="form-group col-3">
                      <label for="prod_price">Group</label>
                      <input type="text" class="form-control" id="group"  name="group" autocomplete="off" placeholder="Group">
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-3" >
                      <label for="prod_price">Product Id</label>
                      <input type="text" class="form-control" id="prod_ids"  name="prod_ids" autocomplete="off" placeholder="Product Id">
                    </div>
                    <div class="form-group col-3" >
                      <label for="prod_price">Product Type</label>
                      <select class="form-control" name="prodType" id="prodType">
                        <option value="SU">FOOTWEAR (SU)</option>
                        <option value="SLG">LEATHER GOODS (SLG)</option>
                      </select>
                    </div>
                    <!-- <div class="form-group col-6">
                      <label for="prod_price">Product Price</label>
                      <input type="text" class="form-control" id="prod_price"  name="prod_price" autocomplete="off" placeholder="Product Price"> -->
                      <div class="form-group col-3">
                        <label for="prod_tax">Tax Type</label>
                          <select class="form-control" onchange="updatePriceChange();" name="taxType" id="taxType">
                            <option value="inc">Inclusive of Tax</option>
                            <option value="excl">Exclusive of Tax</option>
                          </select>
                      </div>
                      <div class="form-group col-3">
                        <label for="prod_offer_price">Tax(in %)</label>
                        <input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" onkeyup="updatePrice();" id="prod_tax" autocomplete="off" name="prod_tax" placeholder="Tax (in %)">
                      </div>
                    </div>
                  </div>
                  <!-- <div class="row"> -->
                      <!-- <div class="form-group col-3">
                        <label for="prod_tax">Tax Type</label>
                          <select class="form-control" onchange="updatePriceChange();" name="taxType" id="taxType">
                            <option value="inc">Inclusive of Tax</option>
                            <option value="excl">Exclusive of Tax</option>
                          </select>
                      </div>
                      <div class="form-group col-3">
                        <label for="prod_offer_price">Tax(in %)</label>
                        <input type="text" class="form-control" oninput="this.value = this.value.replace(/[^0-9.]/g, '').replace(/(\..*?)\..*/g, '$1');" onkeyup="updatePrice();" id="prod_tax" autocomplete="off" name="prod_tax" placeholder="Tax (in %)">
                      </div> -->
                        <!-- <div class="form-group col-6" style="cursor: not-allowed;pointer-events: none;">
                          <label for="prod_stock">Product Selling Price</label>
                          <input type="text" disabled class="form-control" id="prod_offer_price"  name="prod_offer_price" placeholder="Product Selling Price">
                          <input type="text" hidden class="form-control" id="prod_offer_price1"  name="prod_offer_price" placeholder="Product Selling Price">
                        </div> -->
                  <!-- </div> -->
                  <!-- <div class="row" style="border-top: 1px solid #c5c5c5;padding:8px 15px 5px 15px;">
                    <div class="form-group col-4">
                      <div>Add / Remove Sizes</div>
                    </div>
                    <div class="form-group col-2">
                      <div id="plus" class="form-control btn btn-primary">+</div>
                    </div>
                    <div class="form-group col-2">
                      <div id="minus" class="form-control btn btn-primary">-</div>
                    </div>
                  </div> -->
                  <div class="row fetch" id="fetch1" style="padding:8px 15px 5px 15px;">
                    <div class="form-group">
                      <!-- <input type="text" class="form-control prod_id" hidden id="size[0][id]"  name="size[0][id]" placeholder="Product Quantity"> -->
                    </div>
                    <div class="form-group col-3">
                      <label for="prod_stock">Product Size</label>
                      <input type="text" class="form-control size_det" id="size"  name="size" placeholder="Product Size">
                    </div>
                    <div class="form-group col-3">
                      <label for="prod_stock">Product Quantity</label>
                      <input type="text" class="form-control prod_qty" id="prod"  name="prod" placeholder="Product Quantity">
                    </div>
                    <div class="form-group col-3">
                      <label for="prod_stock">Product Price</label>
                      <input type="text" class="form-control prod_prc" id="price"  name="price" placeholder="Product Price">
                    </div>
                    <div class="form-group col-3">
                      <label for="prod_stock">Product Selling Price</label>
                      <input type="text" class="form-control prod_sell_prc" id="sell_price"  name="sell_price" placeholder="Product Selling Price">
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
  <div class="modal" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xs" role="document">
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title" id="exampleModalLabel">Quantity Details</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form style="display: none;" id="barcode_form" action="http://localhost/tmarPOS/assets/barcode.php" target="_blank" method="get">
                      <div class="form-group">
                          <label>Qty</label>
                          <input type="text" name="qty" id="qty" autocomplete="off">
                          <input type="text" hidden name="prod_id_bar" id="prod_id_bar">
                          <button type="submit" class="btn btn-secondary">Submit</button>
                      </div>
                </form>
        </div>
      </div>
    </div>
  </div>
  <div class="modal" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header ">
          <h5 class="modal-title" id="exampleModalLabel">Update Stocks</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
                      <div class="form-group">
                          <label>Qty to update (This will get added to stocks)</label>
                          <input type="text" name="qty" id="qty_qty" autocomplete="off">
                          <input type="hidden" name="prod_id_qty" id="prod_id_qty">
                          <input type="submit" name="qtyUpd" id="qtyUpd"  value="Update Qty" class="btn col-md-2 btn-dark" />
                          <!-- <button type="submit" class="btn btn-secondary">Submit</button> -->
                      </div>
          <div id="table_details_qty">
            
          </div>
        </div>
      </div>
    </div>
  </div>
   </div>
   <br>
   <br>