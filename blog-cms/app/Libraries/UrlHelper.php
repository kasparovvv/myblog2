<?php 

namespace App\Libraries;


class UrlHelper {



public $key='test_key';
public $seperator = '-';



function convertTurkishtoEnglish($str){
    $turkish = array('ı', 'ğ', 'ü', 'ş', 'ö', 'ç', 'İ', 'Ğ', 'Ü', 'Ö', 'Ç'); 
    $english   = array('i', 'g', 'u', 's', 'o', 'c', 'i', 'g', 'u', 'o', 'c');
    return str_replace($turkish, $english, $str);
}

function getUrl($str){
    $clean = $this->convertTurkishtoEnglish($str);
    $clean = preg_replace('/[^a-zA-Z0-9 ]/', '', $clean);
    $clean = preg_replace('!\s+!', $this->seperator, $clean);
    $clean = strtolower(trim($clean, $this->seperator));
    return $clean;
}

}

?>