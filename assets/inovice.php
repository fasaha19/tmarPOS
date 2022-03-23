<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "tmar";
$conn = new mysqli($servername, $username, $password,$database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}


// $id = base64_decode($_GET['atad_lav']);
// print_r($id);exit; 
// $sql = "SELECT `advorder`.*, `advproduct`.*, `categories`.`name` as `subCatName`, `maincategory`.`categoryname` as `catName` FROM `advorder` INNER JOIN `advproduct` ON `advproduct`.`id`=`advorder`.`prodid` INNER JOIN `categories` ON `advproduct`.`categoryid`=`categories`.`id` INNER JOIN `maincategory` ON `maincategory`.`id`=`categories`.`categoryid` WHERE `advorder`.`orderid` = '".$id."'";
// print_r($sql);exit;
// $result = $conn->query($sql);
// while($row = mysqli_fetch_assoc($result)) {
//   $prodVal[] =$row;    
//  }
// $prodVal = $result->fetch_assoc();
// print_r($prodVal);exit;

// $sql1 = "SELECT `orderdata`.*, `address`.*, count(advorder.orderid) as prodQty FROM `orderdata` INNER JOIN `address` ON `address`.`id`=`orderdata`.`addressid` INNER JOIN `advorder` ON `advorder`.`orderid`=`orderdata`.`order_id` WHERE `orderdata`.`order_id` = '".$id."' GROUP BY `advorder`.`orderid` ORDER BY `orderdata`.`order_id` DESC";
// $result1 = $conn->query($sql1);
// $userVal = $result1->fetch_assoc();
// print_r($userVal);exit;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Invoice</title>
</head>
    <style>
        @page { size: auto;  margin: 0mm; }
        </style>
<body onload="window.print()" onclick="window.close()">
    
		         <table width="700" border="0" cellspacing="0" cellpadding="0" align="center">
    
  <tr>
    <td valign="top" height="10"></td>
  </tr>
  <tr>
    <td style="font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;"><table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" style="font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;">Visharam Mart</td>
  </tr>
  <tr>
    <td valign="top" height="2" style="font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;"></td>
  </tr>
  <tr>
    <td valign="top" style="font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;">info@visharammart.com</td>
  </tr>
  <tr>
    <td valign="top" style="font-size:14px; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;">994-405-9899</td>
  </tr>
 
</table>
</td>
  </tr>
  <tr>
    <td valign="top" height="3"></td>
  </tr>
  <tr>
    <td><table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:22px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left;"><h1 style="font-size:22px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left;">Visharam Mart</h1></td>
    <td style="font-size:22px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;"><h3 style="font-size:22px; color:#00CC00; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;">Invoice</h3></td>
  </tr>
  <tr>
    <td colspan="2" valign="top" height="10"></td>
   </tr>
  <tr>
    <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left;"><table width="350" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td rowspan="3" style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left; padding-right:30px;">Bill To</td>
    <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left;"><?php echo $userVal['name'];?></td>
  </tr>
  <tr>
    <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left;"><?php echo $userVal['address_line1'];?></td>
  </tr>
  <tr>
    <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left;"><?php echo $userVal['user_id'];?></td>
  </tr>
</table>
</td>
    <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left;"><table width="350" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;">Invoice No</td>
    <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;"><?php echo $userVal['order_id'];?></td>
  </tr>
  <tr>
    <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;">Date</td>
    <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;">11/07/2020 09:36:56</td>
  </tr>
   <tr>
    <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;"></td>
    <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;"></td>
  </tr>
</table>
</td>
  </tr>
</table>
</td>
  </tr>
  <tr>
      <td valign="top" height="20"></td>
  </tr>
  <tr>
    <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left;"><table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td width="390" style="font-size:14px; font-weight:bold; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left; background:#d7fbd7; border-top:2px solid #00CC00";>Description</td>
    <td width="20" style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left;background:#d7fbd7; border-top:2px solid #00CC00;"></td>
    <td width="90" style="font-size:14px; font-weight:bold; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:center;background:#d7fbd7; border-top:2px solid #00CC00;">Quantity</td>
     <td width="10" style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left;background:#d7fbd7; border-top:2px solid #00CC00;"></td>
    <td width="90" style="font-size:14px; font-weight:bold; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:center;background:#d7fbd7; border-top:2px solid #00CC00;">Rate</td>
     <td width="10" style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left;background:#d7fbd7; border-top:2px solid #00CC00;"></td>
    <td width="90" style="font-size:14px; font-weight:bold; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:center;background:#d7fbd7; border-top:2px solid #00CC00;">Discount</td>
     <td width="10" style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left;background:#d7fbd7; border-top:2px solid #00CC00;"></td>
    <td width="90" style="font-size:14px; font-weight:bold; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:center;background:#d7fbd7; border-top:2px solid #00CC00;">Amount</td>
  </tr>
    <?php $sumVal=0;$discVal=0;$sellVal=0;foreach ($prodVal as $key => $value) { ?>
  <tr>
    <td><?php echo $value['name']; ?></td>
    <td width="20"></td>
    <td style="text-align:center;"><?php echo $value['qty']; ?></td>
    <td width="10"></td>
    <td style="text-align:center;"><?php echo $value['prod_price']; ?></td>
    <td width="10"></td>
    <td style="text-align:center;"><?php echo ($value['prod_price']-$value['prod_offer_price']); ?></td>
    <td width="10"></td>
    <td style="text-align:center;"><?php echo ($value['qty']*$value['prod_offer_price']); ?></td>
  </tr>
       <?php 
       $sumVal+= (intval($value['qty'])*intval($value['prod_offer_price']));
       $discVal+= (intval($value['prod_price'])-intval($value['prod_offer_price']));
       $sellVal+= (intval($value['qty'])*intval($value['prod_price']));
     } ?>     

  <tr>
    <td colspan="7" height="10"></td>
    </tr>
    <tr>
    <td colspan="7" height="1" style="border-bottom:1px solid #ccc;">&nbsp;</td>
    </tr>
</table>
</td>
  </tr>
  <tr>
    <td valign="top" height="10"></td>
  </tr>
  <tr>
    <td><table width="700" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td  valign="top" width="350" style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left;">
    Thank you for doing business!<br/></td>
    <td width="20"></td>
    <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:left;"><table width="330" border="0" cellspacing="0" cellpadding="0">
      <tr>
        <td width="140"></td>
        <td width="30"></td>
        <td width="160"></td>
      </tr>
       <tr>
        <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;">SubTotal</td>
        <td width="30"></td>
        <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;"><?php echo $sellVal;?></td>
      </tr>
      <tr>
        <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;">Discount(Rs)</td>
        <td width="30"></td>
        <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;"><?php echo $discVal;?></td>
      </tr>
      <tr>
        <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;">Delivery</td>
        <td width="30"></td>
        <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;">Rs 0</td>
      </tr>
            <tr> 
        <!-- <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;">Total</td> -->
        <!-- <td width="30"></td> -->
        <!-- <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;"></td> -->
      </tr>
<!--      <tr>
        <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;">paid</td>
        <td width="30"></td>
        <td style="font-size:14px; color:#000; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;">$0.00</td>
      </tr>-->
      
        <tr>
        <td colspan="3" height="6"></td>
      </tr>
      
       <tr>
        <td colspan="3"  height="5" bgcolor="#00CC00"></td>
      </tr>
      
      
        <tr>
        <td colspan="3" height="6"></td>
      </tr>
      
      <tr>
       <td style="font-size:18px; color:#000; font-weight:bold; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;">Balance Due</td>
        <td width="30"></td>
        <td style="font-size:18px; color:#000; font-weight:bold; font-family:Arial, Helvetica, sans-serif; line-height:26px; text-align:right;"><?php echo $sumVal;?></td>
      </tr>
      
    
    </table></td>
  </tr>
</table>

</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
  </tr>
</table>
		    </body>
</html>