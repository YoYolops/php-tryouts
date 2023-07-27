<script lang="ts">
    import RegisterCard from "./generics/RegisterCard.svelte";
    import LoginCard from "./generics/LoginCard.svelte";

    export let isRegistration = false;
    function toggleShownCard() { isRegistration = !isRegistration }
</script>

<main>
    <h1>
        {isRegistration ? "Cadastro" : "Login"}
    </h1>

    <div>        
        {#if isRegistration}
            <RegisterCard />
        {:else}
            <LoginCard />
        {/if}
    </div>

    <button on:click={toggleShownCard}>
        {isRegistration ? "Já possui conta? Entrar" : "Não possui conta? Cadastre-se"}
    </button>
</main>

<style>
    main {
        background-color: #fff;
        border-radius: 10px;
        box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
        padding: 20px;
        width: clamp(250px, 95%, 500px);
        margin: 40px auto;
    }

    h1 {
        font-size: 1.5rem;
        font-weight: 600;
        width: 100%;
        text-align: center;
        margin-bottom: 50px;
        color: var(--default-blue);
        text-decoration: underline;
    }

    button {
        background-color: #fff;
        outline: none;
        border: none;
        text-align: center;
        text-decoration: underline;
        font-weight: 700;
        font-size: 1rem;
        width: 100%;
        margin-top: 20px;
        color: var(--default-blue);
    }

    button:hover {
        cursor: pointer;
    }
</style>