import { useState, useEffect } from "react";
import axios from "axios";
import { Tooltip } from "reactstrap";
import ProductCard from "../components/ProductCard";

function PembeliInvoice(props) {
  const [invoicePembeli, setInvoicePembeli] = useState([]);
  const [tooltipOpen, setTooltipOpen] = useState(false);

  const toggle = () => setTooltipOpen(!tooltipOpen);

  useEffect(() => {
    console.log(invoicePembeli.id_toko);
    axios
      .get(`http://localhost:5000/showOrderUser/${props.idUser}`)
      .then((response) => {
        console.log(response.data);
        setInvoicePembeli(response.data);
      })
      .catch((err) => {
        console.log(err);
      });
  }, [props.idUser, invoicePembeli.id_toko]);

  const onSubmitHandler = (id) => {
    console.log(id);
    const payload = {
      id_order: id,
    };
    axios
      .post(`http://localhost:5000/productArrived`, payload)
      .then((response) => {
        console.log(response);
        alert("barang berhasil diterima!!!");
        window.location.reload();
      })
      .catch((err) => {
        console.log(err);
      });
  };
  const getComfirmation = (status, id_order) => {
    if (status === 3) {
      return (
        <>
          <button
            className="btn btn-success"
            onClick={() => onSubmitHandler(id_order)}
            id="TooltipExample"
          >
            Terima Pesanan
          </button>
          <Tooltip
            placement="right"
            isOpen={tooltipOpen}
            target="TooltipExample"
            toggle={toggle}
          >
            Terima pesanan ketika barang sudah sampai
          </Tooltip>
        </>
      );
    } else if (status === 4) {
      return (
        <button className="btn btn-success" disabled>
          Diterima
        </button>
      );
    } else {
      return null;
    }
  };
  const getStatus = (status) => {
    if (status === 3) {
      return <span style={{ color: "#eed202  " }}>Sedang dikirim</span>;
    } else if (status === 4) {
      return <span style={{ color: "green" }}>Pesanan diterima</span>;
    } else {
      return <span style={{ color: "red" }}>Tunggu komfirmasi</span>;
    }
  };
  return (
    <div className="mb-5">
      <div
        className="container-fluid p-0 py-5 px-5 "
        style={{ marginBottom: "5%" }}
      >
        <h1>Tabel Invoice Pembeli</h1>

        <div className="table-invoice" style={{ overflow: "scroll" }}>
          <table className="table table-striped">
            <thead>
              <tr>
                <th scope="col">Nama Barang</th>
                <th scope="col">Qty</th>
                <th scope="col">Total Harga</th>
                <th scope="col">Nama Toko</th>
                <th scope="col">Kontak Toko</th>
                <th scope="col">Status Pesanan</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>
              {invoicePembeli.map((order) => (
                <tr key={order.id_order}>
                  <td>{order.nama_barang}</td>
                  <td>{order.qty}</td>
                  <td>{order.total_price}</td>
                  <td>{order.nama_toko}</td>
                  <td>{order.kontak_toko}</td>
                  <td>{getStatus(order.status)}</td>
                  <td>{getComfirmation(order.status, order.id_order)}</td>
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

export default PembeliInvoice;
