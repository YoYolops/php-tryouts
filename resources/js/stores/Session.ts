import { writable } from "svelte/store";

export const User = writable(getLocalStorageUserData());

export function updateUserData(newData) {
    User.update(prev => {
        const updatedData = {
            ...prev,
            ...newData
        }
        updateLocalStoragedUserData(updatedData)
        return updatedData;
    })
    return User;
}

function getLocalStorageUserData() {
    console.log("GETTING USER DATA")
    const storagedUserData = JSON.parse(localStorage.getItem("userData") ?? "{}")
    console.log("Storaged data: ", storagedUserData)
    return storagedUserData
}

function updateLocalStoragedUserData(newUserData) {
    localStorage.setItem("userData", JSON.stringify(newUserData))
}