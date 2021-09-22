<?php
session_start();
if(!isset($_SESSION['data'])){
    $_SESSION['data']=array();
}
function validateX($coordx){
    if (!isset($coordx)) return false;
    else if (!is_numeric($coordx)) return false;
    else if (Math.ceil(substr($coordx,0,5)) <=-3 || Math.floor(substr($coordx,0,5))>=3) return false;
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

if (!isset($_GET['Coordinates_X'])){
    echo '{'."\"response\":[". implode($_SESSION['data'], ',') . ']}';
}

/*
$itog='{'."\"response\":[";
$itogsession='';
$itogrequest='';

foreach ($_SESSION['data'] as $datum){
    $itogsession.="{" .
        "\"validate\": $datum[0]," .
        "\"xval\":\"$datum[1]\"," .
        "\"yval\":\"$datum[2]\"," .
        "\"rval\":\"$datum[3]\"," .
        "\"curtime\":\"$datum[4]\"," .
        "\"exectime\":\"$datum[5]\"," .
        "\"checkarea\":\"$datum[6]\"".
        "},";
}

if(!isset($_GET['Coordinates_Y'])){
    $itogsession=substr($itogsession,0,-1);
}
else{
    $coordx=$_GET['Coordinates_X'];
    $coordy=$_GET['Coordinates_Y'];
    $radius=$_GET['Radius'];
    $timezone=$_GET['timezone'];
    $curtime=date("H:i:s",time()-$timezone*60);
    $coordx=$coordx.str_replace(",",".") ;
    $time=round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'],7);
    $validation=validate($coordx,$coordy,$radius);
    $check=checkArea($coordx,$coordy,$radius)?'true':'false';
    $itogrequest.="{" .
        "\"validate\": $validation," .
        "\"xval\":\"$coordx\"," .
        "\"yval\":\"$coordy\"," .
        "\"rval\":\"$radius\"," .
        "\"curtime\":\"$curtime\"," .
        "\"exectime\":\"$time\"," .
        "\"checkarea\":\"$check\"".
        "}";
    $request=array($validation,$coordx,$coordy,$radius,$curtime,$time,$check);
    array_push($_SESSION,$request);
}

echo $itog . $itogsession .$itogrequest . ']}';
*/

else{
    $coordx=$_GET['Coordinates_X'];
    $coordy=$_GET['Coordinates_Y'];
    $radius=$_GET['Radius'];
    $timezone=$_GET['timezone'];
    $curtime=date("H:i:s",time()-$timezone*60);
    $coordx=$coordx.str_replace(",",".") ;

    $time=round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'],7);

    $validation=validate($coordx,$coordy,$radius);
    $check=checkArea($coordx,$coordy,$radius)?'true':'false';
    $itog="{" .
        "\"validate\": $validation," .
        "\"xval\":\"$coordx\"," .
        "\"yval\":\"$coordy\"," .
        "\"rval\":\"$radius\"," .
        "\"curtime\":\"$curtime\"," .
        "\"exectime\":\"$time\"," .
        "\"checkarea\":\"$check\"".
        "}";

    array_push($_SESSION['data'],$itog);
    echo $itog;
}




