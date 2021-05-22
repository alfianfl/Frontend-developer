import React, { useState, useEffect } from 'react'
import { Link } from "react-router-dom"
import axios from "axios"

function ArtikelAdmin() {
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

    return (
        <div id="content">
            <div className="d-flex flex-column mr-5">
                <Link to="/dashboard/artikel/add">
                    <button className="btn-buat-thread" style={{ width: "300px" }}>Buat Artikel Baru</button>
                </Link>

                <div className="cart-header">
                    <div className="row d-flex">
                        <div className="col-1">No</div>
                        <div className="col-8 text-left">Judul Artikel</div>
                        <div className="col-2">Aksi</div>
                    </div>
                </div>

                <div className="cart-body mt-2">
                    {artikel.map((hasil, index) => (
                        <div className="row d-flex">
                            <div className="col-1">{index + 1}</div>
                            <div className="col-8 text-left">{hasil.judul_artikel}</div>
                            <div className="col-2">
                                <button className="btn-edit">Edit</button>
                                <span> </span>
                                <button className="btn-hapus">Hapus</button>
                            </div>
                        </div>
                    ))}
                </div>
            </div>
        </div>
    )
}

export default ArtikelAdmin
