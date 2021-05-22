//callback
//1. Synchronus Callback
//dengan function biasa
// function halo(nama){
//     alert(`halo ${nama}`);
// }
// function tampilPesan(callback){
//     const nama = prompt('masukaan nama');
//     callback(nama);// mengambil dari 'nama' yang dimasukan ke dalam promt
// }

// tampilPesan(halo);
//dengan arrow function
// function tampilPesan(callback){
//     const nama = prompt('masukaan nama');
//     callback(nama);// mengambil dari 'nama' yang dimasukan ke dalam promt
// }

// tampilPesan(name => alert(`halo ${name}`));

// const mhs = [
//     {
//         "nama": "Alfian Fadhil",
//         "nrp": "140810180055",
//         "email": "alvian.wadada@gmail.com",
//         "jurusan": "Teknik Informatika",
//         "iddoswal": 1
//     },
//     {
//         "nama": "Alfian",
//         "nrp": "140810180045",
//         "email": "alvian.waadada@gmail.com",
//         "jurusan": "Teknik Informatika",
//         "iddoswal": 2
//     },
//     {
//         "nama": "Fadhil",
//         "nrp": "140810180035",
//         "email": "alvian.wadadaa@gmail.com",
//         "jurusan": "Teknik Informatika",
//         "iddoswal": 2
//     },
// ]

// mhs.forEach(m => console.log(m.nama));
//2. Asynchronous Callback
// a. dengan vanila javascript (javascript murni)
// function getDataMahasiswa(url,success,error){
//     let xhr = new XMLHttpRequest();

//     xhr.onreadystatechange = function(){
//         if(xhr.readyState === 4){
//             if(xhr.status === 200){
//                 success(xhr.response);
//             }else if(xhr.status === 404){
//                 error();
//             }
//         }
//     }

//     xhr.open('get', url);
//     xhr.send();
// }

// getDataMahasiswa('mahasiswa.json',result =>{
//     const mhs = JSON.parse(result);
//     mhs.forEach( m => {
//         console.log(m.nama);
//     });
// },error =>{
// });


//b. dengan JQuery


$.ajax({
    url: 'mahasiswa1.json',
    success: (mhs) => {
        mhs.forEach(m => console.log(m.nama));       
    },
    error: (e) => {
        console.log(e.responseText);
    }
});

