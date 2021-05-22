// 1. innerHTML
const judul = document.getElementById('judul');

judul.innerHTML = '<i>Alfian Fadhil</i>';

//2. element.style.<properti>

const judul1 =document.querySelector('#judul');
judul.style.color = 'blue';

//3. setAttribute,getAttribute,removettribute
//untuk menambah attribute
const judul2 = document.getElementsByTagName('h1');
const a = document.querySelector('section#a a');

a.removeAttribute('href');
judul2[0].setAttribute('name','pop');

//4. classList
const p2 = document.getElementsByClassName('p2');
p2[0].classList.add('label');
p2[0].classList.add('pop');
//Remove : menghapus class 
p2[0].classList.remove('label');
//Toggle : kalo belum punya ditambahkan kalo sudah dihilangkan
p2[0].classList.toggle('label');
p2[0].classList.toggle('label');

const body = document.getElementsByTagName('body')[0];

body.classList.toggle('biru-muda');
//item : untuk mengetahui nama kelas pada sebuah element
p2[0].classList.add('dua');
p2[0].classList.item('2'); // dicek berdasarkan index dan di cek melalui console
//contains : mengecek class yg dicari dan mengembalikan nilai boolean

//replace : mengganti class 
p2[0].classList.replace('dua','seribu');



