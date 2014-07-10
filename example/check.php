<?php
/**
 * Created by PhpStorm.
 * User: BDuman
 * Author: BDuman
 * Website: http://bduman.com/
 * Date: 10.07.2014
 */

function ipbetweenrange($needle, $start, $end) {

    if((ip2long($needle) >= ip2long($start)) && (ip2long($needle) <= ip2long($end)))
        return true;

    return false;
}


$turkcell = file("turkcell.txt",FILE_IGNORE_NEW_LINES);

foreach($turkcell as $range) {

    $part = explode(" - ",$range);

    if(ipbetweenrange($_SERVER['REMOTE_ADDR'], $part[0], $part[1]) === true)
        echo "Turkcell Mobil Internet Algılandı.";
    else
        echo "Turkcell Mobil Internet dışında herşey olabilir.";
}