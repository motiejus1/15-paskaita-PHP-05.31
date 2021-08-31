

//Javascript
var a = 5;
console.log(a);

// document.querySelector(".alert") == $(".alert")

// Jquery 
// 1. Pasirasyti standartini koda, kuris fiksuoja ar puslapis uzsikroves

$(function() {

    //laikas - ms
    // 1000ms 1s
    // 0.5s = 500ms
    //fadeIn(laikas) - atsirask
    //delay(laikas) - uzdelsk
    //fadeOut(laikas) - isnyk

    // $(".alert").fadeIn(500);
    // $(".alert").delay(2000);
    // $(".alert").fadeOut(300);

    $(".alert").fadeIn(2000).delay(3000).fadeOut(300);

});