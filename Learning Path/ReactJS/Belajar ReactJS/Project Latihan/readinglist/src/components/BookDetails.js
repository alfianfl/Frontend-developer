import React, { useContext } from "react";
import { BookContext } from "../contexts/BookContext";
import UseStyle from "../hooks/UseStyle";

function BookDetails({ book }) {
  const { style } = UseStyle();
  const { dispatch } = useContext(BookContext);
  return (
    <div>
      <li
        onClick={() => dispatch({ type: "REMOVE_BOOK", id: book.id })}
        className="title"
        style={{ background: style.ui }}
        key={book.id}
      >
        Title : {book.title} <br></br>
        Author : <span className="author">{book.author}</span>
      </li>
    </div>
  );
}

export default BookDetails;
