//1. cara biasa menghilangkan kartu
//const card = document.querySelector('.card');
//const container = document.querySelector('.container');
//const tutup = document.querySelector('.close');

//tutup.addEventListener('click', function(){
  //  container.removeChild(card);
//});



//2. dengan DOM Traversal

// cara a menggunakan for
//const close = document.querySelectorAll('.close');
//for(let i =0;i<close.length;i++){
    //close[i].addEventListener('click', function(event){// parameter event digunakan untuk cara 2 karena jika kita mengconsole parameter ini maka akan tampil suatu informasi kejadian yg sedang terjadi mulai dari koordinat mouse,kejadian apa,target,dsb dan yg kita ambil adalah targetnya yaitu class "close"

        //menggunakan parentElement
        //cara 1 dengan close[i]
        //close[i].parentElement.style.display = 'none'; 
        //cara 2 dengan menggunakan paramenter event dilanjutkan dengan '.target' untuk menyeleksi span close
       // event.target.parentElement.style.display = 'none';
    //});
//}

//cara b menggunakan forEach karena queryselectorAll mengembalikan array
const close = document.querySelectorAll('.close');
close.forEach(function(close){// ingat kalo forEach didalem function hrs ada parameter
    close.addEventListener('click', function(event){// parameter event digunakan untuk cara 2 karena jika kita mengconsole parameter ini maka akan tampil suatu informasi kejadian yg sedang terjadi mulai dari koordinat mouse,kejadian apa,target,dsb dan yg kita ambil adalah targetnya yaitu class "close"
        //cara 2 dengan menggunakan paramenter event dilanjutkan dengan '.target' untuk menyeleksi span close
       event.target.parentElement.style.display = 'none';
    });
});

//Contoh mengunakan 

const nama = document.querySelector('.nama');
console.log(nama.parentElement);//ngambil ortunya
console.log(nama.parentElement.parentElement);//ngambil kakeknya

console.log(nama.parentNode);
console.log(nama.nextElementSibling);




