import React from 'react'
import { useReducer } from "react"
import { useHistory } from "react-router-dom"
import axios from 'axios'

const initialState = {
    judul: "",
    isi: "",
    gambar: null,
}

const reducer = (currentState, action) => {
    switch (action.type) {
        case "judul":
            return { ...currentState, judul: action.upload };
        case "isi":
            return { ...currentState, isi: action.upload };
        case "gambar":
            return { ...currentState, gambar: action.upload };
        default:
            return currentState;
    }
}

function AddArtikel(props) {
    let history = useHistory()
    const localID = localStorage.getItem("id")

    const [artikel, dispatch] = useReducer(reducer, initialState)

    const onSubmitHandler = (e) => {
        e.preventDefault();
        const data = new FormData();
        data.append("id_user", localID);
        data.append("judul_artikel", artikel.judul);
        data.append("isi_artikel", artikel.isi);
        data.append("foto_artikel", artikel.gambar);
        console.log(localID)


        axios
            .post("http://localhost:5000/addArtikel", data)
            .then((response) => {
                alert("Artikel berhasil dibuat")
                console.log(response)
                console.log("berhasil")
                history.push("/dashboard/artikel")
            })
            .catch((err) => {
                alert("Gagal membuat artikel")
                console.log(err)
            })
    }

    return (
        <div id="content">
            <div>
                <div className="container-fluid py-5" >
                    <h1 className="text-center">
                        <strong>Artikel Baru</strong>
                    </h1>
                    <div className="form-add-thread w-100 mt-5">
                        <div className="d-flex flex-column">
                            <div className="form-group">
                                <label htmlFor="judul">Judul</label>
                                <input
                                    name="judul"
                                    type="text"
                                    value={artikel.judul}
                                    onChange={(e) =>
                                        dispatch({ type: "judul", upload: e.target.value })
                                    }
                                    className="form-control" />
                            </div>
                            <div className="form-group">
                                <label htmlFor="isi">Isi</label>
                                <textarea
                                    name="isi" id="isi" cols="30" rows="10"
                                    value={artikel.isi}
                                    onChange={(e) =>
                                        dispatch({ type: "isi", upload: e.target.value })
                                    }
                                    className="form-control"></textarea>
                            </div>
                            <div className="form-group">
                                <label htmlFor="judul">Gambar</label>
                                <input
                                    name="gambar"
                                    accept="image/*"
                                    onChange={(e) =>
                                        dispatch({
                                            type: "gambar",
                                            upload: e.target.files[0],
                                        })
                                    }
                                    type="file"
                                    className="form-control p-1 pl-5"
                                />
                            </div>
                            <button onClick={onSubmitHandler} className="btn-buat-thread">Post</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    )
}

export default AddArtikel
