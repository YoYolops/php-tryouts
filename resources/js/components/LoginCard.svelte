<script lang="ts">
    import { LoginDTO } from "../dtos/Auth";
    import { login } from "../stores/Auth";
    import { updateUserData } from "../stores/Session";
    import { router } from "@inertiajs/svelte";

    let loginData: LoginDTO = {
        email: "",
        password: ""
    }

    async function handleSubmit(e: Event): Promise<void> {
        e.preventDefault();
        const responseData = await login(loginData);
        updateUserData(responseData)
        router.get("/tickets");
    }
</script>

<form action="/api/login" method="POST">
    <div class="input_cell">
        <label for="email">Email: </label>
        <input type="email" name="email" bind:value={loginData.email} required>
    </div>

    <div class="input_cell">
        <label for="password">Senha: </label>
        <input type="password" name="password" bind:value={loginData.password} required>
    </div>

    <button type="submit" on:click={e => handleSubmit(e)}>ENVIAR</button>
</form>;