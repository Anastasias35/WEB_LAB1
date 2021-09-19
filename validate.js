$(document).ready(function(){
    $('#button-y :button').click(function (){
        $('#button-y :button').removeClass("active");
        $(this).addClass("active");

    });
});

function validateX(){

    let x=document.forms["form"]["Coordinates_X"].value;
    x=x.replaceAll(",",".");
    if (x.trim()===""){
        alert("введите значение для координаты x");
        return false;
    }
    else if (isNaN(x)){
        alert("координата x должна быть числом");
        return false;
    }
    else if (Math.floor(x) <= -3 || Math.floor(x)>= 3) {
        alert("координата x должна быть в диапозоне:(-3;3)");
        return false;
    }
    return true;
}

function validateY(){
    active=false;
    $('.active').each(function (){
        active=true;
    })
    if(!active){
        alert("выберите одно из значение координаты y");
        return false;
    }
    else{
        return true;
    }
}

function validate(){
    return validateX()&&validateY();
}

$('.reset-button').click(function (){
    $('.form')[0].reset();
    $('#button-y :button').removeClass("active");
})

$('.form').on('submit',function (event){
    event.preventDefault();
    if(!validate()) return;
    else{
        let data = $(this).serialize()+'&Coordinates_Y=' +document.getElementsByClassName("active")[0].value  + '&timezone=' + new Date().getTimezoneOffset();
        var request = new XMLHttpRequest();
        request.open('GET', 'https://se.ifmo.ru/~s311724/lab1/script.php'+'?'+data,true);
        request.send();
        request.onload = function () {
            if (request.status != 200) {
                alert(`Ошибка ${request.status}: ${request.statusText}`);
            } else {
                console.log(request.responseText);
                let result = JSON.parse(request.responseText);
                if (result.validate) {
                    row = '<tr>';
                    row += '<td>' + result.xval + '</td>';
                    row += '<td>' + result.yval + '</td>';
                    row += '<td>' + result.rval + '</td>';
                    row += '<td>' + result.checkarea + '</td>';
                    row += '<td colspan="2">' + result.curtime + '</td>';
                    row += '<td colspan="2">' + result.exectime + '</td>';
                    $('.table-result').append(row);
                }
            }
        }
        $('.form')[0].reset();
        $('#button-y :button').removeClass("active");
    }
});