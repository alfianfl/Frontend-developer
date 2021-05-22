import React, { useState, useEffect } from 'react'
import '../assets/css/forum.css'
import ForumCard from '../components/ForumCard'
import TrendCard from '../components/TrendCard'
import { Link } from "react-router-dom"
import axios from "axios"

function ForumPage() {
    const [thread, setThread] = useState([])
    useEffect(() => {
        axios
            .get("http://localhost:5000/getThreads")
            .then((response) => {
                setThread(response.data);
                console.log(response)
            })
            .catch((err) => {
                console.log(err)
            })
    }, [])

    return (
        <section id="forum">
            <div style={{ backgroundColor: "#F1F1F1", height: "100%", minHeight: "100vh" }}>
                <div className="container-fluid py-5 px-5">
                    <div className="row flex-row-reverse d-flex justify-content between">
                        <div className="col-lg-4 col-sm-2 col-12">
                            <Link to="/addThread">
                                <button className="btn-buat-thread">Buat Thread</button>
                            </Link>
                            {/* <div className="trend">
                                <div className="mt-3">
                                    <h4>Yang lagi ngetrend</h4>
                                </div>
                                
                                {thread.slice(0, 4).map((thread) => (
                                    <TrendCard judul={thread.judul_threads}></TrendCard>
                                ))}
                            </div> */}
                        </div>
                        <div className="col-lg-8 col-sm-10 col-12  ">
                            {thread.slice(0).reverse().map((thread) => (
                                <ForumCard 
                                    idThreads={thread.id_threads} 
                                    judul={thread.judul_threads} 
                                    gambar={thread.foto_threads} 
                                    isi={thread.isi_threads} />
                            ))}
                        </div>

                    </div>
                </div>
            </div>
        </section>
    )
}

export default ForumPage
