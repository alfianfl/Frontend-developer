import React from "react";
import BookList from "./components/BookList";
import Navbar from "./components/Navbar";
import ThemeToggle from "./components/ThemeToggle";
import ThemeContextProvider from "./contexts/ThemeContext";
import AuthContextProvider from "./contexts/AuthContext";
import BookContextProvider from "./contexts/BookContext";
import BookForm from "./components/BookForm";
import "./App.css";

function App() {
  return (
    <div className="App">
      <select class="form-select" aria-label="Default select example">
        <option>Open this select menu</option>
        <option selected value="1">
          One
        </option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>

      <ThemeContextProvider>
        <AuthContextProvider>
          <BookContextProvider>
            <Navbar />
            <BookList />
            <BookForm />
          </BookContextProvider>
          <ThemeToggle />
        </AuthContextProvider>
      </ThemeContextProvider>
    </div>
  );
}

export default App;
