//spread Operator

//memecah iterables menjadi single element

// const mhs = ['alfian','bacos','csss'];
// console.log(...mhs[0]);

//1. mengabungkan 2 array
// const mhs = ['alfian','bacos','csss'];
// const dosen=['asol','ino','erick'];
// //kalo digabung
// const orang=[...mhs,...dosen];
// console.log(orang);

//2. meng-copy array
// const mhs = ['alfian','bacos','csss'];
// const mhs1 =[...mhs];
// console.log(mhs); 


// 3. dengan html

// const liname = document.querySelectorAll('ul li');

// const mhs = [...liname].map(m => m.textContent); // gunakan spread (...) untuk mengubah nodelist menjadi array

// console.log(mhs);

const nama = document.querySelector('.nama');
const huruf = [...nama.textContent].map(h => `<span>${h}</span>`).join('');
nama.innerHTML=huruf;



