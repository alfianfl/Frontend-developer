// 1. HTML FRAGMENTS
// const mhs = {
//     nama :'Alfian',
//     umur : 20,
//     nrp : '140810180055'
// };
// const el = `<div class ="mhs">
// <h2>${mhs.nama}</h2>
// <span class="nrp> ${mhs.nrp} </span> 
// </div>`

// document.body.innerHTML = el;

//2. looping

// const mhs =[
//     {
//         nama :'Alfian',
//         email:'alvian.wadada@gmail.com'
//     },
//     {
//         nama :'Fadhil',
//         email:'alvian.wadada@gmail.com'
//     },
//     {
//         nama :'Labib',
//         email:'alvian.wadada@gmail.com'
//     },
// ];

// const el = `<div class="mhs" >
// ${mhs.map(m => `<ul> 
// <li> ${m.nama}</li>
// <li> ${m.email}</li>
// </ul>`).join('')}
// </div>`;
// document.body.innerHTML = el;

//3. kondisional

// const lagu = {
//     judul: 'tetap dalam jiwa',
//     penyanyi: 'isyana sarasvati',
//     feat: 'pop'
// }

// const el = `<div class="lagu">
// <ul>
//     <li>${lagu.judul}</li>
//     <li>${lagu.penyanyi} ${lagu.feat ? `feat. ${lagu.feat}` : `` }</li>
// </ul>
// </div>`;
// document.body.innerHTML = el;

//4. Nested
// HTML FRAGMENTS BERSARANG

const mhs = {
    nama : 'alfian',
    semester : 5,
    matakuliah: [
        'si',
        'jarkom',
        'AI'
    ]
};

function cetakMatkul(matakuliah){
    return `
    <ol>
        ${matakuliah.map(mk => `<li>${mk}</li>`).join('')}
    </ol>
    `
}

const el = `<div class="mhs">
<h2>${mhs.nama}</h2>
<span class="semester">semester : ${mhs.semester}</span>
<h4>mata kuliah</h4>
${cetakMatkul(mhs.matakuliah)} 
</div>`
document.body.innerHTML = el;