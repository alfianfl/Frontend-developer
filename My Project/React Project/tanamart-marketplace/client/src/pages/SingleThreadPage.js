import React, { useState, useEffect } from "react";
import { Link } from "react-router-dom";
import "../assets/css/singleforum.css";
import axios from "axios";
import CommentCard from '../components/CommentCard';

function SingleThreadPage(props) {
  const { idThreads } = props.match.params;
  const [user, setUser] = useState([]);
  const [single, setSingle] = useState([]);
  const [comment, setComment] = useState("");
  const [allComments, setAllComments] = useState([]);
  // const [userComment, setUserComment] = useState()

  useEffect(() => {
    axios
      .get(`http://localhost:5000/threadsDetails/${idThreads}`)
      .then((response) => {
        console.log("mencari detail thread");
        console.log(response.data);
        setSingle(response.data);
      })
      .catch((err) => {
        console.log(err);
      });
    axios
      .get(`http://localhost:5000/biodataByUser/${single.id_user}`)
      .then((response) => {
        console.log("mencari nama");
        console.log(response.data);
        setUser(response.data.nama);
      })
      .catch((err) => {
        console.log(err);
      });
    axios
      .get(`http://localhost:5000/getCommentByThreads/${idThreads}`)
      .then((response) => {
        setAllComments(response.data);
        console.log("allcomment");
      })
      .catch((err) => {
        console.log(err);
      });
  }, [idThreads, single.id_user]);

  const inputHandler = (e) => {
    e.preventDefault();
    setComment(e.target.value);
  };

  const onSubmitHandler = (e) => {
    e.preventDefault();
    const data = {
      id_user: props.idUser,
      id_threads: idThreads,
      isi_comment: comment,
    };

    console.log(data);

    axios
      .post("http://localhost:5000/addComment", data)
      .then((response) => {
        // alert("berhasil menambahkan komentar")
        console.log("membuat komen");
        console.log(response);
        // history.push(`/singleThread/${idThreads}`)
        window.location.reload(false);
      })
      .catch((err) => {
        alert("gagal menambahkan komentar");
        console.log(err);
      });
  };

  return (
    <section id="forum">
      <div style={{ backgroundColor: "#F1F1F1" }}>
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
              </div> */}
            </div>
            <div className="col-lg-8 col-sm-10 col-12  ">
              <section id="forum-card">
                <div className="thread-body">
                  <div>
                    <h5>{single.judul_threads}</h5>
                  </div>
                  <div className="d-flex" style={{ color: "grey" }}>
                    <p>Penulis: {user} |</p>
                    <p>| {single.timestamp}</p>
                  </div>
                  {single.foto_threads ? (
                    <div>
                      <img
                        className="thumb-forum"
                        src={`http://localhost:5000/uploads/${single.foto_threads}`}
                        alt="forum"
                      />
                    </div>
                  ) : null}
                  {single.isi_threads ? (
                    <div>
                      <p>{single.isi_threads}</p>
                    </div>
                  ) : null}
                </div>
              </section>
              <div className="komentar-body">
                <h5>Tambah Komentar</h5>
                <form className="form d-flex" onSubmit={onSubmitHandler}>
                  <input
                    type="text"
                    value={comment}
                    onChange={inputHandler}
                    className="form-control align-self-center"
                  />
                  <button type="submit" className="btn-send">
                    <i className="fas fa-paper-plane"></i>
                  </button>
                </form>
              </div>
              {allComments
                .slice(0)
                .reverse()
                .map((isi) => (
                  <CommentCard idUser={isi.id_user} isiComment={isi.isi_comment}/>
                ))}
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}

export default SingleThreadPage;
