//tagged templates

// const nama = 'alfian';
// const umur = 20;

// // //cara 1
// // function coba(strings,...values){// fungsi coba // '...' untuk menampung semua expression
// // // jika kita console.log strings maka akan tampil index setiap string yg dipisah dengan expression(${nama} , ${umur})
// // // jika kita console.log values maka akan tampil expression(${nama} , ${umur})
// //     let result ='';
// //      strings.forEach((str,i) => {// parameter str sebagai array dari strings dan i sebagai index dari values
// //          result += `${str}${values[i] || ''}`
// //      });
// //     return result;
// // }

// //cara 2 dengan method reduce
// function coba(strings, ...values){
//     return strings.reduce((result, str,i) =>`${result}${str}${values[i] ||''}`,'' );
// }
// const str = coba`halo nama saya ${nama}, saya umur ${umur} tahun`;// 'coba' adalah nama fungsi
// console.log(str);

//highlight

const nama = 'alfian';
const umur = 20;

function highlight(strings, ...values){
    return strings.reduce((result, str,i) =>`${result}${str} <span class="highlight">${values[i] ||''}</span>`,'' );
}
const str = highlight`halo nama saya ${nama}, saya umur ${umur} tahun`;// 'coba' adalah nama fungsi
console.log(str);

document.body.innerHTML = str;