<script lang="ts">
    import Init from "./Init.svelte";
    import CreateContestForm from "../components/CreateContestForm.svelte";
    import { inertia } from "@inertiajs/svelte";

    let showCreateContest = false;
</script>

<Init>
    <main>
        <p>voce esta logado, aproveite!</p>
        <ul>
            <li>Minhas Rifas</li>
            <li>Criar Sorteio</li>
            <li>Listar sorteios</li>
        </ul>
    
        <CreateContestForm bind:showModal={showCreateContest}/>
        <button on:click={() => showCreateContest = !showCreateContest}>SHOW FORM</button>
        <a href="/contests" use:inertia>Ver concursos</a>
    </main>
</Init>