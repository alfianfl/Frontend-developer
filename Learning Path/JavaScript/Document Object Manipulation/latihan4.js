// event handler 
const p3 = document.querySelector('.p3');

function ubahwarna(){
    p3.style.backgroundColor = 'lightblue';
}

// cara kedua dengan method onclick terpisah dengan Element
const p2 = document.querySelector('.p2');
const asu = function ubahwarnaP2(){
    p2.style.backgroundColor = 'red';
};
//ini caranya
p2.onclick = asu;


//cara ketiga dengan addEventListener()

const p4 = document.querySelector('section#b p');
//masukan dua buah parameter
p4.addEventListener('click',function(){
    const parent = document.querySelector('section#b ul');
    const elementBaru = document.createElement('li');
    const isitext = document.createTextNode('Ini adalah element baru');
    elementBaru.appendChild(isitext);
    parent.appendChild(elementBaru);
});


