import { Writable, writable } from "svelte/store";
import axios, { AxiosInstance } from "axios";
import { SessionDTO, LoginDTO } from "../dtos/Auth";

let Api: Writable<AxiosInstance> = writable(createApi({}));

function createApi(config) {
    return axios.create({
        baseURL: "http://localhost:8000/api",
        headers: {
            'Content-Type': 'application/json'
        },
        ...config,
    })
}

function updateApiConfig(config): Writable<AxiosInstance> {
    Api.update(prev => axios.create({
        ...prev,
        ...config
    }))

    return Api;
}

async function login(user: LoginDTO, api): Promise<SessionDTO> {
    const loggedUser = await api.post("/api/login", { ...user });
    console.log("Login returned: ", loggedUser.data)
    const {
        id,
        token,
        created_at: createdAt,
        updated_at: updatedAt,
        user_id: userId
    } = loggedUser.data
    return {
        id,
        token,
        createdAt,
        updatedAt,
        userId
    };
}


export {
    createApi,
    Api,
    updateApiConfig,
    login
}