import { writable } from "svelte/store";
import { LoginDTO, UserDTO } from "../dtos/Auth";
import axios from "axios";

const API_URL = "http://localhost:8000/";
const API = axios.create({
    baseURL: API_URL,
    headers: {
        'Content-Type': 'application/json'
    }
})

let userData = writable({
    name: "",
    password: "",
    email: "",
    token: ""
})

async function login(user: LoginDTO): Promise<LoginDTO> {
    const loggedUser = await API.post("/api/login", { ...user });
    userData = loggedUser.data;
    console.log("Login returned: ", loggedUser.data)
    return loggedUser.data;
}

export {
    userData,
    login
}