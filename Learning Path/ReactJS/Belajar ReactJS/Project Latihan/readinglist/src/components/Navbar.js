import React, { useContext } from "react";
import { AuthContext } from "../contexts/AuthContext";
import { BookContext } from "../contexts/BookContext";
import UseStyle from "../hooks/UseStyle";

function Navbar() {
  const authContext = useContext(AuthContext);
  const { books } = useContext(BookContext);
  const authStatus = authContext.isAuthenticated ? "login" : "logout";
  const { style } = UseStyle();
  return (
    <div>
      <nav
        className="navbar"
        style={{ background: style.ui, color: style.syntax }}
      >
        <h1>My Reading List</h1>
        <span onClick={authContext.toggleAuth}>{authStatus}</span>
        <p>Currently you have {books.length} books to get through...</p>
      </nav>
    </div>
  );
}

export default Navbar;
