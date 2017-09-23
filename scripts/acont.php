<?php 



	function encr($plaintext)
    {
        $key = pack('H*', "aec48c8e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a");
    $key_size =  strlen($key);
    $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $iv = mcrypt_create_iv($iv_size, MCRYPT_RAND);
    $encrpttext = mcrypt_encrypt(MCRYPT_RIJNDAEL_128, $key,$plaintext, MCRYPT_MODE_CBC, $iv);
    $encrpttext = $iv . $encrpttext;
    $encrpttext_base64 = base64_encode($encrpttext);
      return $encrpttext_base64;  
    }

function decr($dectext)
{
    $key = pack('H*', "aec48c8e103a0cd8b54763051cef08bc55abe029fdebae5e1d417e2ffb2a00a");
     $iv_size = mcrypt_get_iv_size(MCRYPT_RIJNDAEL_128, MCRYPT_MODE_CBC);
    $decrpttext_dec = base64_decode($dectext);
    $iv_dec = substr($decrpttext_dec, 0, $iv_size);
    $decrpttext_dec = substr($decrpttext_dec, $iv_size);
    $plaintext_dec = mcrypt_decrypt(MCRYPT_RIJNDAEL_128, $key,
                                    $decrpttext_dec, MCRYPT_MODE_CBC, $iv_dec);
    return $plaintext_dec;
}





 ?>