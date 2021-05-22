//membuat tombol dengan manipulasi node

const tombol = document.createElement('button');
const isitext = document.createTextNode('tombol');

tombol.appendChild(isitext);
const body = document.querySelector('body');
body.appendChild(tombol);

tombol.setAttribute('type','button');
tombol.setAttribute('id','tombolUbahWarna');

var ubahwarna = function(){
    body.classList.toggle('biru');
}
tombol.addEventListener('click',ubahwarna);

//2. tombol random warna
const tombol2 = document.createElement('button');
const isitext2 = document.createTextNode('random');

tombol2.appendChild(isitext2);
body.appendChild(tombol2);

tombol2.setAttribute('type','button');
tombol2.setAttribute('id','tombolUbahWarna2');
var random = function(){
    const r = Math.round(Math.random()*255);
    const g = Math.round(Math.random()*255);
    const b = Math.round(Math.random()*255);
    
    body.style.backgroundColor = 'rgb('+ r +','+ g +','+ b +')';
};
tombol2.addEventListener('click',random);

//3. dengan input range


//eventnya (change)

//merah
const sliderMerah = document.querySelector('input[name=sliderMerah]');
sliderMerah.addEventListener('input',function(){
    //mengambil nilai dalam element input (min dan max);
    const r = sliderMerah.value;
    const g = sliderHijau.value;
    const b = sliderBiru.value;
    body.style.backgroundColor = 'rgb('+ r +','+ g +','+ b +')';
});

//hihau
const sliderHijau = document.querySelector('input[name=sliderHijau]');
sliderHijau.addEventListener('input',function(){
    const r = sliderMerah.value;
    const g = sliderHijau.value;
    const b = sliderBiru.value;
    body.style.backgroundColor = 'rgb('+ r +','+ g +','+ b +')';
});

//biru
const sliderBiru = document.querySelector('input[name=sliderBiru]');
sliderBiru.addEventListener('input',function(){
    const r = sliderMerah.value;
    const g = sliderHijau.value;
    const b = sliderBiru.value;
    body.style.backgroundColor = 'rgb('+ r +','+ g +','+ b +')';
});

// 4. dengan mouse

body.addEventListener('mousemove',function(event){
    //posisi mouse dengan method clientX ,sebelumnya harus memasukan parameter di function ,yaitu(event)

    // window.innerwidth digunakan untuk menentukan lebar dari browsernya sedangkan innerheight untuk tingginya
    // ini agar kita mendapat angka dari 0--255 tidak boleh lebih dari 255
    const xPos = Math.round((event.clientX/window.innerWidth)*255);
    const yPos = Math.round((event.clientY/window.innerHeight)*255);

    body.style.backgroundColor = 'rgb('+ xPos +','+ yPos +',100)';
  
});


