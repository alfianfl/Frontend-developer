import axios from "axios";

const baseURL = "http://localhost:5000";
export const getProduct = axios.create({
  baseURL: baseURL,
  headers: {},
});
