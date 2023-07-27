<script lang="ts">
    import { UserDTO } from "../../dtos/Auth";
    import Button from "./Button.svelte";
    import Input from "./Input.svelte";

    let registerData: UserDTO = {
        name: "",
        email: "",
        password: "",
    }
</script>

<form action="/api/register" method="POST">
    <Input 
        label="Nome: "
        type="text"
        name="name"
        bind:value={registerData.name}
        required
    />

    <Input 
        label="Email: "
        type="email"
        name="email"
        bind:value={registerData.email}
        required
    />

    <Input 
        label="Senha: "
        type="password"
        name="password"
        bind:value={registerData.password}
        required
    />

    <Button onClick={() => {}}>ENVIAR</Button>
</form>

<style>

</style>