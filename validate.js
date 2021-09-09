var count_y=0;
var check_y1=false;
var check_y2=false;
var check_y3=false;
var check_y4=false;
var check_y5=false;
var check_y6=false;
var check_y7=false;
var check_y8=false;
var check_y9=false;

$('#y1').click(function() {
    if (!check_y1){
        $('#y1').css('background','lavender');
        count_y ++;
        check_y1=true;
    }else{
        $('#y1').css('background','white');
        count_y --;
        check_y1=false;
    }
});

$('#y2').click(function() {
    if (!check_y2){
        $('#y2').css('background','lavender');
        count_y ++;
        check_y2=true;
    }else{
        $('#y2').css('background','white');
        count_y --;
        check_y2=false;
    }

});

$('#y3').click(function() {
    if (!check_y3){
        $('#y3').css('background','lavender');
        count_y ++;
        check_y3=true;
    }else{
        $('#y3').css('background','white');
        count_y --;
        check_y3=false;
    }
});

$('#y4').click(function() {
    if (!check_y4){
        $('#y4').css('background','lavender');
        count_y ++;
        check_y4=true;
    }else{
        $('#y4').css('background','white');
        count_y --;
        check_y4=false;
    }
});

$('#y5').click(function() {
    if (!check_y5){
        $('#y5').css('background','lavender');
        count_y ++;
        check_y5=true;
    }else{
        $('#y5').css('background','white');
        count_y --;
        check_y5=false;
    }
});

$('#y6').click(function() {
    if (!check_y6){
        $('#y6').css('background','lavender');
        count_y ++;
        check_y6=true;
    }else{
        $('#y6').css('background','white');
        count_y --;
        check_y6=false;
    }
});
$('#y7').click(function() {
    if (!check_y7){
        $('#y7').css('background','lavender');
        count_y ++;
        check_y7=true;
    }else{
        $('#y7').css('background','white');
        count_y --;
        check_y7=false;
    }
});
$('#y8').click(function() {
    if (!check_y8){
        $('#y1').css('background','lavender');
        count_y ++;
        check_y8=true;
    }else{
        $('#y8').css('background','white');
        count_y --;
        check_y8=false;
    }
});

$('#y9').click(function() {
    if (!check_y9){
        $('#y9').css('background','lavender');
        count_y ++;
        check_y9=true;
    }else{
        $('#y9').css('background','white');
        count_y --;
        check_y9=false;
    }
});

function validateX(){
    let x=document.forms["form"]["Coordinates_X"].value;
    if (x.trim()===""){
       alert("введите значение для координаты x");
       return false;
    }
    else if (isNaN(x)){
        alert("координата x должна быть числом");
        return false;
    }
    else if (x <= -3 || x>= 3) {
        alert("координата x должна быть в диапозоне:(-3;3)");
        return false;
    }
    return true;
}


function validateY(){
    if (count_y==0){
        alert("Выберите значение координаты y");
        return false;
    }
    else if (count_y!=1){
        alert("Выберите только одно значение координаты y");
        return false;
    }
    return true;
}

function validate(){
    validateX();
    validateY();
}

$('.reset-button').click(function (){
    $('.form')[0].reset();
    check_y1=check_y2=check_y3=check_y4=check_y5=check_y6=check_y7=check_y8=check_y9=false;
    $('#y1').css('background','white');
    $('#y2').css('background','white');
    $('#y3').css('background','white');
    $('#y4').css('background','white');
    $('#y5').css('background','white');
    $('#y6').css('background','white');
    $('#y7').css('background','white');
    $('#y8').css('background','white');
    $('#y9').css('background','white');
});


$(' .submit_button').on(function (){
    if (!validateX()&&validateY()) return;

});







document.getElementsByClassName("submit_button")[0].addEventListener("click", validate);