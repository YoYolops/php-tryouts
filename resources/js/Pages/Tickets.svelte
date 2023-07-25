<script lang="ts">
    import { Session } from "../stores/Session";
    import { createApi, Api, updateApiConfig } from "../stores/Api";
    import { router } from "@inertiajs/svelte";

    void function init() {
        // Verifica se o usuario está logado, setando o token nos headers em caso afirmativo
        if($Session.token && $Session.token.length > 0) {
            updateApiConfig({
                headers: { "Authorization": "Bearer " + $Session.token }
            })
            console.log("Tickets.svelte achou uma session ativa")
        } else {
            router.get("/")
        }
    }();

</script>

<main>
    <p>voce esta logado, aproveite</p>
    <ul>
        <li>Minhas Rifas</li>
        <li>Criar Sorteio</li>
        <li>Listar sorteios</li>
    </ul>
</main>