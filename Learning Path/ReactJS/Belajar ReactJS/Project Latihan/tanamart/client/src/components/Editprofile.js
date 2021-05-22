import { useState } from "react";
import { Link } from "react-router-dom";
import { useReducer } from "react";
import axios from "axios";
import swal from "sweetalert";

const initialState = {
  nama: "",
  alamat: "",
  profile_pict: null,
  no_hp: "",
};
const reducer = (currentState, action) => {
  switch (action.type) {
    case "nama":
      return { ...currentState, nama: action.payload };
    case "alamat":
      return { ...currentState, alamat: action.payload };
    case "profile_pict":
      return { ...currentState, profile_pict: action.payload };
    case "no_hp":
      return { ...currentState, no_hp: action.payload };
    default:
      return currentState;
  }
};
function Editprofile(props) {
  const [image, setImage] = useState({ preview: "", raw: "" });
  const [biodata, dispatch] = useReducer(reducer, initialState);

  const handleChange = (e) => {
    dispatch({ type: "profile_pict", payload: e.target.files[0] });
    if (e.target.files.length) {
      setImage({
        preview: URL.createObjectURL(e.target.files[0]),
        raw: e.target.files[0],
      });
    }
  };
  const submitProfile = (e) => {
    const idUser = props.idUser;
    const data = new FormData();
    data.append("id_user", idUser);
    data.append("nama", biodata.nama);
    data.append("alamat", biodata.alamat);
    data.append("profile_pict", biodata.profile_pict);
    data.append("no_hp", biodata.no_hp);
    axios
      .post("http://localhost:5000/addBiodata", data)
      .then((response) => {
        console.log(response);
        swal("upload berhasil");
        window.location.reload();
      })
      .catch((err) => {
        swal("upload gagal");
        console.log(err);
        console.log(idUser);
      });
  };

  return (
    <section id="edit-profile">
      <div className="container-fluid py-5">
        <div className="row">
          <div className="col-12">
            <div className=" align-self-end button-edit ml-lg-5 ml-sm-0 mt-2">
              <Link to="profile">
                <button className="btn btn-sm btn-edit-profile">Back</button>
              </Link>
            </div>
            <div className="content-1-profile w-100 d-flex flex-column">
              {image.preview ? (
                <div className="thumb-img m-auto">
                  <img
                    src={image.preview}
                    alt="dummy"
                    width="300"
                    height="300"
                  />
                </div>
              ) : (
                <div className="thumb-img m-auto">
                  <img src="#" alt="dummy" width="300" height="300" />
                </div>
              )}
              <div className="button-edit mx-auto mt-2">
                <label htmlFor="upload-button">
                  <div className="btn btn-sm btn-edit-profile"> Upload</div>
                </label>
                <input
                  type="file"
                  id="upload-button"
                  hidden
                  onChange={handleChange}
                />
              </div>
            </div>
          </div>
        </div>
        <div className="row">
          <div className="col-12">
            <div className="form-section px-lg-5 px-sm-0">
              <form className="d-flex flex-column">
                <div className="form-group">
                  <label htmlFor="exampleInputEmail1">
                    <strong>Nama</strong>
                  </label>
                  <input
                    onChange={(e) =>
                      dispatch({ type: "nama", payload: e.target.value })
                    }
                    type="text"
                    className="form-control"
                    id="exampleInputNama"
                    aria-describedby="Name"
                    placeholder="Enter Name"
                  />
                </div>
                <div className="form-group">
                  <label htmlFor="exampleInputEmail1">
                    <strong>Alamat</strong>
                  </label>
                  <input
                    onChange={(e) =>
                      dispatch({ type: "alamat", payload: e.target.value })
                    }
                    type="text"
                    className="form-control"
                    id="exampleInputAlamat"
                    aria-describedby="Alamat"
                    placeholder="Enter Address"
                  />
                </div>
                <div className="form-group">
                  <label htmlFor="exampleInputEmail1">
                    <strong>No HP</strong>
                  </label>
                  <input
                    onChange={(e) =>
                      dispatch({ type: "no_hp", payload: e.target.value })
                    }
                    type="number"
                    className="form-control"
                    id="exampleInputNo"
                    aria-describedby="NoTelp"
                    placeholder="Enter No Telp"
                  />
                </div>
                <div className=" align-self-end button-edit mt-2">
                  <Link to="profile">
                    <button
                      onClick={submitProfile}
                      className="btn btn-sm btn-edit-profile"
                    >
                      Simpan
                    </button>
                  </Link>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  );
}
export default Editprofile;
