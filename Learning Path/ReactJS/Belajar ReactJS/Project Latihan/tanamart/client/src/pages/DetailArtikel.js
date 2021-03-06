import { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import axios from "axios";

function DetailArtikel(props) {
  const { id_artikel } = props.match.params;

  const [artikel, setArtikel] = useState([]);
  const [single, setSingle] = useState([]);

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
    axios
      .get(`http://localhost:5000/artikelDetails/${id_artikel}`)
      .then((response) => {
        console.log(response);
        setSingle(response.data);
      })
      .catch((err) => {
        console.log(err);
      });
  }, [id_artikel]);

  return (
    <div
      className="container-fluid py-5"
      style={{ backgroundColor: "#E5E5E5" }}
    >
      <Link to="artikel">
        <button className="btn btn-warning mb-3" style={{ color: "white" }}>
          Back
        </button>
      </Link>
      <div className="row">
        <div className=" col-12 col-lg-8">
          <div className="thumb-detail-artikel w-100 p-3">
            <strong>{single.judul_artikel}</strong> <br></br>
            <strong style={{ color: "grey", fontSize: "15px" }}>
              Penulis: Admin | {single.timestamp}
            </strong>
            <div className="thumb-image mt-3">
              <img
                className="img-fluid"
                alt="petani"
                src={`http://localhost:5000/uploads/${single.foto_artikel}`}
              />
            </div>
            <div className="text-artikel">
              <p className="text-justify mt-3">{single.isi_artikel}</p>
            </div>
          </div>
        </div>
        <div className=" col-12 col-lg-4 p-0">
          {artikel.map((list) => (
            <div className=" list-artikel px-3 mt-2 w-100 ">
              <div className="thumb-image w-30">
                <img
                  className="img-fluid"
                  width="150px"
                  alt="petani"
                  src={`http://localhost:5000/uploads/${list.foto_artikel}`}
                />
              </div>
              <div className="artikel-title ml-2 w-50">
                <strong>{list.judul_artikel}</strong>
                <br></br>
                <strong style={{ color: "grey" }}>10 menit yang lalu</strong>
              </div>
            </div>
          ))}
        </div>
      </div>
    </div>
  );
}

export default DetailArtikel;
