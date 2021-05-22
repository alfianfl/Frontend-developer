import axios from 'axios';

const baseURL = 'http://localhost:5000'
export const registerAPI = axios.create({
    baseURL: baseURL ,
    headers: {}
})
export const loginAPI = axios.create({
    baseURL: baseURL,
    headers: {}
})