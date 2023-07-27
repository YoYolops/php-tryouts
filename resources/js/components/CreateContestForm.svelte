<script lang="ts">
    import { onMount } from "svelte";
    import Modal from "./Modal.svelte";
    import { Api } from "../stores/Api";
    import { ContestDTO } from "../dtos/Contest";

    export let showModal = false;
    let contestData: ContestDTO = {
        name: '',
        image: '',
        price: 0,
    }

    onMount(() => {
        const imageInput = document.querySelector("#product_image");
        const fileReader = new FileReader();
        let handleImageInputChange;
        let handleFileImageLoad;

        imageInput.addEventListener("change", handleImageInputChange = (e: Event) => {
            const imagePicker: HTMLInputElement | any = e.target;
            const file = imagePicker.files[0];

            fileReader.addEventListener("load", handleFileImageLoad = (e) => {
                const readerTarget = e.target;
                contestData.image = readerTarget.result;
            })

            fileReader.readAsDataURL(file)
        })

        return () => {
            imageInput.removeEventListener("change", handleImageInputChange);
            fileReader.removeEventListener("load", handleFileImageLoad);
        }
    })

    async function handleSubmit(e: Event) {
        e.preventDefault();
        console.log(contestData)
        const {data: response} = await $Api.post("/contest", contestData);
        console.log(response)
    }
</script>


<Modal bind:showModal>
    <form on:submit|preventDefault id="myForm">
        <div class="input_cell">
            <label for="name">Nome do Concurso:</label>
            <input type="name" bind:value={contestData.name}/>
        </div>

        <div class="input_cell">
            <label for="name">Imagem do produo sorteado:</label>
            <input id="product_image" type="file" accept="image/*"/>
        </div>

        <div class="input_cell">
            <label for="name">Preço da rifa: </label>
            <input type="number" bind:value={contestData.price} />
        </div>

        <button on:click={handleSubmit}>Cadastrar Concurso</button>
    </form>
</Modal>

<style>

</style>