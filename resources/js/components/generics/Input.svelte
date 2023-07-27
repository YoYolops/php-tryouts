<script lang="ts">
    export let name: string, value: any, required: boolean, label: string, type: string;

    function typeSetter(node: HTMLInputElement) {
        node.type = type
    }
</script>

<div>
    <label for={name}>{label}</label>
    <input 
        bind:value={value} 
        {required}
        {name}
        use:typeSetter
    >
</div>

<style>
    div {
        margin-bottom: 20px;
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    label {
        font-size: 1rem;
        font-weight: 700;
        width: 30%;
        background-color: var(--default-blue);
        padding: 5px;
        color: #fff;
        border-radius: 3px 3px 0px 3px;
    }

    input {
        width: 70%;
        border: none;
        padding: 5px;
        border-bottom: 2px solid var(--default-blue);
        outline-color: var(--default-blue);
    }

</style>