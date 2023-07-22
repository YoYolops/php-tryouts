<script lang="ts">
    let number: number = 0; 

    function addButton(): void {
        number += 1;
    }
</script>

<button on:click={addButton}>
    Vezes clicadas: {number}
</button>