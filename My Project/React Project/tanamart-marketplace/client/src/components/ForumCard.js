import React from 'react'
import '../assets/css/cardForum.css'
import { Link } from "react-router-dom"
// import sayur from '../assets/img/image3.png'

function ForumCard(props) {
    return (
        <section id="forum-card">
            <Link
                className="link"
                to={`/singleThread/${props.idThreads}`}>
                <div>
                    {props.judul ? (
                        <div>
                            <h5>{props.judul}</h5>
                        </div>
                    ) : null}
                    {props.gambar ? (
                        <div>
                            <img className="thumb-forum" src={`http://localhost:5000/uploads/${props.gambar}`} alt="forum" />
                        </div>
                    ) : null}
                    {props.isi ? (
                        <div>
                            <p>{props.isi}</p>
                        </div>
                    ) : null}

                    <div className="d-flex">
                        <div className="m-2">
                            <h6>Komentar</h6>
                        </div>
                        <div className="m-2">
                            <h6>Share</h6>
                        </div>
                    </div>
                </div>
            </Link>

        </section>
    )
}

export default ForumCard
