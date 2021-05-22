// Destructuring
//1. dengan array
// function penjumlahanPerkalian(a,b){
//     return [a+b,a*b];
// }

// const [jumlah,kali] = penjumlahanPerkalian(2,3);
// console.log(jumlah);


// function Kalkulasi(a,b){
//     return {
//         tambah: a+b,
//         kali: a*b,
//         bagi:a/b,
//         kurang:a-b
//     }
// }

// const {tambah,kali,bagi,kurang} = Kalkulasi(10,2);
// console.log(bagi);

// Destructuring function argument

const mhs ={
    nama: 'Alfian',
    umur: 21,
    nilai:{
        tugas:80,
        uts:95,
        uas:75
    },
    
}

function cetakMhs({nama,umur,nilai:{tugas,uts,uas}}){

    const rata = tugas+uts+uas;
    let hasil = rata/3; 
    return `halo, ${nama} umur ${umur} , dan nilai ${hasil}`;
}

const mhs1 = cetakMhs(mhs);


