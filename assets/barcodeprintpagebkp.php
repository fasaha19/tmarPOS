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
    $sql = "SELECT `qty` FROM product WHERE `product`.`id` = '".$value."'";
    $result = $conn->query($sql);
    while($row = mysqli_fetch_assoc($result)) {
        $prodVal[$value] =$row['qty'];
    }
}
$count = array_sum($prodVal);
if ($count > 500) {
    print_r("The Qty is greater than 480 stickers (i.e ten print page). So please reduce the qty or products.");
    exit;
}
// print_r($count);exit;

?>
<!-- 0.36 left 0.1 btm and 0.17 top  -->
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
        @page { size: auto;  margin: 5mm;margin-bottom: -2mm !important;border: 1px solid black; }
        .col-3{
            margin-top: 1.4cm;
            /*transform: rotateZ(180deg);*/
        }
    </style>
</head>
    <!-- <body onload="window.print()" onclick="window.close()">
      <?php for($i=1; $i<= $_GET['qty']; $i++){ ?>  
           <img src="http://localhost/istyle/php-barcode-master/barcode.php?text=<?php echo 'ISTYLETH'.base64_decode($_GET['prod_id']);?>&print=true"><br>
    <?php }?>
    </body> -->
    <body onload="window.print()" onclick="window.close()">
        <div class="row " style="display: flex;">
            <div class="col-3" style="margin-top: 0.7cm !important;">
                <div id="demo1"></div>
            </div>
            <div class="col-3" style="margin-top: 0.7cm !important;">
                <div id="demo2"></div>
            </div>
            <div class="col-3" style="margin-top: 0.7cm !important;">
                <div id="demo3"></div>
            </div>
            <div class="col-3" style="margin-top: 0.7cm !important;">
                <div id="demo4"></div>
            </div>
            <div class="col-3">
                <div id="demo5"></div>
            </div>
            <div class="col-3">
                <div id="demo6"></div>
            </div>
            <div class="col-3">
                <div id="demo7"></div>
            </div>
            <div class="col-3">
                <div id="demo8"></div>
            </div>
            <div class="col-3">
                <div id="demo9"></div>
            </div>
            <div class="col-3">
                <div id="demo10"></div>
            </div>
            <div class="col-3">
                <div id="demo11"></div>
            </div>
            <div class="col-3">
                <div id="demo12"></div>
            </div>
            <div class="col-3">
                <div id="demo13"></div>
            </div>
            <div class="col-3">
                <div id="demo14"></div>
            </div>
            <div class="col-3">
                <div id="demo15"></div>
            </div>
            <div class="col-3">
                <div id="demo16"></div>
            </div>
            <div class="col-3">
                <div id="demo17"></div>
            </div>
            <div class="col-3">
                <div id="demo18"></div>
            </div>
            <div class="col-3">
                <div id="demo19"></div>
            </div>
            <div class="col-3">
                <div id="demo20"></div>
            </div>
            <div class="col-3">
                <div id="demo21"></div>
            </div>
            <div class="col-3">
                <div id="demo22"></div>
            </div>
            <div class="col-3">
                <div id="demo23"></div>
            </div>
            <div class="col-3">
                <div id="demo24"></div>
            </div>
            <div class="col-3">
                <div id="demo25"></div>
            </div>
            <div class="col-3">
                <div id="demo26"></div>
            </div>
            <div class="col-3">
                <div id="demo27"></div>
            </div>
            <div class="col-3">
                <div id="demo28"></div>
            </div>
            <div class="col-3">
                <div id="demo29"></div>
            </div>
            <div class="col-3">
                <div id="demo30"></div>
            </div>
            <div class="col-3">
                <div id="demo31"></div>
            </div>
            <div class="col-3">
                <div id="demo32"></div>
            </div>
            <div class="col-3">
                <div id="demo33"></div>
            </div>
            <div class="col-3">
                <div id="demo34"></div>
            </div>
            <div class="col-3">
                <div id="demo35"></div>
            </div>
            <div class="col-3">
                <div id="demo36"></div>
            </div>
            <div class="col-3">
                <div id="demo37"></div>
            </div>
            <div class="col-3">
                <div id="demo38"></div>
            </div>
            <div class="col-3">
                <div id="demo39"></div>
            </div>
            <div class="col-3">
                <div id="demo40"></div>
            </div>
            <div class="col-3">
                <div id="demo41"></div>
            </div>
            <div class="col-3">
                <div id="demo42"></div>
            </div>
            <div class="col-3">
                <div id="demo43"></div>
            </div>
            <div class="col-3">
                <div id="demo44"></div>
            </div>
            <div class="col-3" style="margin-top: 0.7cm !important;">
                <div id="demo45"></div>
            </div>
            <div class="col-3" style="margin-top: 0.7cm !important;">
                <div id="demo46"></div>
            </div>
            <div class="col-3" style="margin-top: 0.7cm !important;">
                <div id="demo47"></div>
            </div>
            <div class="col-3" style="margin-top: 0.7cm !important;">
                <div id="demo48"></div>
            </div>
            <div class="col-3"><div id="demo49" ></div></div>
<div class="col-3"><div id="demo50" ></div></div>
<div class="col-3"><div id="demo51" ></div></div>
<div class="col-3"><div id="demo52" ></div></div>
<div class="col-3"><div id="demo53" ></div></div>
<div class="col-3"><div id="demo54" ></div></div>
<div class="col-3"><div id="demo55" ></div></div>
<div class="col-3"><div id="demo56" ></div></div>
<div class="col-3"><div id="demo57" ></div></div>
<div class="col-3"><div id="demo58" ></div></div>
<div class="col-3"><div id="demo59" ></div></div>
<div class="col-3"><div id="demo60" ></div></div>
<div class="col-3"><div id="demo61" ></div></div>
<div class="col-3"><div id="demo62" ></div></div>
<div class="col-3"><div id="demo63" ></div></div>
<div class="col-3"><div id="demo64" ></div></div>
<div class="col-3"><div id="demo65" ></div></div>
<div class="col-3"><div id="demo66" ></div></div>
<div class="col-3"><div id="demo67" ></div></div>
<div class="col-3"><div id="demo68" ></div></div>
<div class="col-3"><div id="demo69" ></div></div>
<div class="col-3"><div id="demo70" ></div></div>
<div class="col-3"><div id="demo71" ></div></div>
<div class="col-3"><div id="demo72" ></div></div>
<div class="col-3"><div id="demo73" ></div></div>
<div class="col-3"><div id="demo74" ></div></div>
<div class="col-3"><div id="demo75" ></div></div>
<div class="col-3"><div id="demo76" ></div></div>
<div class="col-3"><div id="demo77" ></div></div>
<div class="col-3"><div id="demo78" ></div></div>
<div class="col-3"><div id="demo79" ></div></div>
<div class="col-3"><div id="demo80" ></div></div>
<div class="col-3"><div id="demo81" ></div></div>
<div class="col-3"><div id="demo82" ></div></div>
<div class="col-3"><div id="demo83" ></div></div>
<div class="col-3"><div id="demo84" ></div></div>
<div class="col-3"><div id="demo85" ></div></div>
<div class="col-3"><div id="demo86" ></div></div>
<div class="col-3"><div id="demo87" ></div></div>
<div class="col-3"><div id="demo88" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo89" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo90" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo91" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo92" ></div></div>
<div class="col-3"><div id="demo93" ></div></div>
<div class="col-3"><div id="demo94" ></div></div>
<div class="col-3"><div id="demo95" ></div></div>
<div class="col-3"><div id="demo96" ></div></div>
<div class="col-3"><div id="demo97" ></div></div>
<div class="col-3"><div id="demo98" ></div></div>
<div class="col-3"><div id="demo99" ></div></div>
<div class="col-3"><div id="demo100" ></div></div>
<div class="col-3"><div id="demo101" ></div></div>
<div class="col-3"><div id="demo102" ></div></div>
<div class="col-3"><div id="demo103" ></div></div>
<div class="col-3"><div id="demo104" ></div></div>
<div class="col-3"><div id="demo105" ></div></div>
<div class="col-3"><div id="demo106" ></div></div>
<div class="col-3"><div id="demo107" ></div></div>
<div class="col-3"><div id="demo108" ></div></div>
<div class="col-3"><div id="demo109" ></div></div>
<div class="col-3"><div id="demo110" ></div></div>
<div class="col-3"><div id="demo111" ></div></div>
<div class="col-3"><div id="demo112" ></div></div>
<div class="col-3"><div id="demo113" ></div></div>
<div class="col-3"><div id="demo114" ></div></div>
<div class="col-3"><div id="demo115" ></div></div>
<div class="col-3"><div id="demo116" ></div></div>
<div class="col-3"><div id="demo117" ></div></div>
<div class="col-3"><div id="demo118" ></div></div>
<div class="col-3"><div id="demo119" ></div></div>
<div class="col-3"><div id="demo120" ></div></div>
<div class="col-3"><div id="demo121" ></div></div>
<div class="col-3"><div id="demo122" ></div></div>
<div class="col-3"><div id="demo123" ></div></div>
<div class="col-3"><div id="demo124" ></div></div>
<div class="col-3"><div id="demo125" ></div></div>
<div class="col-3"><div id="demo126" ></div></div>
<div class="col-3"><div id="demo127" ></div></div>
<div class="col-3"><div id="demo128" ></div></div>
<div class="col-3"><div id="demo129" ></div></div>
<div class="col-3"><div id="demo130" ></div></div>
<div class="col-3"><div id="demo131" ></div></div>
<div class="col-3"><div id="demo132" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo133" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo134" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo135" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo136" ></div></div>
<div class="col-3"><div id="demo137" ></div></div>
<div class="col-3"><div id="demo138" ></div></div>
<div class="col-3"><div id="demo139" ></div></div>
<div class="col-3"><div id="demo140" ></div></div>
<div class="col-3"><div id="demo141" ></div></div>
<div class="col-3"><div id="demo142" ></div></div>
<div class="col-3"><div id="demo143" ></div></div>
<div class="col-3"><div id="demo144" ></div></div>
<div class="col-3"><div id="demo145" ></div></div>
<div class="col-3"><div id="demo146" ></div></div>
<div class="col-3"><div id="demo147" ></div></div>
<div class="col-3"><div id="demo148" ></div></div>
<div class="col-3"><div id="demo149" ></div></div>
<div class="col-3"><div id="demo150" ></div></div>
<div class="col-3"><div id="demo151" ></div></div>
<div class="col-3"><div id="demo152" ></div></div>
<div class="col-3"><div id="demo153" ></div></div>
<div class="col-3"><div id="demo154" ></div></div>
<div class="col-3"><div id="demo155" ></div></div>
<div class="col-3"><div id="demo156" ></div></div>
<div class="col-3"><div id="demo157" ></div></div>
<div class="col-3"><div id="demo158" ></div></div>
<div class="col-3"><div id="demo159" ></div></div>
<div class="col-3"><div id="demo160" ></div></div>
<div class="col-3"><div id="demo161" ></div></div>
<div class="col-3"><div id="demo162" ></div></div>
<div class="col-3"><div id="demo163" ></div></div>
<div class="col-3"><div id="demo164" ></div></div>
<div class="col-3"><div id="demo165" ></div></div>
<div class="col-3"><div id="demo166" ></div></div>
<div class="col-3"><div id="demo167" ></div></div>
<div class="col-3"><div id="demo168" ></div></div>
<div class="col-3"><div id="demo169" ></div></div>
<div class="col-3"><div id="demo170" ></div></div>
<div class="col-3"><div id="demo171" ></div></div>
<div class="col-3"><div id="demo172" ></div></div>
<div class="col-3"><div id="demo173" ></div></div>
<div class="col-3"><div id="demo174" ></div></div>
<div class="col-3"><div id="demo175" ></div></div>
<div class="col-3"><div id="demo176" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo177" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo178" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo179" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo180" ></div></div>
<div class="col-3"><div id="demo181" ></div></div>
<div class="col-3"><div id="demo182" ></div></div>
<div class="col-3"><div id="demo183" ></div></div>
<div class="col-3"><div id="demo184" ></div></div>
<div class="col-3"><div id="demo185" ></div></div>
<div class="col-3"><div id="demo186" ></div></div>
<div class="col-3"><div id="demo187" ></div></div>
<div class="col-3"><div id="demo188" ></div></div>
<div class="col-3"><div id="demo189" ></div></div>
<div class="col-3"><div id="demo190" ></div></div>
<div class="col-3"><div id="demo191" ></div></div>
<div class="col-3"><div id="demo192" ></div></div>
<div class="col-3"><div id="demo193" ></div></div>
<div class="col-3"><div id="demo194" ></div></div>
<div class="col-3"><div id="demo195" ></div></div>
<div class="col-3"><div id="demo196" ></div></div>
<div class="col-3"><div id="demo197" ></div></div>
<div class="col-3"><div id="demo198" ></div></div>
<div class="col-3"><div id="demo199" ></div></div>
<div class="col-3"><div id="demo200" ></div></div>
<div class="col-3"><div id="demo201" ></div></div>
<div class="col-3"><div id="demo202" ></div></div>
<div class="col-3"><div id="demo203" ></div></div>
<div class="col-3"><div id="demo204" ></div></div>
<div class="col-3"><div id="demo205" ></div></div>
<div class="col-3"><div id="demo206" ></div></div>
<div class="col-3"><div id="demo207" ></div></div>
<div class="col-3"><div id="demo208" ></div></div>
<div class="col-3"><div id="demo209" ></div></div>
<div class="col-3"><div id="demo210" ></div></div>
<div class="col-3"><div id="demo211" ></div></div>
<div class="col-3"><div id="demo212" ></div></div>
<div class="col-3"><div id="demo213" ></div></div>
<div class="col-3"><div id="demo214" ></div></div>
<div class="col-3"><div id="demo215" ></div></div>
<div class="col-3"><div id="demo216" ></div></div>
<div class="col-3"><div id="demo217" ></div></div>
<div class="col-3"><div id="demo218" ></div></div>
<div class="col-3"><div id="demo219" ></div></div>
<div class="col-3"><div id="demo220" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo221" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo222" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo223" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo224" ></div></div>
<div class="col-3"><div id="demo225" ></div></div>
<div class="col-3"><div id="demo226" ></div></div>
<div class="col-3"><div id="demo227" ></div></div>
<div class="col-3"><div id="demo228" ></div></div>
<div class="col-3"><div id="demo229" ></div></div>
<div class="col-3"><div id="demo230" ></div></div>
<div class="col-3"><div id="demo231" ></div></div>
<div class="col-3"><div id="demo232" ></div></div>
<div class="col-3"><div id="demo233" ></div></div>
<div class="col-3"><div id="demo234" ></div></div>
<div class="col-3"><div id="demo235" ></div></div>
<div class="col-3"><div id="demo236" ></div></div>
<div class="col-3"><div id="demo237" ></div></div>
<div class="col-3"><div id="demo238" ></div></div>
<div class="col-3"><div id="demo239" ></div></div>
<div class="col-3"><div id="demo240" ></div></div>
<div class="col-3"><div id="demo241" ></div></div>
<div class="col-3"><div id="demo242" ></div></div>
<div class="col-3"><div id="demo243" ></div></div>
<div class="col-3"><div id="demo244" ></div></div>
<div class="col-3"><div id="demo245" ></div></div>
<div class="col-3"><div id="demo246" ></div></div>
<div class="col-3"><div id="demo247" ></div></div>
<div class="col-3"><div id="demo248" ></div></div>
<div class="col-3"><div id="demo249" ></div></div>
<div class="col-3"><div id="demo250" ></div></div>
<div class="col-3"><div id="demo251" ></div></div>
<div class="col-3"><div id="demo252" ></div></div>
<div class="col-3"><div id="demo253" ></div></div>
<div class="col-3"><div id="demo254" ></div></div>
<div class="col-3"><div id="demo255" ></div></div>
<div class="col-3"><div id="demo256" ></div></div>
<div class="col-3"><div id="demo257" ></div></div>
<div class="col-3"><div id="demo258" ></div></div>
<div class="col-3"><div id="demo259" ></div></div>
<div class="col-3"><div id="demo260" ></div></div>
<div class="col-3"><div id="demo261" ></div></div>
<div class="col-3"><div id="demo262" ></div></div>
<div class="col-3"><div id="demo263" ></div></div>
<div class="col-3"><div id="demo264" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo265" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo266" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo267" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo268" ></div></div>
<div class="col-3"><div id="demo269" ></div></div>
<div class="col-3"><div id="demo270" ></div></div>
<div class="col-3"><div id="demo271" ></div></div>
<div class="col-3"><div id="demo272" ></div></div>
<div class="col-3"><div id="demo273" ></div></div>
<div class="col-3"><div id="demo274" ></div></div>
<div class="col-3"><div id="demo275" ></div></div>
<div class="col-3"><div id="demo276" ></div></div>
<div class="col-3"><div id="demo277" ></div></div>
<div class="col-3"><div id="demo278" ></div></div>
<div class="col-3"><div id="demo279" ></div></div>
<div class="col-3"><div id="demo280" ></div></div>
<div class="col-3"><div id="demo281" ></div></div>
<div class="col-3"><div id="demo282" ></div></div>
<div class="col-3"><div id="demo283" ></div></div>
<div class="col-3"><div id="demo284" ></div></div>
<div class="col-3"><div id="demo285" ></div></div>
<div class="col-3"><div id="demo286" ></div></div>
<div class="col-3"><div id="demo287" ></div></div>
<div class="col-3"><div id="demo288" ></div></div>
<div class="col-3"><div id="demo289" ></div></div>
<div class="col-3"><div id="demo290" ></div></div>
<div class="col-3"><div id="demo291" ></div></div>
<div class="col-3"><div id="demo292" ></div></div>
<div class="col-3"><div id="demo293" ></div></div>
<div class="col-3"><div id="demo294" ></div></div>
<div class="col-3"><div id="demo295" ></div></div>
<div class="col-3"><div id="demo296" ></div></div>
<div class="col-3"><div id="demo297" ></div></div>
<div class="col-3"><div id="demo298" ></div></div>
<div class="col-3"><div id="demo299" ></div></div>
<div class="col-3"><div id="demo300" ></div></div>
<div class="col-3"><div id="demo301" ></div></div>
<div class="col-3"><div id="demo302" ></div></div>
<div class="col-3"><div id="demo303" ></div></div>
<div class="col-3"><div id="demo304" ></div></div>
<div class="col-3"><div id="demo305" ></div></div>
<div class="col-3"><div id="demo306" ></div></div>
<div class="col-3"><div id="demo307" ></div></div>
<div class="col-3"><div id="demo308" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo309" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo310" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo311" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo312" ></div></div>
<div class="col-3"><div id="demo313" ></div></div>
<div class="col-3"><div id="demo314" ></div></div>
<div class="col-3"><div id="demo315" ></div></div>
<div class="col-3"><div id="demo316" ></div></div>
<div class="col-3"><div id="demo317" ></div></div>
<div class="col-3"><div id="demo318" ></div></div>
<div class="col-3"><div id="demo319" ></div></div>
<div class="col-3"><div id="demo320" ></div></div>
<div class="col-3"><div id="demo321" ></div></div>
<div class="col-3"><div id="demo322" ></div></div>
<div class="col-3"><div id="demo323" ></div></div>
<div class="col-3"><div id="demo324" ></div></div>
<div class="col-3"><div id="demo325" ></div></div>
<div class="col-3"><div id="demo326" ></div></div>
<div class="col-3"><div id="demo327" ></div></div>
<div class="col-3"><div id="demo328" ></div></div>
<div class="col-3"><div id="demo329" ></div></div>
<div class="col-3"><div id="demo330" ></div></div>
<div class="col-3"><div id="demo331" ></div></div>
<div class="col-3"><div id="demo332" ></div></div>
<div class="col-3"><div id="demo333" ></div></div>
<div class="col-3"><div id="demo334" ></div></div>
<div class="col-3"><div id="demo335" ></div></div>
<div class="col-3"><div id="demo336" ></div></div>
<div class="col-3"><div id="demo337" ></div></div>
<div class="col-3"><div id="demo338" ></div></div>
<div class="col-3"><div id="demo339" ></div></div>
<div class="col-3"><div id="demo340" ></div></div>
<div class="col-3"><div id="demo341" ></div></div>
<div class="col-3"><div id="demo342" ></div></div>
<div class="col-3"><div id="demo343" ></div></div>
<div class="col-3"><div id="demo344" ></div></div>
<div class="col-3"><div id="demo345" ></div></div>
<div class="col-3"><div id="demo346" ></div></div>
<div class="col-3"><div id="demo347" ></div></div>
<div class="col-3"><div id="demo348" ></div></div>
<div class="col-3"><div id="demo349" ></div></div>
<div class="col-3"><div id="demo350" ></div></div>
<div class="col-3"><div id="demo351" ></div></div>
<div class="col-3"><div id="demo352" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo353" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo354" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo355" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo356" ></div></div>
<div class="col-3"><div id="demo357" ></div></div>
<div class="col-3"><div id="demo358" ></div></div>
<div class="col-3"><div id="demo359" ></div></div>
<div class="col-3"><div id="demo360" ></div></div>
<div class="col-3"><div id="demo361" ></div></div>
<div class="col-3"><div id="demo362" ></div></div>
<div class="col-3"><div id="demo363" ></div></div>
<div class="col-3"><div id="demo364" ></div></div>
<div class="col-3"><div id="demo365" ></div></div>
<div class="col-3"><div id="demo366" ></div></div>
<div class="col-3"><div id="demo367" ></div></div>
<div class="col-3"><div id="demo368" ></div></div>
<div class="col-3"><div id="demo369" ></div></div>
<div class="col-3"><div id="demo370" ></div></div>
<div class="col-3"><div id="demo371" ></div></div>
<div class="col-3"><div id="demo372" ></div></div>
<div class="col-3"><div id="demo373" ></div></div>
<div class="col-3"><div id="demo374" ></div></div>
<div class="col-3"><div id="demo375" ></div></div>
<div class="col-3"><div id="demo376" ></div></div>
<div class="col-3"><div id="demo377" ></div></div>
<div class="col-3"><div id="demo378" ></div></div>
<div class="col-3"><div id="demo379" ></div></div>
<div class="col-3"><div id="demo380" ></div></div>
<div class="col-3"><div id="demo381" ></div></div>
<div class="col-3"><div id="demo382" ></div></div>
<div class="col-3"><div id="demo383" ></div></div>
<div class="col-3"><div id="demo384" ></div></div>
<div class="col-3"><div id="demo385" ></div></div>
<div class="col-3"><div id="demo386" ></div></div>
<div class="col-3"><div id="demo387" ></div></div>
<div class="col-3"><div id="demo388" ></div></div>
<div class="col-3"><div id="demo389" ></div></div>
<div class="col-3"><div id="demo390" ></div></div>
<div class="col-3"><div id="demo391" ></div></div>
<div class="col-3"><div id="demo392" ></div></div>
<div class="col-3"><div id="demo393" ></div></div>
<div class="col-3"><div id="demo394" ></div></div>
<div class="col-3"><div id="demo395" ></div></div>
<div class="col-3"><div id="demo396" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo397" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo398" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo399" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo400" ></div></div>
<div class="col-3"><div id="demo401" ></div></div>
<div class="col-3"><div id="demo402" ></div></div>
<div class="col-3"><div id="demo403" ></div></div>
<div class="col-3"><div id="demo404" ></div></div>
<div class="col-3"><div id="demo405" ></div></div>
<div class="col-3"><div id="demo406" ></div></div>
<div class="col-3"><div id="demo407" ></div></div>
<div class="col-3"><div id="demo408" ></div></div>
<div class="col-3"><div id="demo409" ></div></div>
<div class="col-3"><div id="demo410" ></div></div>
<div class="col-3"><div id="demo411" ></div></div>
<div class="col-3"><div id="demo412" ></div></div>
<div class="col-3"><div id="demo413" ></div></div>
<div class="col-3"><div id="demo414" ></div></div>
<div class="col-3"><div id="demo415" ></div></div>
<div class="col-3"><div id="demo416" ></div></div>
<div class="col-3"><div id="demo417" ></div></div>
<div class="col-3"><div id="demo418" ></div></div>
<div class="col-3"><div id="demo419" ></div></div>
<div class="col-3"><div id="demo420" ></div></div>
<div class="col-3"><div id="demo421" ></div></div>
<div class="col-3"><div id="demo422" ></div></div>
<div class="col-3"><div id="demo423" ></div></div>
<div class="col-3"><div id="demo424" ></div></div>
<div class="col-3"><div id="demo425" ></div></div>
<div class="col-3"><div id="demo426" ></div></div>
<div class="col-3"><div id="demo427" ></div></div>
<div class="col-3"><div id="demo428" ></div></div>
<div class="col-3"><div id="demo429" ></div></div>
<div class="col-3"><div id="demo430" ></div></div>
<div class="col-3"><div id="demo431" ></div></div>
<div class="col-3"><div id="demo432" ></div></div>
<div class="col-3"><div id="demo433" ></div></div>
<div class="col-3"><div id="demo434" ></div></div>
<div class="col-3"><div id="demo435" ></div></div>
<div class="col-3"><div id="demo436" ></div></div>
<div class="col-3"><div id="demo437" ></div></div>
<div class="col-3"><div id="demo438" ></div></div>
<div class="col-3"><div id="demo439" ></div></div>
<div class="col-3"><div id="demo440" ></div></div>
<div class="col-3"><div id="demo441" ></div></div>
<div class="col-3"><div id="demo442" ></div></div>
<div class="col-3"><div id="demo443" ></div></div>
<div class="col-3"><div id="demo444" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo445" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo446" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo447" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo448" ></div></div>
<div class="col-3"><div id="demo449" ></div></div>
<div class="col-3"><div id="demo450" ></div></div>
<div class="col-3"><div id="demo451" ></div></div>
<div class="col-3"><div id="demo452" ></div></div>
<div class="col-3"><div id="demo453" ></div></div>
<div class="col-3"><div id="demo454" ></div></div>
<div class="col-3"><div id="demo455" ></div></div>
<div class="col-3"><div id="demo456" ></div></div>
<div class="col-3"><div id="demo457" ></div></div>
<div class="col-3"><div id="demo458" ></div></div>
<div class="col-3"><div id="demo459" ></div></div>
<div class="col-3"><div id="demo460" ></div></div>
<div class="col-3"><div id="demo461" ></div></div>
<div class="col-3"><div id="demo462" ></div></div>
<div class="col-3"><div id="demo463" ></div></div>
<div class="col-3"><div id="demo464" ></div></div>
<div class="col-3"><div id="demo465" ></div></div>
<div class="col-3"><div id="demo466" ></div></div>
<div class="col-3"><div id="demo467" ></div></div>
<div class="col-3"><div id="demo468" ></div></div>
<div class="col-3"><div id="demo469" ></div></div>
<div class="col-3"><div id="demo470" ></div></div>
<div class="col-3"><div id="demo471" ></div></div>
<div class="col-3"><div id="demo472" ></div></div>
<div class="col-3"><div id="demo473" ></div></div>
<div class="col-3"><div id="demo474" ></div></div>
<div class="col-3"><div id="demo475" ></div></div>
<div class="col-3"><div id="demo476" ></div></div>
<div class="col-3"><div id="demo477" ></div></div>
<div class="col-3"><div id="demo478" ></div></div>
<div class="col-3"><div id="demo479" ></div></div>
<div class="col-3"><div id="demo480" ></div></div>
<div class="col-3"><div id="demo481" ></div></div>
<div class="col-3"><div id="demo482" ></div></div>
<div class="col-3"><div id="demo483" ></div></div>
<div class="col-3"><div id="demo484" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo485" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo486" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo487" ></div></div>
<div class="col-3" style="margin-top: 0.7cm !important;"><div id="demo488" ></div></div>
<div class="col-3"><div id="demo489" ></div></div>
<div class="col-3"><div id="demo490" ></div></div>
<div class="col-3"><div id="demo491" ></div></div>
<div class="col-3"><div id="demo492" ></div></div>
<div class="col-3"><div id="demo493" ></div></div>
<div class="col-3"><div id="demo494" ></div></div>
<div class="col-3"><div id="demo495" ></div></div>
<div class="col-3"><div id="demo496" ></div></div>
<div class="col-3"><div id="demo497" ></div></div>
<div class="col-3"><div id="demo498" ></div></div>
<div class="col-3"><div id="demo499" ></div></div>
<div class="col-3"><div id="demo500" ></div></div>
        </div>
    	
    </body>
    <script type="text/javascript">
        <?php $countVals =1 ;
            foreach ($prodVal as $key => $value) {
                for ($i=1; $i <=$value ; $i++) {  ?>
                $('#demo'+<?php echo $countVals; ?>).barcode("ISTYLETH"+<?php echo $key; ?>,"code128");
        <?php     $countVals++;  }}?>
    </script>
</html>