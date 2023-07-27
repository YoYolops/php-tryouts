<script>
    import Init from "./Init.svelte";
    import "../../css/app.css";
    import AuthCard from "../components/AuthCard.svelte";
    import Header from "../components/generics/Header.svelte";
    import GiTicket from 'svelte-icons/gi/GiTicket.svelte'

</script>

<Init>
    <main>
        <Header />

        <div class="presentation_icon_container">
            <GiTicket />
        </div>

        <h1 class="description">Bem vindo ao Tickets, o maior site de rifas do Brasil!</h1>
        <h2 class="description">Compre, venda e gerencie seus sorteios e rifas, tudo isso sem pagar nada!</h2>
    
        <AuthCard />
    </main>
</Init>

<style>
    .description {
        width: 100%;
        text-align: center;
        color: #fff;
        font-weight: 700;
    }

    .presentation_icon_container {
        width: 100%;
        height: 150px;
        display: flex;
        align-items: center;
        justify-content: center;
        margin-top: 50px;
        color: #fff;
    }
    
    h1 {
        font-size: 2.5rem;
        margin: 40px 0px;
    }

    h2 {
        font-size: 1.5rem;
        text-decoration: underline;
    }
</style>