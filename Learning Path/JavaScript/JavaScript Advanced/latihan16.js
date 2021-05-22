// Rest Parameter

// function myFunc(a,b,...values){// hanya bisa digunakan diakhir parameter
//     return values;
// }
// console.log(myFunc(1,2,3,4,5));

// function jumlah(...angka){
//     //1. dengan for..of
//     // let total = 0;
    
//     // for(const n of angka){
//     //     total +=n;
//     // }
//     // return total;
//     //2. dengan reduce
//     return angka.reduce((total,i) => total+i);
// }
// console.log(jumlah(1,2,3,4,6));

//2. Digunakan pada Array Destructuring

// const kelompok =['a','b','c','d','e'];
// const [ketua,wakil,...anggota] = kelompok;
// console.log(ketua);

//3. Object Destructuring
// ({pm , ...sisaKel} = {
//     pm: 'alfian',
//     fe1:'difa',
//     fe2:'adi',
//     be1:'budi',
//     be2:'nazmi',
//     ux:'marcel',
//     devops:'jack'
// });
// console.log(pm);

//4. filtering

function filterBy(type,...values){
    return values.filter(v => typeof v === type);
}
console.log(filterBy('boolean',1,2,false,10,true,'dody'));// 'number','boolean','string'

