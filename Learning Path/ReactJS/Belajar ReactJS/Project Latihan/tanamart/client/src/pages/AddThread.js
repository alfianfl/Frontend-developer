import React from 'react'
import '../assets/css/addThread.css'
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
function AddThread(props) {
    let history = useHistory();
    
    const [thread, dispatch] = useReducer(reducer, initialState)
    
    const onSubmitHandler = (e) => {
        e.preventDefault();
        const data = new FormData();
        data.append("id_user", props.idUser);
        data.append("judul_threads", thread.judul);
        data.append("isi_threads", thread.isi);
        data.append("foto_threads", thread.gambar);
        console.log(props.idUser)
        

        axios
            .post("http://localhost:5000/addThreads", data)
            .then((response) => {
                alert("thread berhasil dibuat")
                console.log(response)
                history.push("/forum")
            })
            .catch((err) => {
                alert("gagal membuat thread")
                console.log(err)
            })
    }

    return (
        <section id="add-thread">
            <div className="container-fluid py-5" style={{ backgroundColor: "#E5E5E5" }}>
                <h1 className="text-center">
                    <strong>Thread Baru</strong>
                </h1>
                <div className="form-add-thread w-100 mt-5">
                    <div className="d-flex flex-column">
                        <div className="form-group">
                            <label htmlFor="judul">Judul</label>
                            <input
                                name="judul"
                                type="text"
                                value={thread.judul}
                                onChange={(e) =>
                                    dispatch({ type: "judul", upload: e.target.value })
                                }
                                className="form-control" />
                        </div>
                        <div className="form-group">
                            <label htmlFor="isi">Isi</label>
                            <textarea
                                name="isi" id="isi" cols="30" rows="10"
                                value={thread.isi}
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
        </section>
    )
}

export default AddThread
