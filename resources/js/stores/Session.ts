import { writable, Writable } from "svelte/store";
import { SessionDTO } from "../dtos/Auth";

export const Session: Writable<SessionDTO> = writable(getLocalStorageUserData());

export function updateSessionData(newData) {
    Session.update(prev => {
        const updatedData = {
            ...prev,
            ...newData
        }
        updateLocalStoragedSessionData(updatedData)
        return updatedData;
    })
    return Session;
}

function getLocalStorageUserData() {
    console.log("GETTING USER DATA")
    const storagedUserData = JSON.parse(localStorage.getItem("userData") ?? "{}")
    console.log("Storaged data: ", storagedUserData)
    return storagedUserData;
}

export function resetLocallyStoragedData() {
    localStorage.setItem("userData", JSON.stringify({}));
}

function updateLocalStoragedSessionData(newUserData) {
    localStorage.setItem("userData", JSON.stringify(newUserData))
}