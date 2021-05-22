// $('.button-search').on('click', function(){

//     $.ajax({
//         url: 'http://www.omdbapi.com/?apikey=d63b87c&s=' + $('.input-keyword').val(),
//         success: results => {
//             const movies = results.Search;
//             let cards = '';
    
//             movies.forEach( m => {
//                 cards += card(m);
//             });
    
//             $('.movie-container').html(cards);
//             $('.movieDetail').on('click',function(){
//                 $.ajax({
//                     url: 'http://www.omdbapi.com/?apikey=d63b87c&i=' + $(this).data('imdbid'),
//                     success: results => {
//                     const movieDetail = detail(results);
    
//                         $('.modal-body').html(movieDetail);
//                     },
//                     error: e => e.responseText
//                 });  
//             });
    
    
//         },
//         error: e => e.responseText
//     })

// });

//jika menggunakan fetch
const button = document.querySelector('.button-search');

button.addEventListener('click', function(){
  const input = document.querySelector('.input-keyword');
  fetch('http://www.omdbapi.com/?apikey=d63b87c&s=' + input.value)
    .then(response => response.json())
    .then(response=> {
      const movie = response.Search;
      let cards ='';
      movie.forEach(m => {
        cards += card(m);
      });
      const movieContainer = document.querySelector('.movie-container');

      movieContainer.innerHTML = cards;

      const movieDetail = document.querySelectorAll('.movieDetail');
      movieDetail.forEach(m => {
        m.addEventListener('click', function(){
          const imdbid = m.dataset.imdbid;
          fetch('http://www.omdbapi.com/?apikey=d63b87c&i=' + imdbid )
           .then(response=>response.json())
           .then(results =>{
              const modalBody = document.querySelector('.modal-body')
              const detailMovies = detailmovie(results);
              
              modalBody.innerHTML = detailMovies;
           });
        });
      })
    });
});

function card(m){
    return `<div class="col-md-4 my-3">
    <div class="card" style="width: 18rem;">
      <img src="${m.Poster}" class="card-img-top img-card " >
      <div class="card-body">
        <h6 class="card-title">${m.Title}</h6>
        <h6 class="card-subtitle mb-2 text-muted">${m.Year}</h6>
        <a href="#" class="btn btn-primary movieDetail" data-toggle="modal" data-target="#moviedetailmodal" data-imdbid="${m.imdbID}">Show Detail</a>
      </div>
    </div>
  </div>`;
};

function detailmovie(results){
    return `
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">
          <img src="${results.Poster}" class="img-fluid">
        </div>
        <div class="col">
          <ul class="list-group">
            <li class="list-group-item"><h4>Title</h4></li>
            <li class="list-group-item"><strong>Sutradara :</strong>${results.Director}</li>
            <li class="list-group-item"><strong>Actors    :</strong>${results.Actors}</li>
            <li class="list-group-item"><strong>writer    :</strong>${results.Writer}</li>
            <li class="list-group-item"><strong>Plot      :</strong><br>${results.Plot}</li>
          </ul>
        </div>
      </div>
    </div>`;
}