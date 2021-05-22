// arrow function cara membuatnya

// function expression
// const tampilNama = function (nama){
//     return `halo , ${nama}`;
// }

//contoh 1
// const tampilNama = (nama) =>{
//     return `halo , ${nama}`;
// }
// console.log( tampilNama('Alfian Fadhil Labib'));

//contoh 2
//implisit return // kalo parameter cuman satu tidak perlu memakai return
// const tampilNama = nama =>`halo , ${nama}`;

// console.log( tampilNama('Alfian Fadhil Labibs'));

//contoh 3 tanpa parameter wajib menuliskan kurung buka dan tutup
// const tampilNama = () => 'helloworld';
// console.log(tampilNama());

// contoh 4 dalam bentuk array
// let mahasiswa = ['Alfian', 'Fadhil', 'labib'];

// const jumlahHuruf = mahasiswa.map(nama => nama.length);
// console.log(jumlahHuruf);

//contoh 5 return object
// let mahasiswa = ['Alfian', 'Fadhil', 'labib'];
// const jumlahHuruf = mahasiswa.map(nama => ({nama:nama ,jumlahHuruf : nama.length}));
// console.table(jumlahHuruf);


////////konsep this pada arrow function

//constructor function
// //1a. dengan cara biasa
const Mahasiswa = function(){
    this.nama = 'alfian',
    this.umur = 20;
    this.sayHello = ()=>{
        console.log(`hello, ${this.nama}, dengan umur ${this.umur}`);
    }

    setInterval(()=>{
         console.log(this.umur++);
    }, 500);
} 

// 1b dengan arrow function
// dengan object literal

// const mhs1 = {
//     nama : 'alfian',
//     umur : 20,
//     sayHello : () =>{
//         console.log(`hello, ${this.nama}, dengan umur ${this.umur}`);
//     }
// }

// Contoh pada HTML

const box = document.querySelector('.box');

box.addEventListener('click', function(){
    //agar tidak kebalik
    let satu = 'size';
    let dua = 'caption';
    if(this.classList.contains(dua)){
        [satu,dua] = [dua,satu];
    }
    this.classList.toggle(satu);// ini mksdu this diatasnya
    setTimeout(()=>{ // agar this bisa berfungsi maka kita menggunaka arrow function karena arrow function dengan ini akan mengambil this diatasnya
        this.classList.toggle(dua)
    },300);
})