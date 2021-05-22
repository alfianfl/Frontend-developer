//bikin promise
// function cobaPromise(){
//    return new Promise((resolve , reject) => {
//        setTimeout(() => {
//            resolve('selesai');
//        },2000);
//     });
    
// }
// // const coba = cobaPromise();
// // coba.then(response => console.log(response));

// async function cobaAsync(){
//     const coba = await cobaPromise();
//     console.log(coba);
// }
// cobaAsync();

//1. error handling dengan Promise (then dan catch)
// function cobaPromise(){
//     return new Promise((resolve, reject)=>{
//          const waktu = 6000;
//          if(waktu<5000){
//              setTimeout(()=>{
//                  resolve('selesai')
//              }, waktu);
//          }else {
//              reject('kelamaan')
//          }
//     });
// }

// const coba = cobaPromise();
// coba
//  .then(response=> console.log(response))
//  .catch(response=>console.log(response));

 //2. dengan async dan await (try dan catch)

 function cobaPromise(){
    return new Promise((resolve, reject)=>{
         const waktu = 5000;
         if(waktu<5000){
             setTimeout(()=>{
                 resolve('selesai')
             }, waktu);
         }else {
             reject('kelamaan')
         }
    });
}

async function cobaAsync(){
    try{ // jika resolve seperti then pada Promsie
        const coba = await cobaPromise();
        console.log(coba);

    }catch(err){//jika error atau seperti catch pada promise
        console.log(err);
    }
}
cobaAsync();