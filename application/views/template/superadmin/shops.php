	  
<script src="{{base_url}}assets/js/saaddprod.js"></script>

<style type="text/css">
  .switch {
  position: relative;
  display: inline-block;
  width: 100px;
  height: 34px;
}

.switch input {display:none;}

label.btn.btn-info.active {
    background-color: #0970d6 !important;
    border-color: #2976b8 !important;
}
</style>
    <!-- Content Wrapper. Contains page content -->

<div class="content-wrapper">
  <div class="col-md-12" style="padding: 10px 25px 25px 25px;">
    <div class="card card-dark" style="margin-top: 1%;">
      <div class="card-header">
        <h1 class="card-title ">Daily Sales</h1>
      </div>
      <div class="card-body">
      <section ng-app="saleapp" class="mrgn-20">
      
      <div  ng-controller="salectrl">
        <div class="row">
          <div class="col-12" >
                <div class="row mt-1 ml-2"><h4><b>Customer Details</b></h4></div>
                <div class="row " style="padding-bottom: 15px;">
                  <div class="col-4 ml-4" >
                    <label>Customer Name</label>
                    <input type="text" name="custname" onkeypress="return event.charCode !=48&&event.charCode !=49&&event.charCode !=50&&event.charCode !=51&&event.charCode !=52&&event.charCode !=53&&event.charCode !=54&&event.charCode !=55&&event.charCode !=56&&event.charCode !=57" id="custname" ng-model="custname" ng-init="custname = 'Customer Name'" class="form-control" >
                  </div>
                 <!--  <div class="col-4 mr-2">
                    <label>Customer Address</label>
                    <input type="text" name="custaddr" id="custaddr" ng-model="custaddr" class="form-control">
                  </div> -->
                  <div class="col-4 ml-4">
                    <label>Customer phone Number</label>
                    <input type="text" name="custaddr" id="custaddr"  ng-model="custnumb" ng-init="custnumb = '1234567980'" maxlength="10" class="form-control">
                  </div>
                  <hr>
                  <div class="col-3 ml-4">
                    <label>Date</label>
                    <input type="date" name="custaddr" id="custDate"  ng-model="custDate"  class="form-control">
                  </div>
                  <hr>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12" >
              <div style="padding: 15px;border-top: 1px solid #8b8b8b;padding-top: 0px;margin-top: 20px;">
                <div class="row mt-4 ml-2">
                  <div class="col-6">
                    <h4><b>Products Details</b></h4>
                  </div>
                  <div class="col-6">
                    <b>Billing For</b>&nbsp;&nbsp;&nbsp;
                      <div class="btn-group btn-group-toggle" data-toggle="buttons">
                        <label class="btn btn-info active">
                          <input type="radio" name="optionsRad" id="SU" autocomplete="off" checked> SHOES
                        </label>
                        <label class="btn btn-info">
                          <input type="radio" name="optionsRad" id="SLG" autocomplete="off"> LEATHER GOODS
                        </label>
                      </div>
                  </div>
                </div>
                <div class="row" style="margin-top: 10px;">
                  <div class="col-12 ml-2" style="padding-left: 3%;padding-right: 6%;">
                  <b>Serial Number</b>
                    <input type="search" placeholder="Serial Number" autocomplete="off" autofocus name="search_bar"  id="search_bar" ng-model="search_bar" class="form-control"  ng-keyup="search()" />
                        <div class="dropdown-content"  style="z-index: 99;display: none;" id="dropdown-content">
                             <!-- <span ng-click="addToCart(doctor)" ng-repeat="doctor in medicineval">[{doctor.name}]</span> -->
                          <span ng-click="addToCart(doctor)" ng-repeat="doctor in medicineval" style="font-weight: 500 !important;">[{doctor.name}] &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Price&nbsp;:&nbsp;Rs.&nbsp;[{doctor.sellPrice}]&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;In-Stock&nbsp;:&nbsp;[{doctor.qty}]&nbsp;&nbsp;&nbsp;&nbsp;Size&nbsp;:&nbsp;[{doctor.size}]&nbsp;Pcs</span>

                        </div>
                  <br>
                </div>
                  
                </div>

                <table class="table" style="width: 93%;margin-left: 2rem;">
                  <thead style="background: linear-gradient(to right,#19286E,#005AAA);color: white !important;">
                    <tr >
                      <th  scope="col" class="text-center">Particulars</th>
                      <th  scope="col" class="text-center">Qty</th>
                      <th  scope="col" class="text-center">Price</th>
                      <th  scope="col" class="text-center">Amount</th>
                      <!-- <th style="color: black;" scope="col" class="text-center">Selling Amnt</th> -->
                      <th  scope="col" class="text-center"></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr ng-repeat="name in myCartItems track by $index" ng-cloak>
                      <td><b>[{name.name}]</b></td>
                      <td><input type="number" id="qty" name="qty"  class="qtydata form-control qty-[{$index}]" min="1"  ng-model="name.reqqty" pattern="^[0-9]*$" ng-change="fun($index)"></td>
                      <td><input type="text" name="price" disabled onkeypress="return event.charCode >= 46" class="form-control"  ng-model="name.sellPrice" ng-change="fun($index,$event);"></td>
                      <td ><b>[{ name.Total }]</b></td>
                      <!-- <td><input type="text" name="price" onkeypress="return event.charCode >= 46" class="form-control"  ng-model="name.sellPriceProd" ng-change="prodfun($index,$event);"></td> -->
                      <td><button type="button" class="close" aria-label="Close" ng-click="remv($index)"><span aria-hidden="true">&times;</span></button></td>
                    </tr>



<!--                     <tfoot id="tab_foot" style="display: none;">
                      <tr  style="border-top-style: solid !important;">
                          <td colspan=""><b>QTY : [{qty_count()| number : '2'}]</b></td>
                          <td colspan=""><b>ITEMS : [{count()| number : '2'}]</b></td>
                          <td  style="display: inline-flex;"><span style="padding: 5px;">Discount</span>&nbsp;&nbsp;&nbsp;<input type="text" id="disc_val" name="price" class="form-control"  ng-model="disc_value" ng-keyup="disc_amnt();" placeholder="Discount(in %)"></td> -->
                          <!-- <td class="h3" style="display: inline-flex;"><b>TOTAL: &nbsp;<input type="text" id="total" name="total" class="form-control"  ng-model="total" ng-keyup="total_amnt();" placeholder="Total Amount"></b></td> -->
                          <!-- <td colspan="" style="display: inline-flex;"><span style="padding: 5px;">Total</span>&nbsp;&nbsp;&nbsp;<input type="text" id="total" name="total" class="form-control"  ng-model="total" ng-keyup="total_amnt();" placeholder="Total (in Rs.)"></td> -->
                          <!-- <td class="h3"><b>TOTAL: &nbsp;[{total| number : '2'}]</b></td> -->
                          <!-- <td></td> -->
                      <!-- </tr>

                    </tfoot> -->
                        </div>
                   
                  </tbody>

                </table>
                <br>
                <div class="row" style="border-top: 3px solid #8b8b8b;padding-top: 15px;">
                  <div class="col-12" style="display: flex;">
                    <div class="col-1"></div>
                    <div class="col-1">
                      QTY : [{qty_count()| number : '2'}]
                    </div>
                    <div class="col-1"></div>
                    <div class="col-2">
                      ITEMS : [{count()| number : '2'}]
                    </div>
                    <div class="col-3" style="display: flex;">
                      <span style="padding: 5px;">Discount</span>&nbsp;&nbsp;&nbsp;<input type="text" id="disc_val" name="price" class="form-control"  ng-model="disc_value" ng-keyup="disc_amnt();" placeholder="Discount(in %)">
                    </div>
                    <div class="col-3" style="display: flex;">
                      <span style="padding: 5px;">Total</span>&nbsp;&nbsp;&nbsp;<input type="text" id="total" name="total" class="form-control"  ng-model="total" ng-keyup="total_amnt();" placeholder="Total (in Rs.)">
                    </div>
                  </div>
                </div>
                <br>
                <div class="row">
                  <div class="col-12" style="display: flex;border-top: 3px solid #8b8b8b;padding-top: 15px;padding-bottom: 10px;">
                    <div class="col-12" style="font-size: 15px;"><b>
                      <span><span style="color: grey;">Actual Amount (in Rs.) :</span> [{inittotal| number : '2'}]</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <span><span style="color: grey;">Discount Amount (in Rs.) :</span> [{inittotal - total| number : '2'}]</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                      <span style="font-size: 22px !important;background-color: #02ade5;">&nbsp;&nbsp;Final Amount (in Rs.) : [{total| number : '2'}]&nbsp;&nbsp;</span></b>
                    </div>
                    
                  </div>
                </div>
                <div class="row" style="display: flex;border-top: 3px solid #8b8b8b;padding-top: 15px;">
                  <div class="col-12" style="display: flex;">
                    <div class="col-9" style="display: flex;">
                      <div class="col-4">
                          <div class="form-group">
                            <label>Payment Type</label>
                            <select class="form-control" onchange="payTypeChange();" name="payType" id="payType">
                              <option value="cash">Cash</option>
                              <option value="card">Card</option>
                              <option value="cashcard">Cash and Card</option>
                          </select>
                          </div>
                      </div>
                      <div class="col-4" id="cash" style="display: none">
                        <div class="form-group">
                          <label>Cash</label>
                          <input type="text" class="form-control" id="cash_amnt"  name="cash" autocomplete="off" placeholder="Cash">
                        </div>
                      </div>
                      <div class="col-4" id="card" style="display: none">
                        <div class="form-group">
                          <label>Card</label>
                          <input type="text" class="form-control" id="card_amnt"  name="card" autocomplete="off" placeholder="Card">
                        </div>
                      </div>
                    </div>
                    <div class="col-3">
                      <button class="btn btn-lg btn-primary" style="margin-top: 20px;float: right;" id="gen" ng-click="genbill()">Generate Bill</button>
                    </div>
                  </div>
                </div>
          </div>

          


        </div>



      </div>

    </section>
  </div>
    </div>  
   </div>
   <br>
   <br>
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
