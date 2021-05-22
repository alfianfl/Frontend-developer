const angka = [1,4,6,3,9,-3,2,4,5,2];

//1. kalau kita menggunakan for
// const newAngka = [];
// for(let i =0 ;i<angka.length;i++){
//     if(angka[i]>=3){
//         newAngka.push(angka[i]);
//     }
// }
// console.log(newAngka);

//2. kalau menggunakan filter
//jika menggunakan arrow function
// const newAngka = angka.filter(e=>e>=3); 
// console.log(newAngka);

//3. menggunakan map
// const newAngka = angka.map(e=>e*2);
// console.log(newAngka);

//4. menggunakan reduce
///jumlahkan seluruh element pada array

//ada dua parameter pada reduce yg pertama accumulator,yaitu hasil dari proses dan currentValue variabel yg sedang di loopping
// const newAnggka = angka.reduce((accumulator,currentValue)=> accumulator+currentValue);
// console.log(newAnggka);

//5. method chaining (berantai)
 //cari angka > 5
 // kalikan 3
 //jumlahkan
const hasil = angka.filter(a => a>5) // pilih yg > 5
            .map(a => a*3)// dikali 3
            .reduce((acc,cur)=>acc+cur); //dijumlahkan
            console.log(hasil);  