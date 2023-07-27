<script lang="ts">
    export let onClick = () => {};
</script>

<button on:click={onClick} class="main_container">
    <slot></slot>
</button>

<style>
    .main_container {
        background-color: aqua;
    }
</style>