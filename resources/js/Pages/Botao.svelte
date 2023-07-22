<script>
    let number = 0; 

    function addButton() {
        number += 1;
    }
</script>

<button on:click={addButton}>
    Vezes clicadas: {number}
</button>