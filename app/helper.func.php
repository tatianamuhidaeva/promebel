<?php

function iam_developer ($check = false) {
	if ($check && iam('developer')) {
			
			$curl = curl_init();
				curl_setopt($curl, CURLOPT_URL, 'http://access-ips.bulgar-promo.ru/ajax/get_ip');
				curl_setopt($curl, CURLOPT_HEADER, false);
				curl_setopt($curl, CURLOPT_POST, 1);
				curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
				$data = "secr=098f2hfi2iunh9b873498n";
				curl_setopt($curl, CURLOPT_POSTFIELDS,
					$data
				);
				$res = @curl_exec($curl);
				curl_close($curl);
				
			$ips = json_decode($res);
			
			if (!empty($_SERVER['HTTP_X_REAL_IP'])) {
				$ip=$_SERVER['HTTP_X_REAL_IP'];
			} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
				$ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
			} else {
				$ip=$_SERVER['REMOTE_ADDR'];
			}
			
			if (!in_array($ip, $ips)) {
				unset($_SESSION['whitelist']);
				unset($_SESSION['admin']);
			}
			
	}
}

function valid_phone($value)
{
	$value=strtolower(trim($value));
	return ( 1 == preg_match(
		'/^\+7\s\(\d{3}\)\s\d{3}\-\d{4}$/' ,$value));
}