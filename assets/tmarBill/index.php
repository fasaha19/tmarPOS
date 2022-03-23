<?php
$id = $_GET['billId'];

$servername = "localhost";
$username = "root";
$password = "";
$database = "tmar";
$conn = new mysqli($servername, $username, $password,$database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

function displaywords($number){
   $no = (int)floor($number);
   $point = (int)round(($number - $no) * 100);
   $hundred = null;
   $digits_1 = strlen($no);
   $i = 0;
   $str = array();
   $words = array('0' => '', '1' => 'One', '2' => 'Two',
    '3' => 'Three', '4' => 'Four', '5' => 'Five', '6' => 'Six',
    '7' => 'Seven', '8' => 'Eight', '9' => 'Nine',
    '10' => 'Ten', '11' => 'Eleven', '12' => 'Twelve',
    '13' => 'Thirteen', '14' => 'Fourteen',
    '15' => 'Fifteen', '16' => 'Sixteen', '17' => 'Seventeen',
    '18' => 'Eighteen', '19' =>'Nineteen', '20' => 'Twenty',
    '30' => 'Thirty', '40' => 'Forty', '50' => 'Fifty',
    '60' => 'Sixty', '70' => 'Seventy',
    '80' => 'Eighty', '90' => 'Ninety');
   $digits = array('', 'Hundred', 'Thousand', 'Lakh', 'Crore');
   while ($i < $digits_1) {
     $divider = ($i == 2) ? 10 : 100;
     $number = floor($no % $divider);
     $no = floor($no / $divider);
     $i += ($divider == 10) ? 1 : 2;


     if ($number) {
        $plural = (($counter = count($str)) && $number > 9) ? 's' : null;
        $hundred = ($counter == 1 && $str[0]) ? ' and ' : null;
        $str [] = ($number < 21) ? $words[$number] .
            " " . $digits[$counter] . $plural . " " . $hundred
            :
            $words[floor($number / 10) * 10]
            . " " . $words[$number % 10] . " "
            . $digits[$counter] . $plural . " " . $hundred;
     } else $str[] = null;
  }
  $str = array_reverse($str);
  $result = implode('', $str);


  if ($point > 20) {
    $points = ($point) ?
      "" . $words[floor($point / 10) * 10] . " " . 
          $words[$point = $point % 10] : ''; 
  } else {
      $points = $words[$point];
  }
  if($points != ''){        
      echo $result . "Rupees  " . $points . " Paise Only";
  } else {

      echo $result . "Rupees Only";
  }

}

$sql1 = "SELECT *,bm.qty as ActQty FROM bill bl Inner join billmap bm on bm.billno=bl.id inner join product pr on pr.id = bm.productid WHERE bl.id = ".$id;
$result1 = $conn->query($sql1);
while($row = mysqli_fetch_assoc($result1)) {
  $prodVal[] =$row;    
 }
// $userVal = $result1->fetch_assoc();
// echo '<pre>';print_r($prodVal);exit;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.3.0/paper.css">
    <title>Invoice</title>
</head>
<!-- Set "A5", "A4" or "A3" for class name -->
<!-- Set also "landscape" if you need -->
<body class="A5 landscape center">
    <!-- Each sheet element should have the class "sheet" -->
    <!-- "padding-**mm" is optional: you can set 10, 15, 20 or 25 -->
    <section class="sheet padding-10mm">

        <div class="parent-grid">
            <span class="text-center title ">TAX INVOICE</span>
            <div class="child-1">
                    <img src="logo.jpg" height="70" style="padding-left: 15px;padding-top: 6px;}">
                    <div>
                        <h3>T.M ABDUL RAHMAN & SONS</h3>
                        <h6 style="font-weight: 500 !important;">46C, Ammoor Road</h6>
                        <h6 style="font-weight: 500 !important;">Ranipet, 632 301</h6>
                        <h6 style="font-weight: 500 !important;">Ph: 04172271835</h6>
                        <h6 class="bold">GSTIN: 33AABFT2029F1ZO</h6>
                    </div>

                    <div class="child-1-sibling-1 bt-none">
                        <div class="border bl-none bt-none" style="text-align: center;">
                            <h6>Bill Number</h6>
                        </div>
                        <div class="border bl-none br-none bt-none" style="text-align: center;">
                            <h6>Date</h6>
                        </div>
                        <div class="border bl-none br-none bt-none" style="text-align: center;">
                             <h6>
                                <?php echo $prodVal[0]['prod_type'];?>&nbsp;1 / 21-22
                            </h6>
                        </div>
                        <div class="border bt-none br-none" style="text-align: center;">
                            <h6><?php echo explode(' ', $prodVal[0]['date'])[1];?></h6>
                        </div>
                        <div class="bl-none bt-none border br-none" style="text-align: center;">
                            <h6> Customer</h6> 
                        </div>
                        <div class="bl-none bt-none border br-none" >
                          <h6>
                            <h6>&nbsp;&nbsp;Mr.&nbsp;<?php echo $prodVal[0]['custname'];?></h6>
                          </h6> 
                        </div>
                        <div style="text-align: center;">
                            <h6>
                                Mobile
                            </h6> 
                        </div>
                        <div>
                            <h6>
                                &nbsp;&nbsp;<?php echo $prodVal[0]['custnumb'];?>
                            </h6>
                        </div>
                    </div>

                   
               
            </div>
            <div class="child-2">
                <!-- header -->
                <div class="header"><h6>Sl.No</h6></div>
                <div class="header"><h6>Item Code</h6></div>
                <div class="header"><h6>Product</h6></div>
                <div class="header"><h6>Style</h6></div>
                <div class="header"><h6>Leather / Colour</h6></div>
                <div class="header"><h6>Size</h6></div>
                <div class="header"><h6>Qty</h6></div>
                <div class="header"><h6>Rate</h6></div>
                <div class="header"><h6>Tax</h6></div>
                <div class="header"><h6>Amount</h6></div>

                <!-- rows starts here -->
                <?php 
                    $i=1; 
                    foreach ($prodVal as $key => $value) {
                ?>
                <!-- row 1 -->
                <div class="row-content"><h6><?php echo $i; ?></h6></div>
                <div class="row-content"><h6><?php echo $value['barcode']; ?></h6></div>
                <div class="row-content"><h6><?php echo $value['name']; ?></h6></div>
                <div class="row-content"><h6><?php echo $value['plan']; ?></h6></div>
                <div class="row-content"><h6><?php echo $value['color']; ?></h6></div>
                <div class="row-content"><h6><?php echo $value['size']; ?></h6></div>
                <div class="row-content"><h6><?php echo $value['ActQty']; ?></h6></div>
                <div class="row-content"><h6><?php echo $value['price']; ?></h6></div>
                <div class="row-content"><h6><?php echo $value['tax']; ?></h6></div>
                <div class="row-content"><h6><?php echo $value['total']; ?>.00</h6></div>
                <?php $i++;}?>
                <!-- row 2 -->
                <!-- <div class="row-content"><h6>1</h6></div>
                <div class="row-content"><h6>1234567892589</h6></div>
                <div class="row-content"><h6>M.SHOES</h6></div>
                <div class="row-content"><h6>1165</h6></div>
                <div class="row-content"><h6>BLACK</h6></div>
                <div class="row-content"><h6>42</h6></div>
                <div class="row-content"><h6>1</h6></div>
                <div class="row-content"><h6>1800.00</h6></div>
                <div class="row-content"><h6>18%</h6></div>
                <div class="row-content"><h6>1800.00</h6></div>

                row 3
                <div class="row-content"><h6>1</h6></div>
                <div class="row-content"><h6>1234567892589</h6></div>
                <div class="row-content"><h6>M.SHOES</h6></div>
                <div class="row-content"><h6>1165</h6></div>
                <div class="row-content"><h6>BLACK</h6></div>
                <div class="row-content"><h6>42</h6></div>
                <div class="row-content"><h6>1</h6></div>
                <div class="row-content"><h6>1800.00</h6></div>
                <div class="row-content"><h6>18%</h6></div>
                <div class="row-content"><h6>1800.00</h6></div> -->


            </div>

            <div class="child-3 bl-none br-none">
                <div><h5>&nbsp;<?php echo displaywords($prodVal[0]['discounttotal']); ?></h5></div>
                <div class="border bt-none br-none bb-none"><h5>Total Rs.</h5></div>
                <div class="border bt-none br-none bb-none"><h5>&nbsp;<?php echo $prodVal[0]['discounttotal']?>.00</h5></div>
            </div>
            

            <div class="child-4 bt-none bl-none br-none bb-none">
                <div>
                    <h5>&nbsp;The prices are inclusive of taxes</h5>
                    <br><br>
                    <h5>&nbsp;Payment Type  : <?php echo $prodVal[0]['payType'];?></h5>
                </div>
                <div  class="border bt-none br-none bb-none" style="text-align: center;">
                    <h5>For T.M Abdul Rahman & Sons </h5>
                    <br><br><br>
                    <h5>Authority Signature</h5>
                </div>
            </div>

            
        </div>

    </section>
  
  </body>
</html>