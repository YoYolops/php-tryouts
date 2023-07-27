<script>
    import { router } from "@inertiajs/svelte";
    import "../../css/app.css";
    import GenericButton from "../components/GenericButton.svelte";
    import LoginCard from "../components/LoginCard.svelte";
    import RegisterCard from "../components/RegisterCard.svelte";
    import { Session } from "../stores/Session";

    let isRegistration = false;

    void function init() {
        // precisa verificar se, alem de existir, o token é válido
        if($Session.token && $Session.token.length) router.get("/tickets");
    }();
</script>

<main>
    <h1>Bem vindo ao site de rifas, compre as suas rifas e seja feliz</h1>
    <h2>Algun texto mais apelatino param ram tan tan</h2>

    <div class="auth_container">
        {#if isRegistration}
            <RegisterCard />
        {:else}
            <LoginCard />
        {/if}

        <GenericButton onClick={() => isRegistration = !isRegistration}>
            {isRegistration ? "Já possui conta? Login ->" : "Cadastre-se"}
        </GenericButton>
    </div>
</main>