import { useState, useEffect } from "react";
import axios from "axios";
import ProductCard from "../components/ProductCard";

function TokoInvoice(props) {
  const [invoiceToko, setInvoiceToko] = useState([]);
  const [idToko, setIdToko] = useState(null);

  useEffect(() => {
    axios
      .get(`http://localhost:5000/tokoByUser/${props.idUser}`)
      .then((response) => {
        setIdToko(response.data.id_toko);
      })
      .catch((err) => {
        console.log(err);
      });
    axios
      .get(`http://localhost:5000/tokoInvoice/${idToko}`)
      .then((response) => {
        console.log(response.data);
        setInvoiceToko(response.data);
      })
      .catch((err) => {
        console.log(err);
      });
  }, [props.idUser, idToko]);

  const onSubmitHandler = (id) => {
    console.log(id);
    const payload = {
      id_order: id,
    };
    axios
      .post(`http://localhost:5000/sendProduct`, payload)
      .then((response) => {
        console.log(response);
        alert("barang berhasil dikirim!!!");
        window.location.reload();
      })
      .catch((err) => {
        console.log(err);
      });
  };
  return (
    <div>
      <div
        className="container-fluid p-0 py-5 px-5"
        style={{ marginBottom: "5%" }}
      >
        <h1>Tabel Invoice Penjualan</h1>
        <div className="table-invoice" style={{ overflow: "scroll" }}>
          <table className="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nama</th>
                <th scope="col">Alamat</th>
                <th scope="col">Barang</th>
                <th scope="col">Qty</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Status Pesanan</th>
              </tr>
            </thead>
            <tbody>
              {invoiceToko.map((order) => (
                <tr>
                  <td>{order.nama}</td>
                  <td>{order.alamat}</td>
                  <td>{order.nama_barang}</td>
                  <td>{order.qty}</td>
                  <td>{order.total_price}</td>
                  <td>
                    {order.status === 2 ? (
                      <button
                        style={{ color: "white" }}
                        className="btn btn-warning"
                        onClick={() => onSubmitHandler(order.id_order)}
                      >
                        Kirim Barang
                      </button>
                    ) : (
                      <button
                        style={{ color: "white" }}
                        disabled
                        className="btn btn-warning"
                      >
                        Terkirim
                      </button>
                    )}
                  </td>
                </tr>
              ))}
            </tbody>
          </table>
        </div>
      </div>
      <h1 className="ml-lg-5 ml-0">Produk Pilihan</h1>
      <ProductCard />
    </div>
  );
}

export default TokoInvoice;
