<script lang="ts">
    import { onMount } from "svelte";
    import { User } from "../stores/Session";

    onMount(() => {console.log("Preservei?: ", $User)})
</script>

<main>
    essa é a pagina de tickets
</main>