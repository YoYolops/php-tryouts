<script lang="ts">
    import { LoginDTO } from "../dtos/Auth";

    let loginData: LoginDTO = {
        email: "",
        password: ""
    }
</script>

<form action="/login" method="POST">
    <div class="input_cell">
        <label for="email">Email: </label>
        <input type="email" name="email" bind:value={loginData.email} required>
    </div>

    <div class="input_cell">
        <label for="password">Senha: </label>
        <input type="password" name="password" bind:value={loginData.password} required>
    </div>

    <button type="submit">ENVIAR</button>
</form>;