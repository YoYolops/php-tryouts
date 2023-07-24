<script lang="ts">
    import { UserDTO } from "../dtos/Auth";


    let registerData: UserDTO = {
        name: "",
        email: "",
        password: "",
    }

    function handleRegistration(e: Event): void {
        e.preventDefault();

    }

</script>

<form action="/register" method="POST">
    <div class="input_cell">
        <label for="name">Nome: </label>
        <input type="text" name="name" bind:value={registerData.name} required>
    </div>

    <div class="input_cell">
        <label for="email">Email: </label>
        <input type="email" name="email" bind:value={registerData.email} required>
    </div>

    <div class="input_cell">
        <label for="password">Senha: </label>
        <input type="password" name="password" bind:value={registerData.password} required>
    </div>

    <button type="submit">ENVIAR</button>
</form>