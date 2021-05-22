import ListDiskon from "../components/ListDiskon";
import ProductCard from "../components/ProductCard";
import ListKategori from "../components/ListKategori";

function ListProduk() {
  return (
    <div className="mb-5">
      {/* detail diskon pada page list Produk */}
      <ListDiskon />

      {/* List Kategori */}
      <ListKategori />
      {/* detail product */}
      <h1 className="ml-5 mt-5">Tanaman Hias Pilihan</h1>
      <ProductCard />

      {/* detail product */}
      <h1 className="ml-5 mt-5">Tanaman Obat Pilihan</h1>
      <ProductCard />
    </div>
  );
}

export default ListProduk;
