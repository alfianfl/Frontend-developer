//Desctructuring array


// const perkenalan =['halo','nama','saya','alfian'];

// //ini caranya
// const [h,n,s,a] = perkenalan;
// console.log(h);

//1. swap items

// let a = 1,
//     b = 2;
// console.log(a);
// console.log(b);
// //isinya ditukar
//     [a,b] = [b,a];
//     console.log(a);
//     console.log(b);

//2. return value  pada function

// function coba(){
//     return [1,2];
// }

// const [a,b] = coba();
// console.log(a);
// console.log(b);

//3. rest parameter (...)
// const [a,...values] = [1,2,3,4,5];

// console.log(a);
// console.log(values);


// Object
// const mhs = {
//     nama:'Alfian',
//     umur: 20
// }

// // harus sama dengan nama properti di dalam object

// const {nama,umur} =mhs;
// console.log(nama);
// console.log(umur);

// 1. assigment tanpa deklarasi object

// ({nama,umur} ={
//     nama:'Alfian',
//     umur: 20
// });
// console.log(nama);

//2. assign ke variabel baru

// const mhs = {
//     nama:'Alfian',
//     umur: 20
// }

// const {nama: n,umur: u} =mhs;
// console.log(n);
// console.log(u);

//3. default value

// const mhs = {
//     nama:'Alfian',
//     umur: 20
// }

// const {nama,umur, email = 'default@gmail.com'} =mhs;
// console.log(email);

//4. memberi nilai default dan assign ke variabel baru
// const mhs = {
//     nama:'Alfian',
//     umur: 20,
// }

// const {nama,umur, email :e = 'default@gmail.com'} =mhs;
// console.log(e);
//5. rest parameter
// const mhs = {
//     nama:'Alfian',
//     umur: 20,
// }

// const {nama,...value} =mhs;
// console.log(value);

//6. Mengambil field pada object ,setelah dikirim sebagai parameter untuk function
const mhs = {
    id:123,
    nama:'Alfian',
    umur: 20,
    email:'alvian@gmail.com'
}

function getIdMhs({id}){
    return id;
}

console.log(getIdMhs(mhs));


