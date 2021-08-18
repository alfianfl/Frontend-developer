import React, { useContext, useState } from "react";
import UseStyle from "../hooks/UseStyle";
import { BookContext } from "../contexts/BookContext";
function BookForm() {
  const [title, setTitle] = useState("");
  const [author, setAuthor] = useState("");
  const { dispatch } = useContext(BookContext);
  const { style } = UseStyle();

  const handlerSubmit = (e) => {
    e.preventDefault();
    dispatch({
      type: "ADD_BOOK",
      book: {
        title: title,
        author: author,
      },
    });
  };

  return (
    <div
      className="book-form"
      style={{ background: style.bg, color: style.syntax }}
    >
      <form onSubmit={handlerSubmit}>
        <input
          type="text"
          placeholder="add title"
          value={title}
          onChange={(e) => setTitle(e.target.value)}
        />
        <input
          type="text"
          placeholder="add author"
          value={author}
          onChange={(e) => setAuthor(e.target.value)}
        />
        <input type="submit" placeholder="add book" />
      </form>
    </div>
  );
}

export default BookForm;
