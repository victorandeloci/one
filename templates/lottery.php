<?php 
    /* Template Name: Sorteio */
    get_header();
    $post = get_post();
?>

<main class="post page lottery">
    <div class="container">
        <div class="content">
            <h1><?= get_the_title() ?></h1>
            <?= the_content() ?>
            <form id="lotteryForm">
                <label for="name">Nome:</label>
                <input type="text" name="name" id="name" placeholder="Seu Nome" required>
                <label for="email">Email:</label>
                <input type="mail" name="email" id="email" placeholder="seu@email.xyz" required>
                <label for="insta">Instagram:</label>
                <input type="text" name="insta" id="insta" placeholder="@instagram" required>
                <button type="submit" id="lotterySubmitBtn" class="btn pink">Enviar</button>
            </form>
        </div>
    </div>
</main>

<?php get_footer(); ?>
