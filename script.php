<?php
session_start();
if(!isset($_SESSION['data'])){
    $_SESSION['data']=array();
}
function validateX($coordx){
    if (!isset($coordx)) return false;
    else if (!is_numeric($coordx)) return false;
    else if (Math.ceil($coordx.substr(0,5)) <=-3 || Math.floor($coordx.substr(0,5))>=3) return false;
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

if (isset($_GET['Coordinates_X'])){
    // echo '{'."\"response\":[". implode($_SESSION['data'], ',') . ']}';
    $coordx=$_GET['Coordinates_X'];
    $coordy=$_GET['Coordinates_Y'];
    $radius=$_GET['Radius'];
    $timezone=$_GET['timezone'];
    $curtime=date("H:i:s",time()-$timezone*60);
    $coordx=str_replace(",",".",$coordx) ;

    $time=round(microtime(true) - $_SERVER['REQUEST_TIME_FLOAT'],7);

    $validation=validate($coordx,$coordy,$radius);
    $check=checkArea($coordx,$coordy,$radius)?'true':'false';
    if($validation) {
        $itog = array($coordx, $coordy, $radius, $curtime, $time, $check);
        array_push($_SESSION['data'], $itog);
    }
}

?>
<table  class="table-result">
    <tr>
        <td>Coordinate X</td>
        <td>Coordinate Y</td>
        <td>Radius R</td>
        <td>Result</td>
        <td colspan="2">Current time</td>
        <td colspan="2">Spending time</td>
    </tr>
    <?php foreach ($_SESSION['data'] as $word) { ?>
        <tr>
            <td><?php echo $word[0] ?></td>
            <td><?php echo $word[1] ?></td>
            <td><?php echo $word[2] ?></td>
            <td><?php echo $word[5] ?></td>
            <td colspan="2"><?php echo $word[3] ?></td>
            <td colspan="2"><?php echo $word[4] ?></td>
        </tr>
    <?php } ?>
</table>
