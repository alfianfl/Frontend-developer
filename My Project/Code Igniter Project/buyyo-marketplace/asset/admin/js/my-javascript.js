window.addEventListener('DOMContentLoaded', () => {

  // load bukti transfer ke modal
  $('button.bukti-transaksi').on("click", function () {

    // ambil id_user dan nama foto
    let idUser = $(this).data('iduser');
    let namaFoto = $(this).data('bukti');
    let url = $(this).data('url');

    let imgSrc = `${url}upload/${idUser}/${namaFoto}`;

    // ambil modal -> container gambar
    const imgModal = document.querySelector('.img-bukti-transaksi');

    // element gambar
    let imgElement = `<img class="img-fluid" title="bukti transaksi" alt="bukti transaksi" src="${imgSrc}">`;

    if (namaFoto) {
      imgModal.innerHTML = imgElement;
    } else {
      imgModal.innerHTML = '<small>Bukti transaksi belum di upload</small>';
    }
  });




  // colorize status
  const statusElements = document.querySelectorAll('.status-bayar');
  statusElements.forEach(element => {
    let statusValue = element.innerText;
    checkStatus(element, statusValue.toLowerCase());
  });
});


function checkStatus(element, statusValue) {
  // cek dan tampilkan warna
  switch (statusValue) {
    case 'waiting':
      element.classList.remove('approved', 'rejected', 'waiting2');
      element.classList.add('waiting1');
      break;

    case 'checking':
      element.classList.remove('approved', 'waiting1', 'rejected');
      element.classList.add('waiting2');
      break;

    case 'approved':
      element.classList.remove('rejected', 'waiting1', 'waiting2');
      element.classList.add('approved');
      break;

    case 'rejected':
      element.classList.remove('approved', 'waiting1', 'waiting2');
      element.classList.add('rejected');
      break;

    default:
      element.classList.remove('approved', 'waiting1', 'waiting2');
      element.classList.add('rejected');
      break;
  }
}