<script lang="ts">
    import { Session } from "../stores/Session";
    import { createApi, Api, updateApiConfig } from "../stores/Api";
    import { router } from "@inertiajs/svelte";
    import CreateContestForm from "../components/CreateContestForm.svelte";

    void function init() {
        // Verifica se o usuario está logado, setando o token nos headers em caso afirmativo
        if($Session.token && $Session.token.length > 0) {
            $Api.get("/contest");
            updateApiConfig({
                headers: { "Authorization": "Bearer " + $Session.token }
            })
        } else {
            router.get("/")
        }
    }();

    let showCreateContest = false;
</script>

<main>
    <p>voce esta logado, aproveite!</p>
    <ul>
        <li>Minhas Rifas</li>
        <li>Criar Sorteio</li>
        <li>Listar sorteios</li>
    </ul>

    <CreateContestForm bind:showModal={showCreateContest}/>
    <button on:click={() => showCreateContest = !showCreateContest}>SHOW FORM</button>
</main>