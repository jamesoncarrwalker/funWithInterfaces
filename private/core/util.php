<?php

/**
 * Created by PhpStorm.
 * User: jamesskywalker
 * Date: 02/06/2019
 * Time: 20:59
 */
class util {

    public static function washingMachine($input,$program = "STRING")
    {

        switch($program) {

            case 'EMAIL' : {
                return self::validateEmail($input);
                break;
            }

            default :
                if(is_array($input) || is_object($input)) {
                    $laundry = [];
                    foreach ($input as $key => $value) {
                        $laundry[$key] = self::cleanString($value);
                    }
                    return (object)$laundry;
                } else {
                    return self::cleanString($input);
                }
                break;
        }
    }

    private static function cleanString($value) {
        $value = nl2br("$value");
        $value = str_replace(['<div>',"\r","\n"],'<br>',$value);
        $value = strip_tags($value,'<br>');
        $value = str_replace(['src','&lt;','&gt;'],'',$value);
        return $value;
    }

    private static function validateEmail($email) {
        if(filter_var($email, FILTER_VALIDATE_EMAIL)) return $email;
        $email = filter_var($email,FILTER_SANITIZE_EMAIL);
        return filter_var($email,FILTER_VALIDATE_EMAIL) ? $email : false;
    }

    public static function hasRequiredData(array $array,array $fields) {
        return sizeof(array_diff($fields,array_keys($array))) == 0;
    }

    public static function hasOptionalData(array $array,array $fields) {
        return count(array_intersect($fields,$array)) > 0;
    }

    public static function displaySecondsForHumans(int $seconds) {
        if($seconds < 60) return $seconds . ' seconds';
        if($seconds < 60*60) return round($seconds/60,1) . " minutes";
        return round($seconds/(1200),1) . " hours";
    }

    public static function runCredits() {
     return '<div class="footer container-fluid text-center">Icons lovingly borrowed from <a href="https://www.flaticon.com/authors/nhor-phai" title="Nhor Phai">Nhor Phai</a> at <a href="https://www.flaticon.com/" 		    title="Flaticon">www.flaticon.com</a> is licensed by <a href="http://creativecommons.org/licenses/by/3.0/" 		    title="Creative Commons BY 3.0" target="_blank">CC 3.0 BY</a></div>';
    }
}