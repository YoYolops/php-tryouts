import { writable } from "svelte/store";
import { UserDTO } from "../dtos/Auth";
import axios from "axios";

axios.create({
    baseURL: process.env.API_URL
})

const userData = writable({
    name: "",
    password: "",
    email: ""
})

export function login(user: UserDTO): void {

}