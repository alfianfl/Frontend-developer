// template literal

const nama = 'alfian'
const umut = 33;

console.log(`haalo , ${nama}`);


//embedded expression
// console.log(`${alert('halo')}`); // bisa memasukan function
// const x = 10;
// console.log(`${(x % 2==0 ? 'genap ' : 'ganjil')}`); // bis ternari expression

//HTML Fragments
const mhs = {
    nama :'Alfian',
    umur : 20,
    nrp : '140810180055'
};
//jika pakai vscode
const el = `<div class ="mhs">
<h2>${mhs.nama}</h2>
<span class="nrp> ${mhs.nrp} </span> 
</div>`
console.log(el)