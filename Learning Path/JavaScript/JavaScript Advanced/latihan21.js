// const search = document.querySelector('.button-search');

// search.addEventListener('click', function(){
//     const input = document.querySelector('.input-keyword')
//     //cara memanggil fetch
//     fetch('http://www.omdbapi.com/?apikey=d63b87c&s='+ input.value)
//      .then(response => response.json()) // masih berupa promise
//      .then(response => {
//         let cards = '';
//         const movie = response.Search;

//         movie.forEach(m => {
//             cards += card(m);
//         });
//         const movieContainer = document.querySelector('.movie-container');
//         movieContainer.innerHTML = cards;

//     //show details
//     const details = document.querySelectorAll('.movieDetail');
//     details.forEach(detail => {
//         detail.addEventListener('click', function(){
//             const imdbid = this.dataset.imdbid;
  
//             fetch('http://www.omdbapi.com/?apikey=d63b87c&i='+ imdbid)
//              .then(response => response.json())
//              .then(results => {
//                 const movieDetail = detailmovie(results);
//                 const modalbody = document.querySelector('.modal-body');
//                 modalbody.innerHTML = movieDetail;
//              });

//         });
//     });
//      });
// });
const search = document.querySelector('.button-search');
search.addEventListener('click', async function(){ 
  try{
    const input = document.querySelector('.input-keyword');
    const movie = await getMovie(input.value); 
    updateUI(movie);
  }catch(err){
    alert(err)
  }
});

document.addEventListener('click' ,async function(e){
    if(e.target.classList.contains('movieDetail')){
        const imdbid = e.target.dataset.imdbid;
        const movieDetail = await getDetail(imdbid);
        updateUIDetail(movieDetail);
    };
});

function getDetail(keyword){
    return fetch('http://www.omdbapi.com/?apikey=d63b87c&i='+ keyword)
        .then(response => response.json())
        .then(results => results );
}

function updateUIDetail(results){
    const movieDetail = detailmovie(results);
    const modalbody = document.querySelector('.modal-body');
    modalbody.innerHTML = movieDetail;
}

function getMovie(keyword){
    return fetch('http://www.omdbapi.com/?apikey=d63b87c&s='+ keyword)
     .then(response => {
        if(response.ok ===false){
          throw new Error(response.statusText)
        }
       return response.json()
     }) // masih berupa promise
     .then(response => {
      if(response.Response === 'False'){
        throw new Error(response.Error)
      }
      return response.Search;
    });
}

function updateUI(movies){
    let cards = '';
        movies.forEach(m => {
            cards += card(m);
        });
        const movieContainer = document.querySelector('.movie-container');
        movieContainer.innerHTML = cards;
}


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