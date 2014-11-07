<?php

/* 
 * alexis work-test
 */

//login API
$request['act'] = 'login' ; 
$request['email'] = 'apitest@ipayoptions.com'; 
$request['password']  = '1q2w3e4r5t6y'; 
$ch = curl_init('http://txfunds.uat.ipayoptions.com/api.php'); 
$opts[CURLOPT_POST]  = true; $opts[CURLOPT_POSTFIELDS] = http_build_query($request); 
$opts[CURLOPT_RETURNTRANSFER] = true; curl_setopt_array($ch,$opts); 
$response = curl_exec($ch); 
$response = json_decode($response,1); 

//login details
$details = serialize($response);
echo $details . '<br /><br />';
echo "status:" .$response['status'] . '<br />';
echo "message:" .$response['msg'] . '<br />';
echo "userid:" .$response['data']['userid'] . '<br />';
echo "firstname:" .$response['data']['firstname'] . '<br />';
echo "lastname:" .$response['data']['lastname'] . '<br />';
echo "loginid: ".$response['data']['loginid']. '<br /><br />';

//[10:46:36 AM] Andre Gelderblom: User: apitest@ipayoptions.com
//Pass: 1q2w3e4r5t6y
//URL: http://txfunds.uat.ipayoptions.com/

//usercheck API
$request['act'] = 'usercheck' ; 
$request['mobile'] = '1221212121112'; 
$request['country'] = 'AU'; 
$request['loginid'] = $response['data']['loginid'];
$ch = curl_init('http://txfunds.uat.ipayoptions.com/api.php'); 
$opts[CURLOPT_POST]  = true; 
$opts[CURLOPT_POSTFIELDS] = http_build_query($request); 
$opts[CURLOPT_RETURNTRANSFER] = true; curl_setopt_array($ch,$opts); 
$response = curl_exec($ch); 
$response = json_decode($response,1); 

//user check details
$details = serialize($response);
echo $details . '<br /><br />';
echo "status:" .$response['status'] . '<br />';
echo "message:" .$response['msg'] . '<br />';
echo "userid:" .$response['data']['userid'] . '<br />';
echo "status:" .$response['data']['status'] . '<br />';
echo "accountid:" .$response['data']['accountid']['0'] . '<br />';
 