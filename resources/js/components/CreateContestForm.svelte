<script lang="ts">
    import { onMount } from "svelte";
    import Modal from "./generics/Modal.svelte";
    import { Api } from "../stores/Api";
    import { ContestDTO } from "../dtos/Contest";
    import Input from "./generics/Input.svelte";
    import Button from "./generics/Button.svelte";

    export let showModal = false;
    let contestData: ContestDTO = {
        name: '',
        image: '',
        price: 0,
    }

    onMount(() => {
        const imageInput = document.querySelector("#product_image");
        const fileReader = new FileReader();
        let handleImageInputChange: EventListener;
        let handleFileImageLoad: EventListener;

        imageInput.addEventListener("change", handleImageInputChange = (e: Event) => {
            const imagePicker: HTMLInputElement | any = e.target;
            const file = imagePicker.files[0];

            fileReader.addEventListener("load", handleFileImageLoad = (e) => {
                const readerTarget: EventTarget | any = e.target;
                contestData.image = readerTarget.result;
            })

            fileReader.readAsDataURL(file)
        })

        return () => {// runs on destroy
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
        <Input 
            label="Sorteio: "
            name="name"
            type="text"
            bind:value={contestData.name}
            required
        />

        <div class="input_cell">
            <label for="image">Imagem do produto sorteado:</label>
            <input id="product_image" name="image" type="file" accept="image/*"/>
        </div>

        <Input 
            label="Preço da Rifa: "
            name="price"
            type="number"
            bind:value={contestData.price}
            required
        />

        <Button onClick={handleSubmit}>Cadastrar Concurso</Button>
    </form>
</Modal>

<style>
    .input_cell {
        margin: 20px 0px;
    }
</style>