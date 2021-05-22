// // ObjectCreate() Prototype function yang lebih sempurna

function Mahasiswa3(nama,energi,haus){
   // let this = Object.create(Mahasiswa3.prototype);// sebenarnya ada method mahasiswa3.prototype pada object disini
    this.nama = nama;
    this.energi = energi;
    this.haus = haus;
 
}
Mahasiswa3.prototype.makan = function(porsi){
    this.energi += porsi;
    return `halo ${this.nama}, selamat Makan`;
}
Mahasiswa3.prototype.minum = function(porsi){
    this.haus += porsi;
    return `halo ${this.nama}, selamat Makan`;
}
let mahasiswa = new Mahasiswa3('alfian',10,15);

//2. mengunakan versi class
// class Mahasiswa{
//     constructor(nama, energi){
//         this.nama = nama;
//         this.energi = energi;
//     }
//     makan(porsi){
//         this.energi += porsi;
//         return `halo ${this.nama}, selamat Makan`;
//     }
// }
// let mahasiswa = new Mahasiswa('alfian',10);

