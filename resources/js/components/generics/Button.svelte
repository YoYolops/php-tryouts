<script lang="ts">
    export let onClick: Function;
    function handleClick(e: Event) { onClick(e); }
</script>

<button on:click={handleClick} class="main_container">
    <slot></slot>
</button>

<style>
    button {
        background-color: var(--default-blue);
        border-radius: 5px;
        width: 100%;
        height: 40px;
        border: none;
        color: #fff;
        font-size: 1.1rem;
        font-weight: 700;
    }

    button:hover {
        cursor: pointer;
        opacity: .8;
    }
</style>