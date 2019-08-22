<?php

use App\Option;

/*
*   Option get by id,name,of group name 
*/

function get_option( $option, $default = false ) {
   
    $option = trim( $option );
    if ( empty( $option ) )
        return false;
 
    $option1 = '';
    if(is_numeric($option)){
        $res_option = Option::where('id', $option)->where('status',1)->get();
    }else{
        $res_option = Option::where('option_key', $option)->where('status',1)->get();
    }
    
    if(isset($res_option[0])){
       $option1 .= $res_option[0]->option_value;       
    }

    return $option1;

}

/**
 * Get options value array
 * return array of values 
 * input group name or array of ids or array of keyvalues 
 * 
 */
function get_option_by_group($group_name = false, $array_keys = array()) {
   
    $group_name = trim( $group_name );
    if ( empty( $group_name ) &&  empty($array_keys))
        return false;
 
    $option1 = array();
    if(isset($group_name)){
        $res_option = Option::where('group', $group_name)->where('status',1)->get();
    }else if(empty($group_name) && is_numeric_array($array_keys)){
        $res_option = Option::where_in('id', $array_keys)->where('status',1)->get();        
    }
    
    if(isset($res_option)){
       $option1 = $res_option;       
    }

    return $option1;

}

function is_numeric_array($array=[]){
    if(is_null($array)){
        return false;
    }

    foreach ($array as $a => $b) {
        if (!is_int($a)) {
            return false;
        }
    }
    return true;
}

function getLimitedWords($string=[],$count_words = 200 ){
    $out_put = $string; //'';
    $str = trim(strip_tags($string));

    $str = substr($str,0,$count_words);
    //$out_put =  wordwrap($str,15);
    return $str;
}
/**
 * @param string $string
 * @param int $decimals
 * @param string $dec_point
 * @param string $thousands_sep
 *
 * @throws InvalidArgumentException
 * @return float
 */
function number_from_format($string, $decimals =2, $dec_point = '.', $thousands_sep = ',') {
    $buffer = $string = (string) $string;
    $buffer = strtr($buffer, array($thousands_sep => '', $dec_point => '.'));
    $float = (integer) $buffer;
    $test = number_format($float, $decimals, $dec_point, $thousands_sep);
    if ($test !== $string) {
        throw new InvalidArgumentException(sprintf('Unable to parse float from "%s" as number "%s".', $string, $test));
    }
    return $float;
}

