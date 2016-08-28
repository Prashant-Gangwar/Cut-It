<?php

// Create a hash comparison function for PHP < 5.6
if (!function_exists('hash_equals')) {
	function hash_equals($str1, $str2) {
		if (strlen($str1) != strlen($str2)) {
			return false;
		} else {
			$res = $str1 ^ $str2;
			$ret = 0;
			for ($i = strlen($res) - 1; $i >= 0; $i--) {
				$ret |= ord($res[$i]);
			}
			return !$ret;
		}
	}
}

// Get random salt of length 16
function getRandomString($length) {
	if (!$length) $length = 16;
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $size = strlen( $chars );
	$str = "";
    for( $i = 0; $i < $length; $i++ ) {
        $str .= $chars[ rand( 0, $size - 1 ) ];
    }
    return $str;
}

function getHashedString($string) {
	// FIXME: Ideally, a random string should be used as salt.
	//return crypt($string, getRandomString(16));
	return crypt($string, "legalRaastaUser");
}

function getEncodedHash($string) {
	return base64_encode(getHashedString($string));
}

function matchHash($trueValue, $sample) {
	return hash_equals(base64_decode($trueValue), getHashedString($sample));
}

// Utility function to return json, given a keyed array
function jsonResponse($array) {
	header('Content-Type: application/json');
	return json_encode($array);
}

// Utility functio to change dateform
function customDate($date, $format) {
	if ($date == "" || $date == "0000-00-00 00:00:00")
		return "";
	return date_format(new DateTime($date), $format);
}

?>
