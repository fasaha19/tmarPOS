<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "istyle";
$conn = new mysqli($servername, $username, $password,$database);
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$id = explode(',',$_GET['prod_ids']);
foreach ($id as $key => $value) {
    $sql = "SELECT `qty`,`name`,`sellPrice` FROM product WHERE `product`.`id` = '".$value."'";
    $result = $conn->query($sql);
    while($row = mysqli_fetch_assoc($result)) {
        $prodVal[$value]['qty'] =$row['qty'];
        $prodVal[$value]['name'] =$row['name'];
        $prodVal[$value]['amnt'] =$row['sellPrice'];
    }
}
// print_r($prodVal);exit;style="margin-top:0cm !important;"
$count = array_sum($prodVal);
if ($count > 500) {
    print_r("The Qty is greater than 480 stickers (i.e ten print page). So please reduce the qty or products.");
    exit;
}
// print_r($count);exit;

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="http://localhost/istyle/assets/plugins/jquery/jquery.min.js"></script>
<script src="http://localhost/istyle/assets/jquery-barcode/jquery-barcode.js"></script>
<!-- <script src="http://localhost/istyle/assets/plugins/jquery/jquery.min.js"></script> -->
<!-- <script src="http://localhost/istyle/assets/plugins/select2/js/select2.full.min.js"></script> -->
<!-- Bootstrap -->
  <link rel="stylesheet" href="http://localhost/istyle/assets/dist/css/adminlte.min.css">

<script src="http://localhost/istyle/assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<title>Barcode Print</title>
    <style>
    body { box-sizing: border-box; height: 11.75in; margin: 0 auto; overflow: hidden; padding: 0.5in; width: 8.25in; }
    body { background: #FFF; border-radius: 1px; box-shadow: 0 0 1in -0.25in rgba(0, 0, 0, 0.5); }
    @media print {
    * { -webkit-print-color-adjust: exact; }
    html { background: none; padding: 0; }
    body { box-shadow: none; margin: 0 0 0 30pt; }
        .col-3{
            margin-top: 0.60cm !important;

        }
        .disp-flx{
            display: flex  !important;
        }
        .demo-data-cls{
            width: 100px !important;
            height: 0.66cm !important;
            overflow: hidden !important;
        }
    }
    /*@page { margin: 0; }*/
        @page { size: auto;  margin: 7mm;margin-bottom: -2mm !important;border: 1px solid black; }
        .col-3{
            margin-top: 0.48cm;
        }
        .disp-flx{
            display: flex;
        }
        .demo-data-cls{
            width: 100px;
            height: 0.62cm;
            overflow: hidden;
            font-size: 13px;
        }
        .rsdata{
            font-size: 13px;
        }
    </style>
</head>
    <!-- <body onload="window.print()" onclick="window.close()">
      <?php for($i=1; $i<= $_GET['qty']; $i++){ ?>  
           <img src="http://localhost/istyle/php-barcode-master/barcode.php?text=<?php echo 'ISTYLETH'.base64_decode($_GET['prod_id']);?>&print=true"><br>
    <?php }?>
    </body> -->
    <body style="padding: 20px; padding-left: 20px;">
        <div class="row " style="display: flex;">
<div class='col-3' style="margin-top:0.6cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata1'></div><div id='demodatars1' class="rsdata"></div></div><div id='demo1'></div></div>
<div class='col-3' style="margin-top:0.6cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata2'></div><div id='demodatars2' class="rsdata"></div></div><div id='demo2'></div></div>
<div class='col-3' style="margin-top:0.6cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata3'></div><div id='demodatars3' class="rsdata"></div></div><div id='demo3'></div></div>
<div class='col-3' style="margin-top:0.6cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata4'></div><div id='demodatars4' class="rsdata"></div></div><div id='demo4'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata5'></div><div id='demodatars5' class="rsdata"></div></div><div id='demo5'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata6'></div><div id='demodatars6' class="rsdata"></div></div><div id='demo6'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata7'></div><div id='demodatars7' class="rsdata"></div></div><div id='demo7'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata8'></div><div id='demodatars8' class="rsdata"></div></div><div id='demo8'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata9'></div><div id='demodatars9' class="rsdata"></div></div><div id='demo9'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata10'></div><div id='demodatars10' class="rsdata"></div></div><div id='demo10'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata11'></div><div id='demodatars11' class="rsdata"></div></div><div id='demo11'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata12'></div><div id='demodatars12' class="rsdata"></div></div><div id='demo12'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata13'></div><div id='demodatars13' class="rsdata"></div></div><div id='demo13'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata14'></div><div id='demodatars14' class="rsdata"></div></div><div id='demo14'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata15'></div><div id='demodatars15' class="rsdata"></div></div><div id='demo15'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata16'></div><div id='demodatars16' class="rsdata"></div></div><div id='demo16'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata17'></div><div id='demodatars17' class="rsdata"></div></div><div id='demo17'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata18'></div><div id='demodatars18' class="rsdata"></div></div><div id='demo18'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata19'></div><div id='demodatars19' class="rsdata"></div></div><div id='demo19'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata20'></div><div id='demodatars20' class="rsdata"></div></div><div id='demo20'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata21'></div><div id='demodatars21' class="rsdata"></div></div><div id='demo21'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata22'></div><div id='demodatars22' class="rsdata"></div></div><div id='demo22'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata23'></div><div id='demodatars23' class="rsdata"></div></div><div id='demo23'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata24'></div><div id='demodatars24' class="rsdata"></div></div><div id='demo24'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata25'></div><div id='demodatars25' class="rsdata"></div></div><div id='demo25'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata26'></div><div id='demodatars26' class="rsdata"></div></div><div id='demo26'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata27'></div><div id='demodatars27' class="rsdata"></div></div><div id='demo27'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata28'></div><div id='demodatars28' class="rsdata"></div></div><div id='demo28'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata29'></div><div id='demodatars29' class="rsdata"></div></div><div id='demo29'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata30'></div><div id='demodatars30' class="rsdata"></div></div><div id='demo30'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata31'></div><div id='demodatars31' class="rsdata"></div></div><div id='demo31'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata32'></div><div id='demodatars32' class="rsdata"></div></div><div id='demo32'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata33'></div><div id='demodatars33' class="rsdata"></div></div><div id='demo33'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata34'></div><div id='demodatars34' class="rsdata"></div></div><div id='demo34'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata35'></div><div id='demodatars35' class="rsdata"></div></div><div id='demo35'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata36'></div><div id='demodatars36' class="rsdata"></div></div><div id='demo36'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata37'></div><div id='demodatars37' class="rsdata"></div></div><div id='demo37'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata38'></div><div id='demodatars38' class="rsdata"></div></div><div id='demo38'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata39'></div><div id='demodatars39' class="rsdata"></div></div><div id='demo39'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata40'></div><div id='demodatars40' class="rsdata"></div></div><div id='demo40'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata41'></div><div id='demodatars41' class="rsdata"></div></div><div id='demo41'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata42'></div><div id='demodatars42' class="rsdata"></div></div><div id='demo42'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata43'></div><div id='demodatars43' class="rsdata"></div></div><div id='demo43'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata44'></div><div id='demodatars44' class="rsdata"></div></div><div id='demo44'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata45'></div><div id='demodatars45' class="rsdata"></div></div><div id='demo45'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata46'></div><div id='demodatars46' class="rsdata"></div></div><div id='demo46'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata47'></div><div id='demodatars47' class="rsdata"></div></div><div id='demo47'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata48'></div><div id='demodatars48' class="rsdata"></div></div><div id='demo48'></div></div>
<div class='col-3' style="margin-top:1.2cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata49'></div><div id='demodatars49' class="rsdata"></div></div><div id='demo49'></div></div>
<div class='col-3' style="margin-top:1.2cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata50'></div><div id='demodatars50' class="rsdata"></div></div><div id='demo50'></div></div>
<div class='col-3' style="margin-top:1.2cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata51'></div><div id='demodatars51' class="rsdata"></div></div><div id='demo51'></div></div>
<div class='col-3' style="margin-top:1.2cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata52'></div><div id='demodatars52' class="rsdata"></div></div><div id='demo52'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata53'></div><div id='demodatars53' class="rsdata"></div></div><div id='demo53'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata54'></div><div id='demodatars54' class="rsdata"></div></div><div id='demo54'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata55'></div><div id='demodatars55' class="rsdata"></div></div><div id='demo55'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata56'></div><div id='demodatars56' class="rsdata"></div></div><div id='demo56'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata57'></div><div id='demodatars57' class="rsdata"></div></div><div id='demo57'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata58'></div><div id='demodatars58' class="rsdata"></div></div><div id='demo58'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata59'></div><div id='demodatars59' class="rsdata"></div></div><div id='demo59'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata60'></div><div id='demodatars60' class="rsdata"></div></div><div id='demo60'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata61'></div><div id='demodatars61' class="rsdata"></div></div><div id='demo61'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata62'></div><div id='demodatars62' class="rsdata"></div></div><div id='demo62'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata63'></div><div id='demodatars63' class="rsdata"></div></div><div id='demo63'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata64'></div><div id='demodatars64' class="rsdata"></div></div><div id='demo64'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata65'></div><div id='demodatars65' class="rsdata"></div></div><div id='demo65'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata66'></div><div id='demodatars66' class="rsdata"></div></div><div id='demo66'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata67'></div><div id='demodatars67' class="rsdata"></div></div><div id='demo67'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata68'></div><div id='demodatars68' class="rsdata"></div></div><div id='demo68'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata69'></div><div id='demodatars69' class="rsdata"></div></div><div id='demo69'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata70'></div><div id='demodatars70' class="rsdata"></div></div><div id='demo70'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata71'></div><div id='demodatars71' class="rsdata"></div></div><div id='demo71'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata72'></div><div id='demodatars72' class="rsdata"></div></div><div id='demo72'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata73'></div><div id='demodatars73' class="rsdata"></div></div><div id='demo73'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata74'></div><div id='demodatars74' class="rsdata"></div></div><div id='demo74'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata75'></div><div id='demodatars75' class="rsdata"></div></div><div id='demo75'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata76'></div><div id='demodatars76' class="rsdata"></div></div><div id='demo76'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata77'></div><div id='demodatars77' class="rsdata"></div></div><div id='demo77'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata78'></div><div id='demodatars78' class="rsdata"></div></div><div id='demo78'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata79'></div><div id='demodatars79' class="rsdata"></div></div><div id='demo79'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata80'></div><div id='demodatars80' class="rsdata"></div></div><div id='demo80'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata81'></div><div id='demodatars81' class="rsdata"></div></div><div id='demo81'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata82'></div><div id='demodatars82' class="rsdata"></div></div><div id='demo82'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata83'></div><div id='demodatars83' class="rsdata"></div></div><div id='demo83'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata84'></div><div id='demodatars84' class="rsdata"></div></div><div id='demo84'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata85'></div><div id='demodatars85' class="rsdata"></div></div><div id='demo85'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata86'></div><div id='demodatars86' class="rsdata"></div></div><div id='demo86'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata87'></div><div id='demodatars87' class="rsdata"></div></div><div id='demo87'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata88'></div><div id='demodatars88' class="rsdata"></div></div><div id='demo88'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata89'></div><div id='demodatars89' class="rsdata"></div></div><div id='demo89'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata90'></div><div id='demodatars90' class="rsdata"></div></div><div id='demo90'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata91'></div><div id='demodatars91' class="rsdata"></div></div><div id='demo91'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata92'></div><div id='demodatars92' class="rsdata"></div></div><div id='demo92'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata93'></div><div id='demodatars93' class="rsdata"></div></div><div id='demo93'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata94'></div><div id='demodatars94' class="rsdata"></div></div><div id='demo94'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata95'></div><div id='demodatars95' class="rsdata"></div></div><div id='demo95'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata96'></div><div id='demodatars96' class="rsdata"></div></div><div id='demo96'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata97'></div><div id='demodatars97' class="rsdata"></div></div><div id='demo97'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata98'></div><div id='demodatars98' class="rsdata"></div></div><div id='demo98'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata99'></div><div id='demodatars99' class="rsdata"></div></div><div id='demo99'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata100'></div><div id='demodatars100' class="rsdata"></div></div><div id='demo100'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata101'></div><div id='demodatars101' class="rsdata"></div></div><div id='demo101'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata102'></div><div id='demodatars102' class="rsdata"></div></div><div id='demo102'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata103'></div><div id='demodatars103' class="rsdata"></div></div><div id='demo103'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata104'></div><div id='demodatars104' class="rsdata"></div></div><div id='demo104'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata105'></div><div id='demodatars105' class="rsdata"></div></div><div id='demo105'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata106'></div><div id='demodatars106' class="rsdata"></div></div><div id='demo106'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata107'></div><div id='demodatars107' class="rsdata"></div></div><div id='demo107'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata108'></div><div id='demodatars108' class="rsdata"></div></div><div id='demo108'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata109'></div><div id='demodatars109' class="rsdata"></div></div><div id='demo109'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata110'></div><div id='demodatars110' class="rsdata"></div></div><div id='demo110'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata111'></div><div id='demodatars111' class="rsdata"></div></div><div id='demo111'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata112'></div><div id='demodatars112' class="rsdata"></div></div><div id='demo112'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata113'></div><div id='demodatars113' class="rsdata"></div></div><div id='demo113'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata114'></div><div id='demodatars114' class="rsdata"></div></div><div id='demo114'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata115'></div><div id='demodatars115' class="rsdata"></div></div><div id='demo115'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata116'></div><div id='demodatars116' class="rsdata"></div></div><div id='demo116'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata117'></div><div id='demodatars117' class="rsdata"></div></div><div id='demo117'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata118'></div><div id='demodatars118' class="rsdata"></div></div><div id='demo118'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata119'></div><div id='demodatars119' class="rsdata"></div></div><div id='demo119'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata120'></div><div id='demodatars120' class="rsdata"></div></div><div id='demo120'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata121'></div><div id='demodatars121' class="rsdata"></div></div><div id='demo121'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata122'></div><div id='demodatars122' class="rsdata"></div></div><div id='demo122'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata123'></div><div id='demodatars123' class="rsdata"></div></div><div id='demo123'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata124'></div><div id='demodatars124' class="rsdata"></div></div><div id='demo124'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata125'></div><div id='demodatars125' class="rsdata"></div></div><div id='demo125'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata126'></div><div id='demodatars126' class="rsdata"></div></div><div id='demo126'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata127'></div><div id='demodatars127' class="rsdata"></div></div><div id='demo127'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata128'></div><div id='demodatars128' class="rsdata"></div></div><div id='demo128'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata129'></div><div id='demodatars129' class="rsdata"></div></div><div id='demo129'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata130'></div><div id='demodatars130' class="rsdata"></div></div><div id='demo130'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata131'></div><div id='demodatars131' class="rsdata"></div></div><div id='demo131'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata132'></div><div id='demodatars132' class="rsdata"></div></div><div id='demo132'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata133'></div><div id='demodatars133' class="rsdata"></div></div><div id='demo133'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata134'></div><div id='demodatars134' class="rsdata"></div></div><div id='demo134'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata135'></div><div id='demodatars135' class="rsdata"></div></div><div id='demo135'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata136'></div><div id='demodatars136' class="rsdata"></div></div><div id='demo136'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata137'></div><div id='demodatars137' class="rsdata"></div></div><div id='demo137'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata138'></div><div id='demodatars138' class="rsdata"></div></div><div id='demo138'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata139'></div><div id='demodatars139' class="rsdata"></div></div><div id='demo139'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata140'></div><div id='demodatars140' class="rsdata"></div></div><div id='demo140'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata141'></div><div id='demodatars141' class="rsdata"></div></div><div id='demo141'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata142'></div><div id='demodatars142' class="rsdata"></div></div><div id='demo142'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata143'></div><div id='demodatars143' class="rsdata"></div></div><div id='demo143'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata144'></div><div id='demodatars144' class="rsdata"></div></div><div id='demo144'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata145'></div><div id='demodatars145' class="rsdata"></div></div><div id='demo145'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata146'></div><div id='demodatars146' class="rsdata"></div></div><div id='demo146'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata147'></div><div id='demodatars147' class="rsdata"></div></div><div id='demo147'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata148'></div><div id='demodatars148' class="rsdata"></div></div><div id='demo148'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata149'></div><div id='demodatars149' class="rsdata"></div></div><div id='demo149'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata150'></div><div id='demodatars150' class="rsdata"></div></div><div id='demo150'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata151'></div><div id='demodatars151' class="rsdata"></div></div><div id='demo151'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata152'></div><div id='demodatars152' class="rsdata"></div></div><div id='demo152'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata153'></div><div id='demodatars153' class="rsdata"></div></div><div id='demo153'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata154'></div><div id='demodatars154' class="rsdata"></div></div><div id='demo154'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata155'></div><div id='demodatars155' class="rsdata"></div></div><div id='demo155'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata156'></div><div id='demodatars156' class="rsdata"></div></div><div id='demo156'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata157'></div><div id='demodatars157' class="rsdata"></div></div><div id='demo157'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata158'></div><div id='demodatars158' class="rsdata"></div></div><div id='demo158'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata159'></div><div id='demodatars159' class="rsdata"></div></div><div id='demo159'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata160'></div><div id='demodatars160' class="rsdata"></div></div><div id='demo160'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata161'></div><div id='demodatars161' class="rsdata"></div></div><div id='demo161'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata162'></div><div id='demodatars162' class="rsdata"></div></div><div id='demo162'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata163'></div><div id='demodatars163' class="rsdata"></div></div><div id='demo163'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata164'></div><div id='demodatars164' class="rsdata"></div></div><div id='demo164'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata165'></div><div id='demodatars165' class="rsdata"></div></div><div id='demo165'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata166'></div><div id='demodatars166' class="rsdata"></div></div><div id='demo166'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata167'></div><div id='demodatars167' class="rsdata"></div></div><div id='demo167'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata168'></div><div id='demodatars168' class="rsdata"></div></div><div id='demo168'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata169'></div><div id='demodatars169' class="rsdata"></div></div><div id='demo169'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata170'></div><div id='demodatars170' class="rsdata"></div></div><div id='demo170'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata171'></div><div id='demodatars171' class="rsdata"></div></div><div id='demo171'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata172'></div><div id='demodatars172' class="rsdata"></div></div><div id='demo172'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata173'></div><div id='demodatars173' class="rsdata"></div></div><div id='demo173'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata174'></div><div id='demodatars174' class="rsdata"></div></div><div id='demo174'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata175'></div><div id='demodatars175' class="rsdata"></div></div><div id='demo175'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata176'></div><div id='demodatars176' class="rsdata"></div></div><div id='demo176'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata177'></div><div id='demodatars177' class="rsdata"></div></div><div id='demo177'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata178'></div><div id='demodatars178' class="rsdata"></div></div><div id='demo178'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata179'></div><div id='demodatars179' class="rsdata"></div></div><div id='demo179'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata180'></div><div id='demodatars180' class="rsdata"></div></div><div id='demo180'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata181'></div><div id='demodatars181' class="rsdata"></div></div><div id='demo181'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata182'></div><div id='demodatars182' class="rsdata"></div></div><div id='demo182'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata183'></div><div id='demodatars183' class="rsdata"></div></div><div id='demo183'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata184'></div><div id='demodatars184' class="rsdata"></div></div><div id='demo184'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata185'></div><div id='demodatars185' class="rsdata"></div></div><div id='demo185'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata186'></div><div id='demodatars186' class="rsdata"></div></div><div id='demo186'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata187'></div><div id='demodatars187' class="rsdata"></div></div><div id='demo187'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata188'></div><div id='demodatars188' class="rsdata"></div></div><div id='demo188'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata189'></div><div id='demodatars189' class="rsdata"></div></div><div id='demo189'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata190'></div><div id='demodatars190' class="rsdata"></div></div><div id='demo190'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata191'></div><div id='demodatars191' class="rsdata"></div></div><div id='demo191'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata192'></div><div id='demodatars192' class="rsdata"></div></div><div id='demo192'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata193'></div><div id='demodatars193' class="rsdata"></div></div><div id='demo193'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata194'></div><div id='demodatars194' class="rsdata"></div></div><div id='demo194'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata195'></div><div id='demodatars195' class="rsdata"></div></div><div id='demo195'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata196'></div><div id='demodatars196' class="rsdata"></div></div><div id='demo196'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata197'></div><div id='demodatars197' class="rsdata"></div></div><div id='demo197'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata198'></div><div id='demodatars198' class="rsdata"></div></div><div id='demo198'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata199'></div><div id='demodatars199' class="rsdata"></div></div><div id='demo199'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata200'></div><div id='demodatars200' class="rsdata"></div></div><div id='demo200'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata201'></div><div id='demodatars201' class="rsdata"></div></div><div id='demo201'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata202'></div><div id='demodatars202' class="rsdata"></div></div><div id='demo202'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata203'></div><div id='demodatars203' class="rsdata"></div></div><div id='demo203'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata204'></div><div id='demodatars204' class="rsdata"></div></div><div id='demo204'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata205'></div><div id='demodatars205' class="rsdata"></div></div><div id='demo205'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata206'></div><div id='demodatars206' class="rsdata"></div></div><div id='demo206'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata207'></div><div id='demodatars207' class="rsdata"></div></div><div id='demo207'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata208'></div><div id='demodatars208' class="rsdata"></div></div><div id='demo208'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata209'></div><div id='demodatars209' class="rsdata"></div></div><div id='demo209'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata210'></div><div id='demodatars210' class="rsdata"></div></div><div id='demo210'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata211'></div><div id='demodatars211' class="rsdata"></div></div><div id='demo211'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata212'></div><div id='demodatars212' class="rsdata"></div></div><div id='demo212'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata213'></div><div id='demodatars213' class="rsdata"></div></div><div id='demo213'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata214'></div><div id='demodatars214' class="rsdata"></div></div><div id='demo214'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata215'></div><div id='demodatars215' class="rsdata"></div></div><div id='demo215'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata216'></div><div id='demodatars216' class="rsdata"></div></div><div id='demo216'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata217'></div><div id='demodatars217' class="rsdata"></div></div><div id='demo217'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata218'></div><div id='demodatars218' class="rsdata"></div></div><div id='demo218'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata219'></div><div id='demodatars219' class="rsdata"></div></div><div id='demo219'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata220'></div><div id='demodatars220' class="rsdata"></div></div><div id='demo220'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata221'></div><div id='demodatars221' class="rsdata"></div></div><div id='demo221'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata222'></div><div id='demodatars222' class="rsdata"></div></div><div id='demo222'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata223'></div><div id='demodatars223' class="rsdata"></div></div><div id='demo223'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata224'></div><div id='demodatars224' class="rsdata"></div></div><div id='demo224'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata225'></div><div id='demodatars225' class="rsdata"></div></div><div id='demo225'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata226'></div><div id='demodatars226' class="rsdata"></div></div><div id='demo226'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata227'></div><div id='demodatars227' class="rsdata"></div></div><div id='demo227'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata228'></div><div id='demodatars228' class="rsdata"></div></div><div id='demo228'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata229'></div><div id='demodatars229' class="rsdata"></div></div><div id='demo229'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata230'></div><div id='demodatars230' class="rsdata"></div></div><div id='demo230'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata231'></div><div id='demodatars231' class="rsdata"></div></div><div id='demo231'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata232'></div><div id='demodatars232' class="rsdata"></div></div><div id='demo232'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata233'></div><div id='demodatars233' class="rsdata"></div></div><div id='demo233'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata234'></div><div id='demodatars234' class="rsdata"></div></div><div id='demo234'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata235'></div><div id='demodatars235' class="rsdata"></div></div><div id='demo235'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata236'></div><div id='demodatars236' class="rsdata"></div></div><div id='demo236'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata237'></div><div id='demodatars237' class="rsdata"></div></div><div id='demo237'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata238'></div><div id='demodatars238' class="rsdata"></div></div><div id='demo238'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata239'></div><div id='demodatars239' class="rsdata"></div></div><div id='demo239'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata240'></div><div id='demodatars240' class="rsdata"></div></div><div id='demo240'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata241'></div><div id='demodatars241' class="rsdata"></div></div><div id='demo241'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata242'></div><div id='demodatars242' class="rsdata"></div></div><div id='demo242'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata243'></div><div id='demodatars243' class="rsdata"></div></div><div id='demo243'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata244'></div><div id='demodatars244' class="rsdata"></div></div><div id='demo244'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata245'></div><div id='demodatars245' class="rsdata"></div></div><div id='demo245'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata246'></div><div id='demodatars246' class="rsdata"></div></div><div id='demo246'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata247'></div><div id='demodatars247' class="rsdata"></div></div><div id='demo247'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata248'></div><div id='demodatars248' class="rsdata"></div></div><div id='demo248'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata249'></div><div id='demodatars249' class="rsdata"></div></div><div id='demo249'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata250'></div><div id='demodatars250' class="rsdata"></div></div><div id='demo250'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata251'></div><div id='demodatars251' class="rsdata"></div></div><div id='demo251'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata252'></div><div id='demodatars252' class="rsdata"></div></div><div id='demo252'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata253'></div><div id='demodatars253' class="rsdata"></div></div><div id='demo253'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata254'></div><div id='demodatars254' class="rsdata"></div></div><div id='demo254'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata255'></div><div id='demodatars255' class="rsdata"></div></div><div id='demo255'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata256'></div><div id='demodatars256' class="rsdata"></div></div><div id='demo256'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata257'></div><div id='demodatars257' class="rsdata"></div></div><div id='demo257'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata258'></div><div id='demodatars258' class="rsdata"></div></div><div id='demo258'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata259'></div><div id='demodatars259' class="rsdata"></div></div><div id='demo259'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata260'></div><div id='demodatars260' class="rsdata"></div></div><div id='demo260'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata261'></div><div id='demodatars261' class="rsdata"></div></div><div id='demo261'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata262'></div><div id='demodatars262' class="rsdata"></div></div><div id='demo262'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata263'></div><div id='demodatars263' class="rsdata"></div></div><div id='demo263'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata264'></div><div id='demodatars264' class="rsdata"></div></div><div id='demo264'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata265'></div><div id='demodatars265' class="rsdata"></div></div><div id='demo265'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata266'></div><div id='demodatars266' class="rsdata"></div></div><div id='demo266'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata267'></div><div id='demodatars267' class="rsdata"></div></div><div id='demo267'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata268'></div><div id='demodatars268' class="rsdata"></div></div><div id='demo268'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata269'></div><div id='demodatars269' class="rsdata"></div></div><div id='demo269'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata270'></div><div id='demodatars270' class="rsdata"></div></div><div id='demo270'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata271'></div><div id='demodatars271' class="rsdata"></div></div><div id='demo271'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata272'></div><div id='demodatars272' class="rsdata"></div></div><div id='demo272'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata273'></div><div id='demodatars273' class="rsdata"></div></div><div id='demo273'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata274'></div><div id='demodatars274' class="rsdata"></div></div><div id='demo274'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata275'></div><div id='demodatars275' class="rsdata"></div></div><div id='demo275'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata276'></div><div id='demodatars276' class="rsdata"></div></div><div id='demo276'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata277'></div><div id='demodatars277' class="rsdata"></div></div><div id='demo277'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata278'></div><div id='demodatars278' class="rsdata"></div></div><div id='demo278'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata279'></div><div id='demodatars279' class="rsdata"></div></div><div id='demo279'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata280'></div><div id='demodatars280' class="rsdata"></div></div><div id='demo280'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata281'></div><div id='demodatars281' class="rsdata"></div></div><div id='demo281'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata282'></div><div id='demodatars282' class="rsdata"></div></div><div id='demo282'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata283'></div><div id='demodatars283' class="rsdata"></div></div><div id='demo283'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata284'></div><div id='demodatars284' class="rsdata"></div></div><div id='demo284'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata285'></div><div id='demodatars285' class="rsdata"></div></div><div id='demo285'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata286'></div><div id='demodatars286' class="rsdata"></div></div><div id='demo286'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata287'></div><div id='demodatars287' class="rsdata"></div></div><div id='demo287'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata288'></div><div id='demodatars288' class="rsdata"></div></div><div id='demo288'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata289'></div><div id='demodatars289' class="rsdata"></div></div><div id='demo289'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata290'></div><div id='demodatars290' class="rsdata"></div></div><div id='demo290'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata291'></div><div id='demodatars291' class="rsdata"></div></div><div id='demo291'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata292'></div><div id='demodatars292' class="rsdata"></div></div><div id='demo292'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata293'></div><div id='demodatars293' class="rsdata"></div></div><div id='demo293'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata294'></div><div id='demodatars294' class="rsdata"></div></div><div id='demo294'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata295'></div><div id='demodatars295' class="rsdata"></div></div><div id='demo295'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata296'></div><div id='demodatars296' class="rsdata"></div></div><div id='demo296'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata297'></div><div id='demodatars297' class="rsdata"></div></div><div id='demo297'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata298'></div><div id='demodatars298' class="rsdata"></div></div><div id='demo298'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata299'></div><div id='demodatars299' class="rsdata"></div></div><div id='demo299'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata300'></div><div id='demodatars300' class="rsdata"></div></div><div id='demo300'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata301'></div><div id='demodatars301' class="rsdata"></div></div><div id='demo301'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata302'></div><div id='demodatars302' class="rsdata"></div></div><div id='demo302'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata303'></div><div id='demodatars303' class="rsdata"></div></div><div id='demo303'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata304'></div><div id='demodatars304' class="rsdata"></div></div><div id='demo304'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata305'></div><div id='demodatars305' class="rsdata"></div></div><div id='demo305'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata306'></div><div id='demodatars306' class="rsdata"></div></div><div id='demo306'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata307'></div><div id='demodatars307' class="rsdata"></div></div><div id='demo307'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata308'></div><div id='demodatars308' class="rsdata"></div></div><div id='demo308'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata309'></div><div id='demodatars309' class="rsdata"></div></div><div id='demo309'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata310'></div><div id='demodatars310' class="rsdata"></div></div><div id='demo310'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata311'></div><div id='demodatars311' class="rsdata"></div></div><div id='demo311'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata312'></div><div id='demodatars312' class="rsdata"></div></div><div id='demo312'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata313'></div><div id='demodatars313' class="rsdata"></div></div><div id='demo313'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata314'></div><div id='demodatars314' class="rsdata"></div></div><div id='demo314'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata315'></div><div id='demodatars315' class="rsdata"></div></div><div id='demo315'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata316'></div><div id='demodatars316' class="rsdata"></div></div><div id='demo316'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata317'></div><div id='demodatars317' class="rsdata"></div></div><div id='demo317'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata318'></div><div id='demodatars318' class="rsdata"></div></div><div id='demo318'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata319'></div><div id='demodatars319' class="rsdata"></div></div><div id='demo319'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata320'></div><div id='demodatars320' class="rsdata"></div></div><div id='demo320'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata321'></div><div id='demodatars321' class="rsdata"></div></div><div id='demo321'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata322'></div><div id='demodatars322' class="rsdata"></div></div><div id='demo322'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata323'></div><div id='demodatars323' class="rsdata"></div></div><div id='demo323'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata324'></div><div id='demodatars324' class="rsdata"></div></div><div id='demo324'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata325'></div><div id='demodatars325' class="rsdata"></div></div><div id='demo325'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata326'></div><div id='demodatars326' class="rsdata"></div></div><div id='demo326'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata327'></div><div id='demodatars327' class="rsdata"></div></div><div id='demo327'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata328'></div><div id='demodatars328' class="rsdata"></div></div><div id='demo328'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata329'></div><div id='demodatars329' class="rsdata"></div></div><div id='demo329'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata330'></div><div id='demodatars330' class="rsdata"></div></div><div id='demo330'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata331'></div><div id='demodatars331' class="rsdata"></div></div><div id='demo331'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata332'></div><div id='demodatars332' class="rsdata"></div></div><div id='demo332'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata333'></div><div id='demodatars333' class="rsdata"></div></div><div id='demo333'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata334'></div><div id='demodatars334' class="rsdata"></div></div><div id='demo334'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata335'></div><div id='demodatars335' class="rsdata"></div></div><div id='demo335'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata336'></div><div id='demodatars336' class="rsdata"></div></div><div id='demo336'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata337'></div><div id='demodatars337' class="rsdata"></div></div><div id='demo337'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata338'></div><div id='demodatars338' class="rsdata"></div></div><div id='demo338'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata339'></div><div id='demodatars339' class="rsdata"></div></div><div id='demo339'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata340'></div><div id='demodatars340' class="rsdata"></div></div><div id='demo340'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata341'></div><div id='demodatars341' class="rsdata"></div></div><div id='demo341'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata342'></div><div id='demodatars342' class="rsdata"></div></div><div id='demo342'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata343'></div><div id='demodatars343' class="rsdata"></div></div><div id='demo343'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata344'></div><div id='demodatars344' class="rsdata"></div></div><div id='demo344'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata345'></div><div id='demodatars345' class="rsdata"></div></div><div id='demo345'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata346'></div><div id='demodatars346' class="rsdata"></div></div><div id='demo346'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata347'></div><div id='demodatars347' class="rsdata"></div></div><div id='demo347'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata348'></div><div id='demodatars348' class="rsdata"></div></div><div id='demo348'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata349'></div><div id='demodatars349' class="rsdata"></div></div><div id='demo349'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata350'></div><div id='demodatars350' class="rsdata"></div></div><div id='demo350'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata351'></div><div id='demodatars351' class="rsdata"></div></div><div id='demo351'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata352'></div><div id='demodatars352' class="rsdata"></div></div><div id='demo352'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata353'></div><div id='demodatars353' class="rsdata"></div></div><div id='demo353'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata354'></div><div id='demodatars354' class="rsdata"></div></div><div id='demo354'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata355'></div><div id='demodatars355' class="rsdata"></div></div><div id='demo355'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata356'></div><div id='demodatars356' class="rsdata"></div></div><div id='demo356'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata357'></div><div id='demodatars357' class="rsdata"></div></div><div id='demo357'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata358'></div><div id='demodatars358' class="rsdata"></div></div><div id='demo358'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata359'></div><div id='demodatars359' class="rsdata"></div></div><div id='demo359'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata360'></div><div id='demodatars360' class="rsdata"></div></div><div id='demo360'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata361'></div><div id='demodatars361' class="rsdata"></div></div><div id='demo361'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata362'></div><div id='demodatars362' class="rsdata"></div></div><div id='demo362'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata363'></div><div id='demodatars363' class="rsdata"></div></div><div id='demo363'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata364'></div><div id='demodatars364' class="rsdata"></div></div><div id='demo364'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata365'></div><div id='demodatars365' class="rsdata"></div></div><div id='demo365'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata366'></div><div id='demodatars366' class="rsdata"></div></div><div id='demo366'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata367'></div><div id='demodatars367' class="rsdata"></div></div><div id='demo367'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata368'></div><div id='demodatars368' class="rsdata"></div></div><div id='demo368'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata369'></div><div id='demodatars369' class="rsdata"></div></div><div id='demo369'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata370'></div><div id='demodatars370' class="rsdata"></div></div><div id='demo370'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata371'></div><div id='demodatars371' class="rsdata"></div></div><div id='demo371'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata372'></div><div id='demodatars372' class="rsdata"></div></div><div id='demo372'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata373'></div><div id='demodatars373' class="rsdata"></div></div><div id='demo373'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata374'></div><div id='demodatars374' class="rsdata"></div></div><div id='demo374'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata375'></div><div id='demodatars375' class="rsdata"></div></div><div id='demo375'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata376'></div><div id='demodatars376' class="rsdata"></div></div><div id='demo376'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata377'></div><div id='demodatars377' class="rsdata"></div></div><div id='demo377'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata378'></div><div id='demodatars378' class="rsdata"></div></div><div id='demo378'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata379'></div><div id='demodatars379' class="rsdata"></div></div><div id='demo379'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata380'></div><div id='demodatars380' class="rsdata"></div></div><div id='demo380'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata381'></div><div id='demodatars381' class="rsdata"></div></div><div id='demo381'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata382'></div><div id='demodatars382' class="rsdata"></div></div><div id='demo382'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata383'></div><div id='demodatars383' class="rsdata"></div></div><div id='demo383'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata384'></div><div id='demodatars384' class="rsdata"></div></div><div id='demo384'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata385'></div><div id='demodatars385' class="rsdata"></div></div><div id='demo385'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata386'></div><div id='demodatars386' class="rsdata"></div></div><div id='demo386'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata387'></div><div id='demodatars387' class="rsdata"></div></div><div id='demo387'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata388'></div><div id='demodatars388' class="rsdata"></div></div><div id='demo388'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata389'></div><div id='demodatars389' class="rsdata"></div></div><div id='demo389'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata390'></div><div id='demodatars390' class="rsdata"></div></div><div id='demo390'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata391'></div><div id='demodatars391' class="rsdata"></div></div><div id='demo391'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata392'></div><div id='demodatars392' class="rsdata"></div></div><div id='demo392'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata393'></div><div id='demodatars393' class="rsdata"></div></div><div id='demo393'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata394'></div><div id='demodatars394' class="rsdata"></div></div><div id='demo394'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata395'></div><div id='demodatars395' class="rsdata"></div></div><div id='demo395'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata396'></div><div id='demodatars396' class="rsdata"></div></div><div id='demo396'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata397'></div><div id='demodatars397' class="rsdata"></div></div><div id='demo397'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata398'></div><div id='demodatars398' class="rsdata"></div></div><div id='demo398'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata399'></div><div id='demodatars399' class="rsdata"></div></div><div id='demo399'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata400'></div><div id='demodatars400' class="rsdata"></div></div><div id='demo400'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata401'></div><div id='demodatars401' class="rsdata"></div></div><div id='demo401'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata402'></div><div id='demodatars402' class="rsdata"></div></div><div id='demo402'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata403'></div><div id='demodatars403' class="rsdata"></div></div><div id='demo403'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata404'></div><div id='demodatars404' class="rsdata"></div></div><div id='demo404'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata405'></div><div id='demodatars405' class="rsdata"></div></div><div id='demo405'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata406'></div><div id='demodatars406' class="rsdata"></div></div><div id='demo406'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata407'></div><div id='demodatars407' class="rsdata"></div></div><div id='demo407'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata408'></div><div id='demodatars408' class="rsdata"></div></div><div id='demo408'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata409'></div><div id='demodatars409' class="rsdata"></div></div><div id='demo409'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata410'></div><div id='demodatars410' class="rsdata"></div></div><div id='demo410'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata411'></div><div id='demodatars411' class="rsdata"></div></div><div id='demo411'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata412'></div><div id='demodatars412' class="rsdata"></div></div><div id='demo412'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata413'></div><div id='demodatars413' class="rsdata"></div></div><div id='demo413'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata414'></div><div id='demodatars414' class="rsdata"></div></div><div id='demo414'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata415'></div><div id='demodatars415' class="rsdata"></div></div><div id='demo415'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata416'></div><div id='demodatars416' class="rsdata"></div></div><div id='demo416'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata417'></div><div id='demodatars417' class="rsdata"></div></div><div id='demo417'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata418'></div><div id='demodatars418' class="rsdata"></div></div><div id='demo418'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata419'></div><div id='demodatars419' class="rsdata"></div></div><div id='demo419'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata420'></div><div id='demodatars420' class="rsdata"></div></div><div id='demo420'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata421'></div><div id='demodatars421' class="rsdata"></div></div><div id='demo421'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata422'></div><div id='demodatars422' class="rsdata"></div></div><div id='demo422'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata423'></div><div id='demodatars423' class="rsdata"></div></div><div id='demo423'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata424'></div><div id='demodatars424' class="rsdata"></div></div><div id='demo424'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata425'></div><div id='demodatars425' class="rsdata"></div></div><div id='demo425'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata426'></div><div id='demodatars426' class="rsdata"></div></div><div id='demo426'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata427'></div><div id='demodatars427' class="rsdata"></div></div><div id='demo427'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata428'></div><div id='demodatars428' class="rsdata"></div></div><div id='demo428'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata429'></div><div id='demodatars429' class="rsdata"></div></div><div id='demo429'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata430'></div><div id='demodatars430' class="rsdata"></div></div><div id='demo430'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata431'></div><div id='demodatars431' class="rsdata"></div></div><div id='demo431'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata432'></div><div id='demodatars432' class="rsdata"></div></div><div id='demo432'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata433'></div><div id='demodatars433' class="rsdata"></div></div><div id='demo433'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata434'></div><div id='demodatars434' class="rsdata"></div></div><div id='demo434'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata435'></div><div id='demodatars435' class="rsdata"></div></div><div id='demo435'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata436'></div><div id='demodatars436' class="rsdata"></div></div><div id='demo436'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata437'></div><div id='demodatars437' class="rsdata"></div></div><div id='demo437'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata438'></div><div id='demodatars438' class="rsdata"></div></div><div id='demo438'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata439'></div><div id='demodatars439' class="rsdata"></div></div><div id='demo439'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata440'></div><div id='demodatars440' class="rsdata"></div></div><div id='demo440'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata441'></div><div id='demodatars441' class="rsdata"></div></div><div id='demo441'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata442'></div><div id='demodatars442' class="rsdata"></div></div><div id='demo442'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata443'></div><div id='demodatars443' class="rsdata"></div></div><div id='demo443'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata444'></div><div id='demodatars444' class="rsdata"></div></div><div id='demo444'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata445'></div><div id='demodatars445' class="rsdata"></div></div><div id='demo445'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata446'></div><div id='demodatars446' class="rsdata"></div></div><div id='demo446'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata447'></div><div id='demodatars447' class="rsdata"></div></div><div id='demo447'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata448'></div><div id='demodatars448' class="rsdata"></div></div><div id='demo448'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata449'></div><div id='demodatars449' class="rsdata"></div></div><div id='demo449'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata450'></div><div id='demodatars450' class="rsdata"></div></div><div id='demo450'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata451'></div><div id='demodatars451' class="rsdata"></div></div><div id='demo451'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata452'></div><div id='demodatars452' class="rsdata"></div></div><div id='demo452'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata453'></div><div id='demodatars453' class="rsdata"></div></div><div id='demo453'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata454'></div><div id='demodatars454' class="rsdata"></div></div><div id='demo454'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata455'></div><div id='demodatars455' class="rsdata"></div></div><div id='demo455'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata456'></div><div id='demodatars456' class="rsdata"></div></div><div id='demo456'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata457'></div><div id='demodatars457' class="rsdata"></div></div><div id='demo457'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata458'></div><div id='demodatars458' class="rsdata"></div></div><div id='demo458'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata459'></div><div id='demodatars459' class="rsdata"></div></div><div id='demo459'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata460'></div><div id='demodatars460' class="rsdata"></div></div><div id='demo460'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata461'></div><div id='demodatars461' class="rsdata"></div></div><div id='demo461'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata462'></div><div id='demodatars462' class="rsdata"></div></div><div id='demo462'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata463'></div><div id='demodatars463' class="rsdata"></div></div><div id='demo463'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata464'></div><div id='demodatars464' class="rsdata"></div></div><div id='demo464'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata465'></div><div id='demodatars465' class="rsdata"></div></div><div id='demo465'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata466'></div><div id='demodatars466' class="rsdata"></div></div><div id='demo466'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata467'></div><div id='demodatars467' class="rsdata"></div></div><div id='demo467'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata468'></div><div id='demodatars468' class="rsdata"></div></div><div id='demo468'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata469'></div><div id='demodatars469' class="rsdata"></div></div><div id='demo469'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata470'></div><div id='demodatars470' class="rsdata"></div></div><div id='demo470'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata471'></div><div id='demodatars471' class="rsdata"></div></div><div id='demo471'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata472'></div><div id='demodatars472' class="rsdata"></div></div><div id='demo472'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata473'></div><div id='demodatars473' class="rsdata"></div></div><div id='demo473'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata474'></div><div id='demodatars474' class="rsdata"></div></div><div id='demo474'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata475'></div><div id='demodatars475' class="rsdata"></div></div><div id='demo475'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata476'></div><div id='demodatars476' class="rsdata"></div></div><div id='demo476'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata477'></div><div id='demodatars477' class="rsdata"></div></div><div id='demo477'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata478'></div><div id='demodatars478' class="rsdata"></div></div><div id='demo478'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata479'></div><div id='demodatars479' class="rsdata"></div></div><div id='demo479'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata480'></div><div id='demodatars480' class="rsdata"></div></div><div id='demo480'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata481'></div><div id='demodatars481' class="rsdata"></div></div><div id='demo481'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata482'></div><div id='demodatars482' class="rsdata"></div></div><div id='demo482'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata483'></div><div id='demodatars483' class="rsdata"></div></div><div id='demo483'></div></div>
<div class='col-3' style="margin-top:1.3cm !important;"> <div class='disp-flx'> <div class='demo-data-cls' id='demodata484'></div><div id='demodatars484' class="rsdata"></div></div><div id='demo484'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata485'></div><div id='demodatars485' class="rsdata"></div></div><div id='demo485'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata486'></div><div id='demodatars486' class="rsdata"></div></div><div id='demo486'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata487'></div><div id='demodatars487' class="rsdata"></div></div><div id='demo487'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata488'></div><div id='demodatars488' class="rsdata"></div></div><div id='demo488'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata489'></div><div id='demodatars489' class="rsdata"></div></div><div id='demo489'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata490'></div><div id='demodatars490' class="rsdata"></div></div><div id='demo490'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata491'></div><div id='demodatars491' class="rsdata"></div></div><div id='demo491'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata492'></div><div id='demodatars492' class="rsdata"></div></div><div id='demo492'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata493'></div><div id='demodatars493' class="rsdata"></div></div><div id='demo493'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata494'></div><div id='demodatars494' class="rsdata"></div></div><div id='demo494'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata495'></div><div id='demodatars495' class="rsdata"></div></div><div id='demo495'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata496'></div><div id='demodatars496' class="rsdata"></div></div><div id='demo496'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata497'></div><div id='demodatars497' class="rsdata"></div></div><div id='demo497'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata498'></div><div id='demodatars498' class="rsdata"></div></div><div id='demo498'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata499'></div><div id='demodatars499' class="rsdata"></div></div><div id='demo499'></div></div>
<div class='col-3'> <div class='disp-flx'> <div class='demo-data-cls' id='demodata500'></div><div id='demodatars500' class="rsdata"></div></div><div id='demo500'></div></div>
        </div>
    	
    </body>
    <script type="text/javascript">
        <?php $countVals =1 ;
            foreach ($prodVal as $key => $value) {
                for ($i=1; $i <=$value['qty'] ; $i++) {  ?>
                $('#demodata'+<?php echo $countVals; ?>).html("<?php echo$value['name'];?>");
                $('#demodatars'+<?php echo $countVals; ?>).html("Rs.<?php echo$value['amnt'];?>");
                $('#demo'+<?php echo $countVals; ?>).barcode("ISTYLETH"+<?php echo $key; ?>,"code128");
        <?php     $countVals++;  }}?>
    </script>
</html>