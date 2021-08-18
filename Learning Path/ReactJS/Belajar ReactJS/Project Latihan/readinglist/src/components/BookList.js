import React, { useContext } from "react";
import UseStyle from "../hooks/UseStyle";
import { BookContext } from "../contexts/BookContext";
import BookDetails from "../components/BookDetails";
function BookList() {
  const { books } = useContext(BookContext);
  const { style } = UseStyle();
  return (
    <div
      className="book-list"
      style={{ background: style.bg, color: style.syntax }}
    >
      <ul>
        {books.map((book) => (
          <BookDetails book={book} key={book.id} />
        ))}
      </ul>
    </div>
  );
}

export default BookList;
