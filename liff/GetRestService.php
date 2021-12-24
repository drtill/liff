


<?php
	
	$serviceMainPath = 'http://academic.crma.ac.th/backend/public/acaddiv';
    $serviceAuthPath = $serviceMainPath.'/auth/authenticate';
    $authenEmail = "michanaj@gmail.com";
    $authenPassword = "0iipk,b=koyomN";

	echo CallDirectUsToken($authenEmail, $authenPassword);

    function CallDirectUsToken($email, $password)
  	{
    	$curl = curl_init($serviceAuthPath);
    	$postData = array(
      	'email' => $email ,
      	'password' => $password
    	);
    	curl_setopt_array($curl, array(
      	CURLOPT_POST => TRUE,
      	CURLOPT_RETURNTRANSFER => TRUE,
      	CURLOPT_HTTPHEADER => array(
        	'Content-Type: application/json')
      	,
      	CURLOPT_POSTFIELDS => json_encode($postData)));
   
    	$json = curl_exec($curl);
    
    	echo 'Json = ' . $json;
    	if($json === FALSE)
    	{
      		die(curl_error($curl));
    	}


    	$responseData = json_decode($json, TRUE);

    	curl_close($curl);

    	//echo $responseData['published'];
    	$token = $responseData["data"]["token"];
    	return $token;
  	}

?>

