import React, { createContext, useReducer, useEffect } from "react";
import { bookReducer } from "../reducer/bookReducer";

export const BookContext = createContext();
const initialValue = [
  {
    title: "Lord of the ring",
    id: 1,
    author: "Simon Petrus",
  },
];
const getLocalStorage = () => {
  const localData = localStorage.getItem("books");
  return localData ? JSON.parse(localData) : [];
};

function BookContextProvider(props) {
  const [books, dispatch] = useReducer(
    bookReducer,
    initialValue,
    getLocalStorage
  );

  useEffect(() => {
    localStorage.setItem("books", JSON.stringify(books));
  }, [books]);

  return (
    <BookContext.Provider value={{ books, dispatch }}>
      {props.children}
    </BookContext.Provider>
  );
}

export default BookContextProvider;
