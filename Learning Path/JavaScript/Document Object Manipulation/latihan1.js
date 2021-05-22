// DOM Selection
//1. document.getElementById(); -> element

const judul = document.getElementById('judul');

judul.style.color = 'red';
judul.style.backgroundColor= 'blue';
judul.innerHTML = 'POP'; // mengubah tulisan dalam tag ID

//2. document.getElementsByTagName();->HTMLCOLLECTION

const p = document.getElementsByTagName('p');

p[2].style.backgroundColor = 'lightblue'; // harus ada indexnya
//bisa pakai looping 
for(let i =0;i<p.length;i++){
    p[i].style.backgroundColor = 'lightblue'; 
}
const h1 = document.getElementsByTagName('h1');
h1[0].style.fontSize = '50px';

//3. document.getElementsByClassName();->HTMLCOLLECTION
const p1 = document.getElementsByClassName('p1');

p1[0].innerHTML = 'ini diubah jadi javascript';
p1[0].style.color = 'red';

//4. document.querySelector();->element

const p4 = document.querySelector('#b p');
p4.style.color = 'blue';

const li2 = document.querySelector('section#b ul li:nth-child(2)');
li2.style.color = 'orange';

//4. document.querySelectorAll();->nodelist // mirip dengan yg tagname
const pall = document.querySelectorAll('p');//mengubah semua element dengan selector p

for(let i =0;i<pall.length;i++){
    pall[i].style.backgroundColor = 'grey'; 
}

