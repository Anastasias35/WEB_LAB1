<?php
session_start();
function validateX($coordx){
    if (!isset($coordx)) return false;
    else if (!is_numeric($coordx)) return false;
    else if ($coordx <=-3 || $coordx>=3) return false;
    return true;
}

function validateR($radius){
    return isset($radius);
}

function validateY($coordy){
    return isset($coordy);
}

function validate($coordx,$coordy,$radius){
    return validateX($coordx)&&validateY($coordy)&&validateR($radius);
}

function checkArea($x,$y,$r){ // проверка попадания в область
    return ($x>=0 && $x<=$r && $y<=0 && $y>=-$r) || ($x<=0 && $y>=0 && $x*$x + $y*$y<=$r*$r) || ($x<=0 && $y<=0 &&  -2*$x - $r<=$y);
}

$coordx=$_GET['Coordinates_X'];
$coordy=$_GET['Coordinates_Y'];
$radius=$_GET['Radius'];
$timezone=$_GET['timezone'];
$curtime=date("H:i:s",time()-$timezone*60);


$time=round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'],7);

$validation=validate($coordx,$coordy,$radius);
$check=checkArea($coordx,$coordy,$radius)?'true':'false';

$itog='{' .
    "\"validate\": $validation," .
    "\"xval\":\"$coordx\"," .
    "\"yval\":\"$coordy\"," .
    "\"rval\":\"$radius\"," .
    "\"curtime\":\"$curtime\"," .
    "\"exectime\":\"$time\"," .
    "\"checkarea\":\"$check\"".
    "}";
echo $itog;