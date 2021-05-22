import { useState, useEffect } from "react";
import "../assets/css/mainArtikel.css";
import { Link } from "react-router-dom";
import ListArtikel from "../components/ListArtikel";
import axios from "axios"

function Artikel() {
  const [artikel, setArtikel] = useState([])

  useEffect(() => {
    axios
      .get("http://localhost:5000/getArtikel")
      .then((response) => {
        setArtikel(response.data);
        console.log(response);
      })
      .catch((err) => {
        console.log(err);
      });
  }, [])

  // console.log(artikel)

  return (
    <div>
      <section id="choice-artikel">
        <div
          className="container-fluid py-5"
          style={{ backgroundColor: "#E5E5E5" }}
        >
          <h1>Artikel Pilihan Dari Tanamart</h1>
          <div className="row">
            <div className="col-12 col-lg-8">
              {artikel.slice(0, 1).map((single) => (
                <Link className="link" to={`/detailArtikel/${single.id_artikel}`} >
                  <div className="thumb-detail-artikel w-100 p-3">
                    <div className="thumb-image">
                      <img className="img-fluid" alt="petani" src={`http://localhost:5000/uploads/${single.foto_artikel}`} />
                    </div>
                    <strong>{single.judul_artikel}</strong>
                  </div>
                </Link>
              ))}
            </div>
            <div className=" col-12 col-lg-4 p-0">
              {artikel.map((list) => (
                <div key={list.id_artikel} className=" list-artikel px-3 mt-2 w-100 ">
                  <div className="thumb-image w-30">
                    <img className="img-fluid" width="150px" alt="petani" src={`http://localhost:5000/uploads/${list.foto_artikel}`} />
                  </div>
                  <div className="artikel-title ml-2 w-50">
                    <strong>{list.judul_artikel}</strong>
                    <br></br>
                    <strong style={{ color: "grey" }}>
                      10 menit yang lalu
                    </strong>
                  </div>
                </div>
              ))}
            </div>
          </div>
          <h1>Highlighted News</h1>
          {artikel.map((list) => (
            <ListArtikel judul={list.judul_artikel} gambar={list.foto_artikel} />
          ))}
        </div>
      </section>
    </div>
  );
}

export default Artikel;
