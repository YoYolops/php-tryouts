<script lang="ts">
	export let showModal: boolean;

	let dialog: HTMLDialogElement;

	$: if (dialog && showModal) dialog.showModal();
</script>

<dialog
	bind:this={dialog}
	on:close={() => (showModal = false)}
	on:click|self={() => dialog.close()}
>
<button autofocus on:click={() => dialog.close()}>FECHAR</button>
	<div on:click|stopPropagation>
		<slot name="header" />
		<hr />
		<slot />
		<hr />
	</div>
</dialog>

<style>
	dialog {
		max-width: 32em;
		border-radius: 0.2em;
		border: none;
		padding: 0;
	}
	dialog::backdrop {
		background: rgba(0, 0, 0, 0.3);
	}
	dialog > div {
		padding: 1em;
	}
	dialog[open] {
		animation: zoom 0.3s cubic-bezier(0.34, 1.56, 0.64, 1);
	}
	@keyframes zoom {
		from {
			transform: scale(0.95);
		}
		to {
			transform: scale(1);
		}
	}
	dialog[open]::backdrop {
		animation: fade 0.2s ease-out;
	}
	@keyframes fade {
		from {
			opacity: 0;
		}
		to {
			opacity: 1;
		}
	}
	button {
		display: block;
        color: #ae1a1a;
        font-size: 1.1rem;
        background-color: inherit;
        border: none;
        outline: none;
        font-weight: 500;
        text-decoration: underline;
        padding-left: 15px;
        padding-top: 10px;
	}

    button:hover {
        cursor: pointer;
    }
</style>