import { useState, useEffect } from "react";
import sayur from "../assets/img/image3.png";
import "slick-carousel/slick/slick.css";
import axios from "axios";
import "slick-carousel/slick/slick-theme.css";
import "../assets/css/cardArtikel.css";
import Sliderslick from "react-slick";
const settingsSlick = {
  infinite: true,
  speed: 500,
  slidesToShow: 4,
  slidesToScroll: 4,
  responsive: [
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 3,
        slidesToScroll: 3,
        infinite: true,
        dots: true,
      },
    },
    {
      breakpoint: 600,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 2,
        initialSlide: 2,
      },
      dots: false,
    },
    {
      breakpoint: 480,
      settings: {
        slidesToShow: 1,
        slidesToScroll: 1,
      },
      dots: false,
    },
  ],
};
function ArtikelCard() {
  const [artikel, setArtikel] = useState([{}, {}, {}]);
  useEffect(() => {
    axios
      .get("http://localhost:5000/getArtikel")
      .then((response) => {
        setArtikel(response.data);
      })
      .catch((err) => {
        console.log(err);
      });
  }, []);
  return (
    <div>
      <section id="artikel-terbaru">
        <h2 className="ml-5 mt-5"> Artikel terbaru</h2>
        <div className="container-fluid d-flex mb-5 justify-content-center">
          <Sliderslick {...settingsSlick} className="slickSlider">
            {artikel.map((a) => (
              <div className="d-flex justify-content-center mt-3">
                <div className="card mx-1" style={{ width: "18rem" }}>
                  <img className="card-img-top" src={sayur} alt="Card" />
                  <div className="card-body">
                    <h5 className="card-title font-weight-bold">
                      {a.judul_artikel}
                    </h5>
                    <p className="card-text text-secondary">{a.isi_artikel}</p>
                  </div>
                </div>
              </div>
            ))}
          </Sliderslick>
        </div>
      </section>
    </div>
  );
}

export default ArtikelCard;
