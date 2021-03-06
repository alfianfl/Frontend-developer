import { useState, useEffect } from "react";
import sayur from "../assets/img/image3.png";
import "slick-carousel/slick/slick.css";
import "slick-carousel/slick/slick-theme.css";
import "../assets/css/cardProduct.css";
import Sliderslick from "react-slick";
import { Link } from "react-router-dom";
// import { getProduct } from "../API/productAPI";
import axios from "axios";
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

function ProductCard(props) {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    axios
      .get("http://localhost:5000/product")
      .then((response) => {
        setProducts(response.data);
        console.log(response);
      })
      .catch((err) => {
        console.log(err);
      });
  }, []);
  return (
    <div>
      <section id="marketplace-product">
        <div className="container-fluid d-flex justify-content-center">
          <Sliderslick {...settingsSlick} className="slickSlider">
            {products.map((product) => (
              <Link className="link" to={`/detailproduk/${product.id_barang}`}>
                <div className="d-flex justify-content-center ">
                  <div
                    key={product.id_barang}
                    className="card mx-1"
                    style={{ width: "28rem" }}
                  >
                    {product.foto.includes("foto_barang") ? (
                      <div
                        className="thumb-img-product d-flex justify-content-center align-items-center"
                        style={{
                          backgroundImage: ` url("http://localhost:5000/uploads/${product.foto}")`,
                          height: "250px",
                          backgroundSize: "100% 100%",
                          backgroundRepeat: "no-repeat",
                        }}
                      >
                        <div className="button-beli">
                          <button className="btn ">Beli Produk</button>
                        </div>
                        {/* <img
                          className="card-img-top"
                          src={`http://localhost:5000/uploads/${product.foto}`}
                          alt="Card"
                          height="250px"
                        /> */}
                      </div>
                    ) : (
                      <img
                        height="250px"
                        className="card-img-top"
                        src={sayur}
                        alt="Card"
                      />
                    )}
                    <div className="card-body ">
                      <h5 className="card-title font-weight-bold">
                        {product.nama_barang}
                      </h5>
                      <p className="card-text">
                        <span>
                          4.6<i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                          <i class="fas fa-star"></i>
                        </span>
                      </p>
                      <p className="price">
                        <strong>Rp {product.harga_barang}/kg</strong>
                      </p>
                    </div>
                  </div>
                </div>
              </Link>
            ))}
          </Sliderslick>
        </div>
      </section>
    </div>
  );
}

export default ProductCard;
