//contoh closure
// function init(){
//     let nama = 'alfian';
//     function tampilNama(){ // karena pada function tampilNama membutuh kan data dari luar( parent functionnya) , yaitu alfian   
//         console.log(nama);
//     }
//     tampilNama();
// }
// init();

// contoh 2
// function init(){
//     return function(nama){
//         console.log(nama);
//     }
// }

// let panggilNama = init();
// panggilNama('alfiann');

// contoh 3 (termasuk factory function) membuat function dari function yang lain
function ucapkansalam(waktu){
    return function(nama){
        console.log('Halo '+ nama + ' selamat ' + waktu + ' semoga Harimu menyenangkan');
    }
}

let selamatPagi = ucapkansalam('pagi');
let selamatMalam = ucapkansalam('malam');
selamatPagi('alfian');


// let add = function(){
//     let counter = 0;
//     return function(){
//         return ++counter;
//     }
// }

// let a = add();
// console.log(a());
// console.log(a());
// console.log(a());


