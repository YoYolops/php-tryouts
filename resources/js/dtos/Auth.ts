export interface UserDTO {
    name: string,
    email: string,
    password: string
}

export interface LoginDTO {
    email: string,
    password: string
}

export interface SessionDTO {
    createdAt: string,
    id: number,
    token: string,
    updatedAt: string,
    userId: number
}