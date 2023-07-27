<script lang="ts">
    import { LoginDTO } from "../../dtos/Auth";
    import { login, Api } from "../../stores/Api";
    import { updateSessionData } from "../../stores/Session";
    import { router } from "@inertiajs/svelte";
    import Input from "./Input.svelte";

    let loginData: LoginDTO = {
        email: "",
        password: ""
    }

    async function handleSubmit(e: Event): Promise<void> {
        // a function is needed because, after the successful login, we must store session data
        // otherwise a form action would handle it perfectly
        e.preventDefault();
        const sessionData = await login(loginData, $Api);
        updateSessionData(sessionData);
        router.get("/tickets");
    }
</script>

<form>
    <Input 
        name="email"
        label="E-mail: "
        required
        bind:value={loginData.email}
        type="email"
    />

    <Input 
        name="senha"
        label="Senha"
        required
        bind:value={loginData.password}
        type="password"
    />
    <button type="submit" on:click={handleSubmit}>ENVIAR</button>
</form>