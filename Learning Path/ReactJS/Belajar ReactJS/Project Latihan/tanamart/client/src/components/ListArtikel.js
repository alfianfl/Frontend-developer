import { useState } from "react";
import sayur from "../assets/img/sayur2.png";

function ListArtikel(props) {
  return (
    <div className="row mt-5">
      <div className="col-12">
          <div className="list-artikel px-3 mt-2 w-100 d-flex">
            <div className="thumb-image w-40">
              <img className="img-fluid" width="150px" alt="petani" src={`http://localhost:5000/uploads/${props.gambar}`} />
            </div>
            <div className="artikel-title ml-2 w-50">
              <strong>
                {props.judul}
              </strong>
              <br></br>
              <strong className="d-none d-sm-block" style={{ color: "grey" }}>
                10 menit yang lalu
              </strong>
            </div>
          </div>
        
      </div>
    </div>
  );
}

export default ListArtikel;
