// 2.1 Execution context, hoisting, dan scope]

// 1. creation phase pada global context
// nama var = undefined
// kalo function  ; NAMA FUNCTION = FN()
// hoisting
// window = global object
// this = window

// execution phase


// var nama = 'alfian';
// var umur = 20;

// function sayHello(){
//     return `Halo, nama saya ${nama} , umur saya ${umur}`;  
// }
// function membuat local execution context 
// yang didalmnnya terdapat creation dan execution
// kita juga punya kases kedalam arguments
// Hoisting


// case 1
var nama = 'alfian fadhil';
var username = ' alfian@gmail';

function cetakURL(username){
    var isntagram = 'http://instagram.com/';
    return isntagram + username;
}
console.log(cetakURL('@doddyFerdiansyah'));  

//case 2

// function a(){

//     console.log('ini a');
//     function b(){
//         console.log('ini b')

//         function c(){
//             console.log('ini c');
//         }
//         c();
//     }
//     b();
// }
// a();

