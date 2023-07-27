<script lang="ts">
    import RegisterCard from "./generics/RegisterCard.svelte";
    import LoginCard from "./generics/LoginCard.svelte";
    import Button from "./generics/Button.svelte";

    export let isRegistration = false;

    function toggleShownCard() { isRegistration = !isRegistration }
</script>

<main>
    <h1>
        {isRegistration ? "Cadastro" : "Login"}
    </h1>

    {#if isRegistration}
        <RegisterCard />
    {:else}
        <LoginCard />
    {/if}

    <Button onClick={toggleShownCard}>
        {isRegistration ? "Já possui conta? Login ->" : "Cadastre-se"}
    </Button>
</main>

<style>
    main {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        padding: 20px;
        width: 400px;
        margin: 40px auto;
        height: 450px;
    }
</style>