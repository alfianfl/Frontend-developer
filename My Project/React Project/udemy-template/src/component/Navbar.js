import "../assets/css/navbar.css";
import img from "../assets/img/Logo.svg";
import { Link, useHistory } from "react-router-dom";
import Register from "./Register";
import UseNavbar from "../hook/UseNavbar";
import { Button, Modal, ModalHeader, ModalBody, ModalFooter } from "reactstrap";
import UseLogin from "../hook/UseLogin";
import "../assets/css/modals.css";
import { loginAPI } from "../API/authAPI";
import { useState, useEffect } from "react";
import swal from "sweetalert";
import Cookies from "js-cookie";
import "../assets/css/navMobile.css";
import {
  Dropdown,
  DropdownToggle,
  DropdownMenu,
  DropdownItem,
} from "reactstrap";

function Navbar(props) {
  let history = useHistory();
  const [appState, toggles, toggleLogin, modalLogin, modal] = UseNavbar();
  const [dropdownOpenProfile, setDropdownOpenProfile] = useState(false);
  const [toggleNav, setToggleNav] = useState(false);
  const [opacity, setOpacity] = useState(false);
  const toggleProfile = () => setDropdownOpenProfile((prevState) => !prevState);
  const [username, password, usernameHandler, passwordHandler] = UseLogin();
  const [userRole, setUserRole] = useState(() => {
    const localData = localStorage.getItem("role");
    return localData ? JSON.parse(localData) : null;
  });
  const [userId, setUserId] = useState(() => {
    const localData = localStorage.getItem("id");
    return localData ? JSON.parse(localData) : null;
  });
  const [email, setEmail] = useState(() => {
    const localData = localStorage.getItem("email");
    return localData ? JSON.parse(localData) : null;
  });
  const [jwt, setJwt] = useState(() => {
    const cookie = Cookies.get("jwt");
    return cookie ? cookie : false;
  });

  // post login
  const login = () => {
    const payload = {
      email: username,
      password: password,
    };
    loginAPI
      .post("/login", payload)
      .then((response) => {
        const passErr = response.data.passwordErrors;
        if (response.data.user) {
          if (passErr) {
            console.log(passErr);
            alert(passErr);
          } else {
            swal("Selamat Anda Berhasil Login");
            console.log(response);
            setUserRole(response.data.role);
            setUserId(response.data.user);
            setEmail(response.data.email);
            setJwt(response.data.jwt);
            if (userRole === 1) {
              history.push("/dashboard");
            }
          }
        } else {
          console.log(response.data.emailErrors);
          alert(response.data.emailErrors);
        }
      })
      .catch((err) => {
        console.log(err);
      });
  };

  const enterSumbit = (e) => {
    if (e.keyCode === 13) {
      console.log("enter login");
      login();
      toggleLogin();
    }
  };

  useEffect(() => {
    props.idUser(userId);
    props.roleUser(userRole);
    if (jwt === false && userId == null && email == null) {
      Cookies.remove("jwt", { path: "" });
      localStorage.clear();
    } else {
      Cookies.set("jwt", jwt, { path: "" });
      localStorage.setItem("id", JSON.stringify(userId));
      localStorage.setItem("email", JSON.stringify(email));
      localStorage.setItem("role", JSON.stringify(userRole));
    }
  }, [userId, props, jwt, email, userRole]);

  const toggleTruncatedNav = () => {
    if (opacity == false) {
      setToggleNav(!toggleNav);
      setOpacity(true);
    } else {
      setToggleNav(!toggleNav);
      setOpacity(false);
    }
  };
  // logout handler
  const logoutHandler = () => {
    localStorage.clear();
    window.location.href = "/";
    Cookies.remove("jwt", { path: "" });
  };

  return (
    <>
      <div>
        <nav
          className="navbar navbar-desktop navbar-expand"
          style={{ zIndex: "2" }}
        >
          <div className="collapse navbar-collapse " id="navbarTogglerDemo01">
            <ul className=" navbar-nav d-flex align-items-center justify-content-between">
              <li className="nav-item ">
                <Link className="navbar-brand " to="/">
                  <img src={img} alt="img" />
                </Link>
              </li>
              {appState.objects.map((navLink) => (
                <li className="nav-item mr-3">{navLink.id}</li>
              ))}
              <li className="nav-item mr-3">
                <Link className="nav-link" to="/checkout">
                  <i
                    className="fas fa-shopping-cart"
                    style={{ fontSize: "18px" }}
                  ></i>
                </Link>
              </li>
              {userId === null ? (
                <li className="nav-item">
                  <div className="udlite-btn ">
                    <button
                      className="btn btn-login mx-1 "
                      onClick={toggleLogin}
                      type="button"
                    >
                      {" "}
                      <strong>Login</strong>
                    </button>
                    <button
                      className="btn  mx-1"
                      onClick={toggles}
                      type="button"
                    >
                      {" "}
                      <strong>Daftar</strong>{" "}
                    </button>
                  </div>
                </li>
              ) : (
                <Dropdown isOpen={dropdownOpenProfile} toggle={toggleProfile}>
                  <DropdownToggle color="">
                    <Link className="nav-link" to="#">
                      <img
                        width="30px"
                        height="30px"
                        src="https://sunnybrook.ca/uploads/1/programs/trauma-emergency-care/rtbc/anonymous3.png"
                        alt="profile"
                      />
                    </Link>
                  </DropdownToggle>
                  <DropdownMenu right className="dropdown-menu">
                    <Link
                      style={{ textDecoration: "none", color: "black" }}
                      to="/profile"
                    >
                      <DropdownItem>Profile, {userId}</DropdownItem>
                    </Link>
                    <Link
                      style={{ textDecoration: "none", color: "black" }}
                      to="/toko"
                    >
                      <DropdownItem>Toko</DropdownItem>
                    </Link>
                    <Link
                      style={{ textDecoration: "none", color: "black" }}
                      to="/tokoInvoice"
                    >
                      <DropdownItem>Invoice Penjualan</DropdownItem>
                    </Link>
                    <Link
                      style={{ textDecoration: "none", color: "black" }}
                      to="/invoicePembeli"
                    >
                      <DropdownItem>Invoice Pembelian</DropdownItem>
                    </Link>
                    <DropdownItem onClick={logoutHandler}>Logout</DropdownItem>
                  </DropdownMenu>
                </Dropdown>
              )}
            </ul>
          </div>
        </nav>
        <Modal isOpen={modalLogin} toggle={toggleLogin} className="modal-login">
          <ModalHeader
            toggle={toggleLogin}
            className="modal-login-header"
            cssModule={{ "modal-title": "w-100 text-center" }}
          >
            <h3>Login</h3>
          </ModalHeader>
          <ModalBody className="modal-login-body">
            <form>
              <div className="form-group">
                <h5>Email</h5>
                <input
                  className="login-input"
                  value={username}
                  onChange={usernameHandler}
                  type="email"
                />
              </div>
              <div className="form-group">
                <h5>Password</h5>
                <input
                  className="login-input"
                  value={password}
                  onChange={passwordHandler}
                  type="password"
                  onKeyDown={(e) => enterSumbit(e)}
                />
              </div>
              {userId}
            </form>
          </ModalBody>
          <ModalFooter className="modal-login-footer">
            <Button
              type="submit"
              className="login-button"
              onClick={() => {
                login();
                toggleLogin();
              }}
            >
              Login
            </Button>{" "}
            {/* <Button color="secondary" onClick={props.toggle}>Cancel</Button> */}
          </ModalFooter>
        </Modal>
        <Register toggle={toggles} modal={modal} />
      </div>

      {/* Navbar Mobile */}
      <div className="navbar-mobile" style={{ zIndex: "9999" }}>
        {/*/.Navbar*/}
        {/* NAVBAR FUNCTION */}
        <nav className="d-flex nav-mobile px-4">
          <div className="logo">
            {userId === null ? (
              <div className="nav-item">
                <div className="udlite-btn ">
                  <button
                    className="btn mx-1 "
                    onClick={toggleLogin}
                    type="button"
                  >
                    {" "}
                    <strong>Login</strong>
                  </button>
                  <button className="btn mx-1" onClick={toggles} type="button">
                    {" "}
                    <strong>Daftar</strong>{" "}
                  </button>
                </div>
              </div>
            ) : (
              <Dropdown isOpen={dropdownOpenProfile} toggle={toggleProfile}>
                <DropdownToggle color="">
                  <Link className="nav-link" to="#">
                    <img
                      width="30px"
                      height="30px"
                      src="https://sunnybrook.ca/uploads/1/programs/trauma-emergency-care/rtbc/anonymous3.png"
                      alt="profile"
                    />
                  </Link>
                </DropdownToggle>
                <DropdownMenu right className="dropdown-menu">
                  <Link
                    style={{ textDecoration: "none", color: "black" }}
                    to="/profile"
                  >
                    <DropdownItem>Profile, {userId}</DropdownItem>
                  </Link>
                  <Link
                    style={{ textDecoration: "none", color: "black" }}
                    to="/toko"
                  >
                    <DropdownItem>Toko</DropdownItem>
                  </Link>
                  <Link
                    style={{ textDecoration: "none", color: "black" }}
                    to="/tokoInvoice"
                  >
                    <DropdownItem>Invoice Penjualan</DropdownItem>
                  </Link>
                  <Link
                    style={{ textDecoration: "none", color: "black" }}
                    to="/invoicePembeli"
                  >
                    <DropdownItem>Invoice Pembelian</DropdownItem>
                  </Link>
                  <DropdownItem onClick={logoutHandler}>Logout</DropdownItem>
                </DropdownMenu>
              </Dropdown>
            )}
          </div>
          <ul className={toggleNav ? "slide" : null}>
            {appState.objects.map((navLink) => (
              <li className="nav-item mr-3">{navLink.id}</li>
            ))}
            <li className="nav-item mr-3">
              <Link className="nav-link" to="/checkout">
                <span>Cart</span>
              </Link>
            </li>
          </ul>
          <div className="menu-toggle" onClick={toggleTruncatedNav}>
            <input type="checkbox" />
            <span />
            <span />
            <span />
          </div>
        </nav>
      </div>
    </>
  );
}

export default Navbar;
