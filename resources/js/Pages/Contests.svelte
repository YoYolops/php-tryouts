<script lang="ts">
    import { Api } from "../stores/Api";

    let contests;

    void async function init() {
        console.log($Api.defaults.headers);
        const userContests = await $Api.get("/contest");
        contests = userContests.data;
        console.log(userContests);
    }();
</script>


<main>
    {#if contests}
        {#each contests as contest}
            <img src={contest.image}>
        {/each}  
    {/if}

</main>

