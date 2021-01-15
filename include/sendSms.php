<?php 
function send($to, $message) 
{
    $sender_id = "CWSTXT";
    $auth_key = "255108AsWkIhuXpb5c3026c8";
    $message = urlencode($message);
    $route = "4";
    $postData = '{
            "sender": "'.$sender_id.'",
            "route": "'.$route.'",
            "country": "91",
            "sms": [
                {
                    "message": "'.$message.'",
                    "to": [
                        "'.$to.'"
                    ]
                }
            ]
        }';        

        //API URL
        $url="http://api.msg91.com/api/v2/sendsms";

        // init the resource
        $ch = curl_init();
        curl_setopt_array($ch, array(
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",

        // CURLOPT_POST => true,
        CURLOPT_POSTFIELDS => $postData,
        CURLOPT_SSL_VERIFYHOST => 0,
        CURLOPT_SSL_VERIFYPEER => 0,
        CURLOPT_HTTPHEADER => array(
            "authkey: $auth_key",
            "content-type: application/json"),
        ));

        //get response
        $response = curl_exec($ch);
        $err = curl_error($ch);
        
        curl_close($ch);

        if ($err) {
          echo "cURL Error #:" . $err;
        }
        else{
            $result = json_decode($response);

            if ($result->type === "success"){
                return TRUE;
            }
            else{
                return FALSE;
            }        
        }   
        return 1;     
}

?>