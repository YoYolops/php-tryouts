<script lang="ts">
    import GiTicket from 'svelte-icons/gi/GiTicket.svelte'
</script>

<header>
    <div class="icon_container">
        <GiTicket />
        <p>Tickets</p>
    </div>

    <nav class="navigation_container">
            <a class="nav_item">Sobre</a>
            <a class="nav_item">Entrar</a>
            <a class="nav_item">Cadastrar</a>
    </nav>
</header>

<style>
    header {
        width: 100%;
        padding: 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    header::before {
        content: "";
        position: absolute;
        top: 0;
        right: 0;
        bottom: 0;
        left: 0;
        z-index: -10;
        background-color: #0ea6fe;
        transform: skewY(-7deg);
        -webkit-transform-origin: 0;
        transform-origin: 0;
        height: 800px;
    }

    .icon_container {
        width: 140px;
        height: 40px;
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: space-between;
        font-weight: 700;
        font-size: 1.2rem;
    }

    .icon_container > p {
        margin-left: 5px;
        font-family: 'Mr Dafoe', cursive;
        font-size: 2rem;
    }

    .navigation_container {
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .nav_item {
        margin: 0px 0px 0px 10px;
        font-weight: 700;
        color: #fff;
    }

    .nav_item:hover {
        cursor: pointer;
    }
</style>