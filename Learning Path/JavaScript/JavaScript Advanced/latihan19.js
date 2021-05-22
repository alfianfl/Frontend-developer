//promise

//contoh1
// let ditepati = false;
// const janji1 = new Promise((resolve, reject)=>{
//     if(ditepati){
//         resolve('Janji telah ditepati');

//     }else{ 
//         reject('ingkar janji');
//     }
// });
// janji1
// .then(response => console.log('ok ' + response))
// .catch(response => console.log('not OK ' + response));

//contoh2
// let ditepati = true;
// const janji2 = new Promise((resolve,reject)=>{
//     if(ditepati){
//         setTimeout(() => {
//             resolve('janji ditepati');
//         }, 2000);
//     }else{
//         setTimeout(() => {
//             reject('janji tidak ditepati');
//         }, 2000);
//     }
// });

// console.log('mulai');
// janji2
// .finally(()=>console.log('selesai menunggu'))
// .then(response => console.log(response))
// .catch(response => console.log(response));
// console.log('selesai');

//contoh3 promise.all() ketika kita akan menjalankan banyak promise

const film = new Promise(resolve =>{
    setTimeout(()=>{
        resolve([{
            judul:'Avengers',
            sutradara:'Alfian fadhil',
            pemeran:'Alfian,fadhil'
        }]);
    },1000);
});

const cuaca = new Promise(resolve =>{
    setTimeout(()=>{
        resolve([{
            kota:'Bandung',
            temp:'20 derajat',
            kondisi:'baik'
        }]);
    },500);
});

//kalo mau jalanin sekaligus

Promise.all([film,cuaca])
.then(response =>{
    //pakai destructuring
    const [film,cuaca] =response;
    console.log(film);
    console.log(cuaca);
});

