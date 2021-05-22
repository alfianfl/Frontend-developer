//ambil semua element li video
const list = Array.from(document.querySelectorAll('[data-duration]'));// array from agar mengubah 'list' menjadi array karena pada querruselectorAll hasil yg didapat berupa nodelist
//pilih yang hanya js lanjutan
let JSlanjutan = list.filter(video => video.textContent.includes('JS lanjutan'))//cari textContent yang terdapat JS lanjutan
//ambil durasi masing2 video
.map(item => item.dataset.duration) // dataset untuk mengambil data-duration / cari yg ada element data-duration pada setiap item
//ubah durasi menjadi integer, lalu ubah menit menjadi detik
.map(waktu =>{
    const parts = waktu.split(':').map(part => parseFloat(part));// kita split ':' agar hilang dan ubah array didalam menjadi float
    return parts[0]*60 + parts[1];
})
//jumlahkan semua detik
.reduce((total,waktu)=>total+waktu);
//ubah format menjadi jam menit detik
const jam = Math.floor(JSlanjutan / 3600);
JSlanjutan = JSlanjutan - 2*3600;
const menit = Math.floor(JSlanjutan /60);
const detik = JSlanjutan - menit *60;
// simpan di DOM
const jmlVideo = document.querySelector('.jumlah-video');
jmlVideo.innerHTML = list.filter(video => video.textContent.includes('JS lanjutan')).length;
const totalDurasi = document.querySelector('.total-durasi');
totalDurasi.innerHTML = `${jam} jam : ${menit} menit : ${detik} detik`;