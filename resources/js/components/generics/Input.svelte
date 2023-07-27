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

</style>