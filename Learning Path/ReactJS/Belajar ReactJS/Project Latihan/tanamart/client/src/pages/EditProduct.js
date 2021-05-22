import { useReducer } from "react";
import axios from "axios";
import { useHistory } from "react-router-dom";
import { Link } from "react-router-dom";

const initialState = {
  nama_barang: "",
  harga_barang: null,
  qty: null,
  foto_barang: null,
  deskripsi: "",
};
const reducer = (currentState, action) => {
  switch (action.type) {
    case "namabarang":
      return { ...currentState, nama_barang: action.payload };
    case "hargabarang":
      return { ...currentState, harga_barang: action.payload };
    case "qty":
      return { ...currentState, qty: action.payload };
    case "fotobarang":
      return { ...currentState, foto_barang: action.payload };
    case "deskripsi":
      return { ...currentState, deskripsi: action.payload };
    default:
      return currentState;
  }
};

function EditProduk(props) {
  let history = useHistory();
  const { id_barang } = props.match.params;
  const [products, dispatch] = useReducer(reducer, initialState);

  const onSubmitHandeler = (e) => {
    e.preventDefault();
    const data = new FormData();
    data.append("id_barang", id_barang);
    data.append("nama_barang", products.nama_barang);
    data.append("harga_barang", products.harga_barang);
    data.append("foto", products.foto_barang);
    data.append("qty", products.qty);
    data.append("deskripsi", products.deskripsi);

    axios
      .post("http://localhost:5000/editProduct", data, {
        withCredentials: true,
      })
      .then((response) => {
        alert("Edit berhasil");
        window.location.href = "/toko";
        console.log(response);
      })
      .catch((err) => {
        alert("edit gagal");
        console.log(err);
      });
    history.push("/toko");
  };

  return (
    <div>
      <div
        className="container-fluid py-5"
        style={{ backgroundColor: "#E5E5E5" }}
      >
        <h1 className="text-center">
          <strong>Edit Produk</strong>
        </h1>
        <div className="row">
          <div className="col-12 px-lg-5 px-sm-0">
            <div className=" align-self-end button-edit mt-5">
              <Link to="/toko">
                <button className="btn btn-sm btn-edit-profile">Back</button>
              </Link>
            </div>
            <div className="form-add-product  w-100 mt-5 ">
              <form className="d-flex flex-column">
                <div className="form-group">
                  <label htmlFor="exampleInputEmail1">
                    <strong>Nama Produk</strong>
                  </label>
                  <input
                    name="namabarang"
                    onChange={(e) =>
                      dispatch({ type: "namabarang", payload: e.target.value })
                    }
                    value={products.nama_barang}
                    type="text"
                    className="form-control"
                  />
                </div>
                <div className="form-group">
                  <label htmlFor="exampleInputEmail1">
                    <strong>Deskripsi Produk</strong>
                  </label>
                  <textarea
                    name="deskripsi"
                    onChange={(e) =>
                      dispatch({ type: "deskripsi", payload: e.target.value })
                    }
                    value={products.deskripsi}
                    type="text"
                    className="form-control py-5"
                  />
                </div>
                <div className="form-group">
                  <label htmlFor="exampleInputEmail1">
                    <strong>Harga Barang</strong>
                  </label>
                  <input
                    name="hargabarang"
                    onChange={(e) =>
                      dispatch({ type: "hargabarang", payload: e.target.value })
                    }
                    value={products.harga_barang}
                    type="number"
                    className="form-control"
                  />
                </div>
                <div className="form-group">
                  <label htmlFor="exampleInputEmail1">
                    <strong>QTY</strong>
                  </label>
                  <input
                    name="qty"
                    onChange={(e) =>
                      dispatch({ type: "qty", payload: e.target.value })
                    }
                    value={products.qty}
                    type="number"
                    className="form-control"
                  />
                </div>
                <div className="form-group">
                  <label htmlFor="exampleInputEmail1">
                    <strong>Foto</strong>
                  </label>
                  <input
                    name="fotobarang"
                    accept="image/*"
                    onChange={(e) =>
                      dispatch({
                        type: "fotobarang",
                        payload: e.target.files[0],
                      })
                    }
                    type="file"
                    className="form-control"
                  />
                </div>
                <button
                  style={{ backgroundColor: "#184D47", color: "white" }}
                  onClick={onSubmitHandeler}
                  type="submit"
                  className="btn "
                >
                  Edit
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default EditProduk;
