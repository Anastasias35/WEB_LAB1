<?php
$coordx=$_GET["Coordinates_X"];
$coordy=$_GET["Coordinates_Y"];//пока не добавлено
$radius=$_GET["Radius"];

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

function checkArea($coordx,$coordy,$radius){ // проверка попадания в область
    return ($coordx>=0 && $coordx<=$radius && $coordy<=0 && $coordy>=-$radius) || ($coordx<=0 && $coordy>=0 && $coordx*$coordx + $coordy*$coordy<=$radius*$radius) || ($coordx<=0 && $coordy<=0 &&  -2*$coordx - $radius<=$coordy);
}






