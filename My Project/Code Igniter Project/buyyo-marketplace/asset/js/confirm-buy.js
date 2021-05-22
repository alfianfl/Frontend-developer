window.addEventListener('DOMContentLoaded', () => {


  $('.buynow').on('click', function (event) {
    event.preventDefault();

    // const name = $(this).data('title');
    const href = $(this).attr('href');

    swalBuy(href);

  });

  // Swal Buy Function
  function swalBuy(href) {
    Swal.fire({
      title: 'Beli paket tryout?',
      icon: 'question',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Beli',
      cancelButtonText: 'Kembali'
    }).then((result) => {
      if (result.value) {
        document.location.href = href;
      }
    });
  }


});