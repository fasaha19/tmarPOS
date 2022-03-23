<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once(APPPATH."libraries/config_paytm.php");
require_once(APPPATH."libraries/encdec_paytm.php");

class Order extends CI_Controller {


	public function index()
	{
		
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		//print_r($data['data']);exit;
		$this->template->load_normal_view('orders');
		

	}

 
	public function ordernow()
	{
		// echo "<pre>";print_r($_POST);exit();
		$this->load->model('Ordermodel');
		$data['totalcart']=$_POST['totalcart'];
		$data["addressid"]=$_POST['addressid'];
		$data["paymentType"]=isset($_POST['payType']) ? $_POST['payType'] : 'COD';
		$data["txnId"]=isset($_POST['txnId']) ? $_POST['txnId'] : '0';
		$data["user_id"]=$this->session->userdata('phone');
		$val=$_POST['cartdata'];
		$out = $this->Ordermodel->noworder($data);
		for ($i=0; $i < count($val); $i++) {
			
			// $value[$i]['shopid']=$val[$i]['shopid'];
			// $notify["id"][$i]=$val[$i]['shopid'];
			$cart[]=$val[$i]['cart_id'];
			$value[$i]['prodid']=$val[$i]['prod_id'];
			$stock[$i]['id']=$val[$i]['prod_id'];
			$stock[$i]['prod_stock']=$val[$i]['new_prod_stock'];
			$value[$i]['qty']=$val[$i]['reqqty'];
			$value[$i]['totamnt']=$val[$i]['totamnt'];
			$value[$i]['orderid']=$out;
		}
		if($this->Ordermodel->stockupdate($stock)){
			if($this->Ordermodel->noworderdata($value)){
				if($this->Ordermodel->deletecartvalue($cart)){
					// $this->Ordermodel->ordernotify($notify);
						$resp["success"]=true;
						echo json_encode($resp);
					
				}	
			}
		}
		/*$this->load->model('Ordermodel');
		$data["data"]=$this->Ordermodel->getdeta($_POST);
		// $this->logwrites->fileWrite('index',print_r($abd,1),"talhacrtl","a+");
		
		echo json_encode($data);*/
		

	}



	public function getorders()
	{
		$this->load->model('Ordermodel');
		$userid=$this->session->userdata('phone');
		$data["ord"] = $this->Ordermodel->fetchorders($userid);

		echo json_encode($data);
	

	}
	public function ordernowpayment()
	{
		// print_r($_POST);exit;
		$this->load->model('Ordermodel');
		$userid=$this->session->userdata('phone');
		$val['order_id'] = $_POST['order_id'];
		$val['value'] = $_POST['order'];
		$val['status'] = '0';
		$val['txn_id'] = '0';
		$val['txn_date'] = '0';
		$val['time'] = date('Y-m-d H:i:s');
		$data = $this->Ordermodel->paymentOnline($val);
		echo json_encode($data);
	}

	public function getordersdata()
	{
		$this->load->model('Ordermodel');
		$userid=$_POST["id"];
		$data["ordrs"] = $this->Ordermodel->fetchordersdata($userid);

		echo json_encode($data);
	}

	public function cancelAll()
	{
		$data = $_POST['data'];
		$this->load->model('Ordermodel');
		$prodDetails = $this->Ordermodel->fetchOrderDetails($data['orderid']);
		$data["ordrs"] = $this->Ordermodel->cancelAllOrder($data['orderid']);
		foreach ($prodDetails as $key => $value) {
			$data["ordrs"] = $this->Ordermodel->updateProductQty($data['orderid'],$value);
		}
		$resp["msg"]="Updated to cart Successfully";
		$resp["success"]=true;
		echo json_encode($resp);
	}

	public function cancelsingle()
	{
		$data = $_POST['data'];
		$this->load->model('Ordermodel');
		//$prodDetails = $this->Aordermodel->fetchOrderDetails($data['orderid'],$data['shopid']);
		$val = $this->Ordermodel->cancelSingleOrder($data['orderid'],$data['prodid']);
		$dat = $this->Ordermodel->updateSingleProductQty($data['orderid'],$data['prodid'],$data['qty']);
		$resp["msg"]="Updated to cart Successfully";
		$resp["success"]=true;
		echo json_encode($resp);
	}

	public function StartPayment($orderId='',$Amount='')
    {

        $paramList["MID"] = PAYTM_MERCHANT_MID;
        $paramList["ORDER_ID"] = $_POST['orderId'];     
        $paramList["CUST_ID"] = 'c'.rand();   /// according to your logic
        $paramList["INDUSTRY_TYPE_ID"] = 'Retail';
        $paramList["CHANNEL_ID"] = 'WEB';
        $paramList["TXN_AMOUNT"] = $_POST['totalAmount'];;
        $paramList["WEBSITE"] = PAYTM_MERCHANT_WEBSITE;
   
        $paramList["CALLBACK_URL"] = Base_prod_url."order/PaytmResponse";
       //Mobile number of customer
         $paramList["EMAIL"] ='foo@gmail.com';
         $paramList["VERIFIED_BY"] = "EMAIL"; //
        $paramList["IS_USER_VERIFIED"] = "YES"; //
        
       // print_r($paramList);exit;
        $checkSum = getChecksumFromArray($paramList,PAYTM_MERCHANT_KEY);


        ?>

        <!--submit form to payment gateway OR in api environment you can pass this form data-->
   
        <form id="myForm" action="<?php echo PAYTM_TXN_URL ?>" method="post">
        <?php

         foreach ($paramList as $a => $b) {
        echo '<input type="hidden" name="'.htmlentities($a).'" value="'.htmlentities($b).'">';
       }
       ?>
            <input type="hidden" name="CHECKSUMHASH" value="<?php echo $checkSum ?>">
        </form>
        <script type="text/javascript">

            document.getElementById('myForm').submit();
         </script>
 
<?php

    }

    /////////// response from paytm gateway////////////
    public function PaytmResponse()
    {
		$this->load->model('Ordermodel');    	

    	if($_POST['STATUS']=="TXN_SUCCESS"){

    		$Txn_Id = $_POST['TXNID'];
    		$Txn_OrderId = $_POST['ORDERID'];
    		$Txn_Date = $_POST['TXNDATE'];
    		
    		$upd_pmnt = $this->Ordermodel->upd_payment_status($Txn_OrderId,$Txn_Date,$Txn_Id);

    		$fetch_pmnt = $this->Ordermodel->fetch_payment_status($Txn_OrderId);

    		foreach ($fetch_pmnt as $row) {
    			
    			$a=explode("$$$", base64_decode($row->value));
    			$b = json_decode($a[0],1);

    		}
    		$_POST['totalcart'] = $a[2];
    		$_POST['addressid'] = $a[1];
    		$_POST['cartdata'] = $b;
    		$_POST['payType'] = 'Online Payment';
			$_POST['txnId'] = $_POST['TXNID'];

    		// echo "<pre>";print_r($_POST);exit;
    		$abd=$this->ordernow();
    		

    			redirect(Base_prod_url.'confirm_order');
				// $this->template->load_normal_view('orders');
    		
    	}
       
//        $paytmChecksum = isset($_POST["CHECKSUMHASH"]) ? $_POST["CHECKSUMHASH"] : ""; //Sent by Paytm pg
//
//        $isValidChecksum = verifychecksum_e($paramList, PAYTM_MERCHANT_KEY, $paytmChecksum); //will return TRUE or FALSE string.
//
//        if($isValidChecksum == "TRUE")
//        {
//            if ($_POST["STATUS"] == "TXN_SUCCESS")
//            { /// put your to save into the database // tansaction successfull
//                var_dump($paramList);
//            }
//            else {/// failed
//                var_dump($paramList);
//            }
//        }else
//        {//////////////suspicious
//           // put your code here
//       
//        }
    }
	
}
