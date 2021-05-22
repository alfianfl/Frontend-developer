// menentukan status yg akan ditampilkan
const statusElements = document.querySelectorAll('.status-bayar');
statusElements.forEach(element => {
  let statusValue = element.getAttribute('data-status');
  let waktuHabis = false;

  checkStatus(element, statusValue, waktuHabis);
});

// menentukan button yg akan muncul
const btnChangeElements = document.querySelectorAll('.button-change');
btnChangeElements.forEach(element => {
  let statusValue = element.getAttribute('data-status');

  checkButton(element, statusValue);
});



function checkStatus(element, statusValue, waktuHabis) {
  // cek dan tampilkan status
  if (!waktuHabis) {

    switch (statusValue) {
      case 'waiting':
        element.innerText = 'waiting for payment';
        element.classList.remove('approved', 'rejected', 'waiting2');
        element.classList.add('waiting1');
        break;

      case 'checking':
        element.innerText = 'in checking';
        element.classList.remove('approved', 'waiting1', 'rejected');
        element.classList.add('waiting2');
        break;

      case 'approved':
        element.innerText = 'approved';
        element.classList.remove('rejected', 'waiting1', 'waiting2');
        element.classList.add('approved');
        break;

      case 'rejected':
        element.innerText = 'rejected';
        element.classList.remove('approved', 'waiting1', 'waiting2');
        element.classList.add('rejected');
        break;

      default:
        element.innerText = 'error';
        element.classList.remove('approved', 'waiting1', 'waiting2');
        element.classList.add('rejected');
        break;
    }

  } else {
    // rejected
    element.innerText = 'rejected';
    element.classList.remove('approved', 'waiting1', 'waiting2');
    element.classList.add('rejected');
  }
}


function checkButton(element, statusValue) {

  const buttonCaraBayar = document.querySelector('button.cara-bayar');
  const buttonBatalkan = document.querySelector('.cancel-tryout');

  // cek tombol dan tampilkan
  if (statusValue === 'approved') {
    buttonBatalkan.setAttribute('disabled', 'disabled');
    buttonCaraBayar.setAttribute('disabled', 'disabled');
    element.innerHTML = `
      <button type="button" class="btn btn-block upload" data-toggle="modal" data-target="#readyLearnModal">
        Ready Learn Account
      </button>
  `;
  } else {
    element.innerHTML = `
      <button type="button" class="btn btn-block upload" data-toggle="modal" data-target="#uploadBuktiModal">
        Upload Bukti Pembayaran
      </button>
  `;
  }
}