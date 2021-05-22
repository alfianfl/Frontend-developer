//for..off

// 1. Array
// const mhs = ['a','b','c'];

// const mhs = ['a','b','c'];

// // for(const [i,m] of mhs.entries()){
// //     console.log(`${m} adalah mahasiswa ke ${i}`);
// // }
// for(const m of mhs){// representasi mhs dengan m
//     console.log(m);
// }

// 2. String

// const nama = 'alfian';

// for(const n of nama){
//     console.log(n);
// }

//3. nodelist (ketika melakukan query pada DOM)

// const linama = document.querySelectorAll('ul li');

// for(n of linama){
//     console.log(n.textContent);
// }

//4. Arguments
// function jumlahkanAngka(){
//  let jumlah = 0;
//  for(n of arguments){
//      jumlah += n;
//  };
//  return jumlah;
// }

// console.log(jumlahkanAngka(1,2,3,4,6));

// for..in (ini hanya untuk object)

const mhs = {
    nama:'alfian',
    umur:20,
    email:'alvian.wadada@gmail.com'
}

for(m in mhs){
    console.log(mhs[m]);// gunakan[m] untuk kiut mengambil value nya
}
var daftarSiswa = [
    {id: 1, nama: 'Aura'},
    {id: 2, nama: 'Bryan'},
    {id: 3, nama: 'Charlie'},
    {id: 4, nama: 'Diandra'}
]

for (let siswa of daftarSiswa) {
    console.log(siswa.nama)
}
