<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function sendPushNotification($fields = array())
{
    define( 'API_ACCESS_KEY', 'AAAABPVpD8M:APA91bF5RMM-Pq7C6PdKTgCA2yOGSFxcmxq_L5DjBRZUacyUQwbSzxMzhti_r-RwprcKe2pzse_VaHNzH70KfkOPx9K9djQIhG4EeqRVpONSVGgvTJq4jZQdaCQ5EdTuykTq5-Agx7fU');


    $headers = array
    (
        'Authorization: key=' . API_ACCESS_KEY,
        'Content-Type: application/json'
    );
    $ch = curl_init();
    curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
    curl_setopt( $ch,CURLOPT_POST, true );
    curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
    curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
    curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
    curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
    $result = curl_exec($ch);
    if ($result === FALSE) {
		die('FCM Send Error: ' . curl_error($ch));
			return false;
			}
	curl_close($ch);

}
function push_notification($title,$msg,$to,$image="")
{

	 $msg = array
	(
		'body'  	=> $msg,
		'title'     => $title,
		'image'     => $image,
		'vibrate'   => 1,
		'sound'     => 1,
	);
	// 	 $msg = array
	// (
		// 'body'  => 'Message from Talha',
		// 'title'     => "How Are You PK",
		// 'vibrate'   => 1,
		// 'sound'     => 1,
	// );
	$fields = array
	(
		'registration_ids'  => $to, // or 'to'=> 'phone token'
		// 'to'  => 'fov_I_KY2IU:APA91bH2MK9PjXg4goO776t5SDsmdtVp2_UOUWO9OQhZqrtLCfEfCIB85wh5z_mwOMJumB_xUgxQHFA4CKc3NahlNO5cAMWrlxkocmEgoUxprxIxDtskScc221bHixnnFep6Aw46oOdC', // or 'to'=> 'phone token'
		'notification'=> $msg
	);
	print_r(sendPushNotification($fields));
}
// to use this push_notification('msg title','msg body',token id);