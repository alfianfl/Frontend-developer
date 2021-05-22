import "../assets/css/banner_home.css";
import swal from "sweetalert";
function BannerHome() {
  const localIdUser = localStorage.getItem("id");
  const buttonToko = () => {
    if (localIdUser) {
      window.location.href = "/toko";
    } else {
      swal({
        title: "Kamu Harus Login Terlebih Dahulu",
        icon: "warning",
        dangerMode: true,
      });
    }
  };
  return (
    <div>
      <section id="banner-home">
        <div className="banner mt-5  py-5">
          <h1>Anda punya produk?</h1>
          <p>ingin menjual hasil tani?</p>

          <button onClick={buttonToko} className="btn btn-toko">
            Buat Toko
          </button>
        </div>
      </section>
    </div>
  );
}

export default BannerHome;
