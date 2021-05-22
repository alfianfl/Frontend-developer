//DOM Manupulation
// 1. Buat element baru
const pBaru = document.createElement('p');
const teksBaru = document.createTextNode('paragaf baru');
//simpan tulisan kedalam paragaf
pBaru.appendChild(teksBaru);

//simpan pbaru di akhir sectionA
const sectionA = document.getElementById('a');
sectionA.appendChild(pBaru);

//2. cara menyimpannya ditengah2
const lisectionB = document.createElement('li');
const teksLiBaru = document.createTextNode('item baru');
//masukan textnya kedalam li
lisectionB.appendChild(teksLiBaru);

const ul = document.querySelector('section#b ul');
const li2 = ul.querySelector('li:nth-child(2)');

//caranya
ul.insertBeOfore(lisectionB,li2);

//3. removeCild(); dan replaceChild();

//remove
const hapusTaga = document.querySelector('section#a a');
sectionA.removeChild(hapusTaga);

//replace

// Buat parentnya
const sectionB = document.getElementById('b');

//buat node dan isi textnya
const gantiP = document.createElement('h2');
const isiText = document.createTextNode('Judul Baru');
// masukan isi text kedalam nodenya
gantiP.appendChild(isiText);

//pilih elemen yang mau direplace
const hapusP = sectionB.querySelector('p');
//masukan kedalam method sectionB.replaceChild('elemenbaru','elemenygdiganti')
sectionB.replaceChild(gantiP,hapusP)


