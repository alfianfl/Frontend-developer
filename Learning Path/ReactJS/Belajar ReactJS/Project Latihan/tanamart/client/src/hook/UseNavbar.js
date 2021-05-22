import { useState } from "react";
import { Link } from "react-router-dom";

function useNavbar() {
  const [modal, setModal] = useState(false);

  const [loggedIn, setLoggedIn] = useState(false);
  const [appState] = useState({
    activeObjects: null,
    objects: [
      {
        id: (
          <div className="input-search">
            <form className="form-inline  my-lg-0">
              <div className="form-group input-group has-search">
                <span className="fa fa-search form-control-feedback"></span>
                <input
                  type="text"
                  className="form-control"
                  placeholder="Cari apa saja"
                  style={{ borderRadius: "50px", fontSize: "14px" }}
                  aria-label="Large"
                  aria-describedby="inputGroup-sizing-sm"
                />
              </div>
            </form>
          </div>
        ),
      },
      {
        id: (
          <Link className="nav-link" to="/listProduk">
            Produk
          </Link>
        ),
      },
      {
        id: (
          <Link className="nav-link" to="/forum">
            Forum
          </Link>
        ),
      },
      {
        id: (
          <Link className="nav-link" to="/videoPage">
            Video
          </Link>
        ),
      },
      {
        id: (
          <Link className="nav-link" to="/artikel">
            Artikel
          </Link>
        ),
      },
    ],
  });
  const toggle = () => {
    setModal(!modal);
  };

  const loggedInHandler = () => {
    setLoggedIn(true);
    console.log(loggedIn);
  };
  return [appState, toggle, modal, loggedInHandler, loggedIn];
}

export default useNavbar;
